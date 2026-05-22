<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
public function register(Request $request)
{
    $fields = $request->validate([
        'avatar'  => ['file', 'nullable'],
        'name'    => ['required', 'min:5'],
        'email'   => ['required', 'max:70', 'unique:users'],
        'password'=> ['required', 'confirmed'],
    ]);

    unset($fields['avatar']);

    $user = User::create($fields);

    if ($request->hasFile('avatar')) {
        $path = $request->file('avatar')->store('avatars', 'public');
        $user->avatar = $path;
        $user->save();
    }

    Auth::login($user);

    return redirect()->route('dashboard');
}

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
      

    if (Auth::attempt($credentials ,$request->remember)) {
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

public function logout (Request $request){
    Auth::logout();
    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
}

}
