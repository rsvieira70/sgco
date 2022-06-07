<?php
namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Notifications\SystemErrorAlert;

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
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameImage = "{$name}.{$extension}";
            $data['image'] = $nameImage;
            $upload = $request->image->storeAs('users', $nameImage);
            
            if (!$upload)
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
        }
        db::beginTransaction();
        try {
            $id = Auth::user()->id;
            $profile = Profile::find($id);
            $profile->name = $data['name'];
            $profile->social_name = $data['social_name'];
            $profile->nickname = $data['nickname'];
            $profile->social_security_number = $data['social_security_number'];
            $profile->birth = $data['birth'];
            if (!empty($data['image'])) {
                $profile->image = $data['image'];
            };
            $profile->zip_code = $data['zip_code'];
            $profile->address = $data['address'];
            $profile->house_number = $data['house_number'];
            $profile->complement = $data['complement'];
            $profile->neighborhood = $data['neighborhood'];
            $profile->city = $data['city'];
            $profile->state = $data['state'];
            $profile->dceu = $data['dceu'];
            $profile->telephone = $data['telephone'];
            $profile->cell_phone = $data['cell_phone'];
            $profile->whatsapp = $data['whatsapp'];
            $profile->telegram = $data['telegram'];
            $profile->facebook = $data['facebook'];
            $profile->instagram = $data['instagram'];
            $profile->twitter = $data['twitter'];
            $profile->linkedin = $data['linkedin'];
            $profile->email = $data['email'];
            if (!empty($data['password'])) {
                $profile->password = Hash::make($data['password']);
            };
            $profile->profile_note = $data['profile_note'];
            $profile->save();
            db::commit();
            return redirect()->route('dashboard')->with('alert', 'update-ok');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' ' . __('profile') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('profiles.edit', ['profile' => $id])->with('alert', 'errors');
        }
    }
}
