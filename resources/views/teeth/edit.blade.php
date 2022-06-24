@extends('_Partials.index')
@section('head-complement')
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection;
@section('content')
    <form action="{{ route('teeth.update', $tooth->id) }}" method="POST" class="form-horizontal">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $tooth->id }}">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>{{ __('Tooth code') }}</label>
                                <input type="text" id="tooth_code" name="tooth_code" value="{{ $tooth->tooth_code }}" maxlength="3"
                                    class="form-control {{ $errors->has('tooth_code') ? 'is-invalid' : '' }}" autofocus>
                                <div class="invalid-feedback">{{ $errors->first('tooth_code') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>{{ __('Tooth name') }}</label>
                                <input type="text" id="tooth_name" name="tooth_name" value="{{ $tooth->tooth_name }}" maxlength="50"
                                    class="form-control {{ $errors->has('tooth_name') ? 'is-invalid' : '' }}">
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
                                    <input type="checkbox" id="mesial" name="mesial" value="1" {{ old('mesial', $tooth->mesial) ? 'checked' : '' }}>
                                    <label for="mesial">{{ __('Mesial') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="distal" name="distal" value="1" {{ old('distal', $tooth->distal) ? 'checked' : '' }}>
                                    <label for="distal">{{ __('Distal') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="lingual" name="lingual" value="1" {{ old('lingual', $tooth->lingual) ? 'checked' : '' }}>
                                    <label for="lingual">{{ __('Lingual') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="palatal" name="palatal" value="1" {{ old('palatal', $tooth->palatal) ? 'checked' : '' }}>
                                    <label for="palatal">{{ __('Palatal') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="cervical" name="cervical" value="1" {{ old('cervical', $tooth->cervical) ? 'checked' : '' }}>
                                    <label for="cervical">{{ __('Cervical') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="incisal" name="incisal" value="1" {{ old('incisal', $tooth->incisal) ? 'checked' : '' }}>
                                    <label for="incisal">{{ __('Incisal') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="occlusal" name="occlusal" value="1" {{ old('occlusal', $tooth->occlusal) ? 'checked' : '' }}>
                                    <label for="occlusal">{{ __('Occlusal') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="buccal" name="buccal" value="1" {{ old('buccal', $tooth->buccal) ? 'checked' : '' }}>
                                    <label for="buccal">{{ __('Buccal') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="multiple_teeth" name="multiple_teeth" value="1" {{ old('multiple_teeth', $tooth->multiple_teeth) ? 'checked' : '' }}>
                                    <label for="multiple_teeth">{{ __('Multiple teeth') }}</label>
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
