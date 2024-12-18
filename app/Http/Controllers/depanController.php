<?php

namespace App\Http\Controllers;

use App\Models\skill;
use App\Models\halaman;
use App\Models\riwayat;
use App\Models\Metadata;
use App\Models\portofolio;
use Illuminate\Http\Request;

class depanController extends Controller
{
    public function index()
    {
        $about_id = get_meta_value('_halaman_about');
        $about_data = $about_id ? halaman::where('id', $about_id)->first() : null;

        $portofolios = Portofolio::all();
        $riwayats = riwayat::all();

        // Handle empty collections if necessary
        $portofolios = $portofolios->isEmpty() ? [] : $portofolios;
        $riwayats = $riwayats->isEmpty() ? [] : $riwayats;

        return view('depan.frontend.index', compact('portofolios', 'riwayats'))->with([
            'about' => $about_data ?? (object) [
                'judul' => 'Default Title', // Add all expected properties
                'isi' => 'No about information available.',
            ],
        ]);
    }



    public function detail($id)
    {
        $about_id = get_meta_value('_halaman_about');
        $about_data = $about_id ? halaman::where('id', $about_id)->first() : null;

        // Fetch portfolio data by ID
        $portofolio = Portofolio::find($id);

        // Handle case when portfolio is not found
        if (!$portofolio) {
            return redirect()->route('portofolio.index')->with('error', 'Data tidak ditemukan');
        }

        return view('depan.frontend.detail', compact('portofolio'))->with([
            'about' => $about_data ?? (object) [
                'judul' => 'Default Title',
                'isi' => 'Default about information.',
            ],
        ]);
    }
}
