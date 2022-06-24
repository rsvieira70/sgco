<?php

namespace App\Http\Controllers;

use App\Models\TypeOrthodonticContract;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\TypeOrthodonticContractRequest;
use App\Notifications\SystemErrorAlert;
use RealRashid\SweetAlert\Facades\Alert;

class TypeOrthodonticContractController extends Controller
{
    public function index()
    {
        $title =  __('List of type orthodontic contracts');
        $userAuth = Auth()->User();
        $typeOrthodonticContracts = TypeOrthodonticContract::orderBy('description', 'asc')->get();
        return view('typeOrthodonticContracts.index', compact('title', 'userAuth', 'typeOrthodonticContracts'));
    }

    public function create()
    {
        $title =  __('New type orthodontic contracts registration');
        $userAuth = Auth()->User();
        return view('typeOrthodonticContracts.create', compact('title', 'userAuth'));
    }

    public function store(TypeOrthodonticContractRequest $request)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            TypeOrthodonticContract::create($data);
            db::commit();
            Alert::alert()->success(__('Included'), __('Type orthodontic contract') . __(' successfully added!'));
            return redirect()->route('typeOrthodonticContracts.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' ' . __('type orthodontic contract');
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('typeOrthodonticContracts.index');
        }
    }

    public function show(TypeOrthodonticContract $typeOrthodonticContract)
    {
        //
    }

    public function edit($id)
    {
        $typeOrthodonticContract = TypeOrthodonticContract::find($id);
        if ($typeOrthodonticContract) {
            $title =  __('Type orthodontic contracts update');
            $userAuth = Auth()->User();
            return view('typeOrthodonticContracts.edit', compact('title', 'userAuth', 'typeOrthodonticContract'));
        }
        return redirect()->route('typeOrthodonticContracts.index');
    }

    public function update(TypeOrthodonticContractRequest $request, $id)
    {
        $data = $request->validated();
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
        if (!$request->get('incisal')) {
            $data['incisal'] = null;
        }
        if (!$request->get('occlusal')) {
            $data['occlusal'] = null;
        }
        if (!$request->get('buccal')) {
            $data['buccal'] = null;
        }
        if (!$request->get('multiple')) {
            $data['multiple'] = null;
        }
        db::beginTransaction();
        try {
            $typeOrthodonticContract = TypeOrthodonticContract::find($id);
            $typeOrthodonticContract->description = $data['description'];
            $typeOrthodonticContract->mesial = $data['mesial'];
            $typeOrthodonticContract->distal = $data['distal'];
            $typeOrthodonticContract->lingual = $data['lingual'];
            $typeOrthodonticContract->palatal = $data['palatal'];
            $typeOrthodonticContract->cervical = $data['cervical'];
            $typeOrthodonticContract->incisal = $data['incisal'];
            $typeOrthodonticContract->occlusal = $data['occlusal'];
            $typeOrthodonticContract->buccal = $data['buccal'];
            $typeOrthodonticContract->multiple= $data['multiple'];
            $typeOrthodonticContract->save();
            db::commit();
            Alert::alert()->success(__('Changed'), __('Type orthodontic contract') . __(' successfully changed!'));
            return redirect()->route('typeOrthodonticContracts.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' ' . __('type orthodontic contract') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('typeOrthodonticContracts.index');
        }
    }

    public function suspend($id)
    {
        db::beginTransaction();
        try {
            $typeOrthodonticContract = TypeOrthodonticContract::find($id);
            if ($typeOrthodonticContract->suspended == null) {
                $typeOrthodonticContract->suspended = 1;
            } else {
                $typeOrthodonticContract->suspended = null;
            }
            $typeOrthodonticContract->save();

            db::commit();
            if ($typeOrthodonticContract->suspended == null) {
                Alert::alert()->success(__('Reactivated'), __('Type orthodontic contract') . __(' successfully reactivated!'));
            } else {
                Alert::alert()->success(__('Suspended'), __('Type orthodontic contract') . __(' successfully suspended!'));
            }
            return redirect()->route('typeOrthodonticContracts.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to suspend') . ' ' . __('type orthodontic contract') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('typeOrthodonticContracts.index');
        }
    }

    public function destroy($id)
    {
        db::beginTransaction();
        try {
            $typeOrthodonticContract = TypeOrthodonticContract::findOrFail($id);
            if ($typeOrthodonticContract) {
                $typeOrthodonticContract->delete();
                db::commit();
                Alert::alert()->success(__('Excluded'), __('Type orthodontic contract') . __(' successfully deleted!'));
                return redirect()->route('typeOrthodonticContracts.index');
            }
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to delete') . ' ' . __('type orthodontic contract') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('typeOrthodonticContracts.index');
        }
    }
}
