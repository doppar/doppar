<?php

namespace App\Http\Controllers\Auth;

use Phaseolies\Http\Request;
use Phaseolies\Support\Facades\Hash;
use Phaseolies\Http\Response\RedirectResponse;
use App\Models\User;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->sanitize([
            'name' => 'required|min:2|max:20',
            'email' => 'required|email|unique:users|min:2|max:100',
            'password' => 'required|min:2|max:20',
            'confirm_password' => 'required|same_as:password',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            return redirect()->to('/login')
                ->with('success', 'User created successfully');
        }

        return redirect()->back();
    }
}