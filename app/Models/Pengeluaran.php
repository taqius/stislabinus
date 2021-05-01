<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'pengeluaran';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function getTanggalsAttribute()
    {
        return Carbon::parse($this->attributes['tanggals'])->translatedFormat('D, d M y');
    }
    public function getTanggalnAttribute()
    {
        return Carbon::parse($this->attributes['tanggaln'])->translatedFormat('D, d M y');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('keterangan', 'like', '%' . $query . '%');
    }
}
