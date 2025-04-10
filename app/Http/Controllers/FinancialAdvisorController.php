<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FinancialAdvisorController extends Controller
{
    public function index()
    {
        $financialAdvisors = User::where('role', 1)->get();
        return view('financial_advisors/view_financial_advisors', compact('financialAdvisors'));
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'contact_number' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'country' => 'required',
            'password' => 'required|min:8',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Handle profile image upload
            $profileImageName = null;
            if ($request->hasFile('profile_image')) {
                $profileImageName = time() . '_' . $request->file('profile_image')->getClientOriginalName();
                $request->file('profile_image')->move(public_path('assets/profile_images'), $profileImageName);
            }

            User::create([
                'name' => $request->full_name,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'street' => $request->street,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'country' => $request->country,
                'password' => bcrypt($request->password),
                'profile_image' => $profileImageName,
            ]);

            return redirect()->back()->with('success', 'Financial advisor created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create financial advisor.');
        }
    }

    public function edit($id)
    {
        $financialAdvisor = User::findOrFail($id);
        return view('financial_advisors/edit_financial_advisor', compact('financialAdvisor'));
    }

    public function update(Request $request, $id)
    {
        $financialAdvisor = User::findOrFail($id);

        // Perform validation
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'contact_number' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'country' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle profile image update
        if ($request->hasFile('profile_image')) {
            // Delete previous profile image if exists
            if ($financialAdvisor->profile_image) {
                // Delete previous profile image
                $previousProfileImagePath = public_path('assets/profile_images/') . $financialAdvisor->profile_image;
                if (file_exists($previousProfileImagePath)) {
                    unlink($previousProfileImagePath);
                }
            }
            // Upload new profile image
            $profileImageName = time() . '_' . $request->file('profile_image')->getClientOriginalName();
            $request->file('profile_image')->move(public_path('assets/profile_images'), $profileImageName);
            $financialAdvisor->profile_image = $profileImageName;
        }

        // Update other details
        $financialAdvisor->update([
            'name' => $request->full_name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
        ]);

        return redirect()->route('financial_advisors.index')->with('success', 'Financial advisor updated successfully.');
    }

    public function destroy($id)
    {
        $financialAdvisor = User::findOrFail($id);
        $financialAdvisor->delete();
        return redirect()->back()->with('success', 'Financial advisor deleted successfully.');
    }
}
