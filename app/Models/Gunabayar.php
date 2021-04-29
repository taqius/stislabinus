<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gunabayar extends Model
{
    use HasFactory;
    protected $table = 'gunabayar';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('gunabayar', 'like', '%' . $query . '%')
            ->orWhere('wajibbayar', 'like', '%' . $query . '%');
    }
}
