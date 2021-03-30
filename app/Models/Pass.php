<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    public function user() {

        return $this->hasOne(User::class,'id', 'user_id');

    }

    public function category() {

        return $this->hasOne(Category::class,'id', 'category_id');

    }
}
