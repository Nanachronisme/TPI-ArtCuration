<?php
/**
 * Author: Larissa De Barros
 * Date: 19.05.2022
 * Description: Contains all functions and configurations related to Medium data
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    use HasFactory;

    //force the default table name to be mediums
    protected $table = 'mediums';

    protected $fillable = [
        'name',
    ];

    /**
     * Get the artworks using the medium
     *
     */
    public function artworks()
    {
        $this->hasMany(Artwork::class);
    }

}
