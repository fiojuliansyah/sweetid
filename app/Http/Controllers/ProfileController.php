<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = Auth::user();
        return view('admin.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function updateUserDetail(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        if ($request->file('avatar') == null) {
            $path1 = "";
        }else{
            $path1 = $request->file('avatar')->store('public/avatars');  
        }

        if ($request->file('thumbnail') == null) {
            $path2 = "";
        }else{
            $path2 = $request->file('thumbnail')->store('public/thumbnails');  
        }

        $user->profile()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'avatar' => $path1,
                'thumbnail' => $path2,
                'address' => $request->address,
                'phone' => $request->phone,
            ]
        );
        return redirect()->route('profile.edit')
        ->with('status','profile-updated-successfully');
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
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/admin/dashboard');
    }
}
