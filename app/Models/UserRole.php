<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'model_has_roles';
    protected $guarded = [];
    public function role()
    {
        $this->belongsTo(Role::class, 'role_id');
    }
}
