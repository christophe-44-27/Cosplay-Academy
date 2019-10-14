<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $controller = 'dashboard';
        $action = 'edit_profile';

        $user = Auth::user();

        $countries = Country::orderBy('name', 'ASC')->get();

        return view('dashboard.profile.edit', compact('controller', 'user', 'action', 'countries'));
    }

    public function update(ProfileRequest $request)
    {
        $validated = $request->validated();

        $dataArray = [
            'name' => $validated['name'],
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'description' => $validated['description'],
            'country_id' => $validated['country_id'],
            'youtube_profile' => $validated['youtube_profile'],
            'twitter_profile' => $validated['twitter_profile'],
            'facebook_profile' => $validated['facebook_profile'],
            'instagram_profile' => $validated['instagram_profile'],
            'pinterest_profile' => $validated['pinterest_profile'],
            'website' => $validated['website'],
        ];

        //Mise à jour de la photo de profil
        if ($request->file('avatar'))
        {
            $avatar = Image::make($request->file('avatar'))->fit(128, 128)->encode('jpg');
            // calculate md5 hash of encoded image
            $hash = md5($avatar->__toString());
            $path = "app/public/users/avatars/{$hash}.jpg";
            $publicAvatarPath = "users/avatars/{$hash}.jpg";
            if (!is_dir(storage_path("app/public/users/avatars")))
            {
                Storage::makeDirectory("public/users/avatars");
            }
            $avatar->save(storage_path($path));
            $dataArray['avatar'] = $publicAvatarPath;
        }

        $user = User::where('id', '=', Auth::id())->first();
        $user->update($dataArray);

        $request->session()->flash('success', "Votre profil a bien été mis à jour !");
        return redirect(route('profile'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Request $request, int $id)
    {
        #TODO
        return redirect(route('my_address'));
    }
}
