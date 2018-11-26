<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'public_pseudonym' => 'required',
			'firstname' => 'required',
			'lastname' => 'required',
			'email' => 'required',
			'description' => 'required',
			'youtube_page' => 'nullable',
			'facebook_page' => 'nullable',
			'instagram_page' => 'nullable',
			'website' => 'nullable',
			'twitter_page' => 'nullable'

		];
	}

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages() {
		return [
			'public_pseudonym.required' => "Le nom d'affichage est obligatoire",
			'firstname.required' => "Le prénom est obligatoire",
			'lastname.required' => "Le nom est obligatoire",
			'email.required' => "L'adresse de courriel est obligatoire",
			'description.required' => "Veuillez rédiger une description"
		];
	}
}
