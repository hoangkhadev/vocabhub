<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Models\User;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Log;
use Validator;

class AuthController extends Controller
{
    public function getSignin()
    {
        return view('auth.signin');
    }
    public function signin(SignInRequest $request)
    {
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->intended('/');
            }

            session()->flash('errorSignin', 'Invalid email or password');
            return redirect()->back()->withInput([
                'email' => $request->email,
                'password' => $request->password
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to signin: ', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);
        }
    }

    public function getSignup()
    {
        return view('auth.signup');
    }
    public function signup(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email:rfc,dns', Rule::unique(User::class, 'email')],
            'password' => ['required', 'min:6'],
            'password_confirmation' => ['required', 'same:password']
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($user) {
            Auth::login($user);
            return redirect()->route('guest.home');
        }
    }

    public function signout()
    {
        Auth::logout();
        return redirect()->route('auth.getSignin');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('guest.profile', compact('user'));
    }
}
