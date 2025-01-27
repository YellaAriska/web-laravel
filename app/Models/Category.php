<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function posts() //posts menyamakan di route
    {
        return $this->hasMany(Post::class); //menggunakan hasMany karena 1 category bisa dimiliki oleh banyak post
    }
}
