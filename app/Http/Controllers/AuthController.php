<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->back()->with('error', 'Not Authorize');
        }
        return view('Auth.login');
    }
    public function SubmitLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'invalid credetails');
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'invalid credetails');
        }

        Auth::login($user);
        return redirect()->route('index')->with('success', 'Login Successfully!');

    }
    public function Rigester()
    {
        if (Auth::check()) {
            return redirect()->back()->with('error', 'Not Authorize');
        }
        return view('Auth.register');
    }
    public function SubmitRigester(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'user_image' => 'sometimes|image'
        ]);

        try {

            if ($request->hasFile('user_image')) {
                $image = $request->file('user_image');
                $imageName = now()->format('YmdHis') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('profile_image', $imageName, 'public');
            }

            $user = User::create([

                'name' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 2,
                'user_image' => isset($imageName) ? $imagePath : null,
            ]);

            Auth::login($user);
            return redirect()->route('index')->with('success', 'Register Successfully!');

        } catch (\Exception $e) {


            Log::error('Registration failed: ' . $e->getMessage());
            return redirect()->route('index')->with('error', 'Register Failed!');

        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back()->with('success', 'logout sucessfully');
    }

    public function index()
    {
        return view('index');
    }
}
