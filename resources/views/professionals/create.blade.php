@extends('_Partials.index')
@section('head-complement')
@endsection
@section('content')
    <form action="{{ route('professionals.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="invoice p-3 mb-3"> 
                    <div class="row">
                        <input type="hidden" name="id" value="{{ old('id', 0) }}">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" id="name" name="name" value="{{ old('name', null) }}" maxlength="50"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required autofocus>
                                <div class="invalid-feedback">{{ $errors->first('name') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="social_name">{{ __('Social name') }}</label>
                                <input type="text" id="social_name" name="social_name" value="{{ old('social_name', null) }}" maxlength="50"
                                    class="form-control {{ $errors->has('social_name') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">{{ $errors->first('social_name') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nickname">{{ __('Nickname') }}</label>
                                <input type="text" id="nickname" name="nickname" value="{{ old('nickname', null) }}" maxlength="30"
                                    class="form-control {{ $errors->has('nickname') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">{{ $errors->first('nickname') }} </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="social_security_number">{{ __('Social security number') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                    <input type="text" id="social_security_number" name="social_security_number" value="{{ old('social_security_number', null) }}"
                                        maxlength="11" class="form-control {{ $errors->has('social_security_number') ? 'is-invalid' : '' }}" data-mask="000.000.000-00" data-mask-reverse="true"
                                        required>
                                    <div class="invalid-feedback">{{ $errors->first('social_security_number') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="birth">{{ __('Birth') }}</label>
                                <input type="date" id="birth" name="birth" value="{{ old('birth', null) }}" class="form-control @error('birth') is-invalid @enderror" required>
                                <div class="invalid-feedback">{{ $errors->first('birth') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label for="image">{{ __('Photo') }}</label>
                                <div class="Input-group">
                                    <input type="file" id="image" name="image" value="{{ old('image', null) }}" class="form-control @error('image') is-invalid @enderror">
                                    <div class="invalid-feedback">{{ $errors->first('image') }}
                                    </div>
                                </div>
                                <p class="text-danger"><i class="fas fa-hand-point-right"></i>
                                    {{ __('Choose a file only if you want to include or change your professional picture') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="zip_code">{{ __('Zip code') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                                    </div>
                                    <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', null) }}" maxlength="8"
                                        class="form-control {{ $errors->has('zip_code') ? 'is-invalid' : '' }}" data-mask="00000-000" data-mask-reverse="true" required>
                                    <div class="invalid-feedback">{{ $errors->first('zip_code') }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="address">{{ __('Address') }}</label>
                                <input type="text" id="address" name="address" value="{{ old('address', null) }}" maxlength="70"
                                    class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">{{ $errors->first('address') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="house_number">{{ __('Number') }}</label>
                                <input type="text" id="house_number" name="house_number" value="{{ old('house_number', null) }}" maxlength="10"
                                    class="form-control {{ $errors->has('house_number') ? 'is-invalid' : '' }}" data-mask='0000000000' data-mask-reverse="true" required>
                                <div class="invalid-feedback">{{ $errors->first('house_number') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="complement">{{ __('Complement') }}</label>
                                <input type="text" id="complement" name="complement" value="{{ old('complement', null) }}" maxlength="30"
                                    class="form-control {{ $errors->has('complement') ? 'is-invalid' : '' }}">
                                <div class="invalid-feedback">{{ $errors->first('complement') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="neighborhood">{{ __('Neighborhood') }}</label>
                                <input type="text" id="neighborhood" name="neighborhood" value="{{ old('neighborhood', null) }}" maxlength="30"
                                    class="form-control {{ $errors->has('neighborhood') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">{{ $errors->first('neighborhood') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="city">{{ __('City') }}</label>
                                <input type="text" id="city" name="city" value="{{ old('city', null) }}" maxlength="50"
                                    class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" requird>
                                <div class="invalid-feedback">{{ $errors->first('city') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="state">{{ __('State') }}</label>
                                <input type="text" id="state" name="state" value="{{ old('state', null) }}" maxlength="2"
                                    class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">{{ $errors->first('state') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="dceu">{{ __('DCEU') }}</label>
                                <input type="text" id="dceu" name="dceu" value="{{ old('dceu', null) }}" maxlength="7"
                                    class="form-control {{ $errors->has('dceu') ? 'is-invalid' : '' }}" requerid>
                                <div class="invalid-feedback">{{ $errors->first('dceu') }} </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="telephone">{{ __('Telephone') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span>
                                    </div>
                                    <input type="text" id="telephone" name="telephone" value="{{ old('telephone', null) }}" maxlength="10"
                                        class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" data-mask="(00) 0000.0000">
                                    <div class="invalid-feedback">{{ $errors->first('telephone') }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="cell_phone">{{ __('Cell phone') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                    </div>
                                    <input type="text" id="cell_phone" name="cell_phone" value="{{ old('cell_phone', null) }}" maxlength="11"
                                        class="form-control {{ $errors->has('cell_phone') ? 'is-invalid' : '' }}" data-mask="(00) 00000.0000" required>
                                    <div class="invalid-feedback">{{ $errors->first('cell_phone') }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="whatsapp">{{ __('WhatsApp') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-whatsapp-square"></i></span>
                                    </div>
                                    <input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', null) }}" maxlength="11"
                                        class="form-control {{ $errors->has('whatsapp') ? 'is-invalid' : '' }}" data-mask="(00) 00000.0000">
                                    <div class="invalid-feedback">{{ $errors->first('whatsapp') }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="telegram">{{ __('Telegram') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-telegram"></i></span>
                                    </div>
                                    <input type="text" id="telegram" name="telegram" value="{{ old('telegram', null) }}" maxlength="11"
                                        class="form-control {{ $errors->has('telegram') ? 'is-invalid' : '' }}" data-mask="(00) 00000.0000">
                                    <div class="invalid-feedback">{{ $errors->first('telegram') }} </div>
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
                                    <input type="text" id="facebook" name="facebook" value="{{ old('facebook', null) }}" maxlength="80"
                                        class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}">
                                    <div class="invalid-feedback">{{ $errors->first('facebook') }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="instagram">{{ __('Instagram') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-instagram-square"></i></span>
                                    </div>
                                    <input type="text" id="instagram" name="instagram" value="{{ old('instagram', null) }}" maxlength="80"
                                        class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}">
                                    <div class="invalid-feedback">{{ $errors->first('instagram') }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="twitter">{{ __('Twitter') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-twitter-square"></i></span>
                                    </div>
                                    <input type="text" id="twitter" name="twitter" value="{{ old('twitter', null) }}" maxlength="80"
                                        class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}">
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
                                    <input type="text" id="linkedin" name="linkedin" value="{{ old('linkedin', null) }}" maxlength="80"
                                        class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}">
                                    <div class="invalid-feedback">{{ $errors->first('linkedin') }} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" id="email" name="email" value="{{ old('email', null) }}" maxlength="255"
                                    class="form-control @error('email') is-invalid @enderror" required>
                                <div class="invalid-feedback">{{ $errors->first('email') }} </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Note">{{ __('Note') }}</label>
                                <textarea name="note" class="form-control @error('note') is-invalid @enderror" rows="4" style="height: 30mm">{{ old('profile_note', null) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i>
                            {{ __('Save') }}</button>
                        <a href="{{ route('professionals.index') }}" class="btn btb-sm btn-danger"><i class="fas fa-arrow-circle-left"></i>
                            {{ __('Go back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection;
@section('java-complement')
    <script src="{{ asset('jquery/jquery.mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('jquery/jquery.mask/jquery.mask.js') }}"></script>
    <script src="{{ asset('jquery/jquery.zipcode/jquery.zipcode.js') }}"></script>
    <script src="{{ asset('jquery/jquery.copy.fields/jquery.copy.fields.names.js') }}"></script>
    <script src="{{ asset('jquery/jquery.copy.fields/jquery.copy.fields.phones.js') }}"></script>
@endsection
