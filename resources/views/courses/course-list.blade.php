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
                                    <a class="btn btn-warning" href="{{ route('participantes', $course->id) }}">Ver participantes</a>
                                    <a class="btn btn-warning" href="{{ route('editCourse', $course->id) }}">Editar</a>
                                    <a class="btn btn-warning" href="{{ route('deleteCourse', $course->id) }}">Eliminar</a>
                                </td>
                            </tr>
                            @endforeach



                        </tbody>

                    </table>
                    <div>
                        <a href="{{ route('createCourse') }}">Añadir curso</a>
                    </div>
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>