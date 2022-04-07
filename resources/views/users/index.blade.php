@extends('layouts.index')
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('users.create') }}" class="btn btb-sm btn-success"><i class="fas fa-user-plus"></i> Novo
            Usuário</a>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center" >Código</th>
                    <th class="text-left">Nome</th>
                    <th class="text-left">E-mail</th>
                    <th class="text-left">Função</th>
                    <th class="text-center">Admissão</th>
                    <th class="text-center">Status</th>
                    <th class="text-right">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="text-right">{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->workuser->funcao}}</td>
                    @if($user->workuser->dataadmissao !== null) 
                        <td class="text-center">{{ date ('d/m/Y', strtotime($user->workuser->dataadmissao))}}</td>
                    @else
                        <td class="text-center"> </td>
                    @endif
                    @if($user->workuser->datasuspensao !== null) 
                        <td class="text-center">
                            <span class="badge badge-danger"><i class="fas fa-user-lock"></i> Suspenso em {{ date ('d/m/Y', strtotime($user->workuser->datasuspensao))}}</span>
                        </td>
                    @else
                        <td class="text-center">
                            <span class="badge badge-success"><i class="fas fa-user-check"></i> Ativo</span>
                        </td>
                    @endif
                    <td class="text-right">
                        @if($user->workuser->datasuspensao == null)
                            <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-xs btn-success "><i class="far fa-eye"></i> visualizar</a>
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-xs btn-info "><i class="fas fa-pencil-alt"></i> Editar</a>
                            @if($loggedId !== intval($user->id))
                                <form action="{{route('users.destroy', ['user' => $user->id]) }}" class="d-inline formulario-eliminar" method="POST">
                                    @method ('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-xs btn-warning"> <i class="fas fa-user-lock"></i> Suspender</button>
                                </form>
                                <form action="{{route('users.destroy', ['user' => $user->id]) }}" class="d-inline formulario-eliminar" method="POST">
                                    @method ('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Excluir</button>
                                </form>
                            @endif
                        @else
                            <form action="{{route('users.destroy', ['user' => $user->id]) }}" class="d-inline formulario-eliminar" method="POST">
                                @method ('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-xs btn-success"><i class="fas fa-user-check"></i> Ativar</button>
                            </form>
                        @endif
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-xs btn-primary "><i class="fas fa-id-card"></i> Perfil</a>
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-xs btn-primary "><i class="fas fa-tasks"></i> Permissões</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection;