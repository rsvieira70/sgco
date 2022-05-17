@extends('_Partials.index')

@section('content')
    <form action="{{ route('profiles.update') }}" method="POST" class="form-horizontal">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" id="name" name="name"
                                            value="{{ old('name', $profile->name, null) }}" maxlength="50"
                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            placeholder={{ __('Name') }} required autofocus>
                                        <div class="invalid-feedback">{{ $errors->first('name') }} </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="social_name">{{ __('Social name') }}</label>
                                        <input type="text" id="social_name" name="social_name"
                                            value="{{ old('social_name', $profile->social_name, null) }}" maxlength="50"
                                            class="form-control {{ $errors->has('social_name') ? 'is-invalid' : '' }}"
                                            placeholder={{ __('Social name') }} required>
                                        <div class="invalid-feedback">{{ $errors->first('social_name') }} </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="nickname">{{ __('Nick name') }}</label>
                                        <input type="text" id="nickname" name="nickname"
                                            value="{{ old('nickname', $profile->nickname, null) }}" maxlength="30"
                                            class="form-control {{ $errors->has('nickname') ? 'is-invalid' : '' }}"
                                            placeholder={{ __('Nickname') }} required>
                                        <div class="invalid-feedback">{{ $errors->first('nickname') }} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="cpf">{{ __('CPF') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                            </div>
                                            <input type="text" id="cpf" name="cpf"
                                                value="{{ old('cpf', $profile->cpf, null) }}" maxlength="11"
                                                class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}"
                                                placeholder={{ __('CPF') }} data-mask="000.000.000-00"
                                                data-mask-reverse="true" required>
                                            <div class="invalid-feedback">{{ $errors->first('cpf') }} </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="birth">{{ __('Birth') }}</label>
                                        <input type="date" id="birth" name="birth"
                                            value="{{ old('birth', $profile->birth, null) }}"
                                            class="form-control @error('birth') is-invalid @enderror" required
                                            placeholder={{ __('Birth') }}>
                                        <div class="invalid-feedback">{{ $errors->first('birth') }} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label for="zip_code">{{ __('Zip code') }}</label>
                                        <input type="text" id="zip_code" name="zip_code"
                                            value="{{ old('zip_code', $profile->zip_code, null) }}" maxlength="8"
                                            class="form-control {{ $errors->has('zip_code') ? 'is-invalid' : '' }}"
                                            placeholder={{ __('Zip code') }} data-mask="00000-000"
                                            data-mask-reverse="true" required>
                                        <div class="invalid-feedback">{{ $errors->first('zip_code') }} </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="address">{{ __('Address') }}</label>
                                        <input type="text" id="address" name="address"
                                            value="{{ old('address', $profile->address, null) }}" maxlength="70"
                                            class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                            placeholder={{ __('Address') }} required>
                                        <div class="invalid-feedback">{{ $errors->first('address') }} </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label for="number">{{ __('Number') }}</label>
                                        <input type="text" id="number" name="number"
                                            value="{{ old('number', $profile->number, null) }}" maxlength="10"
                                            class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}"
                                            placeholder={{ __('Number') }} data-mask='0000000000'
                                            data-mask-reverse="true" required>
                                        <div class="invalid-feedback">{{ $errors->first('number') }} </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="complement">{{ __('Complement') }}</label>
                                        <input type="text" id="complement" name="complement"
                                            value="{{ old('complement', $profile->complement, null) }}" maxlength="30"
                                            class="form-control {{ $errors->has('complement') ? 'is-invalid' : '' }}"
                                            placeholder={{ __('Complement') }}>
                                        <div class="invalid-feedback">{{ $errors->first('complement') }} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="neighborhood">{{ __('Neighborhood') }}</label>
                                        <input type="text" id="neighborhood" name="neighborhood"
                                            value="{{ old('neighborhood', $profile->neighborhood, null) }}"
                                            maxlength="30"
                                            class="form-control {{ $errors->has('neighborhood') ? 'is-invalid' : '' }}"
                                            placeholder={{ __('Neighborhood') }} required>
                                        <div class="invalid-feedback">{{ $errors->first('neighborhood') }} </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="city">{{ __('City') }}</label>
                                        <input type="text" id="number" name="city"
                                            value="{{ old('city', $profile->city, null) }}" maxlength="50"
                                            class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                            placeholder={{ __('City') }} required>
                                        <div class="invalid-feedback">{{ $errors->first('city') }} </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label for="state">{{ __('State') }}</label>
                                        <input type="text" id="state" name="state"
                                            value="{{ old('state', $profile->state, null) }}" maxlength="2"
                                            class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}"
                                            placeholder={{ __('State') }} required>
                                        <div class="invalid-feedback">{{ $errors->first('state') }} </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="ibge">{{ __('IBGE') }}</label>
                                        <input type="text" id="ibge" name="ibge"
                                            value="{{ old('ibge', $profile->ibge, null) }}" maxlength="7"
                                            class="form-control {{ $errors->has('ibge') ? 'is-invalid' : '' }}"
                                            placeholder={{ __('IBGE') }}>
                                        <div class="invalid-feedback">{{ $errors->first('ibge') }} </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="telephone">{{ __('Telephone') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fas fa-phone-square-alt"></i></span>
                                            </div>
                                            <input type="text" id="telephone" name="Telephone"
                                                value="{{ old('telephone', $profile->telephone, null) }}" maxlength="10"
                                                class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}"
                                                data-mask="(00) 0000.0000" placeholder={{ __('Telephone') }}>
                                            <div class="invalid-feedback">{{ $errors->first('telephone') }} </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="cell_phone">{{ __('Cell phone') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                            </div>
                                            <input type="text" id="cell_phone" name="cell_phone"
                                                value="{{ old('cell_phone', $profile->cell_phone, null) }}"
                                                maxlength="11"
                                                class="form-control {{ $errors->has('cell_phone') ? 'is-invalid' : '' }}"
                                                data-mask="(00) 00000.0000" placeholder={{ __('Cell phone') }} required>
                                            <div class="invalid-feedback">{{ $errors->first('cell_phone') }} </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="whatsapp">{{ __('WhatsApp') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-whatsapp-square"></i></span>
                                            </div>
                                            <input type="text" id="whatsapp" name="whatsapp"
                                                value="{{ old('whatsapp', $profile->whatsapp, null) }}" maxlength="11"
                                                class="form-control {{ $errors->has('whatsapp') ? 'is-invalid' : '' }}"
                                                data-mask="(00) 00000.0000" placeholder={{ __('WhatsApp') }} required>
                                            <div class="invalid-feedback">{{ $errors->first('cell_phone') }} </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="facebook">{{ __('Facebook') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                                            </div>
                                            <input type="text" id="facebook" name="facebook"
                                                value="{{ old('facebook', $profile->facebook, null) }}" maxlength="80"
                                                class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}"
                                                placeholder={{ __('Facebook') }}>
                                            <div class="invalid-feedback">{{ $errors->first('facebook') }} </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="instagram">{{ __('Instagram') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fab fa-instagram-square"></i></span>
                                            </div>
                                            <input type="text" id="instagram" name="instagram"
                                                value="{{ old('instagram', $profile->instagram, null) }}" maxlength="80"
                                                class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}"
                                                placeholder={{ __('Instagram') }}>
                                            <div class="invalid-feedback">{{ $errors->first('instagram') }} </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="twitter">{{ __('Twitter') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fab fa-twitter-square"></i></span>
                                            </div>
                                            <input type="text" id="twitter" name="twitter"
                                                value="{{ old('twitter', $profile->twitter, null) }}" maxlength="80"
                                                class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}"
                                                placeholder={{ __('Twitter') }}>
                                            <div class="invalid-feedback">{{ $errors->first('twitter') }} </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="linkedin">{{ __('LinkedIn') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                            </div>
                                            <input type="text" id="linkedin" name="linkedin"
                                                value="{{ old('linkedin', $profile->linkedin, null) }}" maxlength="80"
                                                class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}"
                                                placeholder={{ __('LinkedIn') }}>
                                            <div class="invalid-feedback">{{ $errors->first('linkedin') }} </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input type="email" id="email" name="email"
                                            value="{{ old('email', $profile->email, null) }}" maxlength="255"
                                            class="form-control @error('email') is-invalid @enderror" required
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
                                        <p class="text-danger"><i class="fas fa-hand-point-right"></i>
                                            {{ __('Leave blank to keep the current password') }}</p>
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
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="profile_note">{{ __('Note') }}</label>
                                        <textarea name="orofile_note" class="form-control @error('profile_note') is-invalid @enderror" rows="4"
                                            style="height: 30mm">{{ old('profile_note', $profile->profile_note, null) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i>
                {{ __('Save') }}</button>
            <a href="{{ route('users.index') }}" class="btn btb-sm btn-danger"><i
                    class="fas fa-arrow-circle-left"></i>
                {{ __('Go back') }}</a>
        </div>
    </div>
@endsection;
