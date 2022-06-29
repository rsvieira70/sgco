@extends('_Partials.index')
@section('head-complement')
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection;
@section('content')
    <form action="{{ route('banks.update', $bank->id) }}" method="POST" class="form-horizontal">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $bank->id }}">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>{{ __('Bank code') }}</label>
                                <input type="text" id="bank_code" name="bank_code" value="{{ old('bank_code', $bank->bank_code) }}" maxlength="3"
                                    class="form-control {{ $errors->has('bank_code') ? 'is-invalid' : '' }}" required autofocus>
                                <div class="invalid-feedback">{{ $errors->first('bank_code') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label>{{ __('Bank name') }}</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $bank->name) }}" maxlength="100"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">{{ $errors->first('name') }} </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{ __('Bank short name') }}</label>
                                <input type="text" id="short_name" name="short_name" value="{{ old('short_name', $bank->short_name) }}" maxlength="50"
                                    class="form-control {{ $errors->has('short_name') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">{{ $errors->first('short_name') }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('banks.index') }}" class="btn btb-sm btn-danger"><i class="fas fa-arrow-circle-left"></i> {{ __('Go back') }}</a>
                <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i>
                    {{ __('Save') }}</button>
            </div>
        </div>
    </form>
@endsection;
