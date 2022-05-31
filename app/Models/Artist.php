<?php
/**
 * Author: Larissa De Barros
 * Date: 19.05.2022
 * Description: 
 */

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory, Sluggable;

    /**
     * Image placeholder for Artists with no artworks
     */
    public const PLACEHOLDER = 'https://via.placeholder.com/900';

    //defines which data entries can be entered in the web application
    protected $fillable = [
        'slug',
        'artist_name',
        'original_name',
        'birth_date',
        'death_date',
        'description',
        'website1',
        'website2',
        'website3',
        'website4',
        'website5',
        'tags'
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
            ],

            //'onUpdate' => [true]  //enable slug to change on each update  

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
     * Permits search filtering
     *
     * @param $query
     * @param array $filters
     * @return void
     */
    public function scopeFilter($query, array $filters)
    {
        //dd($filters);
        
        //Name
        $query->when($filters['search'] ?? false, function ($query, $search)
        {
            //The query must be grouped since an OR statement is used "orWhere()"
            //not grouping it will have an Or statement for all the subsquent additive queries
            $query->where(function($query) use($search){
                $query
                    ->where('artist_name', 'like', '%' . $search . '%')
                    ->orWhere('original_name', 'like', '%' . $search . '%'); 
            });

        });

        //Time Period
        $query->when($filters['timePeriod'] ?? false, function ($query, $timePeriod)
        {
             $query
                 ->whereHas('timePeriods', function($query) use ($timePeriod){
                     $query->where('id', $timePeriod);
                 });
        });

        //Country
        $query->when($filters['country'] ?? false, function ($query, $country)
        {
            $query
                ->whereHas('countries', function($query) use ($country) {
                    $query->where('id', $country );
            });
            
            //dd($query->toSql());
        });
            
        
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
        return $this->belongsToMany(Country::class);
    }

    /**
     * Get the artist's assigned tags
     *
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the artist Time Periods
     *
     */
    public function timePeriods()
    {
        return $this->belongsToMany(TimePeriod::class, 'artist_time_period');
    }

    /**
     * returns a collection with all the artist's websites
     *
     * @return Collection
     */
    public function websites()
    {
        return collect([
            'website1' => $this->website1,
            'website2' => $this->website2,
            'website3' => $this->website3,
            'website4' => $this->website4,
            'website5' => $this->website5
        ]);
    }

}
