<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate based on either 'nip' or 'email'
        $field = filter_var($request->input('nip_email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'nip';
        $request->validate([
            'nip_email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            $field => $request->input('nip_email'),
            'password' => $request->input('password'),
        ];

        try {
            // Attempt to authenticate using either 'nip' or 'email'
            if (Auth::attempt($credentials)) {
                return redirect()->intended('/admin');
            }
        } catch (ValidationException $e) {
            // Handle any additional validation errors if necessary
            return $e->errors();
        }
        // Set error message based on whether it's NIP or email
    $errorMessage = ($field === 'nip') ? 'NIP atau Password Salah' : 'Email atau Password Salah';

    return back()->withErrors(['nip_email' => $errorMessage]);
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
