<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArtistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //fields required for creating and updating artists
            //the max value required are taken from the max database values
            'artist_name' => 'required|string|max:130',
            'original_name' => 'string|max:130',
            'birth_date' => 'nullable:max:20',
            'death_date' => 'nullable:max:20',
            'description' => 'nullable',
            'website1' => 'nullable',
            'website2' => 'nullable',
            'website3' => 'nullable',
            'website4' => 'nullable',
            'website5' => 'nullable',
            'slug' => 'alpha_dash', 'unique:artists'
        ];
    }
}
