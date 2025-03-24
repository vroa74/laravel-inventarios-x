<x-app-layout>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">Editar Registro</h2>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <strong>Errores encontrados:</strong>
                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ages.update', $age->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')  <!-- IMPORTANTE: Usar PUT en la actualización -->

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" name="titulo" id="titulo" value="{{ $age->titulo }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-blue-300" maxlength="5">
                    </div>

                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ $age->nombre }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-blue-300" maxlength="30" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="apaterno" class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
                        <input type="text" name="apaterno" id="apaterno" value="{{ $age->apaterno }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-blue-300" maxlength="30">
                    </div>

                    <div>
                        <label for="amaterno" class="block text-sm font-medium text-gray-700">Apellido Materno</label>
                        <input type="text" name="amaterno" id="amaterno" value="{{ $age->amaterno }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-blue-300" maxlength="30">
                    </div>
                </div>

                <div>
                    <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo</label>
                    <input type="text" name="cargo" id="cargo" value="{{ $age->cargo }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-blue-300" maxlength="30">
                </div>

                <div>
                    <label for="deporg" class="block text-sm font-medium text-gray-700">Departamento</label>
                    <input type="text" name="deporg" id="deporg" value="{{ $age->deporg }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-blue-300" maxlength="60">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" value="{{ $age->telefono }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-blue-300" maxlength="255">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ $age->email }}" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-blue-300" maxlength="255">
                    </div>
                </div>

                <div>
                    <label for="dir" class="block text-sm font-medium text-gray-700">Dirección</label>
                    <textarea name="dir" id="dir" rows="3" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-blue-300">{{ $age->dir }}</textarea>
                </div>

                <input type="hidden" name="modifico" value="{{ auth()->user()->email }}">
                <div class="flex justify-between space-x-4 mt-4">
                    <a href="{{ route('ages.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg shadow">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
