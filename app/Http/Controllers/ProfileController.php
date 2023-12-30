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
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        if ($request->user() != Auth::user()) {
            return Redirect::back()->withErrors(['error' => 'Nemôžete upravovať profil iného používateľa.']);
        }
        $request->validate([
            'firstName'=> 'required|string|max:20',
            'lastName'=> 'required|string|max:20',
            'email' => 'required|email',
            'phone' => 'digits:10|nullable',
            'city' => 'string|nullable',
            'psc' => 'numeric|nullable',
        ]);
        $data = $request->all();
        $data['name'] = $request->firstName;
        $data['surname'] = $request->lastName;

        $request->user()->update($data);

        return Redirect::back()->with('status', 'Profil bol aktualizovaný.');
    }

    public function usersShow(Request $request): View
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function userChangeRole(Request $request, User $user): RedirectResponse
    {
        if (auth()->user() == $user) {
            return Redirect::back()->with(['error' => 'Nemôžete zmeniť svoju rolu.']);
        }
        if ($user->role == 'admin') {
            $user->role = 'user';
        } else {
            $user->role = 'admin';
        }
        $user->save();
        return Redirect::back()->with(['status' => 'Zmenili ste rolu používateľa.']);
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
