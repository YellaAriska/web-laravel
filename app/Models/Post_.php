<?php

namespace App\Models;

class Post 
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Yella",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, possimus animi consequuntur voluptatibus libero porro magnam eos quis laboriosam ipsum a deleniti recusandae quos impedit atque quod eius non quasi, repellendus cumque labore beatae enim saepe quam! Ut, exercitationem! Reiciendis nobis enim porro, reprehenderit debitis commodi eos excepturi aut beatae voluptas sunt culpa, accusamus quam iste fugit consequuntur. Aliquid neque iure vel facilis nobis soluta repudiandae aperiam quos rerum vitae, provident at amet, fugit delectus beatae deleniti veritatis praesentium quaerat?"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Ariska",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, possimus animi consequuntur voluptatibus libero porro magnam eos quis laboriosam ipsum a deleniti recusandae quos impedit atque quod eius non quasi, repellendus cumque labore beatae enim saepe quam! Ut, exercitationem! Reiciendis nobis enim porro, reprehenderit debitis commodi eos excepturi aut beatae voluptas sunt culpa, accusamus quam iste fugit consequuntur. Aliquid neque iure vel facilis nobis soluta repudiandae aperiam quos rerum vitae, provident at amet, fugit delectus beatae deleniti veritatis praesentium quaerat?"
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_posts); //mengambil dari array di atas, menggunakan collect untuk bisa memakai fungsi yang memudahkan
    }

    public static function find($slug) //parameter yang dicari adalah slug
    {
        $posts = static::all(); //mengambil semua post dari function all

        return $posts->firstWhere('slug', $slug); //menampilkan post yang slugnya sesuai dengan slug yang diklik
    }
}
