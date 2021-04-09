<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionMenu extends Model
{
    use HasFactory;
    protected $table = 'section_menu';
    protected $guarded = [];
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('menu', 'like', '%' . $query . '%')
            ->orWhere('route', 'like', '%' . $query . '%')
            ->orWhere('icon', 'like', '%' . $query . '%')
            ->orWhere('section', 'like', '%' . $query . '%');
    }
}
