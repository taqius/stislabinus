<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('tingkat', 'like', '%' . $query . '%')
            ->orWhere('jurusan', 'like', '%' . $query . '%');
    }
}
