@extends('layouts.index')
@section('content')
<div class="card">
    <div class="card-body">

        <head>
            <link rel="icon" href="publico/favicons/favicon.ico" </head>
        </head>
        <form action="{{route('profile.save')}}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-9">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-user"></i> Dados Pessoais</h5>
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Nome completo</label>
                                    <input type="text" id="nomecompleto" name="name" value="{{$user->name}}" maxlength="50" class="form-control @error('name') is-invalid @enderror" placeholder="Nome Completo" autofocus>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Nome Social</label>
                                    <input type="text" id="nomesocial" name="nomesocial" value="{{$user->nomesocial}}" maxlength="50" class="form-control @error('nomesocial') is-invalid @enderror" placeholder="Nome social">
                                    @error('nomesocial')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Como deseja ser chamado</label>
                                    <input type="text" id="nomereduzido" name="nomereduzido" value="{{$user->nomereduzido}}" maxlength="20" class="form-control @error('nomereduzido') is-invalid @enderror" placeholder="Como deseja ser chamado">
                                    @error('nomereduzido')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>CPF</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" id="cpf" name="cpf" value="{{$user->cpf}}" class="form-control @error('cpf') is-invalid @enderror" placeholder="CPF">
                                        @error('cpf')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Data nascimento</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" id="datanascimento" name="datanascimento" value="{{$user->datanascimento}}" class="form-control @error('datanascimento') is-invalid @enderror" placeholder="Data nascimento">
                                        @error('datanascimento')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="callout callout-info">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-flu    id img-circle" src="{{ asset('AdminLTE/dist/img/noImagePessoa.png') }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$user->name}}</h3>
                            <p class="text-muted text-center">Software Engineer</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-map-signs"></i> Endereço correspondência</h5>
                        <div class="row">
                            <div class="col-sm-2">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input type="text" id="cep" name="cep" value="{{$user->cep}}" maxlength="8" class="form-control @error('cep') is-invalid @enderror" placeholder="CEP" autofocus>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="consultar-cep">Consultar</button>
                                    </div>

                                    @error('cep')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Rua</label>
                                    <input type="text" id="endereco" name="endereco" value="{{$user->endereco}}" maxlength="70" class="form-control @error('endereco') is-invalid @enderror" placeholder="Rua">
                                    @error('endereco')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Número</label>
                                    <input type="text" id="numero" name="numero" value="{{$user->numero}}" maxlength="6" class="form-control @error('numero') is-invalid @enderror" placeholder="Nº ou S/N">
                                    @error('numero')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>COMPLEMENTO</label>
                                    <input type="text" id="complemento" name="complemento" value="{{$user->complemento}}" maxlength="30" class="form-control @error('cep') is-invalid @enderror" placeholder="Complemento" autofocus>
                                    @error('complemento')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input type="text" id="bairro" name="bairro" value="{{$user->bairro}}" maxlength="70" class="form-control @error('bairro') is-invalid @enderror" placeholder="Bairro">
                                    @error('bairro')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input type="text" id="cidade" name="cidade" value="{{$user->cidade}}" maxlength="6" class="form-control @error('cidade') is-invalid @enderror" placeholder="Cidade">
                                    @error('cidade')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label>UF</label>
                                    <input type="text" id="estado" name="estado" value="{{$user->estado}}" maxlength="6" class="form-control @error('estado') is-invalid @enderror" placeholder="estado">
                                    @error('estado')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span>
                                        </div>
                                        <input type="text" id="telefone" name="telefone" value="{{$user->telefone}}" class="form-control @error('telefone') is-invalid @enderror" placeholder="Telefone">
                                        @error('telefone')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Celular</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-mobile-alt"></i></span>
                                        </div>
                                        <input type="text" id="celular" name="celular" value="{{$user->celular}}" class="form-control @error('celular') is-invalid @enderror" placeholder="Celular">
                                        @error('celular')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-people-arrows"></i> Redes sociais</h5>
                        <div class="card-body box-profile">
                            <div class="col-sm-30">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                                        </div>
                                        <input type="text" id="facebook" name="facebook" value="{{$user->facebook}}" maxlength="80" class="form-control @error('facebook') is-invalid @enderror" placeholder="facebook">
                                        @error('facebook')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-20">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-instagram-square"></i></span>
                                        </div>
                                        <input type="text" id="instagran" name="instagran" value="{{$user->instagran}}" maxlength="80" class="form-control @error('instagran') is-invalid @enderror" placeholder="instagran">
                                        @error('Instagram')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-20">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-twitter-square"></i></span>
                                        </div>
                                        <input type="text" id="twitter" name="twitter" value="{{$user->twitter}}" maxlength="80" class="form-control @error('twitter') is-invalid @enderror" placeholder="Twitter">
                                        @error('twitter')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-20">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                        </div>
                                        <input type="text" id="linkedin" name="linkedin" value="{{$user->linkedin}}" maxlength="80" class="form-control @error('linkedin') is-invalid @enderror" placeholder="Linked in">
                                        @error('linkedin')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="callout callout-info">
                <h5><i class="fas fa-user-lock"></i> Informações de login</h5>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" id="email" name="email" value="{{$user->email}}" maxlength="100" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail do usuário" />
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" id="password" name="password" maxlength="100" class="form-control @error('password') is-invalid @enderror" placeholder="Senha de acesso" />
                            @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Confirmação da senha</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" maxlength="100" class="form-control @error('password') is-invalid @enderror" placeholder="Confirmação da senha de acesso" />
                            @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
            </div>
        </form>
    </div>
</div>
@endsection;


<script>
    ConsultarCep.init();
</script>







@section('js')
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<!-- sweet-alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function() {
        $("#nomecompleto").blur(function() {
            var nomesocial = document.getElementById("nomecompleto").value;
            var social = document.getElementById("nomesocial").value;
            var reduzido = document.getElementById("nomereduzido").value;
            var nomereduzido = nomesocial.split(' ')[0];

            if (social == '' || social == null || social == undefined) {
                var $nomesocial = $("input[name='nomesocial']");
                $nomesocial.val(nomesocial);
            }
            if (reduzido == '' || reduzido == null || reduzido == undefined) {
                var $nomereduzido = $("input[name='nomereduzido']");
                $nomereduzido.val(nomereduzido);
            }
        });
    });
</script>
<script>
    $("#telefone").mask("(00) 0000-0000");
    $("#celular").mask("(00) 00000-0000");
    $("#cep").mask("00.000-000");
    $("#cpf").mask("000.000.000-00");
    $("#cnpj").mask("00.000.000/0000-00");
    $("#data").mask("00/00/0000");
</script>
})

@endsection;