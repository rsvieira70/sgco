@extends('_Partials.index')
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('departments.create') }}" class="btn btb-sm btn-success"><i class="fas fa-building"></i> {{ __('New department') }}</a>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">{{ __('Code') }}</th>
                    <th class="text-left">{{ __('Department') }}</th>
                    <th class="text-center">{{ __('Status') }}</th>
                    <th class="text-right">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $department)
                <tr>
                    <td class="text-right">{{$department->id}}</td>
                    <td>{{$department->description}}</td>
                    @if($department->suspended !== null)
                        <td class="text-center">
                            <span class="badge badge-danger"><i class="fas fa-lock"></i> {{ __('Suspended') }}</span>
                        </td>
                    @else
                        <td class="text-center">
                            <span class="badge badge-success"><i class="fas fa-check"></i> {{ __('Active') }}</span>
                        </td>
                    @endif
                    <td class="text-right">
                        @if($department->suspended == null)
                            <form action="{{route('departments.suspend', [$department->id]) }}" class="d-inline formulario-eliminar" method="POST">
                                @method ('PUT')
                                @csrf
                                <button type="submit" class="btn btn-xs btn-warning"><i class="fas fa-lock"></i> {{ __('Suspend') }}</button>
                            </form>
                        @else
                            <form action="{{route('departments.suspend', [$department->id]) }}" class="d-inline formulario-eliminar" method="POST">
                                @method ('PUT')
                                @csrf
                                <button type="submit" class="btn btn-xs btn-success"><i class="fas fa-lock-open"></i> {{ __('Activate') }}</button>
                            </form>
                        @endif
                        <a href="{{ route('departments.edit', [$department->id]) }}" class="btn btn-xs btn-info "><i class="fas fa-pencil-alt"></i> {{ __('Edit') }}</a>
                        <form action="{{route('departments.destroy', [$department->id]) }}" class="d-inline formulario-eliminar" method="POST">
                            @method ('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> {{ __('Delete') }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection;
