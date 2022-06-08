<?php
/**
 * Author: Larissa De Barros
 * Date: 19.05.2022
 * Description: Contains all functions and configurations related to Country data
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Get the artists from the same country
     *
     */
    public function artists()
    {
        $this->hasMany(Artist::class);
    }
    
}
