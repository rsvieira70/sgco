@extends('_Partials.index')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">

                                    <b> {{ __('Social reason') }}:</b> {{ $tenant->social_reason }}<br>
                                    <b> {{ __('Fancy name') }}:</b> {{ $tenant->fancy_name }} <br>
                                    <b>{{ __('Opening date') }}:</b>
                                    {{ date('d/m/Y', strtotime($tenant->opening_date)) }}<br>
                                    <b>{{ __('Employer identification number') }}:</b>
                                    {{ $tenant->employer_identification_number }}<br>
                                    <b>{{ __('State registration') }}:</b> {{ $tenant->state_registration }}<br>
                                    <b>{{ __('Municipal registration') }}:</b> {{ $tenant->municipal_registration }}


                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>{{ __('Website') }}:</b> {{ $tenant->website }}<br>
                                            <b>{{ __('Email') }}:</b> {{ $tenant->email }}
                                        </li>
                                    </ul>
                                    @if ($tenant->suspension_date !== null)
                                        <div class="alert alert-danger alert-dismissible">
                                            <h5><i class="icon fas fa-ban"></i> {{ __('Alert') }}!</h5>
                                            {{ __('Tenant suspended in') }}
                                            {{ date('d/m/Y', strtotime($tenant->suspension_date)) }}
                                        </div>
                                    @else
                                        <div class="alert alert-success alert-dismissible">
                                            <h5><i class="icon fas fa-check"></i> {{ __('Alert') }}!</h5>
                                            {{ __('Tenant active') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#information" data-toggle="tab">{{ __('Informations') }}</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#responsible" data-toggle="tab">{{ __('Responsible') }}</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#documents" data-toggle="tab">{{ __('Documents') }}</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="information">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4>
                                                        <i class="fas fa-globe"></i> {{ __('Correspondence') }}
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="row invoice-info">
                                                <div class="col-sm-4 invoice-col">
                                                    <strong>{{ __('Address') }}</strong><br>
                                                    {{ $tenant->address }} {{ $tenant->house_number }}
                                                    {{ $tenant->complement }} <br>
                                                    {{ $tenant->neighborhood }} <br>
                                                    {{ $tenant->city }} {{ $tenant->state }}
                                                    {{ $tenant->zip_code }}<br>
                                                    <b>{{ __('DCEU') }}</b> {{ $tenant->dceu }}
                                                </div>
                                                <div class="col-sm-4 invoice-col">
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
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4>
                                                        <i class="far fa-file-alt mr-1"></i> {{ __('Note') }}
                                                    </h4>
                                                </div>
                                            </div>
                                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                                {{ $tenant->note }}
                                            </p>
                                        </div>

                                        <div class="tab-pane" id="responsible">
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
                                                                    $pathImage = url("storage/tenants/{$administrative->Tenant->uuid}/users/{$administrative->image}");
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
                                                            @if ($administrative !== null)
                                                                <h3 class="widget-user-username">{{ $administrative->name }}</h3>
                                                            @else
                                                                <h3 class="widget-user-username">{{ __('Undefined') }}</h3>
                                                            @endif
                                                            <h5 class="widget-user-desc">{{ __('Responsible dentist') }}</h5>
                                                        </div>
                                                        @php
                                                            $pathImage = url('AdminLTE/dist/img/noImagePessoa.png');
                                                            if ($administrative !== null) {
                                                                if ($administrative->image) {
                                                                    $pathImage = url("storage/tenants/{$administrative->Tenant->uuid}/users/{$administrative->image}");
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
                                                                                <h5 class="description-header">{{ __('User active') }}</h5>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="small-box bg-success">
                                                                <a href="{{ route('users.show', $administrative->id) }}" class="small-box-footer">{{ __('More information') }} <i
                                                                        class="fas fa-arrow-circle-right"></i></a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="documents">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
                                                    <ul class="list-unstyled">

                                                        @foreach ($tenant->tenantDocuments as $tenantDocument)
                                                            <li>
                                                                <a href="" class="btn-link text-secondary">
                                                                    @switch ($tenantDocument->type)
                                                                        @case ('PDF')
                                                                            <i class="fas fa-file-pdf"></i>
                                                                        @break

                                                                        @case ('DOC')
                                                                            <i class="fas fa-file-word"></i>
                                                                        @break

                                                                        @case ('DOCX')
                                                                            <i class="fas fa-file-word"></i>
                                                                        @break

                                                                        @case ('XLSX')
                                                                            <i class="fas fa-file-excel"></i>
                                                                        @break

                                                                        @case ('XLS')
                                                                            <i class="fas fa-file-excel"></i>
                                                                        @break

                                                                        @case ('PPT')
                                                                            <i class="fas fa-file-powerpoint"></i>
                                                                        @break

                                                                        @case ('BMP')
                                                                            <i class="far fa-fw fa-file-image"></i>
                                                                        @break

                                                                        @case ('PNG')
                                                                            <i class="far fa-fw fa-file-image"></i>
                                                                        @break

                                                                        @case ('GIF')
                                                                            <i class="far fa-fw fa-file-image"></i>
                                                                        @break

                                                                        @case ('JPG')
                                                                            <i class="far fa-fw fa-file-image"></i>
                                                                        @break

                                                                        @case ('JPEG')
                                                                            <i class="far fa-fw fa-file-image"></i>
                                                                        @break

                                                                        @case ('ZIP')
                                                                            <i class="fas fa-file-archive"></i>
                                                                        @break

                                                                        @case ('WAV')
                                                                            <i class="fas fa-file-audio"></i>
                                                                        @break

                                                                        @case ('MP3')
                                                                            <i class="fas fa-file-audio"></i>
                                                                        @break

                                                                        @case ('MOV')
                                                                            <i class="fas fa-file-video"></i>
                                                                        @break

                                                                        @case ('AVI')
                                                                            <i class="fas fa-file-video"></i>
                                                                        @break
                                                                    @endswitch
                                                                {{ $tenantDocument->description }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="callout callout-info">
                                                <h5><i class="icon fas fa-info"></i> {{ __('Information')}}!</h5>
                                                <p>{{ __('Click on the document to view it, for a new document contact the administrator')}}</p>
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
