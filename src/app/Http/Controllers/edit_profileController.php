<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createedit_profileRequest;
use App\Http\Requests\Updateedit_profileRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\edit_profileRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class edit_profileController extends AppBaseController
{
    // 
    // private $editProfileRepository;

    // public function __construct(edit_profileRepository $editProfileRepo)
    // {
    //     $this->editProfileRepository = $editProfileRepo;
    // }

    public function index()
    {
        $user = auth()->user();
        return view('layouts.editProfile', ['editProfile' => $user, 'email' => $user->email]);
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Your current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Your password has been changed successfully.');
    }

}
