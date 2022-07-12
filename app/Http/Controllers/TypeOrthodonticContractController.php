<?php

namespace App\Http\Controllers;

use App\Class\NumberFormat;
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
        $title =  __('List of types orthodontic contract');
        $userAuth = Auth()->User();
        $typeOrthodonticContracts = TypeOrthodonticContract::orderBy('description', 'asc')->get();
        return view('typeOrthodonticContracts.index', compact('title', 'userAuth', 'typeOrthodonticContracts'));
    }

    public function create()
    {
        $title =  __('New type orthodontic contract registration');
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
            $title =  __('Type orthodontic contract update');
            $userAuth = Auth()->User();
            $typeOrthodonticContract->orthodontic_bracket_price = NumberFormat::class::insertNumberFormat($typeOrthodonticContract->orthodontic_bracket_price);;
            $typeOrthodonticContract->orthodontic_band_price = NumberFormat::class::insertNumberFormat($typeOrthodonticContract->orthodontic_band_price);;
            $typeOrthodonticContract->orthodontic_appliance_price = NumberFormat::class::insertNumberFormat($typeOrthodonticContract->orthodontic_appliance_price);;
            $typeOrthodonticContract->orthodontic_appliance_installation_price = NumberFormat::class::insertNumberFormat($typeOrthodonticContract->orthodontic_appliance_installation_price);;
            $typeOrthodonticContract->orthodontic_appliance_maintenance_price = NumberFormat::class::insertNumberFormat($typeOrthodonticContract->orthodontic_appliance_maintenance_price);;
            return view('typeOrthodonticContracts.edit', compact('title', 'userAuth', 'typeOrthodonticContract'));
        }
        return redirect()->route('typeOrthodonticContracts.index');
    }

    public function update(TypeOrthodonticContractRequest $request, $id)
    {
        $data = $request->validated();
        if (!$request->get('receive_bracket')) {$data['receive_bracket'] = null;}
        if (!$request->get('receive_band')) {$data['receive_band'] = null;}
        if (!$request->get('fixed_value_contract')) {$data['fixed_value_contract'] = null;}
        db::beginTransaction();
        try {
            $typeOrthodonticContract = TypeOrthodonticContract::find($id);
            $typeOrthodonticContract->description = $data['description'];
            $typeOrthodonticContract->receive_bracket = $data['receive_bracket'];
            $typeOrthodonticContract->amount_orthodontic_bracket = $data['amount_orthodontic_bracket'];
            $typeOrthodonticContract->orthodontic_bracket_price = $data['orthodontic_bracket_price'];
            $typeOrthodonticContract->receive_band = $data['receive_band'];
            $typeOrthodonticContract->amount_orthodontic_band = $data['amount_orthodontic_band'];
            $typeOrthodonticContract->orthodontic_band_price = $data['orthodontic_band_price'];
            $typeOrthodonticContract->orthodontic_appliance_price = $data['orthodontic_appliance_price'];
            $typeOrthodonticContract->orthodontic_appliance_installation_price = $data['orthodontic_appliance_installation_price'];
            $typeOrthodonticContract->orthodontic_appliance_maintenance_price= $data['orthodontic_appliance_maintenance_price'];
            $typeOrthodonticContract->fixed_value_contract= $data['fixed_value_contract'];
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
