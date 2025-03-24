<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Crear Nuevo CO') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('cos.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Legislatura</label>
                            <input type="text" name="legislatura" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Fecha CAP</label>
                            <input type="date" name="fcap" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Fecha REC</label>
                            <input type="date" name="frec" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Número Correlativo</label>
                            <input type="text" name="ncor" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Tipo Correlativo</label>
                            <input type="text" name="tcor" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Código Correlativo</label>
                            <input type="text" name="ccor" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Fecha Oficio</label>
                            <input type="date" name="fofi" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Número Oficio</label>
                            <input type="text" name="nofi" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Número de Hojas</label>
                            <input type="number" name="nhoj" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700 dark:text-gray-300">Remitente</label>
                        <input type="text" name="rem_nombre" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Cargo Remitente</label>
                            <input type="text" name="rem_cargo" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300">Departamento Org. Remitente</label>
                            <input type="text" name="rem_deporg" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700 dark:text-gray-300">Dirección Remitente</label>
                        <textarea name="rem_dir" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm"></textarea>
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700 dark:text-gray-300">Descripción</label>
                        <textarea name="des" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm"></textarea>
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700 dark:text-gray-300">Seguimiento</label>
                        <textarea name="seguimiento" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm"></textarea>
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700 dark:text-gray-300">Reporte+++++</label>
                        <input type="text" name="reporte" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700 dark:text-gray-300">Estatus</label>
                        <select name="estatus" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('cos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700 mr-2">Cancelar</a>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Guardar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
