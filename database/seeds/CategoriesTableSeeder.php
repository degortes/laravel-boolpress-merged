<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 6 ; $i++) {
            $add_category = new Category();
            $add_category->name = $faker->words(3 , true);

            $slug = Str::slug($add_category->name);
            $slug_base = $slug;
            $slug_if_exists = Category::where('slug', $slug)->first();
            $j = 1;
            while($slug_if_exists) {
                $slug = $slug_base . '-' . $j;
                $j++;
                $slug_if_exists = Category::where('slug', $slug)->first();
            }
            $add_category->slug = $slug;
            $add_category->save();
        }
    }
}
