<?php

//menghubungkan ke Post.php di models

use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
        "name" => "Lumine de Estella",
        "email" => "lumine@gmail.com",
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

// Route::get('/categories/{category:slug}', function(Category $category) //menangkap slug dalam categories (di folder database\migration), membuat kelas kategori dengan route model binding
// {
//     return view('posts', [ //mengarahkan ke view posts
//         'title' => "Post by Category : $category->name", //mengindikasikan relasi
//         'active' => 'categories',
//         'posts' => $category->posts->load(['category', 'author']), 
//         //relasi 1 kategori memiliki banyak post
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author) //{user:username} agar link yang ditampilkan tidak lagi menggunakan id tapi menggunakan username penulis
// {
//     return view('posts', [
//         'title' => "Post by Author : $author->name",
//         'posts' => $author->posts->load('category', 'author'),
//         //load([]) untuk melakukan lazy eager loading
//         'active' => 'authors',
//     ]);
// });

// 2 route tidak terpakai karena sudah menggunakan query yang terdapat di model

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); // agar yang bisa mengakses adalah user yang belum terauthentikasi
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
// misal ada req ke halaman register dengan method post maka panggil RegisterController yg methodnya store

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
// ketika ada request dg method get ke url /dashboard/posts/checkSlug maka akan memanggil DashboardPostController dg method checkSlug

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
// controller untuk mengatur CRUD
// hanya dengan mengarahkan ke dashboard/posts dan menambahkan method akan otomatis ditangani oleh controller
// jika menggunakan method get akan ke index, jika post akan ke store, jika put akan ke update, jika delete akan ke destroy

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
// fungsi except agar show tidak dapat diakses

// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');