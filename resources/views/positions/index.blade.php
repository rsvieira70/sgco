@extends('_Partials.index')
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('positions.create') }}" class="btn btb-sm btn-success"><i class="fas fa-building"></i> Novo Cargo</a>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">Código</th>
                    <th class="text-left">Cargo</th>
                    <th class="text-center">Status</th>
                    <th class="text-right">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($positionss as $position)
                <tr>
                    <td class="text-right">{{$position->id}}</td>
                    <td>{{$position->description}}</td>
                    @if($position->suspended !== null)
                        <td class="text-center">
                            <span class="badge badge-danger"><i class="fas fa-lock"></i> Suspenso</span>
                        </td>
                    @else
                        <td class="text-center">
                            <span class="badge badge-success"><i class="fas fa-check"></i> Ativo</span>
                        </td>
                    @endif
                    <td class="text-right">
                        @if($position->suspended == null)
                            <form action="{{route('positions.suspend', [$position->id]) }}" class="d-inline formulario-eliminar" method="POST">
                                @method ('PUT')
                                @csrf
                                <button type="submit" class="btn btn-xs btn-warning"><i class="fas fa-lock"></i> Suspender</button>
                            </form>
                        @else
                            <form action="{{route('positions.suspend', [$position->id]) }}" class="d-inline formulario-eliminar" method="POST">
                                @method ('PUT')
                                @csrf
                                <button type="submit" class="btn btn-xs btn-success"><i class="fas fa-lock-open"></i> Ativar</button>
                            </form>
                        @endif
                        <a href="{{ route('positions.edit', [$position->id]) }}" class="btn btn-xs btn-info "><i class="fas fa-pencil-alt"></i> Editar</a>
                        <form action="{{route('positions.destroy', [$position->id]) }}" class="d-inline formulario-eliminar" method="POST">
                            @method ('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection;
