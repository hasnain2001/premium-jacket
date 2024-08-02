<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = [];

        for ($i = 1; $i <= 100; $i++) {
            $title = "Blog Post $i";
            $blogs[] = [
                'title' => $title,
                'slug' => $this->createUniqueSlug($title),
                'content' => "This is the content of blog post $i.",
                'category_image' => "path/to/image$i.jpg",
                'meta_title' => "Meta Title for Blog Post $i",
                'meta_description' => "Meta description for blog post $i.",
                'meta_keyword' => "blog, post, meta, keywords, $i",
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('blogs')->insert($blogs);
    }

    /**
     * Create a unique slug for the blog post.
     *
     * @param string $title
     * @return string
     */
    private function createUniqueSlug($title)
    {
        $slug = Str::slug($title, '-');
        $count = DB::table('blogs')->where('slug', 'LIKE', "{$slug}%")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }
}
