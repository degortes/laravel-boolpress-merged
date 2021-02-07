<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) {

            $new_tag = new Tag();
            $new_tag->name = $faker->words(3, true);
            $slug = Str::slug($new_tag->name);
            $slug_base = $slug;
            $tag_if_exists = Tag::where('slug', $slug)->first();
            $j = 1;
            while($tag_if_exists) {
                $slug = $slug_base . '-' . $j;
                $j++;
                $tag_if_exists = Tag::where('slug', $slug)->first();
            }
            $new_tag->slug = $slug;
            $new_tag->save();
        }
    }
}
