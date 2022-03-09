<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Posts extends Model
{
    use HasFactory;

    protected $guarded = [];

    function setImgAttribute($value)
    {
        $this->attributes['img'] = Storage::putFile('/public/image', $value);
    }

    function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    function User()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
