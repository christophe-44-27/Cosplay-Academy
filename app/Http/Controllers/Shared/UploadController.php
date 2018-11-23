<?php

namespace App\Http\Controllers\Shared;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function uploadFromWysiwyg(Request $request) {
		$path = $request->file('file')->store('from_wysiwyg', 'public');

		$response = new JsonResponse();
		$response->setStatusCode(200);
		$response->setData(['location' => asset('storage/' . $path)]);
		return $response;
	}
}
