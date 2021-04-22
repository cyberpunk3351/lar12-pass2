<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];


    public function pass() {

        return $this->hasMany(Pass::class,'category_id', 'id');

    }

    /**
     * Получить роли.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'categories_roles', 'categories_id', 'roles_id');
    }

}
