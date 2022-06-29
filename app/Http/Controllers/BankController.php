<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\BankRequest;
use App\Notifications\SystemErrorAlert;
use RealRashid\SweetAlert\Facades\Alert;

class BankController extends Controller
{
    public function index()
    {
        $title =  __('List of banks');
        $userAuth = Auth()->User();
        $banks = Bank::orderBy('name','asc')->get();
        return view('banks.index', compact('title', 'userAuth', 'banks'));
    }

    public function create()
    {
        $title =  __('New bank registration');
        $userAuth = Auth()->User();
        return view('banks.create', compact('title', 'userAuth'));
    }

    public function store(BankRequest $request)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            Bank::create($data);
            db::commit();
            Alert::alert()->success(__('Included'), __('Bank') . __(' successfully added!'));
            return redirect()->route('banks.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' '. __('bank');
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('banks.index');
        }
    }

    public function show(Bank $Bank)
    {
        //
    }

    public function edit($id)
    {
        $bank = Bank::find($id);
        if ($bank) {
            $title =  __('Bank update');
            $userAuth = Auth()->User();
            return view('banks.edit', compact('title', 'userAuth', 'bank'));
        }
        return redirect()->route('banks.index');
    }

    public function update(BankRequest $request, $id)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            $bank = Bank::find($id);
            $bank->bank_code = $data['bank_code'];
            $bank->name = $data['name'];
            $bank->short_name = $data['short_name'];
            $bank->save();
            db::commit();
            Alert::alert()->success(__('Changed'), __('Bank') . __(' successfully changed!'));
            return redirect()->route('banks.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' '. __('Bank') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('banks.index');
        }
    }

    public function suspend($id)
    {
        db::beginTransaction();
        try {
            $bank = Bank::find($id);
            if($bank->suspended == null){
                $bank->suspended = 1;
            }else{
                $bank->suspended = null;
            }
            $bank->save();

            db::commit();
            if ($bank->suspended == null) {
                Alert::alert()->success(__('Reactivated'), __('Bank') . __(' successfully reactivated!'));
            } else {
                Alert::alert()->success(__('Suspended'), __('Bank') . __(' successfully suspended!'));
            }
            return redirect()->route('banks.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to suspend') . ' '. __('bank') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('banks.index');
        }
    }

    public function destroy($id)
    {
        db::beginTransaction();
        try {
            $bank = Bank::findOrFail($id);
            if ($bank) {
                $bank->delete();
                db::commit();
                Alert::alert()->success(__('Excluded'), __('Bank') . __(' successfully deleted!'));
                return redirect()->route('banks.index');
            }
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to delete') . ' '. __('bank') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('banks.index');
        }
    }
 
}
