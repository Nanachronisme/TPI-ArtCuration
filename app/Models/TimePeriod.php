<?php
/**
 * Author: Larissa De Barros
 * Date: 19.05.2022
 * Description: 
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimePeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * returns the artists associated with that time period
     *
     */
    public function artists()
    {
        $this->hasMany(Artist::class);
    }

    /**
     * returns the artworks associated with that time period
     *
     */
    public function artworks()
    {
        $this->hasMany(Artwork::class);
    }


}
