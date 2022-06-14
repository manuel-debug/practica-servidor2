<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editor de cursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{route('storeCourse')}}" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- Teacher -->
                        <div>
                            <x-label for="teacher_id" :value="__('Teacher')" />

                            <select class="block mt-1 w-full" name="teacher_id">
                                @foreach($profesores as $profesor)
                                <option value="{{ $profesor->id }}" {{$profesor->id == old('teacher_id')  ? 'selected' : ''}}>{{$profesor->name}}{{$profesor->last_name}}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <!-- Init_date -->
                        <div class="mt-4">
                            <x-label for="init_date" :value="__('Fecha de inicio')" />

                            <x-input id="init_date" class="block mt-1 w-full" type="text" name="init_date" :value="old('init_date')" required />
                        </div>

                        <!-- End_date -->
                        <div>
                            <x-label for="end_date" :value="__('Fecha de fin')" />

                            <x-input id="end_date" class="block mt-1 w-full" type="text" name="end_date" :value="old('end_date')" autofocus />
                        </div>

                        <!-- Enroll_date -->
                        <div>
                            <x-label for="enroll_date" :value="__('Fecha de inscripcion')" />

                            <x-input id="enroll_date" class="block mt-1 w-full" type="text" name="enroll_date" :value="old('enroll_date')" autofocus />
                        </div>

                        <!-- Duration -->
                        <div>
                            <x-label for="duration" :value="__('Duracion')" />

                            <x-input id="duration" class="block mt-1 w-full" type="text" name="duration" :value="old('duration')" required autofocus />
                        </div>

                        <!-- Description -->
                        <div>
                            <x-label for="description" :value="__('Descripcion')" />

                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
                        </div>

                        <!-- Cost -->
                        <div>
                            <x-label for="cost" :value="__('Coste')" />

                            <x-input id="cost" class="block mt-1 w-full" type="text" name="cost" :value="old('cost')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button type="submit" class="ml-4">
                                {{ __('Done') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>