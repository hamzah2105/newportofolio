<?php

use App\Models\metadata;

function get_meta_value( $meta_key)
{
    $data = metadata::where('meta_key', $meta_key)->first();
    if ( $data ) 
    {
      return $data->meta_value;
    }
}

//ini kalau mau warna berbeda
// function set_about_nama($nama)
// {
//   nama = "Hamzah"
//   $arr = explode(' ', $nama);idx 1 ham idx 2 zah
//   $kataakhir = end($arr);
//   $kataakhir2 ="<span class='text-primary'>$kataakhir</span>"
//   array_pop($arr);Ham
//   $namaAwal = implode(',', $arr);
//   return $namaAwal. " " .$kataakhir2; 
// }
