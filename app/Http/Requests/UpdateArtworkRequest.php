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
            'creationDate' => 'nullable|max:20',
            'dimensions' => 'nullable|max:255',
            'description' => 'nullable|max:1500',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:max_width=2000,max_height=2000', //max size in Kilobytes, the field is no longer required
            'sourceLink' => 'required|max:2048',
            'copyright' => 'required|max:64',
            'slug' => 'alpha_dash', 'unique:artworks',
            'timePeriod' => 'required',
            'category' => 'required',
            'mediums' => 'nullable',
            'tags' => 'nullable|max:50'
        ];
    }
}
