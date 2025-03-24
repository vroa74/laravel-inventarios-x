<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4 px-4">
{{--        <div class="max-w-7xl  lg:px-20">--}}
{{--            mx-auto sm:px-6--}}
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">--}}
{{--                <x-welcome />--}}

                @livewire('invent')

{{--            </div>--}}
{{--        </div>--}}
    </div>

    <x-slot name="footer">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

        </h2>
    </x-slot>


</x-app-layout>
