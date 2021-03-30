<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function pass() {

        return $this->hasMany(Pass::class,'category_id', 'id');

    }
}
