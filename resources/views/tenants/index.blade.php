@extends('_Partials.index')
@section('head-complement')
    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('tenants.create') }}" class="btn btb-sm btn-success"><i class="fas fa-user-plus"></i>
                {{ __('New tenant') }}</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('Code') }}</th>
                        <th class="text-left">{{ __('Social reason') }}/{{ __('Fancy name') }}</th>
                        <th class="text-left">{{ __('Administrative responsibility') }}</th>
                        <th class="text-center">{{ __('Status') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr>
                            <td class="text-right">{{ $tenant->id }}</td>
                            <td>{{ $tenant->social_reason }}<br>
                                <small>{{ $tenant->fancy_name }}</small>
                            </td>
                            <td>{{ $tenant->administrative_responsibility }}</td>
                            @if ($tenant->suspension_date !== null)
                                <td class="text-center">
                                    <span class="badge badge-danger"><i class="fas fa-user-lock"></i>
                                        {{ __('Suspended in') }}
                                        {{ date('d/m/Y', strtotime($tenant->suspension_date)) }}</span>
                                </td>
                            @else
                                <td class="text-center">
                                    <span class="badge badge-success"><i class="fas fa-user-check"></i>
                                        {{ __('Active') }}
                                    </span>
                                </td>
                            @endif
                            @if ($userAuth->user_type == 1)
                                <td class="text-right">
                                    @if ($tenant->suspension_date == null)
                                        <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-xs btn-primary "><i
                                                class="far fa-eye"></i> {{ __('View') }}</a>
                                        
                                        <a href="{{ route('tenants.edit', $tenant->id) }}"
                                            class="btn btn-xs btn-info "><i class="fas fa-pencil-alt"></i>
                                            {{ __('Edit') }}</a>
                                    
                                    
                                        <form action="{{ route('tenants.suspend', $tenant->id) }}"
                                            class="d-inline formsuspend" method="POST">
                                            @method ('PATCH')
                                            @csrf
                                            <button type="submit" class="btn btn-xs btn-warning"> <i
                                                    class="fas fa-user-lock"></i> {{ __('Suspend') }}</button>
                                        </form>
                                    @endif
                                    <!-- <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-xs btn-primary "><i class="fas fa-id-card"></i> Perfil</a>
                                                                                    <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-xs btn-primary "><i class="fas fa-tasks"></i> Permissões</a>
                                                                                -->
                                </td>
                            @endif
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
