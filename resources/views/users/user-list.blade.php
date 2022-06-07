<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                    @endif
                    @if(session()->has('error'))
                    <div class="alert alert-success">
                        {{ session()->get('error') }}
                    </div>
                    @endif
                    <table class="table table-hover">

                        <thead>

                            <th>ID</th>

                            <th>NIF</th>

                            <th>Nombre</th>

                            <th>Apellidos</th>

                            <th>Email</th>

                            <th>Número de teléfono</th>

                            <th>Dirección</th>

                            <th>Estado</th>

                            <th>Imagen de perfil</th>

                            <th>Rol</th>

                            <th>Acción</th>
                        </thead>

                        <tbody>
                            @foreach($users as $user)

                            <tr>

                                <td>{{$user->id}} </td>

                                <td>{{$user->nif}} </td>

                                <td>{{$user->name}} </td>

                                <td>{{$user->last_name}} </td>

                                <td>{{$user->email}} </td>

                                <td>{{$user->phone_number}} </td>

                                <td>{{$user->address}} </td>

                                <td>@if($user->status==0)
                                    No activo
                                    @else
                                    Activo
                                    @endif
                                </td>

                                <td>
                                    <img src="{{ asset('uploads/users/'.$user->profile_picture) }}" alt="Image" width="70px" height="70px">
                                </td>

                                <td>
                                    {{$user->role->type}}
                                </td>

                                <td>
                                    <a class="btn btn-warning" href="{{ route('changeStatus', $user->id) }}">Activar/desactivar</a>
                                    <a class="btn btn-warning" href="{{ route('adminEdit', $user->id) }}">Editar</a>
                                    <a class="btn btn-warning" href="{{ route('deleteUser', $user->id) }}">Eliminar</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>