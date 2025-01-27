<?php


use App\Models\User;
use App\Models\Post; 
//menghubungkan ke Post.php di models
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
//menghubungkan ke PostController



Route::get('/', function () {
    return view('home',[
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Yella Ariska Safitri",
        "email" => "yellaariska@gmail.com",
        "image" => "pic1.png"
    ]);
});



Route::get('/blog', [PostController::class, 'index']); //menggunakan method index yang ada di PostController
//halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']); //method show
//posts/{post:slug} nantinya akan ditangkap oleh controller, mencari dari slugnya

Route::get('categories', function(){
    return view('categories', [ //membuat view baru bernama categories (jamak)
        'title' => 'Post Categories', //mengindikasikan relasi
        'active' => 'categories',
        'categories' => Category::all() //mengambil dari model category
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category) //menangkap slug dalam categories (di folder database\migration), membuat kelas kategori dengan route model binding
{
    return view('posts', [ //mengarahkan ke view posts
        'title' => "Post by Category : $category->name", //mengindikasikan relasi
        'active' => 'categories',
        'posts' => $category->posts->load(['category', 'author']), 
        //relasi 1 kategori memiliki banyak post
    ]);
});

Route::get('/authors/{author:username}', function(User $author) //{user:username} agar link yang ditampilkan tidak lagi menggunakan id tapi menggunakan username penulis
{
    return view('posts', [
        'title' => "Post by Author : $author->name",
        'posts' => $author->posts->load('category', 'author'),
        //load([]) untuk melakukan lazy eager loading
        'active' => 'authors',
    ]);
});