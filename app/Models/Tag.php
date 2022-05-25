<?php
/**
 * Auteur: Larissa De Barros
 * Date: 19.05.2022
 * Description: 
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Returns the artists associated with the tag
     *
     */
    public function artists()
    {
        return $this->hasMany(Artist::class);
    }

    /**
     * Returns the artworks associated with the tag
     *
     */
    public function artworks()
    {
        return $this->hasMany(Artwork::class);
    }


}
