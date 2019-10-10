<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class ProfessorProfileRequest extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'adress' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'state' => 'nullable',
            'country_id' => 'required',

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
            'firstname.required' => Lang::get("Le prénom est obligatoire"),
            'lastname.required' => Lang::get("Le nom est obligatoire"),
            'adress.required' => Lang::get("Veuillez indiquer votre adresse."),
            'zip_code.required' => Lang::get("Veuillez indiquer votre code postal."),
            'city.required' => Lang::get("Veuillez indiquer votre ville."),
            'state.required' => Lang::get("Veuillez indiquer votre région."),
            'country_id.required' => Lang::get("Veuillez indiquer votre pays de résidence."),
        ];
    }
}
