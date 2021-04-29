<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function getTanggalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal'])->translatedFormat('D, d M y');
    }
    public function getTanggalcetakAttribute()
    {
        return Carbon::parse($this->attributes['tanggalcetak'])->translatedFormat('d F Y');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('jenisket', 'SPP')
            ->where('nama', 'like', '%' . $query . '%')
            ->orWhere('gunabayar', 'like', '%' . $query . '%');
    }
    public static function searchp($query)
    {
        return empty($query) ? static::query()
            : static::where('jenisket', 'Non-SPP')
            ->where('nama', 'like', '%' . $query . '%')
            ->orWhere('gunabayar', 'like', '%' . $query . '%');
    }
}
