@extends('_Partials.index')
@section('content')
<div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
        <span class="info-box-icon bg-success"><i class="fas fa-industry"></i></span>
        <div class="info-box-content">
            <span class="info-box-number">{{ $tenant->fancy_name }}</span>
            <span class="info-box-text">{{ $tenant->city }}/{{ $tenant->state }} </span>
        </div>
    </div>
</div>
<form action="{{ route('tenantDocuments.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ old('id', 0) }}">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>{{ __('Description') }}</label>
                                <input type="text" id="description" name="description"
                                    value="{{ old('description', null) }}" maxlength="50"
                                    class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" required
                                    autofocus>
                                <div class="invalid-feedback">{{ $errors->first('description') }} </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="document">{{ __('Document') }}</label>
                                <div class="Input-group">
                                    <input type="file" id="document" name="document" value="{{ old('document') }}" class="form-control @error('document') is-invalid @enderror">
                                    <div class="invalid-feedback">{{ $errors->first('document') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('tenantDocuments.index') }}" class="btn btb-sm btn-danger"><i
                        class="fas fa-arrow-circle-left"></i> {{ __('Go back') }}</a>
                <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i>
                    {{ __('Save') }}</button>
            </div>
        </div>
    </form>
@endsection;
