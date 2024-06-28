<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Supposons que vous ayez déjà des posts et des catégories
          $posts = Post::all();
          $categories = category::all();
  
          // Pour chaque post, associer des catégories
          foreach ($posts as $post) {
              // Sélectionner des catégories aléatoires
              $randomCategories = $categories->random(rand(1, 3)); // Sélectionner entre 1 et 3 catégories aléatoires
  
              foreach ($randomCategories as $category) {
                  DB::table('post_category')->insert([
                      'post_id' => $post->id,
                      'category_id' => $category->id,
                      'is_primary' => rand(0, 1), // 0 ou 1 pour is_primary
                      'created_at' => now(),
                      'updated_at' => now(),
                  ]);
                }
                }
    }
}
