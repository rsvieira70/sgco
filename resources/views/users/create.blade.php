@extends('_Partials.index')
@section('content')
    <form action="{{ route('users.store') }}" method="POST" class="form-horizontal">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" name="id" value="{{ old('id', 0) }}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" id="name" name="name" value="{{ old('name', null) }}"
                                            maxlength="50"
                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required
                                            autofocus>
                                        <div class="invalid-feedback">{{ $errors->first('name') }} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="department_id">{{ __('Department') }}</label>
                                    <select class="custom-select" id="department_id" name="department_id"
                                        class="form-control @error('department_id') is-invalid @enderror">
                                        <option value='' disabled selected>{{ __('Select a department') }}</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ old('department_id', $department->department->id ?? '') == $department->id ? 'selected' : '' }}>
                                                {{ $department->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('department_id') }} </div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="posiiton_id">{{ __('Position') }}</label>
                                    <div class="input-field">
                                        <select class="custom-select" id="position_id" name="position_id"
                                            class="form-control @error('position_id') is-invalid @enderror" required>
                                            <option value='' disabled selected>{{ __('Select a position') }}</option>
                                            @foreach ($positions as $position)
                                                <option value="{{ $position->id }}"
                                                    {{ old('position_id', $position->position->id ?? '') == $position->id ? 'selected' : '' }}>
                                                    {{ $position->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="registration_date">{{ __('Registration date') }}</label>
                                        <div class="input-group">
                                            <input type="date" id="registration_date" name="registration_date"
                                                value="{{ old('registration_date', null) }}"
                                                class="form-control data @error('registration_date') is-invalid @enderror">
                                            <div class="invalid-feedback">{{ $errors->first('registration_date') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="user_type">{{ __('User type') }}</label>
                                    <div class="input-field">
                                        <select class="custom-select" id="user_type" name="user_type"
                                            class="form-control @error('user_type') is-invalid @enderror" required>
                                            <option value='' disabled selected>{{ __('Select a user type') }}</option>
                                            <option value="2" {{ old('user_type') == 2 ? 'selected' : '' }}>
                                                {{ __('Administrator') }}
                                            <option value="3" {{ old('user_type') == 3 ? 'selected' : '' }}>
                                                {{ __('User') }}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input type="email" id="email" name="email" value="{{ old('email', null) }}"
                                            maxlength="255" class="form-control @error('email') is-invalid @enderror">
                                        <div class="invalid-feedback">{{ $errors->first('email') }} </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input type="password" id="password" name="password" maxlength="255"
                                            class="form-control @error('password') is-invalid @enderror" required>
                                        <div class="invalid-feedback">{{ $errors->first('password') }} </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            maxlength="255"
                                            class="form-control @error('password_confirmation') is-invalid @enderror">
                                        <div class="invalid-feedback">{{ $errors->first('password') }} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="user_note">{{ __('Note') }}</label>
                                        <textarea name="user_note" class="form-control @error('user_note') is-invalid @enderror" rows="4"
                                            style="height: 30mm">{{ old('user_note', null) }}</textarea>
                                        <div class="invalid-feedback">{{ $errors->first('user_note') }} </div>
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
                <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i>
                    {{ __('Save') }}</button>
                <a href="{{ route('users.index') }}" class="btn btb-sm btn-danger"><i
                        class="fas fa-arrow-circle-left"></i> {{ __('Go back') }}</a>
            </div>
        </div>
    </form>
@endsection;
