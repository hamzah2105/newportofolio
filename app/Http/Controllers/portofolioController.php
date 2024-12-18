<?php

namespace App\Http\Controllers;

use App\Models\portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = portofolio::orderBy('title', 'asc')->get();
        return view("dashboard.portofolio.index")->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.portofolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi permintaan
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
            // 'lukisan' => 'required|image|mimes:jpeg,png,jpg,gif',
        ], [
            'title.required' => 'Nama Project wajib diisi',
            'description.required' => 'Isi wajib diisi',
            'image.required' => 'Gambar utama wajib diisi',
            'gambar.required' => 'Gambar tambahan wajib diisi',
            // 'lukisan.required' => 'Lukisan wajib diisi',
        ]);

        // Menangani upload gambar
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        // Handle each file upload
        foreach (['image', 'gambar', 'lukisan'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $imageName = time() . '_' . $field . '.' . $file->getClientOriginalExtension(); // Unique file name
                $file->move(public_path('images'), $imageName); // Move file to public/images
                $data[$field] = 'images/' . $imageName; // Save relative path
            } else {
                return back()->withErrors([$field => ucfirst($field) . ' is required']);
            }
        }

        // Buat entri portofolio
        Portofolio::create($data);

        return redirect()->route('portofolio.index')->with('success', 'Berhasil menambahkan data riwayat');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = portofolio::where('id', $id)->first();
        return view('dashboard.portofolio.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi permintaan
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Gambar bersifat opsional, maksimal 2MB
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            // 'lukisan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Nama Project wajib diisi',
            'description.required' => 'Isi wajib diisi',
            'image.image' => 'File yang diupload harus berupa gambar',
            'image.mimes' => 'Gambar harus dalam format jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 2MB',
            'gambar.image' => 'File yang diupload harus berupa gambar',
            'gambar.mimes' => 'Gambar harus dalam format jpeg, png, jpg, atau gif',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
            // 'lukisan.image' => 'File yang diupload harus berupa gambar',
            // 'lukisan.mimes' => 'Gambar harus dalam format jpeg, png, jpg, atau gif',
            // 'lukisan.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        // Temukan entri portofolio yang ada
        $portofolio = Portofolio::findOrFail($id);

        // Siapkan data untuk penyimpanan
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        // Menangani upload gambar jika gambar baru disediakan
        foreach (['image', 'gambar', 'lukisan'] as $field) {
            if ($request->hasFile($field)) {
                // Hapus gambar lama jika ada
                if ($portofolio->$field) {
                    $oldImagePath = public_path($portofolio->$field);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Menghapus gambar lama
                    }
                }

                // Simpan gambar baru
                $file = $request->file($field);
                $imageName = time() . '_' . $field . '.' . $file->getClientOriginalExtension(); // Membuat nama file unik
                $file->move(public_path('images'), $imageName); // Pindahkan file ke folder public/images
                $data[$field] = 'images/' . $imageName; // Tambahkan jalur gambar baru ke data
            }
        }

        // Perbarui entri portofolio
        $portofolio->update($data);

        // Redirect dengan pesan sukses
        return redirect()->route('portofolio.index')->with('success', 'Berhasil memperbarui data riwayat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cek apakah portofolio ada
        $portofolio = Portofolio::find($id);
    
        if (!$portofolio) {
            return redirect()->route('portofolio.index')->with('error', 'Data tidak ditemukan');
        }
    
        // Hapus gambar dari storage jika ada
        if ($portofolio->image) {
            $imagePath = $portofolio->image; // Ambil path gambar
            Log::info('Deleting image: ' . $imagePath); // Log path gambar yang akan dihapus
    
            // Hapus gambar
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
                Log::info('Image deleted successfully.');
            } else {
                Log::warning('Image not found: ' . $imagePath);
            }
        }
    
        // Hapus data dari database
        $portofolio->delete();
    
        return redirect()->route('portofolio.index')->with('success', 'Berhasil menghapus data');
    }
}
