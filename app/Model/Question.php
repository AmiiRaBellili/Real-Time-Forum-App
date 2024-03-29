<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Question extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = ['title', 'slug', 'body', 'category_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute()
    {
        return ("api/question/$this->slug");
    }
}