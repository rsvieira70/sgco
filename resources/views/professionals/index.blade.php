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
            <a href="{{ route('professionals.create') }}" class="btn btb-sm btn-success"><i class="fas fa-user-md"></i>
                {{ __('New professional') }}</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped dt-responsive nowrap" style="width:100%">
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
                    @foreach ($professionals as $professional)
                        <tr>
                            <td class="text-right">{{ $professional->id }}</td>
                            @php
                                $pathImage = url('AdminLTE/dist/img/noImagePessoa.png');
                                if ($professional->image) {
                                    $pathImage = url("storage/tenants/{$professional->Tenant->uuid}/professionals/{$professional->image}");
                                }
                            @endphp
                            <td class="text-center">
                                <img class="direct-chat-img" src="{{ $pathImage }}" alt={{ __('Professional Image') }}>
                            </td>
                            <td>{{ $professional->name }}<br>
                                @if ($professional->responsible_dentist !== null)
                                    <i class="fas fa-hand-point-right"></i>
                                    <small> {{ __('Responsible dentist') }}</small>
                                @endif
                            </td>
                            <td>{{ $professional->email }}</td>
                            @if ($professional->suspension_date !== null)
                                <td class="text-center">
                                    <span class="badge badge-danger"><i class="fas fa-user-lock"></i>
                                        {{ __('Suspended in') }}
                                        {{ date('d/m/Y', strtotime($professional->suspension_date)) }}</span>
                                </td>
                            @else
                                <td class="text-center">
                                    <span class="badge badge-success"><i class="fas fa-user-check"></i>
                                        {{ __('Active') }}
                                    </span>
                                </td>
                            @endif
                            <td class="text-right">
                                @if ($professional->suspension_date == null)
                                    <a href="{{ route('professionals.show', $professional->id) }}" class="btn btn-sm btn-primary "><i class="far fa-eye"></i> {{ __('View') }}</a>
                                    <a href="{{ route('professionals.edit', $professional->id) }}" class="btn btn-sm btn-info "><i class="fas fa-pencil-alt"></i> {{ __('Edit') }}</a>
                                    <form action="{{ route('professionals.suspend', $professional->id) }}" class="d-inline formsuspend" method="POST">
                                        @method ('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-warning"> <i class="fas fa-user-lock"></i> {{ __('Suspend') }}</button>
                                    </form>
                                @else
                                    <a href="{{ route('professionals.show', $professional->id) }}" class="btn btn-sm btn-primary "><i class="far fa-eye"></i>{{ __('View') }}</a>
                                    <form action="{{ route('professionals.suspend', $professional->id) }}" class="d-inline formReactivate" method="POST">
                                        @method ('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-user-check"></i> {{ __('Reactivate') }}</button>
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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('jquery/jquery.datatable/jquery.simple.datatable.js') }}"></script>
@endsection;
