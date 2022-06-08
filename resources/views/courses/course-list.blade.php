<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Cursos') }}
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

                            <th>Nombre</th>

                            <th>Profesor</th>

                            <th>Fecha de inicio</th>

                            <th>Fecha de fin</th>

                            <th>Fecha de inscripcion</th>

                            <th>Duracion</th>

                            <th>Descripcion</th>

                            <th>Coste</th>

                            <th>Participantes</th>

                            <th>Acción</th>
                        </thead>

                        <tbody>
                            @foreach($courses as $course)

                            <tr>

                                <td>{{$course->id}} </td>

                                <td>{{$course->name}} </td>

                                <td>{{$course->teacher->name}} {{$course->teacher->last_name}}</td>

                                <td>{{$course->init_date}} </td>

                                <td>{{$course->end_date}} </td>

                                <td>{{$course->enroll_date}} </td>

                                <td>{{$course->duration}} </td>

                                <td>{{$course->description}}</td>

                                <td>{{$course->cost}}</td>

                                <td>{{$course->participantes}}</td>

                                <td>
                                    <a class="btn btn-warning" href="{{ route('changeStatus', $course->id) }}">Activar/desactivar</a>
                                    <a class="btn btn-warning" href="{{ route('adminEdit', $course->id) }}">Editar</a>
                                    <a class="btn btn-warning" href="{{ route('deleteUser', $course->id) }}">Eliminar</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>