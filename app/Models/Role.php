<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user() {

        return $this->hasOne(User::class,'role_id', 'id');

    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'categories_roles', 'roles_id', 'categories_id');
    }
}
