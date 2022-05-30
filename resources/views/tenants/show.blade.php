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
                                        @switch ($user->user_type)
                                            @case (0)
                                                <div class="ribbon bg-danger">

                                                </div>
                                            @break

                                            @case (1)
                                                <div class="ribbon bg-danger">
                                                    {{ __('Master') }}
                                                </div>
                                            @break

                                            @case (2)
                                                <div class="ribbon bg-danger">
                                                    {{ __('Administrator') }}
                                                </div>
                                            @break

                                            @case (3)
                                                <div class="ribbon bg-danger">
                                                    {{ __('User') }}
                                                </div>
                                            @break

                                            @case (4)
                                                <div class="ribbon bg-danger">
                                                    {{ __('Patient') }}
                                                </div>
                                            @break
                                        @endswitch
                                    </div>
                                    @php
                                        $pathImage = url('AdminLTE/dist/img/noImagePessoa.png');
                                        if ($user->image) {
                                            $pathImage = url("storage/tenants/{$user->Tenant->uuid}/users/{$user->image}");
                                        }
                                    @endphp
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="{{ $pathImage }}"
                                            alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                    @if ($user->position_id !== null)
                                        <p class="text-muted text-center">{{ $user->position->description }}</p>
                                    @endif
                                    <p class="text-muted text-center">{{ __('Member') }}
                                        {{ $user->created_at->diffForHumans() }}</p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            @if ($user->department_id != null)
                                                <b>{{ __('Department') }}:</b>
                                                {{ $user->department->description }}<br>
                                            @endif
                                            <b>{{ __('Registration date') }}:</b>
                                            {{ date('d/m/Y', strtotime($user->registration_date)) }}<br>
                                            <b>{{ __('Email') }}:</b> {{ $user->email }}
                                        </li>
                                    </ul>
                                    @if ($user->suspension_date !== null)
                                        <div class="alert alert-danger alert-dismissible">
                                            <h5><i class="icon fas fa-ban"></i> {{ __('Alert') }}!</h5>
                                            {{ __('User suspended in') }}
                                            {{ date('d/m/Y', strtotime($user->suspension_date)) }}
                                        </div>
                                    @else
                                        <div class="alert alert-success alert-dismissible">
                                            <h5><i class="icon fas fa-check"></i> {{ __('Alert') }}!</h5>
                                            {{ __('User active') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('About me') }}</h3>
                                </div>
                                <div class="card-body">
                                    <b> {{ __('Name') }}:</b> {{ $user->name }}<br>
                                    <b> {{ __('Social name') }}:</b> {{ $user->social_name }} <br>
                                    <b> {{ __('Nickname') }}:</b> {{ $user->nickname }}<br>
                                    <b>{{ __('Birth') }}:</b> {{ date('d/m/Y', strtotime($user->birth)) }}<br>
                                    <b>{{ __('Social security number') }}:</b> {{ $user->social_security_number }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#information"
                                                data-toggle="tab">{{ __('Informations') }}</a></li>
                                        <!--
                                                                            <li class="nav-item"><a class="nav-link" href="#timeline"
                                                                                    data-toggle="tab">{{ __('Timeline') }}</a></li>
                                                                                                    <li class="nav-item"><a class="nav-link" href="#settings"
                                                                                                            data-toggle="tab">{{ __('Settings') }}</a></li>
                                                                                                    -->
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
                                                    {{ $user->address }} {{ $user->house_number }}
                                                    {{ $user->complement }} <br>
                                                    {{ $user->neighborhood }} <br>
                                                    {{ $user->city }} {{ $user->state }} {{ $user->zip_code }}<br>
                                                    <b>{{ __('IBGE') }}</b> {{ $user->ibge }}
                                                </div>
                                                <div class="col-sm-4 invoice-col">
                                                    <strong>{{ __('Phones') }}</strong><br>
                                                    <i class="fas fa-phone-square-alt"></i> {{ $user->telephone }}<br>
                                                    <i class="fas fa-mobile-alt"></i> {{ $user->cell_phone }}<br>
                                                    <i class="fab fa-whatsapp-square"></i> {{ $user->whatsapp }}<br>
                                                    <i class="fab fa-telegram"></i> {{ $user->telegram }}<br>
                                                </div>
                                                <div class="col-sm-4 invoice-col">
                                                    <strong>{{ __('Social media') }}</strong><br>
                                                    <i class="fab fa-facebook-square"></i> {{ $user->facebook }}<br>
                                                    <i class="fab fa-instagram-square"></i> {{ $user->instagram }}<br>
                                                    <i class="fab fa-twitter-square"></i> {{ $user->twitter }}<br>
                                                    <i class="fab fa-linkedin"></i> {{ $user->linkedin }}<br>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4>
                                                        <i class="far fa-file-alt mr-1"></i> {{ __('User note') }}
                                                    </h4>
                                                </div>
                                            </div>
                                            <p class="text-muted">{{ $user->user_note }}</p>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4>
                                                        <i class="far fa-file-alt mr-1"></i> {{ __('User profile') }}
                                                    </h4>
                                                </div>
                                            </div>

                                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                                {{ $user->profile_note }}
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
                                                    <i class="fas fa-user bg-info"></i>
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
                                                        {{ date('d M Y', strtotime($user->registration_date)) }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <i class="far fa-clock bg-gray"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal">
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputName"
                                                            placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputEmail"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName2"
                                                            placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputExperience"
                                                        class="col-sm-2 col-form-label">Experience</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputSkills"
                                                            placeholder="Skills">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox"> I agree to the <a href="#">terms and
                                                                    conditions</a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
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
                <a href="{{ route('users.index') }}" class="btn btb-sm btn-danger"><i
                        class="fas fa-arrow-circle-left"></i>
                    {{ __('Go back') }}</a>
            </div>
        </div>
    </section>
@endsection;
