<?php

namespace App\Http\Controllers;

use App\Class\Useful;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\TenantRequest;
use App\Notifications\SystemErrorAlert;
use RealRashid\SweetAlert\Facades\Alert;

class TenantController extends Controller
{
    public function index()
    {
        $title =  __('List of tenants');
        $userAuth = Auth()->User();
        $tenants = Tenant::orderBy('social_reason', 'asc')->get();
        return view('tenants.index', compact('title', 'userAuth', 'tenants'));
    }

    public function create()
    {
        $title =  __('New tenant registration');
        $userAuth = Auth()->User();
        return view('tenants.create', compact('title', 'userAuth'));
    }

    public function store(TenantRequest $request)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            Tenant::create($data);
            db::commit();
            Alert::alert()->success(__('Included'), __('Tenant') . __(' successfully added!'));
            return redirect()->route('tenant.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' ' . __('tenant');
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('tenants.create')->with('alert', 'errors');
        }
    }

    public function show($id)
    {
        $tenant = Tenant::find($id);

        if ($tenant) {
            $tenant->employer_identification_number = Useful::class::ein($tenant->employer_identification_number);
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
            $tenant->social_reason = $data['social_reason'];
            $tenant->fancy_name = $data['fancy_name'];
            $tenant->zip_code = $data['zip_code'];
            $tenant->address = $data['address'];
            $tenant->house_number = $data['house_number'];
            $tenant->complement = $data['complement'];
            $tenant->neighborhood = $data['neighborhood'];
            $tenant->city = $data['city'];
            $tenant->state = $data['state'];
            $tenant->dceu = $data['dceu'];
            $tenant->website = $data['website'];
            $tenant->email = $data['email'];
            $tenant->telephone = $data['telephone'];
            $tenant->cell_phone = $data['cell_phone'];
            $tenant->whatsapp = $data['whatsapp'];
            $tenant->telegram = $data['telegram'];
            $tenant->facebook = $data['facebook'];
            $tenant->instagram = $data['instagram'];
            $tenant->twitter = $data['twitter'];
            $tenant->linkedin = $data['linkedin'];
            $tenant->employer_identification_number = $data['employer_identification_number'];
            $tenant->state_registration = $data['state_registration'];
            $tenant->municipal_registration = $data['municipal_registration'];
            $tenant->opening_date = $data['opening_date'];
            $tenant->note = $data['note'];

            $tenant->save();

            db::commit();
            return redirect()->route('tenants.index')->with('alert', 'update-ok');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' ' . __('tenant') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('tenants.update', ['tenant' => $id])->with('alert', 'errors');
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
            $error = __('Failed to delete') . ' ' . __('tenant') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('tenants.index')->with('alert', 'errors');
        }
    }
}
