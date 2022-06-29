@extends('_Partials.index')
@section('head-complement')
    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('professionals.create') }}" class="btn btb-sm btn-success"><i class="fas fa-user-tie"></i>
                {{ __('New professional') }}</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('Code') }}</th>
                        <th class="text-center">{{ __('Photo') }}</th>
                        <th class="text-left">{{ __('Name') }}</th>
                        <th class="text-left">{{ __('Email') }}</th>
                        <th class="text-center">{{ __('Status') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($professionals as $profissional)
                        <tr>
                            <td class="text-right">{{ $profissional->id }}</td>
                            @php
                                $pathImage = url('AdminLTE/dist/img/noImagePessoa.png');
                                if ($user->image) {
                                    $pathImage = url("storage/tenants/{$profissional->Tenant->uuid}/users/{$profissional->image}");
                                }
                            @endphp
                            <td class="text-center">
                                <img class="direct-chat-img" src="{{ $pathImage }}" alt={{ __('Professional Image') }}>
                            </td>
                            <td>{{ $profissional->name }}<br>
                                <small>{{ __('Master') }}</small>
                                @if ($profissional->responsible_dentist !== null)
                                    <i class="fas fa-hand-point-right"></i>
                                    <small> {{ __('Responsible dentist') }}</small>
                                @endif
                            </td>
                            <td>{{ $profissional->email }}</td>
                            @if ($profissional->suspension_date !== null)
                                <td class="text-center">
                                    <span class="badge badge-danger"><i class="fas fa-user-lock"></i>
                                        {{ __('Suspended in') }}
                                        {{ date('d/m/Y', strtotime($profissional->suspension_date)) }}</span>
                                </td>
                            @else
                                <td class="text-center">
                                    <span class="badge badge-success"><i class="fas fa-user-check"></i>
                                        {{ __('Active') }}
                                    </span>
                                </td>
                            @endif
                            <td class="text-right">
                                @if ($profissional->suspension_date == null)
                                    <a href="{{ route('profissionals.show', $profissional->id) }}" class="btn btn-xs btn-primary "><i class="far fa-eye"></i> {{ __('View') }}</a>
                                    <a href="{{ route('profissionals.edit', $user->id) }}" class="btn btn-xs btn-info "><i class="fas fa-pencil-alt"></i>
                                        {{ __('Edit') }}</a>
                                    <form action="{{ route('users.suspend', $profissional->id) }}" class="d-inline formsuspend" method="POST">
                                        @method ('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-xs btn-warning"> <i class="fas fa-user-lock"></i> {{ __('Suspend') }}</button>
                                    @else
                                        <a href="{{ route('profissionals.show', $profissional->id) }}" class="btn btn-xs btn-primary "><i class="far fa-eye"></i>{{ __('View') }}</a>
                                        <form action="{{ route('profissionals.suspend', $profissional->id) }}" class="d-inline formReactivate" method="POST">
                                            @method ('PATCH')
                                            @csrf
                                            <button type="submit" class="btn btn-xs btn-success"><i class="fas fa-user-check"></i> {{ __('Reactivate') }}</button>
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
