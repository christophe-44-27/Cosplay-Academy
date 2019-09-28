<?php

namespace App\Http\Controllers\Auth;

use App\Mail\UserRegistrationAdminEmail;
use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'name.required' => Lang::get("Veuillez saisir un nom d'affichage"),
            'name.unique' => Lang::get("Ce nom d'affichage est déjà utilisé."),
            'email.unique' => Lang::get("Cette adresse courriel est déjà utilisée."),
            'password.required' => Lang::get('Veuillez saisir un mot de passe.'),
            'password.min' => Lang::get('Votre mot de passe doit être composé de 6 caractères minimum.'),
            'email.max' => Lang::get("Votre adresse courriel doit faire maximum 255 caractères."),
            'password.confirmed' => Lang::get("Vos mots de passes ne correspondent pas."),
        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'unique:users'],
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'password' => Hash::make($data['password']),
        ]);

//        switch ($data['role'])
//        {
//            case 'cosplayer':
//                $cosplayerRole = Role::where('name', '=', 'cosplayer')->first()->id;
//                $user->roles()->sync([$cosplayerRole]);
//                break;
//            case 'fan':
//                $fanRole = Role::where('name', '=', 'fan')->first()->id;
//                $user->roles()->sync([$fanRole]);
//                break;
//        }

        return $user;
    }
}
