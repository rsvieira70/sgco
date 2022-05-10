@extends('_Partials.index')
@section('content')
<form action="{{route('departments.update', $department->id)}}" method="POST" class="form-horizontal">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$department->id}}">
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>{{ __('Department') }}</label>
                            <input type="text" id="description" name="description" value="{{$department->description}}" maxlength="50" class="form-control {{$errors->has('description') ? 'is-invalid' :''}}" required placeholder={{ __('Department') }} autofocus>
                            <div class="invalid-feedback">{{ $errors->first('description')  }} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('departments.index') }}" class="btn btb-sm btn-danger"><i class="fas fa-arrow-circle-left"></i> {{ __('Go back') }}</a>
            <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> {{ __('Save') }}</button>
        </div>
    </div>
</form>
@endsection;
