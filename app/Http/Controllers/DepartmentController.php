<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title =  __('List of departments');
        $reference = __('department');
        $userAuth = Auth()->User();
        $departments = Department::orderBy('description','asc')->get();
        return view('departments.index', compact('title', 'reference', 'userAuth', 'departments'));
    }

    public function create()
    {
        $title =  __('New department registration');
        $reference = __('department');
        $userAuth = Auth()->User();
        return view('departments.create', compact('title', 'reference', 'userAuth'));
    }

    public function store(DepartmentRequest $request)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            Department::create($data);
            db::commit();
            $message = 'lala';

            return redirect()->route('departments.index')->with('alert', 'store-ok', $message);
        } catch (\Exception $exception) {
            db::rollBack();
            return 'Mensagem: ' . $exception->getMessage();
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
            $reference = __('department');
            $userAuth = Auth()->User();
            return view('departments.edit', compact('title', 'reference', 'userAuth', 'department'));
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
            return redirect()->route('departments.index')->with('alert', 'update-ok');
        } catch (\Exception $exception) {
            db::rollBack();
            return 'Mensagem: ' . $exception->getMessage();
        }
    }

    public function suspend($id)
    {
        db::beginTransaction();
        try {
            $department = Department::find($id);
            //$department->description = $data['description'];
            $department->save();

            db::commit();
            return redirect()->route('departments.index')->with('alert', 'update-ok');
        } catch (\Exception $exception) {
            db::rollBack();
            return 'Mensagem: ' . $exception->getMessage();
        }
    }

    public function destroy($id)
    {
        db::beginTransaction();
        try {
            $department = Department::find($id);
            if ($department) {
                $department->delete();
                db::commit();
                return redirect()->route('departments.index')->with('alert', 'destroy-ok');
            }
        } catch (\Exception $exception) {
            db::rollBack();
            return 'Mensagem: ' . $exception->getMessage();
        }
    }
}
