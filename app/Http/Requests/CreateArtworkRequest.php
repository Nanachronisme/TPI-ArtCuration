<?php
/**
 * Author: Larissa De Barros
 * Date: 19.05.2022
 * Description: Contains all validations rules and parameters for creating artworks
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArtworkRequest extends FormRequest
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
        //fields required for creating and updating artworks
        return [
            'title' => 'required|string|max:255',
            'originalTitle' => 'nullable|string|max:255',
            'creationDate' => 'nullable|max:20',
            'dimensions' => 'nullable|max:255',
            'description' => 'nullable|max:1500',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:max_width=2000,max_height=2000', //max size in Kilobytes
            'sourceLink' => 'required:max:2048',
            'copyright' => 'required|max:64',
            'slug' => 'alpha_dash', 'unique:artworks',
            'timePeriod' => 'required',
            'category' => 'required',
            'mediums' => 'nullable',
            'tags' => 'nullable|max:50'
        ];
    }
}
