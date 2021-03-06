@extends('_Partials.index')
@section('content')
    <form action="{{ route('positions.store') }}" method="POST" class="form-horizontal">
        @csrf
        <input type="hidden" name="id" value="{{ old('id', 0) }}">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>{{ __('Position') }}</label>
                                <input type="text" id="description" name="description"
                                    value="{{ old('description', null) }}" maxlength="50"
                                    class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" required
                                    autofocus>
                                <div class="invalid-feedback">{{ $errors->first('description') }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('positions.index') }}" class="btn btb-sm btn-danger"><i
                        class="fas fa-arrow-circle-left"></i> {{ __('Go back') }}</a>
                <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i>
                    {{ __('Save') }}</button>
            </div>
        </div>
    </form>
@endsection;
