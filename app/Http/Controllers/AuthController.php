<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth Facade
use Illuminate\Support\Facades\Validator; // Correct Validator Namespace
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function dashboard()
    {
        $posts = Post::orderBy('created_at', 'asc')->get();
        return view('auth.dashboard', compact('posts'));
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->only('email', 'password');

        Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        return redirect('auth/login');
    }
}
