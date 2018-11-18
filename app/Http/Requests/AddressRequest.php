<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest {
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
			'street_name' => 'required',
			'zip_code' => 'required',
			'city' => 'required',
			'province_id' => 'required',
			'country_id' => 'required',
			'apartment' => 'max:50'
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
			'street_name.required' => 'The street name is required',
			'zip_code.required'  => 'The zip code is required',
			'province_id.required' => 'Please specify a province',
			'country_id.required' => 'Please specify a country'
		];
	}
}
