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
        'private',
    ];

    protected $attributes;

    public function __construct($attributes = [])
    {
        $this->setUserIdAttribute();
        parent::__construct($attributes);
    }

    private function setUserIdAttribute()
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
