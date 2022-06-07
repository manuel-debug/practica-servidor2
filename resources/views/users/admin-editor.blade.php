<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editor de usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('editUser') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- ID -->
                        <div>
                            <x-label for="id" :value="__('ID')" />

                            <x-input id="id" class="block mt-1 w-full" type="text" name="id" :value="old('id') ?? $user->id" required autofocus readonly/>
                        </div>

                        <!-- NIF -->
                        <div>
                            <x-label for="nif" :value="__('NIF')" />

                            <x-input id="nif" class="block mt-1 w-full" type="text" name="nif" :value="old('nif') ?? $user->nif" required autofocus />
                        </div>

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $user->name" required autofocus />
                        </div>

                        <!-- last_name -->
                        <div>
                            <x-label for="last_name" :value="__('Last Name')" />

                            <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name') ?? $user->last_name" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email') ?? $user->email" required />
                        </div>

                        <!-- phone_number -->
                        <div>
                            <x-label for="phone_number" :value="__('Phone number')" />

                            <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number') ?? $user->phone_number" autofocus />
                        </div>

                        <!-- Address -->
                        <div>
                            <x-label for="address" :value="__('Address')" />

                            <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address') ?? $user->address" autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password') ?? $user->password" required autocomplete="new-password" />
                        </div>

                        <!-- Profile_picture -->
                        <div>
                            <x-label for="profile_picture" :value="__('Imagen de perfil')" />
                            <img src="{{ asset('uploads/users/'.$user->profile_picture) }}" alt="Image" width="70px" height="70px">
                            <x-input id="profile_picture" class="block mt-1 w-full" type="file" name="profile_picture" autofocus/>
                        </div>

                        <!-- Role_id -->
                        <div>
                            <x-label for="rol" :value="__('Rol')" />
                            <select class="block mt-1 w-full" name="rol">
                                <option {{ ($user->role_id) == '1' ? 'selected' : '' }} value="1">Administrador</option>
                                <option {{ ($user->role_id) == '2' ? 'selected' : '' }} value="2">Estudiante</option>
                                <option {{ ($user->role_id) == '3' ? 'selected' : '' }} value="3">Profesor</option>
                            </select>
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