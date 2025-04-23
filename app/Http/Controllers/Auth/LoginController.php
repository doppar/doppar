<?php

namespace App\Http\Controllers\Auth;

use Phaseolies\Http\Request;
use Phaseolies\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Phaseolies\Http\Response\RedirectResponse;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->sanitize([
            'email' => 'required|email|min:2|max:100',
            'password' => 'required|min:2|max:20'
        ]);

        $user = User::query()->where('email', '=', $request->email)->first();

        if ($user) {
            if (Auth::try($request->passed())) {
                return redirect('/home')->with('success', 'You are logged in');
            }
            return back()->with('error', 'Email or password is incorrect');
        }

        return back()->with('error', 'User does not exist');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to('/login')
            ->with('success', 'You are successfully logged out');
    }
}