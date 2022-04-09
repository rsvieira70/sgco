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
        $title = __('List of positions');;
        $reference = __('position');;
        $userAuth = Auth()->User();
        $positions = Position::orderBy('description','asc')->get();
        return view('positions.index', compact('title', 'reference', 'userAuth', 'positions'));
    }

    public function create()
    {
        $title =  __('New position registration');
        $reference = __('position');
        $userAuth = Auth()->User();
        return view('positions.create', compact('title', 'reference', 'userAuth'));
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
