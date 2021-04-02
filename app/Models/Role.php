<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user() {

        return $this->hasOne(User::class,'role_id', 'id');

    }

    public function category() {

        return $this->hasOne(Category::class, 'id');

    }
}
