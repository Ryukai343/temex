<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profilePage', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
       // $request->user()->fill($request->validated());

        //if ($request->user()->isDirty('email')) {
         //   $request->user()->email_verified_at = null;
        //}

        //$request->user()->save();

        //return Redirect::route('items')->with('status', 'Profil bol aktualizovaný.');
        //return Redirect::back()->with('status', 'Profil bol aktualizovaný.');
        return 'asada';
    }

    public function usersShow(Request $request): View
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function userChangeRole(Request $request, User $user): RedirectResponse
    {
        if ($user->role == 'admin') {
            $user->role = 'user';
        } else {
            $user->role = 'admin';
        }
        $user->save();
        return Redirect::back();
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
    static public function roleCheck(string $role): bool
    {
        return $role == 'admin';
    }
}
