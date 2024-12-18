<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class riwayat extends Model
{
    use HasFactory;
    protected $table = "riwayat";
    protected $fillable = ['info1', 'info2', 'tgl_mulai', 'tgl_akhir'];

    protected $appends = ['tgl_mulai_indo', 'tg_akhir_indo'];

    public function getTglMulaiIndoAttribute()
    {
        return Carbon::parse($this->attributes['tgl_mulai'])->translatedFormat('d F Y');
    }
    public function getTglAkhirIndoAttribute()
    {
        if ($this->attributes['tgl_akhir']) {

            return Carbon::parse($this->attributes['tgl_akhir'])->translatedFormat('d F Y');
        } else {
            return 'present';
        }
    }
}
