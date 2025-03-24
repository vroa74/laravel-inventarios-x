<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        @include('layouts.look.styles')
    </head>
    <body>
        <div    class="flex h-screen bg-gray-50 dark:bg-gray-900"     :class="{ 'overflow-hidden': isSideMenuOpen }">
            @include('layouts.look.siderbar')
            <div class="flex flex-col flex-1 w-full">
                @include('layouts.look.header')

                <main class="h-full overflow-y-auto">
                    @yield('content')
                    @livewire('rg')
                </main>
            </div>
        </div>
        @include('layouts.look.script')
    </body>
</html>
