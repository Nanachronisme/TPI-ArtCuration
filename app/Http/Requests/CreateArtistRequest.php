<?php
/**
 * Author: Larissa De Barros
 * Date: 19.05.2022
 * Description: Contains all validations rules and parameters for creating and updatings Artists
 */
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
        return true;
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
            'originalName' => 'nullable|string|max:130',
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
            'tags' => 'nullable|max:50'
        ];
    }
}
