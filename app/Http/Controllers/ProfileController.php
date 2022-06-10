<?php
namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\ProfileRequest;
use App\Notifications\SystemErrorAlert;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function edit()
    { 
        $id = Auth::user()->id;
        $profile = Profile::find($id);
        if ($profile) {
            $title =  __('Profile');
            $userAuth = Auth()->User();
            $loggedId = intval(Auth::id());
            return view('profiles.edit', compact('title',  'userAuth', 'loggedId', 'profile'));
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
            
            if (!$upload) {
                Alert::alert()->error(__('Opps! An internal error occurred.'), __('An error occured while uploading the file.'))
                ->footer(__("An unexpected error occurred and we have notified our support team. Please try again later."))
                ->showConfirmButton(__('Ok'), '#d33');
                return redirect()->back()->withInput();
            }
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
                if ($profile->image) {
                    $image_old = "storage/tenants/{$profile->Tenant->uuid}/users/{$profile->image}";
                    if(File::exists($image_old)) {
                        File::delete($image_old);
                    }
                }
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
            Alert::alert()->success(__('Changed'), __('Profile') . __(' successfully changed!'));
            return redirect()->route('dashboard');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' ' . __('profile') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('profiles.index');
        }
    }
}
