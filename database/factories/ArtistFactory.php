<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'artist_name' => $this->faker->name(),
            'original_name' => $this->faker->name(),
            'birth_date' => $this->faker->date(),
            'death_date' => $this->faker->date(), 
            'description' => $this->faker->paragraph(),
            'created_at'=> now()
        ];
    }
}
