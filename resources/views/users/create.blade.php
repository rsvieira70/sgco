@extends('layouts.index')
@section('content')
<form action="{{route('users.store')}}" method="POST" class="form-horizontal">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="text-info"><i class="fas fa-user"></i> Informações do usuário</h5>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nomecompleto">Nome completo</label>
                                    <input type="text" id="nomecompleto" name="user[name]" value="{{old('user.name')}}" maxlength="60" class="form-control {{$errors->has('user.name') ? 'is-invalid' :''}}" placeholder="Nome Completo" autofocus>
                                    <div class="invalid-feedback">{{ $errors->first('user.name')  }} </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="text-info"><i class="fas fa-user-lock"></i> Informações de login</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" id="email" name="user[email]" value="{{old('user.email')}}" maxlength="255" class="form-control @error('user.email') is-invalid @enderror" placeholder="E-mail do usuário">
                                    <div class="invalid-feedback">{{ $errors->first('user.email')  }} </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="password">Senha</label>
                                    <input type="password" id="password" name="user[password]" maxlength="255" class="form-control @error('user.password') is-invalid @enderror" placeholder="Senha de acesso">
                                    <div class="invalid-feedback">{{ $errors->first('user.password')  }} </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmação da senha</label>
                                    <input type="password" id="password_confirmation" name="user[password_confirmation]" maxlength="255" class="form-control @error('user.password_confirmation') is-invalid @enderror" placeholder="Confirme senha de acesso">
                                    <div class="invalid-feedback">{{ $errors->first('user.password')  }} </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="text-info"><i class="fas fa-hand-point-right"></i> Informações gerais</h5>
                        <div class="form-group">
                            <label for="observacao">Observações</label>
                            <textarea id="observacao" name="workuser[observacao]" value="{{old('work.observacao')}}" class="form-control" rows="4" style="height: 170px;"></textarea>
                            <div class="invalid-feedback">{{ $errors->first('workuser.observacao')  }} </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h5 class="text-info"><i class="fas fa-user-tie"></i> Informações de registro</h5>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="departamento">Departamento</label>
                                    <div class="input-field">
                                        <select class="custom-select" id="departamento" name="workuser[departamento_id]" class="form-control @error('workuser.departamento') is-invalid @enderror">
                                            <option value="" disabled selected>Selecione um departamento</option>
                                            @foreach($departamentos as $departamento)
                                            <option value="{{$departamento->id}}">{{$departamento->descricao}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <div class="input-field">
                                        <select class="custom-select" id="cargo" name="workuser[cargo_id]" class="form-control @error('workuser.cargo_id') is-invalid @enderror">
                                            <option value="" disabled selected>Selecione um cargo</option>
                                            @foreach($cargos as $cargo)
                                            <option value="{{$cargo->id}}">{{$cargo->descricao}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="dataadmissao">Data Admissão</label>
                                    <div class="input-group">
                                        <input type="date" id="dataadmissao" name="workuser[dataadmissao]" value="{{old('workuser.dataadmissao')}}" class="form-control data @error('workuser.dataadmissao') is-invalid @enderror" placeholder="Data admissão">
                                        <div class="invalid-feedback">{{ $errors->first('workuser.dataadmissao')  }} </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="text-info"><i class="fas fa-user-clock"></i> Informações de horario de trabalho</h5>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Dia da semana</label>
                            </div>
                            <div class="col-sm-3">
                                <label>Hora inicial</label>
                            </div>
                            <div class="col-sm-3">
                                <label>Hora final</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="tipodomingo" name="workuser[tipodomingo]" value="{{old('workuser.tipodomingo')}}" class="custom-control-input custom-control-input-primaryr" unchecked>
                                    <label for="tipodomingo" class="custom-control-label">Domingo</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" id="horainicialdomingo" name="workuser[horainicialdomingo]" value="{{old('workuser.horainicialdomingo')}}" class="form-control form-control-sm @error('workuser.horainicialdomingo') is-invalid @enderror" disabled>
                                    <div class="invalid-feedback">{{ $errors->first('workuser.horainicialdomingo')  }} </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" id="horafinaldomingo" name="workuser[horafinaldomingo]" value="{{old('workuser.horafinaldomingo')}}" class="form-control form-control-sm @error('workuser.horafinaldomingo') is-invalid @enderror" disabled>
                                    <div class="invalid-feedback">{{ $errors->first('workuser.horafinaldomingo')  }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="tiposegunda" name="workuser[tiposegunda]" value="{{old('workuser.tipodomingo')}}" class="custom-control-input custom-control-input-primaryr" unchecked>
                                    <label for="tiposegunda" class="custom-control-label">Segunda-feira</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" id="horainicialsegunda" name="workuser[horainicialsegunda]" value="{{old('workuser.horainicialsegunda')}}" class="form-control form-control-sm @error('workuser.horafinalsegunda') is-invalid @enderror" disabled>
                                    <div class="invalid-feedback">{{ $errors->first('workuser.horainicialsegunda')  }} </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" id="horafinalsegunda" name="workuser[horafinalsegunda]" value="{{old('workuser.horafinalsegunda')}}" class="form-control form-control-sm @error('workuser.horafinalsegunda') is-invalid @enderror" disabled>
                                    <div class="invalid-feedback">{{ $errors->first('workuser.horafinalsegunda')  }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="tipoterca" name="workuser[tipoterca]" value="{{old('workuser.tipoterca')}}" class="custom-control-input custom-control-input-primaryr" unchecked>
                                    <label for="tipoterca" class="custom-control-label">Terça-feira</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" id="horainicialterca" name="workuser[horainicialterca]" value="{{old('workuser.horainicialterca')}}" class="form-control form-control-sm @error('workuser.horainicialterca') is-invalid @enderror" disabled>
                                    <div class="invalid-feedback">{{ $errors->first('workuser.horainicialterca')  }} </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" id="horafinalterca" name="workuser[horafinalterca]" value="{{old('workuser.horafinalterca')}}" class="form-control form-control-sm @error('workuser.horafinalterca') is-invalid @enderror" disabled>
                                    <div class="invalid-feedback">{{ $errors->first('workuser.horafinalterca')  }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="tipoquarta" name="workuser[tipoquarta]" value="{{old('workuser.tipoquarta')}}" class="custom-control-input custom-control-input-primaryr" unchecked>
                                    <label for="tipoquarta" class="custom-control-label">Quarta-feira</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" id="horainicialquarta" name="workuser[horainicialquarta]" value="{{old('workuser.horainicialquarta')}}" class="form-control form-control-sm @error('workuser.horainicialquarta') is-invalid @enderror" disabled>
                                    <div class="invalid-feedback">{{ $errors->first('workuser.horainicialquarta')  }} </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" id="horafinalquarta" name="workuser[horafinalquarta]" value="{{old('workuser.horafinalquarta')}}" class="form-control form-control-sm @error('workuser.horafinalquarta') is-invalid @enderror" disabled>
                                    <div class="invalid-feedback">{{ $errors->first('workuser.horafinalquarta')  }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="tipoquinta" name="workuser[tipoquinta]" value="{{old('workuser.tipoquinta')}}" class="custom-control-input custom-control-input-primaryr" unchecked>
                                    <label for="tipoquinta" class="custom-control-label">Quinta-feira</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" id="horainicialquinta" name="workuser[horainicialquinta]" value="{{old('workuser.horainicialquinta')}}" class="form-control form-control-sm @error('workuser.horainicialquinta') is-invalid @enderror" disabled>
                                    <div class="invalid-feedback">{{ $errors->first('workuser.horainicialquinta')  }} </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" id="horafinalquinta" name="workuser[horafinalquinta]" value="{{old('workuser.horafinalquinta')}}" class="form-control form-control-sm @error('workuser.horafinalquinta') is-invalid @enderror" disabled>
                                    <div class="invalid-feedback">{{ $errors->first('workuser.horafinalquinta')  }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="tiposexta" name="workuser[tiposexta]" value="{{old('workuser.tiposexta')}}" class="custom-control-input custom-control-input-primaryr" unchecked>
                                    <label for="tiposexta" class="custom-control-label">Sexta-feira</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" id="horainicialsexta" name="workuser[horainicialsexta]" value="{{old('workuser.horainicialsexta')}}" class="form-control form-control-sm @error('workuser.horainicialsexta') is-invalid @enderror" disabled>
                                    <div class="invalid-feedback">{{ $errors->first('workuser.horainicialsexta')  }} </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" id="horafinalsexta" name="workuser[horafinalsexta]" value="{{old('workuser.horafinalsexta')}}" class="form-control form-control-sm @error('workuser.horafinalsexta') is-invalid @enderror" disabled>
                                    <div class="invalid-feedback">{{ $errors->first('workuser.horafinalsexta')  }} </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="tiposabado" name="workuser[tiposabado]" value="{{old('workuser.tiposabado')}}" class="custom-control-input custom-control-input-primaryr" unchecked>
                                    <label for="tiposabado" class="custom-control-label">Sabado</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" id="horainicialsabado" name="workuser[horainicialsabado]" value="{{old('workuser.horainicialsabado')}}" class="form-control form-control-sm @error('workuser.horainicialsabado') is-invalid @enderror" disabled>
                                    <div class="invalid-feedback">{{ $errors->first('workuser.horainicialsabado')  }} </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="time" id="horafinalsabado" name="workuser[horafinalsabado]" value="{{old('workuser.horafinalsabado')}}" class="form-control form-control-sm @error('workuser.horafinalsabado') is-invalid @enderror" disabled>
                                    <div class="invalid-feedback">{{ $errors->first('workuser.horafinalsabado')  }} </div>
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
            <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Salvar</button>
            <a href="{{ route('users.index') }}" class="btn btb-sm btn-danger"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
        </div>
    </div>
</form>
@endsection;