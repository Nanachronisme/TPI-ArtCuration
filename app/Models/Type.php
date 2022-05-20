<?php

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
