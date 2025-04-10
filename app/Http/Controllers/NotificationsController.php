<?php

namespace App\Http\Controllers;
use App\Models\Notifications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class NotificationsController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $notifications = Notifications::where('user_id', $userId)->get();
        return view('notifications/view', compact('notifications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $users = User::all();

        foreach ($users as $user) {
        // Create a notification for each user
        Notifications::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'description' => $request->description
        ]);
        }

        return redirect()->back()->with('success', 'Notification sent successfully.');
    }

    public function edit($id)
    {
        $financialAdvisor = User::findOrFail($id);
        return view('financial_advisors/edit_financial_advisor', compact('financialAdvisor'));
    }

    public function updateStatus($id)
{
    // Retrieve status from the request
    $status = request()->status;

    $notification = Notifications::findOrFail($id);
    $notification->status = $status;
    $notification->save();

    return redirect()->back()->with('success', 'Notification status updated successfully.');
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
        $notification = Notifications::findOrFail($id);
        $notification->delete();
        return redirect()->back()->with('success', 'Notification deleted successfully.');
    }

}
