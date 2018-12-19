<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPhotoToGalleryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'image_path' => 'required|image|max:2048'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => "Le titre de l'image est requis",
            'image_path.required' => "L'image est requise",
            'image_path.image'  => "Tu ne peux pas charger autre chose qu'une image",
            'image_path.max' => "Ton image ne peut pas dépasser 2mo"
        ];
    }
}
