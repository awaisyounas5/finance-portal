<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->name = $request->input('name');
            $user->contact_number = $request->input('contact_number');
            $user->street = $request->input('street');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zip_code = $request->input('zip_code');
            $user->country = $request->input('country');

            // Handle profile image upload
            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/profile_images'), $imageName);
                $user->profile_image = $imageName;
            }

            $user->save();

            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'User not found.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile.');
        }
    }

    public function updatePassword(Request $request)
    {
        //  Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("password_error", "Old Password Doesn't match!");
        }

        // Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }
}
