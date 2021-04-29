<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'pengeluaran';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('keterangan', 'like', '%' . $query . '%')
            ->orWhere('jumlahbayar', 'like', '%' . $query . '%');
    }
}
