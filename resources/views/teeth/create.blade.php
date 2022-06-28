@extends('_Partials.index')
@section('head-complement')
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection;
@section('content')
    <form action="{{ route('teeth.store') }}" method="POST" class="form-horizontal">
        @csrf
        <input type="hidden" name="id" value="{{ old('id', 0) }}">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>{{ __('Tooth code') }}</label>
                                <input type="text" id="tooth_code" name="tooth_code" value="{{ old('tooth_code', null) }}" maxlength="3"
                                    class="form-control {{ $errors->has('tooth_code') ? 'is-invalid' : '' }}" required autofocus>
                                <div class="invalid-feedback">{{ $errors->first('tooth_code') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>{{ __('Tooth name') }}</label>
                                <input type="text" id="tooth_name" name="tooth_name" value="{{ old('tooth_name', null) }}" maxlength="50"
                                    class="form-control {{ $errors->has('tooth_name') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">{{ $errors->first('tooth_name') }} </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Allowed tooth surface') }}</h3>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" class="form-control @error('mesial') is-invalid @enderror" id="mesial" name="mesial" value="1" {{ old('mesial', null) ? 'checked' : '' }}>
                                    <label for="mesial">{{ __('Mesial') }}</label>
                                    <div class="invalid-feedback">{{ $errors->first('mesial') }} </div>
                                 </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" class="form-control @error('distal') is-invalid @enderror" id="distal" name="distal" value="1" {{ old('distal', null) ? 'checked' : '' }}>
                                    <label for="distal">{{ __('Distal') }}</label>
                                    <div class="invalid-feedback">{{ $errors->first('distal') }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" class="form-control @error('lingual') is-invalid @enderror" id="lingual" name="lingual" value="1" {{ old('lingual', null) ? 'checked' : '' }}>
                                    <label for="lingual">{{ __('Lingual') }}</label>
                                    <div class="invalid-feedback">{{ $errors->first('lingual') }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" class="form-control @error('palatal') is-invalid @enderror" id="palatal" name="palatal" value="1" {{ old('palatal', null) ? 'checked' : '' }}>
                                    <label for="palatal">{{ __('Palatal') }}</label>
                                    <div class="invalid-feedback">{{ $errors->first('palatal') }} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" class="form-control @error('cervical') is-invalid @enderror" id="cervical" name="cervical" value="1" {{ old('cervical', null) ? 'checked' : '' }}>
                                    <label for="cervical">{{ __('Cervical') }}</label>
                                    <div class="invalid-feedback">{{ $errors->first('cervical') }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" class="form-control @error('incisal') is-invalid @enderror" id="incisal" name="incisal" value="1" {{ old('incisal', null) ? 'checked' : '' }}>
                                    <label for="incisal">{{ __('Incisal') }}</label>
                                    <div class="invalid-feedback">{{ $errors->first('incisal') }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" class="form-control @error('occlusal') is-invalid @enderror" id="occlusal" name="occlusal" value="1" {{ old('occlusal', null) ? 'checked' : '' }}>
                                    <label for="occlusal">{{ __('Occlusal') }}</label>
                                    <div class="invalid-feedback">{{ $errors->first('occlusal') }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" class="form-control @error('buccal') is-invalid @enderror" id="buccal" name="buccal" value="1" {{ old('buccal', null) ? 'checked' : '' }}>
                                    <label for="buccal">{{ __('Buccal') }}</label>
                                    <div class="invalid-feedback">{{ $errors->first('buccal') }} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" class="form-control @error('multipe_teeth') is-invalid @enderror" id="multiple_teeth" name="multiple_teeth" value="1" {{ old('multiple_teeth', null) ? 'checked' : '' }}>
                                    <label for="multiple_teeth">{{ __('Multiple teeth') }}</label>
                                    <div class="invalid-feedback">{{ $errors->first('Multiple') }} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('teeth.index') }}" class="btn btb-sm btn-danger"><i class="fas fa-arrow-circle-left"></i> {{ __('Go back') }}</a>
                <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i>
                    {{ __('Save') }}</button>
            </div>
        </div>
    </form>
@endsection;
