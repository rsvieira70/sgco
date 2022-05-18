<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\systemErrorEmail;
use App\Http\Requests\ProfileRequest;
use App\Notifications\SystemErrorAlert;
use GrahamCampbell\ResultType\Success;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function edit()
    {
        $id = Auth::user()->id;
        $profile = Profile::find($id);
        if ($profile) {
            $title =  __('Profile');
            $reference = __('profile');
            $userAuth = Auth()->User();
            $loggedId = intval(Auth::id());
            return view('profiles.edit', compact('title', 'reference', 'userAuth', 'loggedId', 'profile'));
        }
        return redirect()->route('dashboard');
    }

    public function update(ProfileRequest $request)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            $id = Auth::user()->id;
            $profile = Profile::find($id);
            $profile->description = $data['description'];
            $profile->save();

            db::commit();
            return redirect()->route('dashboard')->with('alert', 'update-ok');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' '. __('profile') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('profiles.edit')->with('alert', 'errors');
        }
    }

}
