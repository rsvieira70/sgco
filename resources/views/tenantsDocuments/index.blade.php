@extends('_Partials.index')
@section('head-complement')
    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="callout callout-info">
        <h5><i class="fas fa-info"></i>{{$tenants->fancy_name }}</h5>
        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
    </div>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('tenantDocuments.create') }}" class="btn btb-sm btn-success"><i class="fas fa-file-import"></i>
                {{ __('New document') }}</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('Code') }}</th>
                        <th class="text-left">{{ __('Description') }}</th>
                        <th class="text-left">{{ __('Document') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenantDocuments as $tenantDocument)
                        <tr>
                            <td class="text-right">{{ $tenantDocument->id }}</td>
                            <td>{{ $tenantDocument->description }}</td>
                            <td>{{ $tenantDocument->document }}</td>
                            <td class="text-right">
                                <a href="{{ route('tenantDocuments.show', $tenantDocument->id) }}" class="btn btn-xs btn-primary "><i class="far fa-eye"></i> {{ __('View') }}</a>
                                <form action="{{ route('tenantDocuments.destroy', [$tenantDocument->id]) }}" class="d-inline formDelete" method="POST">
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
    <script src="{{ asset('jquery/jquery.datatable/jquery.simple.datatable.js') }}"></script>
@endsection;
