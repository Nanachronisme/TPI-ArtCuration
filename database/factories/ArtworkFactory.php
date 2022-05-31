<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\Artwork;
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
        //dd( $this->faker->image('public\artworks') );
        return [
            'title' => $this->faker->text(20),
            'original_title' => $this->faker->text(30),
            'dimensions' => $this->faker->text(120),
            'source_link' => $this->faker->url(), 
            'description' => $this->faker->paragraph(),
            'image_path' => $this->faker->image('public\artworks', 640, 480),
            //'image_path' => 'https://picsum.photos/' . (string)rand(200,900) . '/' . (string)rand(200,900), //permits different ipsum images
            'creation_date' => $this->faker->date(),
            'copyright' => $this->faker->text(64), 
            'artist_id' =>  Artist::pluck('id')->random(),
            'type_id' => Type::pluck('id')->random(),
            'created_at'=> now()
        ];
    }
}
