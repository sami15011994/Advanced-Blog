<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'path' => $this->faker->imageUrl(),
            'alt_text' => $this->faker->sentence(),
            'post_id' => $this->faker->numberBetween(1, 10), // Assurez-vous que ce champ correspond à votre clé étrangère
        ];
    }
}
