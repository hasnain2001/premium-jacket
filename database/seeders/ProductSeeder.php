<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            $name = $faker->unique()->word();
            DB::table('products')->insert([
                'name' => $name,
                'slug' => Str::slug($name . '-' . Str::random(5)), // Ensure unique slugs
                'description' => $faker->paragraph(),
                'productimage' => $faker->imageUrl(640, 480, 'products', true),
                'price' => $faker->randomFloat(2, 10, 1000),
                'offprice' => $faker->randomFloat(2, 10, 1000),
                'quantity' => $faker->numberBetween(1, 100),
                'categories' => $faker->word(),
                'sizes' => $faker->randomElement(['S', 'M', 'L', 'XL']),
                'title' => $faker->sentence(),
                'meta_tag' => $faker->sentence(),
                'meta_keyword' => $faker->words(3, true),
                'meta_description' => $faker->paragraph(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
