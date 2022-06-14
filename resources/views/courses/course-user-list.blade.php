<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de usuarios inscritos en el curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session()->has('status'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                </svg></div>
                            <div>
                                <p class="font-bold">Status</p>
                                <p class="text-sm">{{ session()->get('status') }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(session()->has('error'))
                    <div role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            Danger
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>{{ session()->get('error') }}</p>
                        </div>
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
                                    @if(Auth::user()->role_id==3 || Auth::user()->role_id==1)
                                    <a class="btn btn-warning" href="{{ route('changeStatus', $user->id) }}">Activar/desactivar</a>
                                        @if(Auth::user()->role_id==1)
                                        <a class="btn btn-warning" href="{{ route('adminEdit', $user->id) }}">Editar</a>
                                        <a class="btn btn-warning" href="{{ route('deleteUser', $user->id) }}">Eliminar</a>
                                        @endif
                                    @endif
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