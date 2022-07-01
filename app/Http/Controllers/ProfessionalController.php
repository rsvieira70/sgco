<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessionalRequest;
use App\Models\Professional;
use App\Models\Specialty;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\SystemErrorAlert;


class ProfessionalController extends Controller
{
    public function index()
    {
        $title =  __('List of professionals');
        $userAuth = Auth()->User();
        $professionals = Professional::orderBy('name', 'asc')->get();
        return view('professionals.index', compact('title', 'userAuth', 'professionals'));
    }
    
    public function create()
    {
        $title =  __('New professional registration');
        $userAuth = Auth()->User();
        $states = State::orderBy('description', 'asc')->get();
        $specialties = Specialty::orderBy('description', 'asc')->get();
        return view('professionals.create', compact('title', 'userAuth', 'states', 'specialties'));
    }
    
    public function store(ProfessionalRequest $request)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            Professional::create($data);
            db::commit();
            Alert::alert()->success(__('Included'), __('Professional') . __(' successfully added!'));
            return redirect()->route('professionals.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' ' . __('professional');
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('professionals.index');
        }
    }
    
    public function show($id)
    {
        //
    }

}
