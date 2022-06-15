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
                                        <b>{{ __('Opening date') }}:</b> {{ date('d/m/Y', strtotime($tenant->opening_date)) }}<br>
                                        <b>{{ __('Employer identification number') }}:</b> {{ $tenant->employer_identification_number }}<br>
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
                                        <li class="nav-item"><a class="nav-link active" href="#information"
                                                data-toggle="tab">{{ __('Informations') }}</a></li>
                                        <!--
                                                                            <li class="nav-item"><a class="nav-link" href="#timeline"
                                                                                    data-toggle="tab">{{ __('Timeline') }}</a></li>
                                                                            -->
                                                                                                    <li class="nav-item"><a class="nav-link" href="#responsible"
                                                                                                            data-toggle="tab">{{ __('Responsible') }}</a></li>
                                                                                                    
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
                                                    {{ $tenant->city }} {{ $tenant->state }} {{ $tenant->zip_code }}<br>
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
                                        <div class="tab-pane" id="timeline">
                                            <div class="timeline timeline-inverse">
                                                <div class="time-label">
                                                    <span class="bg-danger">
                                                        10 Feb. 2014
                                                    </span>
                                                </div>
                                                <div>
                                                    <i class="fas fa-envelope bg-primary"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="far fa-clock"></i>
                                                            12:05</span>
                                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an
                                                            email
                                                        </h3>
                                                        <div class="timeline-body">
                                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo
                                                            kaboodle
                                                            quora plaxo ideeli hulu weebly balihoo...
                                                        </div>
                                                        <div class="timeline-footer">
                                                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-tenant bg-info"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="far fa-clock"></i> 5 mins
                                                            ago</span>
                                                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a>
                                                            accepted
                                                            your friend request
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-comments bg-warning"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>
                                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on
                                                            your
                                                            post</h3>
                                                        <div class="timeline-body">
                                                            Take me to your leader!
                                                            Switzerland is small and neutral!
                                                            We are more like Germany, ambitious and misunderstood!
                                                        </div>
                                                        <div class="timeline-footer">
                                                            <a href="#" class="btn btn-warning btn-flat btn-sm">View
                                                                comment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="time-label">
                                                    <span class="bg-success">
                                                        {{ date('d M Y', strtotime($tenant->registration_date)) }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <i class="far fa-clock bg-gray"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="responsible">
                                            @if ($administrative->name !== null)
                                            <div class="callout callout-success">
                                                <h5>{{ __('Administrative responsible') }}!</h5>
                                                <p>{{ $administrative->name }}</p>
                                            </div>
                                        @else
                                            <div class="callout callout-success">
                                                <h5>{{ __('Administrative responsible') }}!</h5>
                                                <p>Não definido</p>
                                            </div>
                                        @endif
    



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
                <a href="{{ route('tenants.index') }}" class="btn btb-sm btn-danger"><i
                        class="fas fa-arrow-circle-left"></i>
                    {{ __('Go back') }}</a>
            </div>
        </div>
    </section>
@endsection;
