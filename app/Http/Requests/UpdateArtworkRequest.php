<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArtworkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'originalTitle' => 'nullable|string|max:255',
            'creationDate' => 'nullable:max:20',
            'dimensions' => 'nullable:max:255',
            'description' => 'nullable',
            'image' => 'image|mimes:jpg,png,jpeg|max:5048', //max size in Kilobytes, the field is no longer required
            'sourceLink' => 'required',
            'copyright' => 'required|max:64',
            'slug' => 'alpha_dash', 'unique:artworks',
            'timePeriod' => 'required',
            'category' => 'required',
            'tags' => 'nullable',
            'mediums' => 'nullable'
        ];
    }
}
