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
        $title = 'Relação de Departamentos';
        $reference = 'departamento';
        $userAuth = Auth()->User();
        $departments = Department::orderBy('description','asc')->get();
        return view('departments.index', [
            'title' => $title,
            'reference' => $reference,
            'userAuth' => $userAuth,
            'departments' => $departments
        ]);
    }

    public function create()
    {
        $title = 'Cadastro de novo departamento';
        $reference = 'departamento';
        $userAuth = Auth()->User();
        return view('departments.create', [
            'title' => $title,
            'reference' => $reference,
            'userAuth' => $userAuth
        ]);
    }

    public function store(DepartmentRequest $request)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            Department::create($data);
            db::commit();
            return redirect()->route('departments.index')->with('alert', 'store-ok');
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
            $title = 'Alteração de Departamento';
            $reference = 'departamento';
            $userAuth = Auth()->User();
            return view('departments.edit', [
                'title' => $title,
                'reference' => $reference,
                'userAuth' => $userAuth,
                'department' => $department
            ]);
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
            $department->description = $data['description'];
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
