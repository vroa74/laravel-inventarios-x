<x-app-layout>
    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">Detalles del Registro</h2>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <strong class="text-gray-600">Título:</strong> {{ $age->titulo ?? 'N/A' }}
                </div>
                <div>
                    <strong class="text-gray-600">Nombre:</strong> {{ $age->nombre ?? 'N/A' }}
                </div>
                <div>
                    <strong class="text-gray-600">Apellido Paterno:</strong> {{ $age->apaterno ?? 'N/A' }}
                </div>
                <div>
                    <strong class="text-gray-600">Apellido Materno:</strong> {{ $age->amaterno ?? 'N/A' }}
                </div>
                <div>
                    <strong class="text-gray-600">Cargo:</strong> {{ $age->cargo ?? 'N/A' }}
                </div>
                <div>
                    <strong class="text-gray-600">Departamento:</strong> {{ $age->deporg ?? 'N/A' }}
                </div>
                <div>
                    <strong class="text-gray-600">Teléfono:</strong> {{ $age->telefono ?? 'N/A' }}
                </div>
                <div>
                    <strong class="text-gray-600">Email:</strong> {{ $age->email ?? 'N/A' }}
                </div>
                <div class="col-span-2">
                    <strong class="text-gray-600">Dirección:</strong> {{ $age->dir ?? 'N/A' }}
                </div>
                <div>
                    <strong class="text-gray-600">Modificado Por:</strong> {{ $age->modifico ?? 'N/A' }}
                </div>
            </div>

            <div class="mt-6 flex justify-between">
                <a href="{{ route('ages.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg shadow">
                    Volver a la Lista
                </a>
                <a href="{{ route('ages.edit', $age->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow">
                    Editar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
