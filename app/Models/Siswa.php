<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('nama', 'like', '%' . $query . '%')
            ->orWhere('nis', 'like', '%' . $query . '%')
            ->orWhere('jurusan', 'like', '%' . $query . '%');
    }
}
