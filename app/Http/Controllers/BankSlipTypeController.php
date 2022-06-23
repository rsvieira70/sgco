<?php

namespace App\Http\Controllers;

use App\Models\BankSlipType;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\BankSlipTypeRequest;
use App\Notifications\SystemErrorAlert;
use RealRashid\SweetAlert\Facades\Alert;

class BankSlipTypeController extends Controller
{
    public function index()
    {
        $title =  __('List of bank slip types');
        $userAuth = Auth()->User();
        $bankSlipTypes = BankSlipType::orderBy('description','asc')->get();
        return view('bankSlipTypes.index', compact('title', 'userAuth', 'bankSlipTypes'));
    }

    public function create()
    {
        $title =  __('New bank slip type registration');
        $userAuth = Auth()->User();
        return view('bankSlipTypes.create', compact('title', 'userAuth'));
    }

    public function store(BankSlipTypeRequest $request)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            BankSlipType::create($data);
            db::commit();
            Alert::alert()->success(__('Included'), __('Bank slip type') . __(' successfully added!'));
            return redirect()->route('bankSlipTypes.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' '. __('bank slip type');
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('bankSlipTypes.index');
        }
    }

    public function show(BankSlipType $bankSlipType)
    {
        //
    }

    public function edit($id)
    {
        $bankSlipType = BankSlipType::find($id);
        if ($bankSlipType) {
            $title =  __('Bank slip type update');
            $userAuth = Auth()->User();
            return view('bankSlipTypes.edit', compact('title', 'userAuth', 'bankSlipType'));
        }
        return redirect()->route('bankSlipTypes.index');
    }

    public function update(BankSlipTypeRequest $request, $id)
    {
        $data = $request->validated();
        if(!$request->get('pay_commission')){ $data['pay_commission'] = null; }
        if(!$request->get('issue_invoice')){ $data['issue_invoice'] = null; }
        if(!$request->get('used_financial_agreement')){ $data['used_financial_agreement'] = null; }
        if(!$request->get('pay_receipt')){ $data['pay_receipt'] = null; }
        db::beginTransaction();
        try {
            $bankSlipType = BankSlipType::find($id);
            $bankSlipType->description = $data['description'];
            $bankSlipType->pay_commission = $data['pay_commission'];
            $bankSlipType->issue_invoice = $data['issue_invoice'];
            $bankSlipType->used_financial_agreement = $data['used_financial_agreement'];
            $bankSlipType->pay_receipt = $data['pay_receipt'];
            $bankSlipType->save();
            db::commit();
            Alert::alert()->success(__('Changed'), __('Bank slip type') . __(' successfully changed!'));
            return redirect()->route('bankSlipTypes.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' '. __('Bank slip type') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('bankSlipTypes.index');
        }
    }

    public function suspend($id)
    {
        db::beginTransaction();
        try {
            $bankSlipType = BankSlipType::find($id);
            if($bankSlipType->suspended == null){
                $bankSlipType->suspended = 1;
            }else{
                $bankSlipType->suspended = null;
            }
            $bankSlipType->save();

            db::commit();
            if ($bankSlipType->suspended == null) {
                Alert::alert()->success(__('Reactivated'), __('Bank slip type') . __(' successfully reactivated!'));
            } else {
                Alert::alert()->success(__('Suspended'), __('Bank slip type') . __(' successfully suspended!'));
            }
            return redirect()->route('bankSlipTypes.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to suspend') . ' '. __('bank slip type') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('bankSlipTypes.index');
        }
    }

    public function destroy($id)
    {
        db::beginTransaction();
        try {
            $bankSlipType = BankSlipType::findOrFail($id);
            if ($bankSlipType) {
                $bankSlipType->delete();
                db::commit();
                Alert::alert()->success(__('Excluded'), __('Bank slip type') . __(' successfully deleted!'));
                return redirect()->route('bankSlipTypes.index');
            }
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to delete') . ' '. __('bank slip type') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('bankSlipTypes.index');
        }
    }
 
}
