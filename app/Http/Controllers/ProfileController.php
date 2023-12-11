<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updateAvatarOrBio(ProfileUpdateRequest $request ,User $user): RedirectResponse
    {  {{Auth::user()->name}}
       
        
        
        $this->validate($request, [
            'avatar' =>     'bail|required|image|max:1024',
            "biography" => 'bail|required|string|max:255',
        ]);
    
        // 2. On upload l'image dans "/storage/app/public/posts"
        $chemin_image = $request->avatar->store("avatar");
    


       
        // 3. On enregistre les informations du Post
        User::updating([
            "avatar" => $chemin_image,
            "biography" => $request->biography, 
        ]);



        return Redirect::to('/profile/{id}');
    }
}
