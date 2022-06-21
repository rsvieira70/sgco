@extends('_Partials.index')
@section('head-complement')
    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('tenants.create') }}" class="btn btb-sm btn-success"><i class="fas fa-industry"></i>
                {{ __('New tenant') }}</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('Code') }}</th>
                        <th class="text-left">{{ __('Social reason') }}</th>
                        <th class="text-left">{{ __('Fancy name') }}</th>
                        <th class="text-center">{{ __('Status') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr>
                            <td class="text-right">{{ $tenant->id }}</td>
                            <td>{{ $tenant->social_reason }}</td>
                            <td>{{ $tenant->fancy_name }}</td>
                            @if ($tenant->suspension_date !== null)
                                <td class="text-center">
                                    <span class="badge badge-danger"><i class="fas fa-lock"></i>{{ __('Suspended in') }}{{ date('d/m/Y', strtotime($tenant->suspension_date)) }}</span>
                                </td>
                            @else
                                <td class="text-center">
                                    <span class="badge badge-success"><i class="fas fa-lock-open"></i>{{ __('Active') }}</span>
                                </td>
                            @endif
                            <td class="text-right">
                                <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-xs btn-primary "><i class="far fa-eye"></i> {{ __('View') }}</a>
                                @if ($tenant->suspension_date == null)
                                    <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-xs btn-info "><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>
                                    <form action="{{ route('tenants.suspend', $tenant->id) }}" class="d-inline formsuspend" method="POST">
                                        @method ('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-xs btn-warning"> <i class="fas fa-lock"></i> {{ __('Suspend') }}</button>
                                    </form>
                                @else
                                    <form action="{{ route('tenants.suspend', $tenant->id) }}" class="d-inline formReactivate" method="POST">
                                        @method ('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-xs btn-success"><i class="fas fa-lock-open"></i> {{ __('Reactivate') }}</button>
                                    </form>
                                @endif
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
    <script src="{{ asset('jquery/jquery.datatable/jquery.simple.datatable.js') }}"></script>
@endsection;
