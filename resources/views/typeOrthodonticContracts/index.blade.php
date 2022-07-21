@extends('_Partials.index')
@section('head-complement')
    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('typeOrthodonticContracts.create') }}" class="btn btb-sm btn-success"><i class="fas fa-file-contract"></i>
                {{ __('New type orthodontic contracts') }}</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('Code') }}</th>
                        <th class="text-left">{{ __('Types orthodontic contract') }}</th>
                        <th class="text-center">{{ __('Status') }}</th>
                        <th class="text-right">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($typeOrthodonticContracts as $typeOrthodonticContract)
                        <tr>
                            <td class="text-right">{{ $typeOrthodonticContract->id }}</td>
                            <td>{{ $typeOrthodonticContract->description }}</td>
                            @if ($typeOrthodonticContract->suspended !== null)
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
                                @if ($typeOrthodonticContract->suspended == null)
                                    <form action="{{ route('typeOrthodonticContracts.suspend', [$typeOrthodonticContract->id]) }}" class="d-inline formSuspend" method="POST">
                                        @method ('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-warning"><i class="fas fa-lock"></i>
                                            {{ __('Suspend') }}</button>
                                    </form>
                                @else
                                    <form action="{{ route('typeOrthodonticContracts.suspend', [$typeOrthodonticContract->id]) }}" class="d-inline formReactivate" method="POST">
                                        @method ('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-lock-open"></i> {{ __('Reactivate') }}</button>
                                    </form>
                                @endif
                                <a href="{{ route('typeOrthodonticContracts.edit', [$typeOrthodonticContract->id]) }}" class="btn btn-sm btn-info "><i class="fas fa-pencil-alt"></i>
                                    {{ __('Edit') }}</a>
                                <form action="{{ route('typeOrthodonticContracts.destroy', [$typeOrthodonticContract->id]) }}" class="d-inline formDelete" method="POST">
                                    @method ('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('jquery/jquery.datatable/jquery.simple.datatable.js') }}"></script>
@endsection
