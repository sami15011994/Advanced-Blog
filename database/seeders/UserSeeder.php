<?php

namespace Database\Seeders;
use Carbon\Carbon;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                    $faker = Faker::create();
                    foreach(range(1, 50) as $index) {
                        User::create([
                        'name' => $faker->name,
                            'email'=>$faker->unique()->safeEmail,
                            'email_verified_at'=> now(),
                            'password'=> Hash::make('password'),
                            'remember_Token'=> Str()->random(10),
                        ]);
                    }
    }
     
    
}
