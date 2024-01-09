<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\NewUserCreated;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {

            return redirect()->route('home');
        } else {
            return redirect()->route('loginView')
                ->withErrors(['email' => 'Invalid credentials']);

        }
    }

    public function logout()
    {

        if (Auth::check()) {
            $accessToken = Auth::user()->currentAccessToken();

            if ($accessToken) {
                $accessToken->delete();
            }
        }

        Auth::logout();

        return redirect()->route('loginView');
    }

    public function registerView()
    {
        return view('register');
    }

    public function register(RegisterUserRequest $request)
    {


        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'profile_image' => 'profile_image/default.jpg',
            'password' => Hash::make($request->password),
            'is_admin' => 0
        ]);

        $admin = User::where('is_admin', 1)->first();

        Mail::to($admin)->send(new NewUserCreated($user));


        if ($user) {
            return redirect()->route('loginView');
        } else {
            return redirect()->back()->withErrors(['message' => 'Error during registration']);
        }
    }

    public function forgotPasswordView()
    {

        return view('forgotPassword');
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $status = Password::sendResetLink($request->only('email'));

        if ($status == Password::RESET_LINK_SENT) {
            return redirect()->route('loginView');
        }

        return redirect()->back()->withErrors(['email' => trans($status)]);

    }

    public function resetPasswordView($token, $email)
    {

        return view('resetPassword', ['token' => $token, 'email' => $email]);
    }

    public function resetPasswordLogic(ResetPasswordRequest $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect(route('loginView'));
        }

        return redirect()->back()->withErrors(['password' => trans($status)]);
    }

    public function header(){
        return view('header');
    }
}
