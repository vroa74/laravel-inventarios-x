<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4 text-gray-700">Lista de Registros</h2>

            @if(session('success'))
                <div id="successMessage" class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>

                <script>
                    setTimeout(function() {
                        var successMessage = document.getElementById('successMessage');
                        if (successMessage) {
                            successMessage.style.transition = "opacity 0.5s";
                            successMessage.style.opacity = "0";
                            setTimeout(() => successMessage.remove(), 500);
                        }
                    }, 5000); // 10 segundos (10000 ms)
                </script>
                @endif

            <div class="mb-4 flex justify-between">
                <a href="{{ route('ages.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Agregar Nuevo
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
                    <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-4 py-2 text-left text-gray-700">ID</th>
                        <th class="px-4 py-2 text-left text-gray-700">Título</th>
                        <th class="px-4 py-2 text-left text-gray-700">Nombre</th>
                        <th class="px-4 py-2 text-left text-gray-700">Apellido Paterno</th>
                        <th class="px-4 py-2 text-left text-gray-700">Apellido Materno</th>
                        <th class="px-4 py-2 text-left text-gray-700">Cargo</th>
                        <th class="px-4 py-2 text-left text-gray-700">Departamento</th>
                        <th class="px-4 py-2 text-left text-gray-700">Teléfono</th>
                        <th class="px-4 py-2 text-left text-gray-700">Email</th>
                        <th class="px-4 py-2 text-left text-gray-700">Dirección</th>
                        <th class="px-4 py-2 text-left text-gray-700">Modificado Por</th>
                        <th class="px-4 py-2 text-center text-gray-700">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ages as $age)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $age->id }}</td>
                            <td class="px-4 py-2">{{ $age->titulo }}</td>
                            <td class="px-4 py-2">{{ $age->nombre }}</td>
                            <td class="px-4 py-2">{{ $age->apaterno }}</td>
                            <td class="px-4 py-2">{{ $age->amaterno }}</td>
                            <td class="px-4 py-2">{{ $age->cargo }}</td>
                            <td class="px-4 py-2">{{ $age->deporg }}</td>
                            <td class="px-4 py-2">{{ $age->telefono }}</td>
                            <td class="px-4 py-2">{{ $age->email }}</td>
                            <td class="px-4 py-2">{{ $age->dir }}</td>
                            <td class="px-4 py-2">{{ $age->modifico }}</td>
                            <td class="px-4 py-2 text-center">
                                <a href="{{ route('ages.show', $age->id) }}" class="text-blue-600 hover:text-blue-800 mr-2">Ver</a>
                                <a href="{{ route('ages.edit', $age->id) }}" class="text-yellow-600 hover:text-yellow-800 mr-2">Editar</a>
                                <form action="{{ route('ages.destroy', $age->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE') <!-- IMPORTANTE: Laravel espera DELETE para eliminar -->
                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('¿Seguro que quieres eliminar este registro?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 flex justify-center">
                {{ $ages->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
