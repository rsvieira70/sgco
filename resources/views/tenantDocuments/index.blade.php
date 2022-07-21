@extends('_Partials.index')
@section('head-complement')
    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection
@section('content')
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-industry"></i></span>
            <div class="info-box-content">
                <span class="info-box-number">{{ $tenant->fancy_name }}</span>
                <span class="info-box-text">{{ $tenant->city }}/{{ $tenant->state }} </span>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('tenantDocuments.create') }}" class="btn btb-sm btn-success"><i class="fa-solid fa-cloud-arrow-up"></i>
                {{ __('New document') }}</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-left">{{ __('Description') }}</th>
                        <th class="text-left">{{ __('File name') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tenantDocuments as $tenantDocument)
                        <tr>
                            <td class="text-right">{{ $tenantDocument->id }}</td>
                            <td class="text-left">{{ $tenantDocument->description }}</td>
                            <td class="text-left"><i class="{{ @strtolower($tenantDocument->document_type) }}"></i> {{ $tenantDocument->document }}</td>
                            <td class="text-right">
                                <a href="{{ route('tenantDocuments.show', $tenantDocument->id) }}" class="btn btn-sm btn-primary "><i class="fa-solid fa-cloud-arrow-down"></i> {{ __('Upload') }}</a>
                                <form action="{{ route('tenantDocuments.destroy', [$tenantDocument->id]) }}" class="d-inline formDelete" method="POST">
                                    @method ('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                                        {{ __('Delete') }}</button>
                                </form>
                            </td>
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
