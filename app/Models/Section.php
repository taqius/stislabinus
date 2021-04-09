<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'section';
    protected $guarded = [];

    public function sectionmenu()
    {
        return $this->hasMany(SectionMenu::class, 'section_id');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('section', 'like', '%' . $query . '%');
    }
}
