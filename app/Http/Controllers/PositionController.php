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
            return redirect()->route('positions.create')->with('alert', 'errors');
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
            $reference = __('position');
            $userAuth = Auth()->User();
            return view('positions.edit', compact('title', 'reference', 'userAuth', 'position'));
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
            return redirect()->route('positions.index')->with('alert', 'update-ok');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' '. __('position') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('positions.update')->with('alert', 'errors');
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
            return redirect()->route('positions.index')->with('alert', 'update-ok');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to suspend') . ' '. __('position') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('positions.index')->with('alert', 'errors');
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
                return redirect()->route('positions.index')->with('alert', 'destroy-ok');
            }
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to delete') . ' '. __('position') . ' -> ' . __('Key' ) . ' ' . $id;
            $users = User::whereIn('user_type',['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            return redirect()->route('positions.index')->with('alert', 'errors');
        }
    }
}
