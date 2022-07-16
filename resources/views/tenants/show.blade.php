@extends('_Partials.index')
@section('head-complement')
    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@endsection
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-edit"></i>
                                        {{ __('Information') }}
                                    </h3>
                                </div>
                                <div class="card-body box-profile">
                                    @if ($tenant->suspension_date !== null)
                                        <div class="ribbon-wrapper ribbon-lg">
                                            <div class="ribbon bg-danger">
                                                {{ __('Tenant suspended in') }}
                                                {{ date('d/m/Y', strtotime($tenant->suspension_date)) }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="ribbon-wrapper ribbon-xl">
                                            <div class="ribbon bg-success">
                                                {{ __('Tenant active') }}
                                            </div>
                                        </div>
                                    @endif

                                    <b> {{ __('Social reason') }}:</b> {{ $tenant->social_reason }}<br>
                                    <b> {{ __('Fancy name') }}:</b> {{ $tenant->fancy_name }} <br>
                                    <b>{{ __('Opening date') }}:</b>
                                    {{ date('d/m/Y', strtotime($tenant->opening_date)) }}<br>
                                    <b>{{ __('Employer identification number') }}:</b>
                                    {{ $tenant->employer_identification_number }}<br>
                                    <b>{{ __('State registration') }}:</b> {{ $tenant->state_registration }}<br>
                                    <b>{{ __('Municipal registration') }}:</b> {{ $tenant->municipal_registration }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="fas fa-edit"></i>
                                                {{ __('Correspondence') }}
                                            </h3>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <div class="row invoice-info">
                                                        <div class="col-sm-4 invoice-col">
                                                            <strong>{{ __('Address') }}</strong><br>
                                                            {{ $tenant->address }} {{ $tenant->house_number }} {{ $tenant->complement }} <br>
                                                            {{ $tenant->neighborhood }} <br>
                                                            {{ $tenant->city }} {{ $tenant->state }}
                                                            {{ $tenant->zip_code }}<br>
                                                            <b>{{ __('DCEU') }}</b> {{ $tenant->dceu }}
                                                        </div>
                                                        <div class="col-sm-3 invoice-col">
                                                            <strong>{{ __('Phones') }}</strong><br>
                                                            <i class="fas fa-phone-square-alt"></i> {{ $tenant->telephone }}<br>
                                                            <i class="fas fa-mobile-alt"></i> {{ $tenant->cell_phone }}<br>
                                                            <i class="fab fa-whatsapp-square"></i> {{ $tenant->whatsapp }}<br>
                                                            <i class="fab fa-telegram"></i> {{ $tenant->telegram }}<br>
                                                        </div>
                                                        <div class="col-sm-4 invoice-col">
                                                            <strong>{{ __('Social media') }}</strong><br>
                                                            <i class="fab fa-facebook-square"></i> {{ $tenant->facebook }}<br>
                                                            <i class="fab fa-instagram-square"></i> {{ $tenant->instagram }}<br>
                                                            <i class="fab fa-twitter-square"></i> {{ $tenant->twitter }}<br>
                                                            <i class="fab fa-linkedin"></i> {{ $tenant->linkedin }}<br>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 invoice-col">
                                                            <b>{{ __('Website') }}:</b> {{ $tenant->website }}
                                                        </div>
                                                        <div class="col-sm-4 invoice-col">
                                                            <b>{{ __('Email') }}:</b> {{ $tenant->email }}
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="fas fa-edit"></i>
                                                {{ __('Responsible') }}
                                            </h3>
                                        </div>
                                        <div class="card-body pad table-responsive">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card card-widget widget-user shadow">
                                                        <div class="widget-user-header bg-info">
                                                            @if ($administrative !== null)
                                                                <h3 class="widget-user-username">{{ $administrative->name }}</h3>
                                                            @else
                                                                <h3 class="widget-user-username">{{ __('Undefined') }}</h3>
                                                            @endif
                                                            <h5 class="widget-user-desc">{{ __('Administrative responsible') }}</h5>
                                                        </div>
                                                        @php
                                                            $pathImage = url('AdminLTE/dist/img/noImagePessoa.png');
                                                            if ($administrative !== null) {
                                                                if ($administrative->image) {
                                                                    $pathImage = url("storage/tenants/{$tenant->uuid}/users/{$administrative->image}");
                                                                }
                                                            }
                                                        @endphp
                                                        <div class="widget-user-image">
                                                            <img class="img-circle elevation-2" src="{{ $pathImage }}" alt="User Avatar">
                                                        </div>
                                                        @if ($administrative !== null)
                                                            <div class="card-footer">
                                                                <div class="row">
                                                                    <div class="col-sm-4 border-right">
                                                                        <div class="description-block">
                                                                            <span class="description-text">{{ __('Department') }}</span>
                                                                            <h5 class="description-header">
                                                                                {{ $administrative->department->description }}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 border-right">
                                                                        <div class="description-block">
                                                                            <span class="description-text">{{ __('Position') }}</span>
                                                                            <h5 class="description-header">
                                                                                {{ $administrative->position->description }}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="description-block">
                                                                            <span class="description-text">{{ __('Alert') }}</span>
                                                                            @if ($administrative->suspension_date !== null)
                                                                                <h5 class="description-header">
                                                                                    {{ __('User suspended in') }}{{ date('d/m/Y', strtotime($administrative->suspension_date)) }}
                                                                                </h5>
                                                                            @else
                                                                                <h5 class="description-header">
                                                                                    {{ __('User active') }}</h5>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="small-box bg-info">
                                                                <a href="{{ route('users.show', $administrative->id) }}" class="small-box-footer">{{ __('More information') }} <i
                                                                        class="fas fa-arrow-circle-right"></i></a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card card-widget widget-user shadow">
                                                        <div class="widget-user-header bg-success">
                                                            @if ($professional !== null)
                                                                <h3 class="widget-user-username">{{ $professional->patent->name }} {{ $professional->name }}</h3>
                                                            @else
                                                                <h3 class="widget-user-username">{{ __('Undefined') }}</h3>
                                                            @endif
                                                            <h5 class="widget-user-desc">{{ __('Responsible dentist') }}</h5>
                                                        </div>
                                                        @php
                                                            $pathImage = url('AdminLTE/dist/img/noImagePessoa.png');
                                                            if ($professional !== null) {
                                                                if ($professional->image) {
                                                                    $pathImage = url("storage/tenants/{$tenant->uuid}/professionals/{$professional->image}");
                                                                }
                                                            }
                                                        @endphp
                                                        <div class="widget-user-image">
                                                            <img class="img-circle elevation-2" src="{{ $pathImage }}" alt="User Avatar">
                                                        </div>
                                                        @if ($professional !== null)
                                                            <div class="card-footer">
                                                                <div class="row">
                                                                    <div class="col-sm-4 border-right">
                                                                        <div class="description-block">
                                                                            <span class="description-text">{{ __('Council') }}</span>
                                                                            <h5 class="description-header">
                                                                                {{ $professional->Council->short_name }}-{{ $professional->council_number }}/{{ $professional->State->initials }}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 border-right">
                                                                        <div class="description-block">
                                                                            <span class="description-text">{{ __('Specialty') }}</span>
                                                                            <h5 class="description-header">
                                                                                {{ $professional->specialty->description }}
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="description-block">
                                                                            <span class="description-text">{{ __('Alert') }}</span>
                                                                            @if ($administrative->suspension_date !== null)
                                                                                <h5 class="description-header">
                                                                                    {{ __('User suspended in') }}{{ date('d/m/Y', strtotime($administrative->suspension_date)) }}
                                                                                </h5>
                                                                            @else
                                                                                <h5 class="description-header">{{ __('Professional active') }}</h5>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="small-box bg-success">
                                                                <a href="{{ route('professionals.show', $professional->id) }}" class="small-box-footer">{{ __('More information') }} <i
                                                                        class="fas fa-arrow-circle-right"></i></a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="fas fa-edit"></i>
                                                {{ __('Documents') }}
                                            </h3>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <div class="card-body">
                                                <table id="datatable" class="table table-striped dt-responsive nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-left">{{ __('Description') }}</th>
                                                            <th class="text-left">{{ __('File Name') }}</th>
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
                                                                    <a href="{{ route('professionals.show', $tenantDocument->id) }}" class="btn btn-sm btn-primary "><i class="far fa-eye"></i>
                                                                        {{ __('View') }}</a>
                                                                    <form action="{{ route('professionals.destroy', [$tenantDocument->id]) }}" class="d-inline formDelete" method="POST">
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
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-danger card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="fas fa-edit"></i>
                                                {{ __('Note') }}
                                            </h3>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                                        {{ $tenant->note }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-print">
            <div class="col-12">
                <a href="{{ url()->previous() }}" class="btn btb-sm btn-danger"><i class="fas fa-arrow-circle-left"></i>
                    {{ __('Go back') }}</a>
            </div>
        </div>
    </section>
@endsection;
@section('java-complement')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('jquery/jquery.datatable/jquery.simple.datatable.js') }}"></script>
@endsection;
