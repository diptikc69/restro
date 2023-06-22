<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    function getProfile()
    {
        $user = auth()->user();
        return view('admin.profile.update', compact('user'));
    }

    public  function updateProfile(Request $request)
    {
        $image = auth()->user()->image;
        $validatedData = $request->validate([
            'name' => 'required|unique:menus|max:255',
            'image' => 'nullable',
        ]);

        if (!$validatedData) {
            return redirect()->back()->withErrors($validatedData->errors())->withInput();
        }
        if ($request->file('image')) {
            $image = Storage::disk('public')->put('/images', $request->image);
        }

        if ($request->password) {

            auth()->user()->update([
                'password' => bcrypt($request->password),
            ]);
        }

        auth()->user()->update([
            'name' => $request->name,
            'image' => $image
        ]);

        return redirect()->route('admin.profile')->with('message', 'Profile update success fully');
    }
}
