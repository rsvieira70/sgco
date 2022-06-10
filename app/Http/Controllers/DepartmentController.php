<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\DepartmentRequest;
use App\Notifications\SystemErrorAlert;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    public function index()
    {
        $title =  __('List of departments');
        $userAuth = Auth()->User();
        $departments = Department::orderBy('description', 'asc')->get();
        return view('departments.index', compact('title', 'userAuth', 'departments'));
    }

    public function create()
    {
        $title =  __('New department registration');
        $userAuth = Auth()->User();
        return view('departments.create', compact('title', 'userAuth'));
    }

    public function store(DepartmentRequest $request)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            Department::create($data);
            db::commit();
            Alert::alert()->success(__('Included'), __('Department') . __(' successfully added!'));
            return redirect()->route('departments.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to include') . ' ' . __('department');
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('departments.index');
        }
    }

    public function show(Department $department)
    {
        //
    }

    public function edit($id)
    {
        $department = Department::find($id);
        if ($department) {
            $title =  __('Department update');
            $userAuth = Auth()->User();
            return view('departments.edit', compact('title', 'userAuth', 'department'));
        }
        return redirect()->route('departments.index');
    }

    public function update(DepartmentRequest $request, $id)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            $department = Department::find($id);
            $department->description = $data['description'];
            $department->save();

            db::commit();
            Alert::alert()->success(__('Changed'), __('Department') . __(' successfully changed!'));
            return redirect()->route('departments.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to change') . ' ' . __('department') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('departments.index');
        }
    }

    public function suspend($id)
    {
        db::beginTransaction();
        try {
            $department = Department::findOrFail($id);
            if ($department->suspended == null) {
                $department->suspended = 1;
            } else {
                $department->suspended = null;
            }
            $department->save();
            db::commit();
            if ($department->suspended == null) {
                Alert::alert()->success(__('Reactivated'), __('Department') . __(' successfully reactivated!'));
            } else {
                Alert::alert()->success(__('Suspended'), __('Department') . __(' successfully suspended!'));
            }
            return redirect()->route('departments.index');
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to suspend') . ' ' . __('department') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('departments.index');
        }
    }

    public function destroy($id)
    {
        db::beginTransaction();
        try {
            $department = Department::findOrFail($id);
            if ($department) {
                $department->delete();
                db::commit();
                Alert::alert()->success(__('Excluded'), __('Department') . __(' successfully deleted!'));
                return redirect()->route('departments.index');
            }
        } catch (\Exception $exception) {
            $exception = $exception->getMessage();
            db::rollBack();
            $error = __('Failed to delete') . ' ' . __('department') . ' -> ' . __('Key') . ' ' . $id;
            $users = User::whereIn('user_type', ['1'])->get();
            Notification::send($users, new SystemErrorAlert($error, $exception));
            Alert::alert()->error(__('Opps! An internal error occurred.'), __('Your request could not be executed!'))
                ->footer(__("Don't worry, we've already warned the developer."))
                ->showConfirmButton(__('Ok'), '#d33');
            return redirect()->route('departments.index');
        }
    }
}
