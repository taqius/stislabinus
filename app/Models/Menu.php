<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'create_at', 'updated_at'];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('menu', 'like', '%' . $query . '%')
            ->orWhere('name', 'like', '%' . $query . '%');
    }
}
