<?php

namespace App\Http\Controllers\User\Customer;

use App\Http\Controllers\Controller;
use App\Services\NotificationService;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return view('user.customer.dashboard.profile');
    }

    public function updateInformation(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email,' . auth('web')->user()->id], // unique:table,column,ignore_id
            'profile_image' => ['nullable', 'image', 'max:5242']
        ]);

        $currentUser = auth('web')->user();

        $currentUser->name = $request->name;
        $currentUser->email = $request->email;

        if ($request->hasFile('profile_image')) {
            $filePath = $this->uploadFile($request->file('profile_image'), $currentUser->profile_image);
            $currentUser->profile_image = $filePath;
        }

        $currentUser->save();

        NotificationService::updated();

        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $currentUser = auth('web')->user();
        $currentUser->password = $request->password;
        $currentUser->save();

        NotificationService::updated();

        return redirect()->back();
    }
}
