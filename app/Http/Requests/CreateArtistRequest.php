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
        return true; //TODO set false for unauthorized users
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //fields required for creating and updating artists
        return [
            'artistName' => 'required|string|max:130',
            'originalName' => 'string|max:130',
            'birthDate' => 'nullable:max:20',
            'deathDate' => 'nullable:max:20',
            'description' => 'nullable',
            'website1' => 'nullable',
            'website2' => 'nullable',
            'website3' => 'nullable',
            'website4' => 'nullable',
            'website5' => 'nullable',
            'slug' => 'alpha_dash', 'unique:artists',
            'timePeriods' => 'required',
            'countries' => 'nullable',
            'tags' => 'nullable'
        ];
    }
}
