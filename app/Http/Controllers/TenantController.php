<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\TenantRequest;
use App\Notifications\SystemErrorAlert;

class TenantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title =  __('List of tenants');
        $reference = __('tenant');
        $userAuth = Auth()->User();
        $tenants = Tenant::orderBy('social_reason','asc')->get();
        return view('tenants.index', compact('title', 'reference', 'userAuth', 'tenants'));
    }

    public function create()
    {
        $title =  __('New tenant registration');
        $reference = __('tenant');
        $userAuth = Auth()->User();
        return view('tenants.create', compact('title', 'reference', 'userAuth'));
    }

    public function store(TenantRequest $request)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            Tenant::create($data);
            db::commit();

            return redirect()->route('tenants.index')->with('alert', 'store-ok');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' '. __('tenant');
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('tenants.create')->with('alert', 'errors');
        }
    }

    public function show($id)
    {
        $tenant = Tenant::with(['Tenant'])->find($id);
        
        if ($tenant) {
            $tenant->employer_identification_number = Useful::class::cnpj($tenant->employer_identification_number);
            $tenant->zip_code = Useful::class::zip_code($tenant->zip_code);
            $tenant->telephone = Useful::class::phone($tenant->telephone);
            $tenant->cell_phone = Useful::class::phone($tenant->cell_phone);
            $tenant->whatsapp = Useful::class::phone($tenant->whatsapp);
            $tenant->telegram = Useful::class::phone($tenant->telegram);

            $title =  __('Tenant show');
            $reference = __('tenant');
            $userAuth = Auth()->User();
            return view('tenants.show', compact('title', 'reference', 'userAuth', 'tenant'));
        }
        return redirect()->route('tenants.index');
    }

    public function edit($id)
    {
        $tenant = Tenant::find($id);
        if ($tenant) {
            $title =  __('Tenant update');
            $reference = __('tenant');
            $userAuth = Auth()->User();
            return view('tenants.edit', compact('title', 'reference', 'userAuth', 'tenant'));
        }
        return redirect()->route('tenants.index');
    }

    public function update(TenantRequest $request, $id)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            $tenant = Tenant::find($id);
            $tenant->description = $data['description'];
            $tenant->save();

            db::commit();
            return redirect()->route('tenants.index')->with('alert', 'update-ok');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' '. __('tenant') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('tenants.update')->with('alert', 'errors');
        }
    }

    public function suspend($id)
    {
        db::beginTransaction();
        try {
            $tenant = Tenant::find($id);
            if ($tenant->suspension_date == null) {
                $tenant->suspension_date = now();
            } else {
                $tenant->suspension_date = null;
            }
            $tenant->save();

            db::commit();
            return redirect()->route('tenants.index')->with('alert', 'update-ok');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to suspend') . ' ' . __('tenant') . ' -> ' . __('Key') . ' ' . $id;
            $users = Tenant::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('tenants.index')->with('alert', 'errors');
        }
    }

    public function destroy($id)
    {
        db::beginTransaction();
        try {
            $tenant = Tenant::findOrFail($id);
            if ($tenant) {
                $tenant->delete();
                db::commit();
                return redirect()->route('tenants.index')->with('alert', 'destroy-ok');
            }
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to delete') . ' '. __('tenant') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('tenants.index')->with('alert', 'errors');
        }
    }
}
