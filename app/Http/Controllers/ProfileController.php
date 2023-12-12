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
    public function profil(Request $request, $id)
    { 
        $user = User::find($id);
       $Posts = $user->posts()->get();
       


        return view('/profil', compact('user' , 'Posts'));
    
}


public function updateBio(ProfileUpdateRequest $request)
{ $id = Auth::user()->id;
    

    
    $validatedData = $request->validate([
        'biography' => 'required|max:255',
        
    ]);
    
  
    User::whereId($id)->update($validatedData);
    

    return redirect('/monProfil/');
}

public function updateAvatar(ProfileUpdateRequest $request)
{ 
    $id = Auth::user()->id;
 


     $validatedData = $request->validate([
        "avatar" => 'bail|nullable|image|mimes:png,jpg,jpeg|max:5120',
        
    ]);

    
    if ($request->hasFile('avatar')) {
        $chemin_image = time() . '.' . $request->avatar->extension();
        $request->avatar->storeAs('public/images', $chemin_image);
     User::whereId($id)->update([
    'avatar'=>$chemin_image
]);
    } else {
        // Aucune image n'a été téléchargée, définissez le chemin sur null ou une valeur par défaut
        $chemin_image = null;
    }
    
  

    // 4. On enregistre les informations du Post
   
    return redirect('/monProfil/');
}
}