<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterMail;
use App\Mail\ResetPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->session()->has('badge')) {
        //     $badge = $request->session()->get('badge');
        //     return view('home', ['badge' => $badge]);
        // }
        if (auth()->check()) {
            return view('home');
        }
        /**
         * lakukan redirect login
         */
        return redirect('/login');
    }


    public function login()
    {
        // if (auth()->check()) {
        //     return redirect('/');
        // }
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function resetPassword()
    {
        return view('auth.reset_password');
    }

    public function resetPasswordEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',  // Validasi email harus ada di dalam database
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email not found');
        }

        // Generate token untuk verifikasi
        $user->remember_token = Str::random(40);
        $user->save();

        // Kirim email reset password
        Mail::to($user->email)->send(new ResetPasswordMail($user));

        return redirect('/reset-password')->with('success', 'Your password reset link has been sent. Please check your email.');
    }

    public function resetPasswordEmailtemplate(Request $request)
    {
        $email = $request->query('email');
        $token = $request->query('verify');

        $user = User::where('email', $email)->where('remember_token', $token)->first();

        if ($user) {
            // Tampilkan form untuk memasukkan password baru

            return view('auth.updatePassword', compact('user'));
        } else {
            return redirect('/login')->with('error', 'Token is invalid or expired.');
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', $request->email)
            ->where('remember_token', $request->token)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid token or email.');
        }

        // Update password
        $user->password = bcrypt($request->password);
        $user->remember_token = null; // Clear the token after successful reset
        $user->save();

        return redirect('/login')->with('success', 'Your password has been successfully reset.');
    }


    public function create_user(Request $request)
    {
        // request()->validate([
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required',
        //     'confirm_password' => 'required',
        // ]);
        $save = new User();

        $firstname = $request->firstname;
        $lastname = $request->lastname;

        $password = $request->password;
        $name = $request->name;
        $confirm_password = $request->confirm_password;
        if ($password != $confirm_password) {
            return redirect()->back()->with('error', 'Password does not match');
        }

        $save->username = $firstname . ' ' . $lastname;
        $save->role_id = 3;
        $save->email = $request->email;
        $save->password = Hash::make($request->password);
        $save->remember_token = Str::random(40);
        $save->name = "user";
        $save->save();


        // Mail::to($save->email)->send(new RegisterMail($save));
        return redirect('login')->with('success', 'Your Account Register successfully and Verify your email address');
    }

    public function verifyEmail($token)
    {
        $user = User::where('remember_token', $token)->first();
        if (!empty($user)) {
            $user->email_verified_at = now();
            $user->remember_token = Str::random(40);
            $userId = $user->id;

            $user->save();
            return redirect('login')->with('success', 'Your Account Verified successfully');
        } else {
            abort(404);
        }
    }

    public function auth_login(Request $request)
    {
        // $remember = !empty($request->remember) ? true : false;
        // if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
        //     if (!empty(auth()->user()->email_verified_at)) {
        //         // Removed email verification check
        //         if (auth()->user()->role_id == 3) {
        //             return redirect('/dashboard');
        //         }
        //         return redirect('/');
        //     } else {

        //         return redirect('login')->with('error', 'Your Account not verified yet');
        //     }
        // } else {
        //     return redirect()->back()->with('error', 'Invalid email or password');
        // }
        $remember = !empty($request->remember) ? true : false;

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if (auth()->user()->role_id == 3) {
                return redirect('/');
            }
            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
        return redirect('/');
    }

    public function verify($token)
    {
        $user = User::where('remember_token', $token)->first();
        if (!empty($user)) {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->remember_token = Str::random(40);
            $user->save();
            return redirect('login')->with('success', 'Your Account Verified successfully');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }
}
