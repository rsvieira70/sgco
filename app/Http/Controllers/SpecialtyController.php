<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\SpecialtyRequest;
use App\Notifications\SystemErrorAlert;
use RealRashid\SweetAlert\Facades\Alert;

class SpecialtyController extends Controller
{
    public function index()
    {
        $title =  __('List of specialties');
        $userAuth = Auth()->User();
        $specialties = Specialty::orderBy('description','asc')->get();
        return view('specialties.index', compact('title', 'userAuth', 'specialties'));
    }

    public function create()
    {
        $title =  __('New specialty registration');
        $userAuth = Auth()->User();
        return view('specialties.create', compact('title', 'userAuth'));
    }

    public function store(SpecialtyRequest $request)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            Specialty::create($data);
            db::commit();
            Alert::alert()->success(__('Included'), __('Specialty') . __(' successfully added!'));
            return redirect()->route('specialties.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' '. __('specialty');
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('specialties.index');
        }
    }

    public function show(Specialty $specialty)
    {
        //
    }

    public function edit($id)
    {
        $specialty = Specialty::find($id);
        if ($specialty) {
            $title =  __('Specialty update');
            $userAuth = Auth()->User();
            return view('specialties.edit', compact('title', 'userAuth', 'specialty'));
        }
        return redirect()->route('specialties.index');
    }

    public function update(SpecialtyRequest $request, $id)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            $specialty = Specialty::find($id);
            $specialty->description = $data['description'];
            $specialty->save();
            db::commit();
            Alert::alert()->success(__('Changed'), __('Specialty') . __(' successfully changed!'));
            return redirect()->route('specialties.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' '. __('specialty') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('specialties.index');
        }
    }

    public function suspend($id)
    {
        db::beginTransaction();
        try {
            $specialty = Specialty::find($id);
            if($specialty->suspended == null){
                $specialty->suspended = 1;
            }else{
                $specialty->suspended = null;
            }
            $specialty->save();

            db::commit();
            if ($specialty->suspended == null) {
                Alert::alert()->success(__('Reactivated'), __('Specialty') . __(' successfully reactivated!'));
            } else {
                Alert::alert()->success(__('Suspended'), __('Specialty') . __(' successfully suspended!'));
            }
            return redirect()->route('specialties.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to suspend') . ' '. __('specialty') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('specialties.index');
        }
    }

    public function destroy($id)
    {
        db::beginTransaction();
        try {
            $specialty = Specialty::findOrFail($id);
            if ($specialty) {
                $specialty->delete();
                db::commit();
                Alert::alert()->success(__('Excluded'), __('Specialty') . __(' successfully deleted!'));
                return redirect()->route('specialties.index');
            }
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to delete') . ' '. __('specialty') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('specialties.index');
        }
    }
 
}
