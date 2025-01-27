<?php

namespace App\Http\Controllers;
use App\Models\Post;
//untuk menangani request
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts',[
            "title" => "All Posts",
            // "posts" => Post::all() //mengambil dari model sebuah method all yang berfungsi untuk mendapat semua data di Post
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->get() //agar postingan terbaru ditampilkan di atas, dan melakukan fungsi filter di Post.php
        ]);
    }

    public function show(Post $post) //diikat oleh model Post menangkap dari route
    {
        return view('article',[
            "title" => "Single Post",
            "active" => 'post',
            "post" => $post
        ]);
    }
}
