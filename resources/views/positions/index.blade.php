@extends('_Partials.index')
@section('head-complement')
    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('positions.create') }}" class="btn btb-sm btn-success"><i class="fas fa-building"></i>
                {{ __('New position') }}</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('Code') }}</th>
                        <th class="text-left">{{ __('Position') }}</th>
                        <th class="text-center">{{ __('Status') }}</th>
                        <th class="text-right">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($positions as $position)
                        <tr>
                            <td class="text-right">{{ $position->id }}</td>
                            <td>{{ $position->description }}</td>
                            @if ($position->suspended !== null)
                                <td class="text-center">
                                    <span class="badge badge-danger"><i class="fas fa-lock"></i>
                                        {{ __('Suspended') }}</span>
                                </td>
                            @else
                                <td class="text-center">
                                    <span class="badge badge-success"><i class="fas fa-check"></i>
                                        {{ __('Active') }}</span>
                                </td>
                            @endif
                            <td class="text-right">
                                @if ($position->suspended == null)
                                    <form action="{{ route('positions.suspend', [$position->id]) }}"
                                        class="d-inline formSuspend" method="POST">
                                        @method ('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-xs btn-warning"><i class="fas fa-lock"></i>
                                            {{ __('Suspend') }}</button>
                                    </form>
                                @else
                                    <form action="{{ route('positions.suspend', [$position->id]) }}"
                                        class="d-inline formSuspend" method="POST">
                                        @method ('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-xs btn-success"><i
                                                class="fas fa-lock-open"></i> {{ __('Reactivate') }}</button>
                                    </form>
                                @endif
                                <a href="{{ route('positions.edit', [$position->id]) }}" class="btn btn-xs btn-info "><i
                                        class="fas fa-pencil-alt"></i> {{ __('Edit') }}</a>
                                <form action="{{ route('positions.destroy', [$position->id]) }}"
                                    class="d-inline formDelete" method="POST">
                                    @method ('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i>
                                        {{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection;
@section('java-complement')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('jquery/jquery-datatable/jquery.simple.datatable.js') }}"></script>
@endsection
