<?php

namespace App\Http\Controllers;

use App\Models\Tooth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\ToothRequest;
use App\Notifications\SystemErrorAlert;
use RealRashid\SweetAlert\Facades\Alert;

class ToothController extends Controller
{
    public function index()
    {
        $title =  __('List of teeth');
        $userAuth = Auth()->User();
        $teeth = Tooth::orderBy('description', 'asc')->get();
        return view('teeth.index', compact('title', 'userAuth', 'teeth'));
    }

    public function create()
    {
        $title =  __('New tooth registration');
        $userAuth = Auth()->User();
        return view('teeth.create', compact('title', 'userAuth'));
    }

    public function store(ToothRequest $request)
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
            Tooth::create($data);
            db::commit();
            Alert::alert()->success(__('Included'), __('Tooth') . __(' successfully added!'));
            return redirect()->route('teeth.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' ' . __('tooth');
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('teeth.index');
        }
    }

    public function show(Tooth $tooth)
    {
        //
    }

    public function edit($id)
    {
        $tooth = Tooth::find($id);
        if ($tooth) {
            $title =  __('Tooth update');
            $userAuth = Auth()->User();
            return view('teeth.edit', compact('title', 'userAuth', 'tooth'));
        }
        return redirect()->route('teeth.index');
    }

    public function update(ToothRequest $request, $id)
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
        if (!$request->get('mesial')) {
            $data['mesial'] = null;
        }
        if (!$request->get('distal')) {
            $data['distal'] = null;
        }
        if (!$request->get('lingual')) {
            $data['lingual'] = null;
        }
        if (!$request->get('palatal')) {
            $data['palatal'] = null;
        }
        if (!$request->get('cervical')) {
            $data['cervical'] = null;
        }
        if (!$request->get('occlusal')) {
            $data['occlusal'] = null;
        }
        if (!$request->get('buccal')) {
            $data['buccal'] = null;
        }
        if (!$request->get('buccal')) {
            $data['buccal'] = null;
        }
        if (!$request->get('multiple_teeth')) {
            $data['multiple_teeth'] = null;
        }
        db::beginTransaction();
        try {
            $tooth = Tooth::find($id);
            $tooth->tooth_code = $data['tooth_code'];
            $tooth->tooth_name = $data['tooth_name'];
            if (!empty($data['image'])) {
                if ($tooth->image) {
                    $image_old = "storage/tenants/{$tooth->Tenant->uuid}/users/{$tooth->image}";
                    if (File::exists($image_old)) {
                        File::delete($image_old);
                    }
                }
                $tooth->image = $data['image'];
            };
            $tooth->mesial = $data['mesial'];
            $tooth->distal = $data['distal'];
            $tooth->lingual = $data['lingual'];
            $tooth->palatal = $data['palatal'];
            $tooth->cervical = $data['cervical'];
            $tooth->incisal = $data['incisal'];
            $tooth->occlusal = $data['occlusal'];
            $tooth->buccal = $data['buccal'];
            $tooth->multiple_teeth = $data['multiple_teeth'];
            $tooth->save();
            db::commit();
            Alert::alert()->success(__('Changed'), __('Tooth') . __(' successfully changed!'));
            return redirect()->route('teeth.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' ' . __('Tooth') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('teeth.index');
        }
    }

    public function suspend($id)
    {
        db::beginTransaction();
        try {
            $tooth = Tooth::find($id);
            if ($tooth->suspended == null) {
                $tooth->suspended = 1;
            } else {
                $tooth->suspended = null;
            }
            $tooth->save();

            db::commit();
            if ($tooth->suspended == null) {
                Alert::alert()->success(__('Reactivated'), __('Tooth') . __(' successfully reactivated!'));
            } else {
                Alert::alert()->success(__('Suspended'), __('Tooth') . __(' successfully suspended!'));
            }
            return redirect()->route('teeth.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to suspend') . ' ' . __('tooth') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('teeth.index');
        }
    }

    public function destroy($id)
    {
        db::beginTransaction();
        try {
            $tooth = Tooth::findOrFail($id);
            if ($tooth) {
                $tooth->delete();
                db::commit();
                Alert::alert()->success(__('Excluded'), __('Tooth') . __(' successfully deleted!'));
                return redirect()->route('teeth.index');
            }
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to delete') . ' ' . __('tooth') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('teeth.index');
        }
    }
}
