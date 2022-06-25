@extends('_Partials.index')
@section('head-complement')
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection;
@section('content')
    <form action="{{ route('typeOrthodonticContracts.store') }}" method="POST" class="form-horizontal">
        @csrf
        <input type="hidden" name="id" value="{{ old('id', 0) }}">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>{{ __('Bank slip type') }}</label>
                                <input type="text" id="description" name="description" value="{{ old('description', null) }}" maxlength="50"
                                    class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" required autofocus>
                                <div class="invalid-feedback">{{ $errors->first('description') }} </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Bracket charge') }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="receive_bracket" name="receive_bracket" value="1" {{ old('receive_bracket', null) ? 'checked' : '' }}>
                                                    <label for="receive_bracket">{{ __('Generate bracket charge') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>{{ __('Above how many exchanges') }}</label>
                                                <input type="text" style='text-align:right' id="amount_orthodontic_bracket" name="amount_orthodontic_bracket"
                                                    value="{{ old('amount_orthodontic_bracket', null) }}" class="form-control {{ $errors->has('amount_orthodontic_bracket') ? 'is-invalid' : '' }}"
                                                    data-mask='000' data-mask-reverse="true">
                                                <div class="invalid-feedback">{{ $errors->first('amount_orthodontic_bracket') }} </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>{{ __('Maintenance percentage') }}</label>
                                                <input type="text" style='text-align:right' id="orthodontic_bracket_price" name="orthodontic_bracket_price"
                                                    value="{{ old('orthodontic_bracket_price', null) }}" class="form-control {{ $errors->has('orthodontic_bracket_price') ? 'is-invalid' : '' }}"
                                                    data-mask='000,00%' data-mask-reverse="true">
                                                <div class="invalid-feedback">{{ $errors->first('orthodontic_bracket_price') }} </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Band charge') }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="receive_band" name="receive_band" value="1" {{ old('receive_band', null) ? 'checked' : '' }}>
                                                    <label for="receive_band">{{ __('Generate band charge') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>{{ __('Above how many exchanges') }}</label>
                                                <input type="text" style='text-align:right' id="amount_orthodontic_band" name="amount_orthodontic_band"
                                                    value="{{ old('amount_orthodontic_band', null) }}" class="form-control {{ $errors->has('amount_orthodontic_band') ? 'is-invalid' : '' }}"
                                                    data-mask='000' data-mask-reverse="true">
                                                <div class="invalid-feedback">{{ $errors->first('amount_orthodontic_band') }} </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>{{ __('Maintenance percentage') }}</label>
                                                <input type="text" style='text-align:right' id="orthodontic_band_price" name="orthodontic_band_price"
                                                    value="{{ old('orthodontic_band_price', null) }}" class="form-control {{ $errors->has('orthodontic_band_price') ? 'is-invalid' : '' }}"
                                                    data-mask='000,00%' data-mask-reverse="true">
                                                <div class="invalid-feedback">{{ $errors->first('orthodontic_band_price') }} </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Contract values') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>{{ __('Orthodontic appliance price') }}</label>
                                            <input type="text" style='text-align:right' id="orthodontic_appliance_price" name="orthodontic_appliance_price"
                                                value="{{ old('orthodontic_appliance_price', null) }}" class="form-control {{ $errors->has('orthodontic_appliance_price') ? 'is-invalid' : '' }}"
                                                data-mask='0.000.000.000,00' data-mask-reverse="true">
                                            <div class="invalid-feedback">{{ $errors->first('orthodontic_appliance_price') }} </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>{{ __('Orthodontic appliance installation price') }}</label>
                                            <input type="text" style='text-align:right' id="orthodontic_appliance_installation_price" name="orthodontic_appliance_installation_price"
                                                value="{{ old('orthodontic_appliance_installation_price', null) }}"
                                                class="form-control {{ $errors->has('orthodontic_appliance_installation_price') ? 'is-invalid' : '' }}" data-mask='0.000.000.000,00'
                                                data-mask-reverse="true">
                                            <div class="invalid-feedback">{{ $errors->first('orthodontic_appliance_installation_price') }} </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>{{ __('Orthodontic appliance maintenance price') }}</label>
                                            <input type="text" style='text-align:right' id="orthodontic_appliance_maintenance_price" name="orthodontic_appliance_maintenance_price"
                                                value="{{ old('orthodontic_appliance_maintenance_price', null) }}"
                                                class="form-control {{ $errors->has('orthodontic_appliance_maintenance_price') ? 'is-invalid' : '' }}" data-mask='0.000.000.000,00'
                                                data-mask-reverse="true">
                                            <div class="invalid-feedback">{{ $errors->first('orthodontic_appliance_maintenance_price') }} </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="fixed_value_contract" name="fixed_value_contract" value="1" {{ old('fixed_value_contract', null) ? 'checked' : '' }}>
                                    <label for="fixed_value_contract">{{ __('Fixed value contract, does not generate maintenance value') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('typeOrthodonticContracts.index') }}" class="btn btb-sm btn-danger"><i class="fas fa-arrow-circle-left"></i> {{ __('Go back') }}</a>
                <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i>
                    {{ __('Save') }}</button>
            </div>
        </div>
    </form>
@endsection;
@section('java-complement')
    <script src="{{ asset('jquery/jquery.mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('jquery/jquery.mask/jquery.mask.js') }}"></script>
@endsection
