@extends('_Partials.index')tenants
@section('head-complement')
@endsection
@section('content')
    <form action="{{ route('tenants.store', $tenant->id) }}" method="POST" class="form-horizontal"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="invoice p-3 mb-3">
                    <div class="row">
                        <input type="hidden" name="id" value="{{ old('id', 0) }}">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="social_reason">{{ __('Social reason') }}</label>
                                <input type="text" id="social_reason" name="social_reason" value="{{ old('social_reason', $tenant->social_reason, null) }}"
                                    maxlength="60" class="form-control {{ $errors->has('social_reason') ? 'is-invalid' : '' }}"
                                    required autofocus>
                                <div class="invalid-feedback">{{ $errors->first('social_reason') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="fancy_name">{{ __('Fancy name') }}</label>
                                <input type="text" id="fancy_name" name="fancy_name"
                                    value="{{ old('fancy_name', $tenant->fancy_name, null) }}" maxlength="50"
                                    class="form-control {{ $errors->has('fancy_name') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">{{ $errors->first('fancy_name') }} </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="employer_identification_number">{{ __('Employer identification number') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                    <input type="text" id="employer_identification_number" name="employer_identification_number"
                                        value="{{ old('employer_identification_number', $tenant->social_security_number, null) }}"
                                        maxlength="11"
                                        class="form-control {{ $errors->has('employer_identification_number') ? 'is-invalid' : '' }}"
                                        data-mask="00.000.000/0000-00" data-mask-reverse="true" required>
                                    <div class="invalid-feedback">{{ $errors->first('employer_identification_number') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="state_registration">{{ __('State registration') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                    <input type="text" id="state_registration" name="state_registration"
                                        value="{{ old('state_registration', $tenant->state_registration, null) }}"
                                        maxlength="11"
                                        class="form-control {{ $errors->has('state_registration') ? 'is-invalid' : '' }}"
                                        required>
                                    <div class="invalid-feedback">{{ $errors->first('state_registration') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="municipal_registration">{{ __('Municipal registration') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                    <input type="text" id="municipal_registration" name="municipal_registration"
                                        value="{{ old('municipal_registration', $tenant->municipal_registration, null) }}"
                                        maxlength="11"
                                        class="form-control {{ $errors->has('municipal_registration') ? 'is-invalid' : '' }}"
                                        required>
                                    <div class="invalid-feedback">{{ $errors->first('municipal_registration') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="opening_date">{{ __('Opening date') }}</label>
                                <input type="date" id="opening_date" name="opening_date"
                                    value="{{ old('opening_date', $tenant->opening_date, null) }}"
                                    class="form-control @error('opening_date') is-invalid @enderror" required>
                                <div class="invalid-feedback">{{ $errors->first('opening_date') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="administrative_responsibility">{{ __('administrative responsibility') }}</label>
                                <input type="text" id="administrative_responsibility" name="administrative_responsibility"
                                    value="{{ old('administrative_responsibility', $tenant->administrative_responsibility, null) }}" maxlength="50"
                                    class="form-control {{ $errors->has('administrative_responsibility') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">{{ $errors->first('administrative_responsibility') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label for="administrative_responsibility_image">{{ __('Photo') }}</label>
                                <div class="Input-group">
                                    @php
                                        $pathImage = url('AdminLTE/dist/img/noImagePessoa.png');
                                        if ($tenant->administrative_responsibility_image) {
                                            $pathImage = url("storage/tenants/{$tenant->Tenant->uuid}/users/{$tenant->administrative_responsibility_image}");
                                        }
                                    @endphp
                                    <td class="text-center">
                                        <img class="direct-chat-img" src="{{ $pathImage }}"
                                            alt={{ __('User Image') }}>
                                    </td>
                                    <input type="file" id="administrative_responsibility_image" name="administrative_responsibility_image"
                                        value="{{ old('administrative_responsibility_image', $tenant->administrative_responsibility_image, null) }}"
                                        class="form-control @error('administrative_responsibility_image') is-invalid @enderror">
                                    <div class="invalid-feedback">{{ $errors->first('administrative_responsibility_image') }}
                                    </div>
                                </div>
                                <p class="text-danger"><i class="fas fa-hand-point-right"></i>
                                    {{ __('Choose a file only if you want to include or change your tenant picture') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="technical_responsible">{{ __('Technical responsible') }}</label>
                                <input type="text" id="technical_responsible" name="technical_responsible"
                                    value="{{ old('technical_responsible', $tenant->responsible_dentist, null) }}" maxlength="50"
                                    class="form-control {{ $errors->has('technical_responsible') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">{{ $errors->first('technical_responsible') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label for="responsible_dentist_image">{{ __('Photo') }}</label>
                                <div class="Input-group">
                                    @php
                                        $pathImage = url('AdminLTE/dist/img/noImagePessoa.png');
                                        if ($tenant->responsible_dentist_image) {
                                            $pathImage = url("storage/tenants/{$tenant->Tenant->uuid}/users/{$tenant->responsible_dentist_image}");
                                        }
                                    @endphp
                                    <td class="text-center">
                                        <img class="direct-chat-img" src="{{ $pathImage }}"
                                            alt={{ __('User Image') }}>
                                    </td>
                                    <input type="file" id="responsible_dentist_image" name="responsible_dentist_image"
                                        value="{{ old('responsible_dentist_image', $tenant->responsible_dentist_image, null) }}"
                                        class="form-control @error('responsible_dentist_image') is-invalid @enderror">
                                    <div class="invalid-feedback">{{ $errors->first('responsible_dentist_image') }}
                                    </div>
                                </div>
                                <p class="text-danger"><i class="fas fa-hand-point-right"></i>
                                    {{ __('Choose a file only if you want to include or change your tenant picture') }}
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
                                    <input type="text" id="zip_code" name="zip_code"
                                        value="{{ old('zip_code', $tenant->zip_code, null) }}" maxlength="8"
                                        class="form-control {{ $errors->has('zip_code') ? 'is-invalid' : '' }}"
                                        data-mask="00000-000" data-mask-reverse="true" required>
                                    <div class="invalid-feedback">{{ $errors->first('zip_code') }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="address">{{ __('Address') }}</label>
                                <input type="text" id="address" name="address"
                                    value="{{ old('address', $tenant->address, null) }}" maxlength="70"
                                    class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">{{ $errors->first('address') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="house_number">{{ __('Number') }}</label>
                                <input type="text" id="house_number" name="house_number"
                                    value="{{ old('house_number', $tenant->house_number, null) }}" maxlength="10"
                                    class="form-control {{ $errors->has('house_number') ? 'is-invalid' : '' }}"
                                    data-mask='0000000000' data-mask-reverse="true" required>
                                <div class="invalid-feedback">{{ $errors->first('house_number') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="complement">{{ __('Complement') }}</label>
                                <input type="text" id="complement" name="complement"
                                    value="{{ old('complement', $tenant->complement, null) }}" maxlength="30"
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
                                <input type="text" id="neighborhood" name="neighborhood"
                                    value="{{ old('neighborhood', $tenant->neighborhood, null) }}" maxlength="30"
                                    class="form-control {{ $errors->has('neighborhood') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">{{ $errors->first('neighborhood') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="city">{{ __('City') }}</label>
                                <input type="text" id="city" name="city" value="{{ old('city', $tenant->city, null) }}"
                                    maxlength="50" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                    requird>
                                <div class="invalid-feedback">{{ $errors->first('city') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="state">{{ __('State') }}</label>
                                <input type="text" id="state" name="state"
                                    value="{{ old('state', $tenant->state, null) }}" maxlength="2"
                                    class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" required>
                                <div class="invalid-feedback">{{ $errors->first('state') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="ibge">{{ __('IBGE') }}</label>
                                <input type="text" id="ibge" name="ibge" value="{{ old('ibge', $tenant->ibge, null) }}"
                                    maxlength="7" class="form-control {{ $errors->has('ibge') ? 'is-invalid' : '' }}"
                                    requerid>
                                <div class="invalid-feedback">{{ $errors->first('ibge') }} </div>
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
                                    <input type="text" id="telephone" name="telephone"
                                        value="{{ old('telephone', $tenant->telephone, null) }}" maxlength="10"
                                        class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}"
                                        data-mask="(00) 0000.0000">
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
                                    <input type="text" id="cell_phone" name="cell_phone"
                                        value="{{ old('cell_phone', $tenant->cell_phone, null) }}" maxlength="11"
                                        class="form-control {{ $errors->has('cell_phone') ? 'is-invalid' : '' }}"
                                        data-mask="(00) 00000.0000" required>
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
                                    <input type="text" id="whatsapp" name="whatsapp"
                                        value="{{ old('whatsapp', $tenant->whatsapp, null) }}" maxlength="11"
                                        class="form-control {{ $errors->has('whatsapp') ? 'is-invalid' : '' }}"
                                        data-mask="(00) 00000.0000">
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
                                    <input type="text" id="telegram" name="telegram"
                                        value="{{ old('telegram', $tenant->telegram, null) }}" maxlength="11"
                                        class="form-control {{ $errors->has('telegram') ? 'is-invalid' : '' }}"
                                        data-mask="(00) 00000.0000">
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
                                    <input type="text" id="facebook" name="facebook"
                                        value="{{ old('facebook', $tenant->facebook, null) }}" maxlength="80"
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
                                    <input type="text" id="instagram" name="instagram"
                                        value="{{ old('instagram', $tenant->instagram, null) }}" maxlength="80"
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
                                    <input type="text" id="twitter" name="twitter"
                                        value="{{ old('twitter', $tenant->twitter, null) }}" maxlength="80"
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
                                    <input type="text" id="linkedin" name="linkedin"
                                        value="{{ old('linkedin', $tenant->linkedin, null) }}" maxlength="80"
                                        class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}">
                                    <div class="invalid-feedback">{{ $errors->first('linkedin') }} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="website">{{ __('Website') }}</label>
                                <input type="website" id="website" name="website"
                                    value="{{ old('website', $tenant->website, null) }}" maxlength="255"
                                    class="form-control @error('website') is-invalid @enderror" required>
                                <div class="invalid-feedback">{{ $errors->first('website') }} </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" id="email" name="email"
                                    value="{{ old('email', $tenant->email, null) }}" maxlength="255"
                                    class="form-control @error('email') is-invalid @enderror" required>
                                <div class="invalid-feedback">{{ $errors->first('email') }} </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="note">{{ __('Note') }}</label>
                                <textarea name="note" class="form-control @error('note') is-invalid @enderror" rows="4"
                                    style="height: 30mm">{{ old('note', $tenant->note, null) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i>
                            {{ __('Save') }}</button>
                        <a href="{{ route('dashboard') }}" class="btn btb-sm btn-danger"><i
                                class="fas fa-arrow-circle-left"></i>
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
