<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artwork>
 */
class ArtworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'original_title' => $this->faker->title(),
            'dimensions' => $this->faker->text(120),
            'source_link' => $this->faker->url(), 
            'description' => $this->faker->paragraph(),
            'image_path' => 'https://picsum.photos/' . (string)rand(200,900) . '/' . (string)rand(200,900), //permits to have different ipsum images
            'creation_date' => $this->faker->date(),
            'copyright' => $this->faker->text(64), 
            'artist_id' =>  Artist::pluck('id')->random(), //choose random artist
            'type_id' => Type::pluck('id')->random(),
            //'timePeriod_id' => Artist::where('id', $artistId),
            'created_at'=> now()
        ];
    }
}
