<?php
/**
 * Author: Larissa De Barros
 * Date: 19.05.2022
 * Description: Contains all functions and configurations related to Type data
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Get the artworks associated with that type
     *
     */
    public function artworks()
    {
        $this->hasMany(Artwork::class);
    }

}
