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
            'birthDate' => 'nullable|max:20',
            'deathDate' => 'nullable|max:20',
            'description' => 'nullable|max:1500',
            'website1' => 'nullable|max:2048',
            'website2' => 'nullable|max:2048',
            'website3' => 'nullable|max:2048',
            'website4' => 'nullable|max:2048',
            'website5' => 'nullable|max:2048',
            'slug' => 'alpha_dash', 'unique:artists',
            'timePeriods' => 'required',
            'countries' => 'nullable',
            'tags' => 'nullable'
        ];
    }
}
