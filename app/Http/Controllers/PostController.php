<?php

namespace App\Http\Controllers;
use App\Models\Post;
//untuk menangani request
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' in ' . $author->name;
        }

        return view('posts',[
            "title" => "All Posts" . $title,
            // "posts" => Post::all() //mengambil dari model sebuah method all yang berfungsi untuk mendapat semua data di Post
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString() //agar postingan terbaru ditampilkan di atas, dan melakukan fungsi filter di Post.php
            //paginate() digunakan untuk mengatur halaman
            //withQueryString() digunakan untuk membawa apapun yang ada di query string sebelumnya (contoh ketika membuka post dengan kategory tertentu, maka ketika membuka page 2 tidak akan reset ke halaman all post page 2)
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
