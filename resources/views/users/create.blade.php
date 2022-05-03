@extends('_Partials.index')
@section('content')
    <form action="{{ route('users.store') }}" method="POST" class="form-horizontal">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" name="id" value="{{old('id', 0)}}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" id="name" name="name" value="{{ old('name', null) }}"
                                            maxlength="60"
                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            placeholder={{ __('Name') }} requirid autofocus>
                                        <div class="invalid-feedback">{{ $errors->first('user.name') }} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="department_id">{{ __('Department') }}</label>
                                        <div class="input-field">
                                            <select class="custom-select" id="department"
                                                name="department_id]"
                                                class="form-control @error('department') is-invalid @enderror">
                                                <option value="" disabled selected>Selecione um departamento</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}">
                                                        {{ $department->description }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="posiiton_id">{{ __('Position') }}</label>
                                        <div class="input-field">
                                            <select class="custom-select" id="department" name="cargo_id"
                                                class="form-control @error('workuser.cargo_id') is-invalid @enderror">
                                                <option value="" disabled selected>Selecione um cargo</option>
                                                @foreach ($positions as $position)
                                                    <option value="{{ $position->id }}">{{ $position->description }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="registration_date">{{ __('Registration date') }}</label>
                                        <div class="input-group">
                                            <input type="date" id="registration_date" name="registration_date"
                                                value="{{ old('registration_date') }}"
                                                class="form-control data @error('registration_date') is-invalid @enderror"
                                                placeholder={{ __('Registration date') }}>
                                            <div class="invalid-feedback">{{ $errors->first('registration_date') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                                            maxlength="255" class="form-control @error('email') is-invalid @enderror"
                                            placeholder={{ __('Email') }}>
                                        <div class="invalid-feedback">{{ $errors->first('email') }} </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input type="password" id="password" name="password" maxlength="255"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder={{ __('Password') }}>
                                        <div class="invalid-feedback">{{ $errors->first('password') }} </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            maxlength="255"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            placeholder={{ __('Confirm Password') }}>
                                        <div class="invalid-feedback">{{ $errors->first('password') }} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user_note">{{ __('Observation') }}</label>
                                <textarea id="user_note" name="user_note" value="{{ old('user_note') }}" class="form-control"
                                    rows="4" style="height: 30mm"></textarea>
                                <div class="invalid-feedback">{{ $errors->first('user_note') }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> {{ __('Save') }}</button>
                <a href="{{ route('users.index') }}" class="btn btb-sm btn-danger"><i
                        class="fas fa-arrow-circle-left"></i> {{ __('Go back') }}</a>
            </div>
        </div>
    </form>
@endsection;
