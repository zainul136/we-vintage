<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact',
        'company',
        'poc',
        'email',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    // public function getIsAdminAttribute()
    // {
    //     return $this->roles()->where('id', 1)->exists();
    // }
    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }
}
