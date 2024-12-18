<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profilController extends Controller
{
    function index() 
    {
        return view('dashboard.profil.index');
    }

    public function update(Request $request)
    {
        // Validasi file
        $request->validate([
            '_foto' => 'mimes:jpeg,png,jpg,gif',
            '_email'=> 'required|email',
            '_pdf' => 'mimes:pdf', // Validasi untuk file PDF
        ],
        [
           '_foto.mimes' => 'Foto yang dimasukan hanya di perbolehkan berkestensi JPEG, JPG, PNG, dan GIF ',
           '_email.required' => 'Email wajib di isi',
           '_email.email' => 'Format email yang dimasukan tidak valid',
            '_pdf.mimes' => 'File yang dimasukan hanya di perbolehkan berkestensi PDF', // Validasi untuk file PDF 
        ]
    );
    
        // Menyimpan foto jika ada
        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') .".". $foto_ekstensi;
            $foto_file->move(public_path("foto"), $foto_baru);
            //kalau ada update foto
            $foto_lama = get_meta_value('_foto');
            File::delete(public_path('foto'). "/" .$foto_lama);

            metadata::updateOrCreate(['meta_key' => '_foto'], ['meta_value'=> $foto_baru]);
        }
        
        if ($request->hasFile('_pdf')) {
            $pdf_file = $request->file('_pdf');
            $pdf_ekstensi = $pdf_file->extension();
            $pdf_baru = date('ymdhis') .".". $pdf_ekstensi;
            $pdf_file->move(public_path("pdf"), $pdf_baru);
            //kalau ada update pdf
            $pdf_lama = get_meta_value('_pdf');
            File::delete(public_path('pdf'). "/" .$pdf_lama);   

            metadata::updateOrCreate(['meta_key' => '_pdf'], ['meta_value'=> $pdf_baru]);
        }

        metadata::updateOrCreate(['meta_key' => '_nama'], ['meta_value'=> $request->_nama]);
        metadata::updateOrCreate(['meta_key' => '_title'], ['meta_value'=> $request->_title]);
        metadata::updateOrCreate(['meta_key' => '_email'], ['meta_value'=> $request->_email]);
        metadata::updateOrCreate(['meta_key' => '_alamat'], ['meta_value'=> $request->_alamat]);
        metadata::updateOrCreate(['meta_key' => '_nohp'], ['meta_value'=> $request->_nohp]);

        metadata::updateOrCreate(['meta_key' => '_ig'], ['meta_value'=> $request->_ig]);
        metadata::updateOrCreate(['meta_key' => '_tw'], ['meta_value'=> $request->_tw]);
        metadata::updateOrCreate(['meta_key' => '_in'], ['meta_value'=> $request->_in]);
        metadata::updateOrCreate(['meta_key' => '_github'], ['meta_value'=> $request->_github]);
    
        // Menyimpan PDF
        // $pdfPath = $request->_pdf->store('uploads/pdf', 'public');
    
    
    
        return redirect()->route('profil.index')->with('success', 'File berhasil diupload!');
    }
}
