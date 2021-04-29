<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;
    protected $table = 'keterangan';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('ket', 'like', '%' . $query . '%')
            ->orWhere('jenisket', 'like', '%' . $query . '%');
    }
}
