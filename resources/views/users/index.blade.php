@extends('_Partials.index')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('users.create') }}" class="btn btb-sm btn-success"><i class="fas fa-user-plus"></i>
                {{ __('New user') }}</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('Code') }}</th>
                        <th cçass="text-center">{{ __('Photo') }}</th>
                        <th class="text-left">{{ __('Name') }}</th>
                        <th class="text-left">{{ __('mail') }}</th>
                        <th class="text-center">{{ __('Status') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-right">{{ $user->id }}</td>
                            <td class="text-center">
                                <img class="direct-chat-img" src="{{ asset('AdminLTE/dist/img/noImagePessoa.png') }}"
                                    alt="message user image">
                            </td>
                            <td>{{ $user->name }}<br>
                                @switch ($user->user_type)
                                    @case (0)
                                        <small></small>
                                    @break

                                    @case (1)
                                        <small>Master</small>
                                    @break

                                    @case (2)
                                        <small>Administrador</small>
                                    @break

                                    @case (3)
                                        <small>Usuário</small>
                                    @break

                                    @case (4)
                                        <small>Paciente</small>
                                    @break
                                @endswitch
                            </td>
                            <td>{{ $user->email }}</td>
                            @if ($user->suspension_date !== null)
                                <td class="text-center">
                                    <span class="badge badge-danger"><i class="fas fa-user-lock"></i>
                                        {{ __('Suspended in') }}
                                        {{ date('d/m/Y', strtotime($user->suspension_date)) }}</span>
                                </td>
                            @else
                                <td class="text-center">
                                    <span class="badge badge-success"><i class="fas fa-user-check"></i>
                                        {{ __('Active') }}
                                    </span>
                                </td>
                            @endif
                            @if ($user->user_type != 1 || ($userAuth->user_type = 1))
                                <td class="text-right">
                                    @if ($user->suspension_date == null)
                                        <a href="{{ route('users.show', ['user' => $user->id]) }}"
                                            class="btn btn-xs btn-primary "><i class="far fa-eye"></i>
                                            {{ __('View') }}</a>
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                            class="btn btn-xs btn-info "><i class="fas fa-pencil-alt"></i>
                                            {{ __('Edit') }}</a>
                                        @if ($userAuth !== intval($user->id))
                                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                class="d-inline formulario-eliminar" method="POST">
                                                @method ('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-xs btn-warning"> <i
                                                        class="fas fa-user-lock"></i>
                                                    {{ __('Suspend') }}</button>
                                            </form>
                                        @endif
                                    @else
                                        <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                            class="d-inline formulario-eliminar" method="POST">
                                            @method ('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-xs btn-success"><i
                                                    class="fas fa-user-check"></i>
                                                {{ __('Reactivate') }}</button>
                                        </form>
                                        <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                            class="d-inline formulario-eliminar" method="POST">
                                            @method ('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-xs btn-danger"><i
                                                    class="fas fa-trash"></i>
                                                {{ __('Delete') }}</button>
                                        </form>
                                    @endif
                                    <!-- <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-xs btn-primary "><i class="fas fa-id-card"></i> Perfil</a>
                                                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-xs btn-primary "><i class="fas fa-tasks"></i> Permissões</a>
                                                                    -->
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection;
