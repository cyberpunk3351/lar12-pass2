<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pass extends Model
{
    // protected $guarded = [];

    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        'source',
        'category_id',
    ];

    protected $attributes = ['user_id' => 0];

    // public function save(array $options = array())
    // {
    //     if( ! $this->company_id)
    //     {
    //         $this->user_id = Auth::user()->id;
    //     }

    //     parent::save($options);
    // }


    // public static  function boot()
    // {
    //     parent::boot(); 
    //     static::creating(function ($model){
    //         $model->user_id = auth()->user()->id;

    //     });
    // }

    // public function getUserIdAttribute()
    // {
    //     return $this->user_id;

    // }

    public function setUserIdAttribute()
    {
        $this->attributes['user_id'] = Auth::user()->id;

    }

    public function user() {

        return $this->hasOne(User::class,'id', 'user_id');

    }

    public function category() {

        return $this->hasOne(Category::class,'id', 'category_id');

    }
}
