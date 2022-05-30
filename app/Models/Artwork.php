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

class Artwork extends Model
{
    use HasFactory, Sluggable;

    //defines which data entries can be entered in the web application
    protected $fillable = [
        'slug',
        'title',
        'original_title',
        'dimensions',
        'source_link',
        'description',
        'image_path',
        'creation_date',
        'copyright',
        'timePeriod_id'
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
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
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
        //searching filters using queryBuilder when() function 
        $query->when($filters['search'] ?? false, function ($query, $search)
        {
            $query->where(function($query) use($search){
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('original_title', 'like', '%' . $search . '%');
            });

        });

        //Category
        $query->when($filters['category'] ?? false, function ($query, $category)
        {
                $query
                    ->whereHas('type', function($query) use ($category){
                        $query->where('id', $category);
                    });
        });

        //Time Period
        $query->when($filters['timePeriod'] ?? false, function ($query, $timePeriod)
        {
                $query
                    ->whereHas('timePeriod', function($query) use ($timePeriod){
                        $query->where('id', $timePeriod);
                    });
        });

        //Medium
        $query->when($filters['medium'] ?? false, function ($query, $medium)
        {
                $query
                    ->whereHas('mediums', function($query) use ($medium){
                        $query->where('id', $medium);
                    });
        });



    }

    /**
     * Get the artwork author or authors
     *
     */
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    /**
     * Get the artwork Time Period
     *
     */
    public function timePeriod()
    {
        return $this->belongsTo(TimePeriod::class);
    }

    /**
     * Get the artwork Time Period
     *
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Get the artwork mediums
     *
     */
    public function mediums()
    {
        return $this->belongsToMany(Medium::class);
    }

    /**
     * Get the artwork tags
     *
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }



}
