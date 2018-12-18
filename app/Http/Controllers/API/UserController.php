<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiUserRegistrationRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller {

    public $success_status = 200;

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login() {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('CosplaySchool')->accessToken;
            return response()->json(['success' => $success], $this->success_status);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {

        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ],
            [
                'name.required' => "Votre nom d'utilisateur est requis",
                'email.required' => "Adresse de courriel obligatoire",
                'password.required' => "Veuillez saisir un mot de passe",
                'c_password.required' => "Veuillez confirmer votre mot de passe",
                'c_password.same' => "Les deux mots de passes ne sont pas identiques."
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('CosplaySchool')->accessToken;
        $success['name'] = $user->name;

        return response()->json(['success' => $success], $this->success_status);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details() {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->success_status);
    }
}
