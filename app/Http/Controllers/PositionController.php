<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\PositionRequest;
use App\Notifications\SystemErrorAlert;
use RealRashid\SweetAlert\Facades\Alert;

class PositionController extends Controller
{
    public function index()
    {
        $title =  __('List of positions');
        $userAuth = Auth()->User();
        $positions = Position::orderBy('description','asc')->get();
        return view('positions.index', compact('title', 'userAuth', 'positions'));
    }

    public function create()
    {
        $title =  __('New position registration');
        $userAuth = Auth()->User();
        return view('positions.create', compact('title', 'userAuth'));
    }

    public function store(PositionRequest $request)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            Position::create($data);
            db::commit();
            Alert::alert()->success(__('Included'), __('Position') . __(' successfully added!'));
            return redirect()->route('positions.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' '. __('position');
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('positions.index');
        }
    }

    public function show(Position $position)
    {
        //
    }

    public function edit($id)
    {
        $position = Position::find($id);
        if ($position) {
            $title =  __('Position update');
            $userAuth = Auth()->User();
            return view('positions.edit', compact('title', 'userAuth', 'position'));
        }
        return redirect()->route('positions.index');
    }

    public function update(PositionRequest $request, $id)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            $position = Position::find($id);
            $position->description = $data['description'];
            $position->save();
            db::commit();
            Alert::alert()->success(__('Changed'), __('Position') . __(' successfully changed!'));
            return redirect()->route('positions.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' '. __('position') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('positions.index');
        }
    }

    public function suspend($id)
    {
        db::beginTransaction();
        try {
            $position = Position::find($id);
            if($position->suspended == null){
                $position->suspended = 1;
            }else{
                $position->suspended = null;
            }
            $position->save();

            db::commit();
            if ($position->suspended == null) {
                Alert::alert()->success(__('Reactivated'), __('Position') . __(' successfully reactivated!'));
            } else {
                Alert::alert()->success(__('Suspended'), __('Positionn') . __(' successfully suspended!'));
            }
            return redirect()->route('positions.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to suspend') . ' '. __('position') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('positions.index');
        }
    }

    public function destroy($id)
    {
        db::beginTransaction();
        try {
            $position = Position::findOrFail($id);
            if ($position) {
                $position->delete();
                db::commit();
                Alert::alert()->success(__('Excluded'), __('Position') . __(' successfully deleted!'));
                return redirect()->route('positions.index');
            }
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to delete') . ' '. __('position') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('positions.index');
        }
    }
}
