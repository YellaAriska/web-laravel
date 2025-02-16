<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ['title', 'excerpt', 'body']; 
    //agar saat menggunakan tinker dapat memasukkan array sekaligus
    
    protected $guarded = ['id']; //kebalikan dari fillable, digunakan agar id tidak dapat diisi. bisa digunakan salah satunya fillable/guarded
    protected $with = ['category', 'author']; //menyimpan with ke model agar tidak perlu melakukan lagi di controller, with([]) digunakan agar terjadi eager loading sehingga tidak memerlukan banyak query

    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search'])? $filters['search'] : false){
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }
        //jika di dalam variable filters ada search maka ambil apapun yang ada di search, tapi jika tidak ada maka false dan tidak dikerjakan

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });
        //fungsinya sama dengan menggunakan isset di atas

        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use($category){
                $query->where('slug', $category);
            });
        });
        //filter untuk mencari post dalam category yang sama

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
        //versi arrow function
    }

    public function category() 
    {
        return $this->belongsTo(Category::class); //menggunakan belongTo karena setiap post hanya memiliki 1 category
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id'); //karena di create_posts masih menggunakan user_id maka harus menambah user_id agar menjadi nama alias dari author, dengan ini harus mengganti juga di posts.blade dari user manjadi author
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
            // membuat slug dengan resource yang diambil dari title yang berada di table posts
        ];
    }
}
