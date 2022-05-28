@extends('_Partials.index')
@section('head-complement')
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Company's branch: <strong>{{ $tenant->fancy_name }}</strong><br></h5> 
                <strong>'Razão social: "    {{ $tenant->social_reason }}</strong><br>
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <strong>{{ __('Address') }}</strong><br>
                        {{ $tenant->address }} {{ $tenant->house_number }}
                        {{ $tenant->complement }} <br>
                        {{ $tenant->neighborhood }} <br>
                        {{ $tenant->city }} {{ $tenant->state }} {{ $tenant->zip_code }}<br>
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
                <div class="row">
                    <div class="col-sm-12">


                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>{{ __('New patients') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">{{ __('More information') }} <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>{{ __('New orthodontic contracts') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">{{ __('More information') }} <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>2</h3>
                    <p>{{ __('Invoices issued') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">{{ __('More information') }} <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>{{ __('SMS balance') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">{{ __('More information') }} <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
@section('java-complement')
@endsection
