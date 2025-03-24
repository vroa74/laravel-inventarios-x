<div>
    <h1 class="text-sky-300 text-2xl" >Lista</h1>

    <div wire:poll.200ms="procesarPaso">
        <div class="w-full bg-gray-200 rounded-full h-4 my-4">
            <div class="bg-blue-600 h-4 rounded-full transition-all duration-300"
                 style="width: {{ $progreso }}%">
            </div>
        </div>

        <p class="text-green-400 mt-1">Progreso: {{ $progreso }}%</p>

        @if ($progreso >= 100)
            <p class="text-green-500 font-bold mt-2">
                ✅ ¡Completado! Redirigiendo al panel...
            </p>
        @endif
    </div>





</div>
