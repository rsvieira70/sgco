<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PositionRequest;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title = 'Relação de cargos';
        $reference = 'cargo';
        $userAuth = Auth()->User();
        $positions = Position::orderBy('description','asc')->get();
        return view('positions.index', [
            'title' => $title,
            'reference' => $reference,
            'userAuth' => $userAuth,
            'positions' => $positions,
        ]);
    }

    public function create()
    {
        $title = 'Cadastro de novo cargo';
        $reference = 'cargo';
        $userAuth = Auth()->User();
        return view('positions.create', [
            'title' => $title,
            'reference' => $reference,
            'userAuth' => $userAuth
        ]);
    }

    public function store(PositionRequest $request)
    {
        $data = $request->validated();
        db::beginTransaction();
        try {
            Position::create($data);
            db::commit();
            return redirect()->route('positions.index')->with('alert', 'store-ok');
        } catch (\Exception $exception) {
            db::rollBack();
            return 'Mensagem: ' . $exception->getMessage();
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
            $title = 'Alteração do cargo';
            $reference = 'cargo';
            $userAuth = Auth()->User();
            return view('positions.edit', [
                'title' => $title,
                'reference' => $reference,
                'userAuth' => $userAuth,
                'position' => $position
            ]);
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
            db::rollBack();
            return 'Mensagem: ' . $exception->getMessage();
        }
    }

    public function destroy($id)
    {
        db::beginTransaction();
        try {
            $position = Position::find($id);
            if ($position) {
                $position->delete();
                db::commit();
                return redirect()->route('positions.index')->with('alert', 'destroy-ok');
            }
        } catch (\Exception $exception) {
            db::rollBack();
            return 'Mensagem: ' . $exception->getMessage();
        }
    }
}
