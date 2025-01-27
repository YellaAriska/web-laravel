<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::create([
        //     'name' => 'Neuvillette',
        //     'email' => 'neuvillette@gmail.com',
        //     'password' => bcrypt('pw123')
        // ]);

        // User::create([
        //     'name' => 'Alhaitham',
        //     'email' => 'alhaitham@gmail.com',
        //     'password' => bcrypt('pass321')
        // ]);

        // User::create([
        //     'name' => 'Dan Heng',
        //     'email' => 'danheng@gmail.com',
        //     'password' => bcrypt('psw321')
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'mollitia molestiae fuga. Inventore expedita vel ducimus officiis assumenda ut adipisci dolores nostrum quia enim sint nesciunt optio voluptas magnam rerum',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quidem porro, aut qui commodi excepturi culpa dicta cupiditate fuga, esse fugiat quis consectetur molestias quas ea vitae nesciunt facilis quam exercitationem rem harum veritatis quos temporibus aliquam. Esse nemo consequuntur illo quod minima sapiente voluptatum ullam fugiat. Porro necessitatibus provident et illo, minus atque est? Sapiente totam nobis sint. Dolorem quasi recusandae sint quas accusamus minus sapiente autem incidunt magnam animi commodi asperiores, deleniti temporibus repellat eligendi velit labore quia repellendus fugiat distinctio quos laudantium suscipit! Id eum soluta laborum minus tempora dolore, libero quam nobis ratione? Quibusdam, reprehenderit assumenda?',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'mollitia molestiae fuga. Inventore expedita vel ducimus officiis assumenda ut adipisci dolores nostrum quia enim sint nesciunt optio voluptas magnam rerum',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quidem porro, aut qui commodi excepturi culpa dicta cupiditate fuga, esse fugiat quis consectetur molestias quas ea vitae nesciunt facilis quam exercitationem rem harum veritatis quos temporibus aliquam. Esse nemo consequuntur illo quod minima sapiente voluptatum ullam fugiat. Porro necessitatibus provident et illo, minus atque est? Sapiente totam nobis sint. Dolorem quasi recusandae sint quas accusamus minus sapiente autem incidunt magnam animi commodi asperiores, deleniti temporibus repellat eligendi velit labore quia repellendus fugiat distinctio quos laudantium suscipit! Id eum soluta laborum minus tempora dolore, libero quam nobis ratione? Quibusdam, reprehenderit assumenda?',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'mollitia molestiae fuga. Inventore expedita vel ducimus officiis assumenda ut adipisci dolores nostrum quia enim sint nesciunt optio voluptas magnam rerum',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quidem porro, aut qui commodi excepturi culpa dicta cupiditate fuga, esse fugiat quis consectetur molestias quas ea vitae nesciunt facilis quam exercitationem rem harum veritatis quos temporibus aliquam. Esse nemo consequuntur illo quod minima sapiente voluptatum ullam fugiat. Porro necessitatibus provident et illo, minus atque est? Sapiente totam nobis sint. Dolorem quasi recusandae sint quas accusamus minus sapiente autem incidunt magnam animi commodi asperiores, deleniti temporibus repellat eligendi velit labore quia repellendus fugiat distinctio quos laudantium suscipit! Id eum soluta laborum minus tempora dolore, libero quam nobis ratione? Quibusdam, reprehenderit assumenda?',
        //     'category_id' => 2,
        //     'user_id' => 3
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'mollitia molestiae fuga. Inventore expedita vel ducimus officiis assumenda ut adipisci dolores nostrum quia enim sint nesciunt optio voluptas magnam rerum',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quidem porro, aut qui commodi excepturi culpa dicta cupiditate fuga, esse fugiat quis consectetur molestias quas ea vitae nesciunt facilis quam exercitationem rem harum veritatis quos temporibus aliquam. Esse nemo consequuntur illo quod minima sapiente voluptatum ullam fugiat. Porro necessitatibus provident et illo, minus atque est? Sapiente totam nobis sint. Dolorem quasi recusandae sint quas accusamus minus sapiente autem incidunt magnam animi commodi asperiores, deleniti temporibus repellat eligendi velit labore quia repellendus fugiat distinctio quos laudantium suscipit! Id eum soluta laborum minus tempora dolore, libero quam nobis ratione? Quibusdam, reprehenderit assumenda?',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
