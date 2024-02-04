<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Doctrine\Inflector\Rules\Pattern;
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
        $request->dni = strtolower($request->dni);
        $request->email = strtolower($request->email);
        $request->validate([
            'nick' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'surnames' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string','regex:/^(\d{8}[a-zA-Z])$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'birth' => ['required', 'date', 'before_or_equal:'.now()->subYears(18)->format('Y-m-d')],
        ],[
            'birth.before_or_equal' => 'Debes ser mayor de edad para entrar a este sitio web',  
            'dni.regex' => 'Eso no parece un DNI',
        ]);
        

        $user = User::create([
            'nick' => $request->nick,
            'name' => $request->name,
            'surnames' => $request->surnames,
            'DNI' => $request->dni,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birth' => $request->birth,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
