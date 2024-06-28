<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $faker = Faker::create();
    
            // Récupérer tous les utilisateurs disponibles
            $users = User::all();
    
            foreach ($users as $user) {
                foreach (range(1, 10) as $index) { // Créer 5 posts par utilisateur
                    Post::create([
                        'title' => $faker->sentence,
                        'content' => $faker->paragraph,
                        'user_id' => $user->id,
                    ]);
                }
            }
    }
    }
}
