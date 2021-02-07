<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) {
            $new_post = new Post();
            $new_post->author = $faker->name();
            $new_post->title = $faker->sentence();
            $new_post->description = $faker->text();
            $slug = Str::slug($new_post->title);
            $slug_base = $slug;

            $post_if_exist = Post::where('slug' , $slug)->first();
            $j = 1;
            while ($post_if_exist) {
                $slug = $slug_base .'-'.$j;
                $j++;
                $post_if_exist = Post::where('slug' , $slug)->first();

            }
            $new_post->slug = $slug;

            $new_post->save();
        }
    }
}
