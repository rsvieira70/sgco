@extends('_Partials.index')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="ribbon-wrapper ribbon-lg">
                                        <div class="ribbon bg-danger">
                                            {{ __('Master') }}
                                        </div>
                                    </div>
                                    @if ($professional->responsible_dentist !== null)
                                        <div class="ribbon-wrapper ribbon-xl">
                                            <div class="ribbon bg-primary">
                                                <small> {{ __('Responsible dentist') }}</small>
                                            </div>
                                        </div>
                                    @endif

                                    @php
                                        $pathImage = url('AdminLTE/dist/img/noImagePessoa.png');
                                        if ($professional->image) {
                                            $pathImage = url("storage/tenants/{$professional->Tenant->uuid}/professionals/{$professional->image}");
                                        }
                                    @endphp
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="{{ $pathImage }}" alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center">{{ $professional->patent->name }} {{ $professional->name }}</h3>
                                    <p class="text-muted text-center"> {{ $professional->specialty->description }}</p>
                                    <p class="text-muted text-center">{{ __('Member') }}
                                        {{ $professional->created_at->diffForHumans() }}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>{{ __('Registration date') }}:</b>
                                            {{ date('d/m/Y', strtotime($professional->registration_date)) }}<br>
                                            <b>{{ __('Website') }}:</b> {{ $professional->website }}<br>
                                            <b>{{ __('Email') }}:</b> {{ $professional->email }}
                                        </li>
                                    </ul>
                                    @if ($professional->suspension_date !== null)
                                        <div class="alert alert-danger alert-dismissible">
                                            <h5><i class="icon fas fa-ban"></i> {{ __('Alert') }}!</h5>
                                            {{ __('Professional suspended in') }}
                                            {{ date('d/m/Y', strtotime($professional->suspension_date)) }}
                                        </div>
                                    @else
                                        <div class="alert alert-success alert-dismissible">
                                            <h5><i class="icon fas fa-check"></i> {{ __('Alert') }}!</h5>
                                            {{ __('Professional active') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('About me') }}</h3>
                                </div>
                                <div class="card-body">
                                    <b> {{ __('Name') }}:</b> {{ $professional->name }}<br>
                                    <b> {{ __('Social name') }}:</b> {{ $professional->social_name }} <br>
                                    <b> {{ __('Nickname') }}:</b> {{ $professional->nickname }}<br>
                                    <b>{{ __('Birth') }}:</b> {{ date('d/m/Y', strtotime($professional->birth)) }}<br>
                                    <b>{{ __('Social security number') }}:</b> {{ $professional->social_security_number }}<br>
                                    <b>{{ __('Council') }}:</b> {{ $professional->Council->short_name }}-{{ $professional->council_number }}/{{ $professional->State->initials }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#information" data-toggle="tab">{{ __('Informations') }}</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#payment" data-toggle="tab">{{ __('Payment data') }}</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#documents" data-toggle="tab">{{ __('Documents') }}</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#certificates" data-toggle="tab">{{ __('Certificates') }}</a></li>
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
                                                    {{ $professional->address }} {{ $professional->house_number }}
                                                    {{ $professional->complement }} <br>
                                                    {{ $professional->neighborhood }} <br>
                                                    {{ $professional->city }} {{ $professional->state }} {{ $professional->zip_code }}<br>
                                                    <b>{{ __('DCEU') }}</b> {{ $professional->dceu }}
                                                </div>
                                                <div class="col-sm-4 invoice-col">
                                                    <strong>{{ __('Phones') }}</strong><br>
                                                    <i class="fas fa-phone-square-alt"></i> {{ $professional->telephone }}<br>
                                                    <i class="fas fa-mobile-alt"></i> {{ $professional->cell_phone }}<br>
                                                    <i class="fab fa-whatsapp-square"></i> {{ $professional->whatsapp }}<br>
                                                    <i class="fab fa-telegram"></i> {{ $professional->telegram }}<br>
                                                </div>
                                                <div class="col-sm-4 invoice-col">
                                                    <strong>{{ __('Social media') }}</strong><br>
                                                    <i class="fab fa-facebook-square"></i> {{ $professional->facebook }}<br>
                                                    <i class="fab fa-instagram-square"></i> {{ $professional->instagram }}<br>
                                                    <i class="fab fa-twitter-square"></i> {{ $professional->twitter }}<br>
                                                    <i class="fab fa-linkedin"></i> {{ $professional->linkedin }}<br>
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
                                            <p class="text-muted">{{ $professional->note }}</p>
                                            <hr>
                                        </div>
                                        <div class="tab-pane" id="payment">
                                            <strong><i class="fa-solid fa-money-check-dollar"></i> {{ __('Maintenance') }}</strong>
                                            <p class="text-muted">
                                                {{ $professionalPaymentInformation->maintenance_payment_type }} <br>
                                                $ {{ $professionalPaymentInformation->maintenance_payment_amount }}
                                            </p>
                                            <strong><i class="fa-solid fa-house-chimney-medical"></i> {{ __('Clinical') }}</strong>
                                            <p class="text-muted">
                                                {{ $professionalPaymentInformation->clinical_payment_type }} <br>
                                                $ {{ $professionalPaymentInformation->clinical_payment_amount }}
                                            </p>
                                            <strong><i class="fa-solid fa-sack-dollar"></i> {{ __('Fixed Value') }}</strong>
                                            <p class="text-muted">
                                                $ {{ $professionalPaymentInformation->fixed_value }}
                                            </p>
                                            <strong><i class="fa-solid fa-hand-holding-dollar"></i> {{ __('Cut off day for payment') }}</strong>
                                            <p class="text-muted">
                                                {{ __('Day') }} {{ $professionalPaymentInformation->cut_off_day_for_payment }}
                                            </p>
                                            <strong><i class="fa-solid fa-calendar-days"></i> {{ __('Day for payment') }}</strong>
                                            <p class="text-muted">
                                                {{ __('Day') }} {{ $professionalPaymentInformation->day_for_payment }}
                                            </p>
                                            <strong><i class="fa-brands fa-pix"></i> {{ __('Pix key') }}</strong>
                                            <p class="text-muted">
                                                {{ __('PIX key type') }} {{ $professionalPaymentInformation->pix_key_type }} <br>
                                                {{ __('key') }} {{ $professionalPaymentInformation->pix_key }}
                                            </p>
                                        </div>
                                        <div class="tab-pane" id="documents">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
                                                    <ul class="list-unstyled">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>{{ __('Description') }}</th>
                                                                    <th>{{ __('File Name') }}</th>
                                                                    <th>{{ __('Action') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($professionalDocuments as $professionalDocument)
                                                                    <tr>
                                                                        <td>{{ $professionalDocument->id }}</td>
                                                                        <td>{{ $professionalDocument->description }}</td>
                                                                        <td><i class="{{ @strtolower($professionalDocument->document_type) }}"></i> {{ $professionalDocument->document }}</td>
                                                                        <td class="text-right py-0 align-middle">
                                                                            <div class="btn-group btn-group-sm">
                                                                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="certificates">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
                                                    <ul class="list-unstyled">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>{{ __('Certificate') }}</th>
                                                                    <th>{{ __('Certification unit') }}</th>
                                                                    <th>{{ __('Certification date') }}</th>
                                                                    <th>{{ __('File Name') }}</th>
                                                                    <th>{{ __('Action') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($professionalCertificates as $professionalCertificate)
                                                                    <tr>
                                                                        <td>{{ $professionalCertificate->id }}</td>
                                                                        <td>{{ $professionalCertificate->certificate }}</td>
                                                                        <td>{{ $professionalCertificate->certificate_unit }}</td>
                                                                        <td>{{ date('d/m/Y', strtotime($professionalCertificate->certificate_date)) }}</td>
                                                                        <td><i class="{{ @strtolower($professionalCertificate->document_type) }}"></i> {{ $professionalCertificate->document }}</td>
                                                                        <td class="text-right py-0 align-middle">
                                                                            <div class="btn-group btn-group-sm">
                                                                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </ul>
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
