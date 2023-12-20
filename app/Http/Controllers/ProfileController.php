<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('check.auth');
    }

    public function index(string $id)
    {
        if (!Auth::check() && $id === Auth::user()->id) {
            return redirect()->back()->with('error', 'Not Authorized!');
        }

        return view('Auth.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required'
        ]);
        try {
            User::where('id', Auth::user()->id)
                ->update([
                    'name' => $request->username,
                    'email' => $request->email
                ]);

            return redirect()->back()->with('success', 'personal Info Updated!');

        } catch (\Exception $e) {

            Log::error('Profile Updated failed: ' . $e->getMessage());
            return redirect()->back()->with('success', 'personal Info Updated Failed!');

        }

    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        try {

            User::where('id', Auth::user()->id)
                ->update([
                    'passowrd' => Hash::make($request->password)
                ]);

            return redirect()->back()->with('success', 'Password Updated!');

        } catch (\Exception $e) {

            Log::error('Profile Updated failed: ' . $e->getMessage());
            return redirect()->back()->with('success', 'Password Updated Failed!');

        }
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'user_image' => 'required'
        ]);
        try {
            if (isset(Auth::user()->user_image)) {
                unlink(public_path('storage/' . Auth::user()->user_image));
            }
            $image = $request->file('user_image');
            $imageName = now()->format('YmdHis') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('profile_image', $imageName, 'public');

            User::where('id', Auth::user()->id)
                ->update([
                    'user_image' => $imagePath
                ]);
            return redirect()->back()->with('success', 'Password Image Updated!');

        } catch (\Exception $e) {

            Log::error('Profile Updated failed: ' . $e->getMessage());
            return redirect()->back()->with('success', 'Image Updated Failed!');

        }
    }

    public function deleteProfile(Request $request)
    {
        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect password');
        }

        try {
            User::destroy(Auth::user()->id);
            Auth::logout();
            return redirect()->route('index')->with('success', 'Account Deleted');

        } catch (\Exception $e) {
            Log::error('Account Deletion failed: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Account Deletion Failed. Please try again.');
        }
    }
}
