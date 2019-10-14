<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class ProfileRequest extends FormRequest
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
            'name' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'country_id' => 'required',
            'description' => 'required',
            'youtube_profile' => 'nullable',
            'facebook_profile' => 'nullable',
            'instagram_profile' => 'nullable',
            'pinterest_profile' => 'nullable',
            'twitter_profile' => 'nullable',
            'website' => 'nullable',
            'twitter_page' => 'nullable',

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
            'name.required' => Lang::get("Vous devez indiquer un nom d'affichage pour votre profil."),
            'name.unique' => Lang::get("Ce nom d'affichage est déjà pris."),
            'email.unique' => Lang::get("Cette adresse courriel est déjà prise"),
            'firstname.required' => Lang::get("Le prénom est obligatoire"),
            'lastname.required' => Lang::get("Le nom est obligatoire"),
            'email.required' => Lang::get("Le courriel est obligatoire"),
            'description.required' => Lang::get("Veuillez rédiger une description"),
            'country.required' => Lang::get("Veuillez indiquer votre pays de résidence.")
        ];
    }
}
