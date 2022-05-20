<?php
/**
 * Auteur: Larissa De Barros
 * Date: 19.05.2022
 * Description: 
 */

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory, Sluggable;

    //defines which data entries can be entered in the web application
    protected $fillable = [
        'slug',
        'artist_name',
        'artist_original_name',
        'birth_date',
        'death_date',
        'description',
        'website1',
        'website2',
        'website3',
        'website4',
        'website5',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'artist_name'
            ]
        ];
    }

        
    /**
     * Get the route key for the model.
     *
     */
    public function getRouteKeyName()
    {
        //the method changes the default attribute to retrieve instances of 
        //it lets me pass slugs instead of ID and retrieve the associated object directly
        return 'slug';
    }

    /**
     * Get the artist's artworks
     *
     */
    public function artworks()
    {
        return $this->hasMany(Artwork::class);
    }

    /**
     * Get the artist's countries of appartenance
     *
     */
    public function countries()
    {
        return $this->hasMany(Country::class);
    }

    /**
     * Get the artist's assigned tags
     *
     */
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

}