<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'age' => ['required', 'integer', 'min:0'],
            'gender' => ['required', 'string', 'in:male,female,other'],
            'caste' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'profile_picture' => ['required', 'image', 'max:2048'],
        ]);

        // Process profile picture upload
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile-pictures', 'public');
            $profilePicturePath = 'storage/' . $profilePicturePath;
        } else {
            $profilePicturePath = null;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'gender' => $request->gender,
            'caste' => $request->caste,
            'address' => $request->address,
            'profile_picture' => $profilePicturePath,
        ]);

        if (Auth::guard('admin')->check()) {
            return redirect(route('admin.dashboard', absolute: false));
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
