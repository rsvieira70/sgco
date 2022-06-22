@extends('_Partials.index')
@section('content')
    <form action="{{ route('specialties.update', $specialty->id) }}" method="POST" class="form-horizontal">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $specialty->id }}">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>{{ __('Specialty') }}</label>
                                <input type="text" id="description" name="description" value="{{ $specialty->description }}" maxlength="80"
                                    class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" autofocus>
                                <div class="invalid-feedback">{{ $errors->first('description') }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('specialties.index') }}" class="btn btb-sm btn-danger"><i class="fas fa-arrow-circle-left"></i> {{ __('Go back') }}</a>
                <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i>
                    {{ __('Save') }}</button>
            </div>
        </div>
    </form>
@endsection;
