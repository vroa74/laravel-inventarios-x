<div wire:init>

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Nombre</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($users as $user)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">{{ $user->id }}</td>
                            <td class="px-4 py-3 text-sm">{{ $user->name }}</td>
                            <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{-- Estado aquí --}}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">

                                <a type="button"
                                   href="{{route('admin.user.edit', $user->id)}}"
                                   class="text-yel<low-400 hover:text-white border border-yellow-400 hover:bg-yellow-500
                                   focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm
                                   px-2 py-0.1 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300
                                   dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
                                    Edit
                                </a>
                                <a type="button"
                                   href="{{route('admin.user.edit', ['adminuser' => $user->id])}}"
                                   class="text-red-400 hover:text-white border border-red-400 hover:bg-red-500
                                   focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm
                                   px-2 py-0.1 text-center me-2 mb-2 dark:border-red-300 dark:text-red-300
                                   dark:hover:text-white dark:hover:bg-red-400 dark:focus:ring-red-900">
                                    delete
                                </a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Enlaces de paginación -->
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
