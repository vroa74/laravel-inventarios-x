<div class="text-white">

    <div id="accordion-collapse" data-accordion="collapse" class="w-full mb-4">
        <h2 id="accordion-collapse-heading-1">
            <button
                type="button"
                class="flex items-center justify-between w-full px-5 py-2 font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-t-3xl focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-800 dark:bg-gray-800 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 gap-3"
                data-accordion-target="#accordion-collapse-body-1"
                aria-expanded="true"
                aria-controls="accordion-collapse-body-1"
            >
                <span>Filtros</span>
                <svg data-accordion-icon class="w-4 h-4 rotate-180 transition-transform duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-1" class="" aria-labelledby="accordion-collapse-heading-1">
            <div class="p-5 border border-gray-300 rounded-b-3xl dark:border-gray-700 dark:bg-gray-900">
                <p class="text-gray-600 dark:text-gray-400">
                {{--                  ------------------------------------------------------------------------------------------------------------------------------------  --}}

                <div class="w-full">
                    <table class="w-full table-auto border-separate">
                        <tr>
                            {{-- Columna 1 --}}
                            <td class="text-black font-bold px-6 py-4 border-4 border-red-500 rounded-3xl text-center align-middle">
                                <div class="flex flex-col items-center justify-center space-y-2">
                                    <div class="flex items-center gap-2">
                                        <label class="text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">Dirección</label>
                                        <input type="text" wire:model.live="dir"
                                               class="p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500
                               focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                               dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <label class="text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">Resguardante</label>
                                        <input type="text" wire:model.live="resguardante"
                                               class="p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500
                               focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                               dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <label class="text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">User</label>
                                        <input type="text" wire:model.live="user"
                                               class="p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500
                               focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                               dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                </div>
                            </td>

                            {{-- Columna 2 --}}
                            <td class="text-black font-bold px-6 py-4 border-4 border-blue-500 rounded-3xl text-center align-middle">
                                <div class="flex flex-col items-center justify-center space-y-2">
                                    <div class="flex items-center gap-2">
                                        <label class="text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">No. Inv.</label>
                                        <input type="text" wire:model.live="ni"
                                               class="p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500
                               focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                               dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <label class="text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">Artículo</label>
                                        <input type="text" wire:model.live="articulo"
                                               class="p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500
                               focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                               dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <label class="text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">Marca</label>
                                        <input type="text" wire:model.live="marca"
                                               class="p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500
                               focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                               dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                </div>
                            </td>

                            {{-- Columna 3 --}}
                            <td class="text-black font-bold px-6 py-4 border-4 border-green-500 rounded-3xl text-center align-middle">
                                <div class="flex flex-col items-center justify-center space-y-2">
                                    <div class="flex items-center gap-2">
                                        <label class="text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">Modelo</label>
                                        <input type="text" wire:model.live="modelo"
                                               class="p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500
                               focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                               dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <label class="text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">NS</label>
                                        <input type="text" wire:model.live="NS"
                                               class="p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500
                               focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                               dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                </div>
                            </td>

                            {{-- Columna 4 --}}
                            <td class="text-black font-bold px-6 py-4 border-4 border-yellow-500 rounded-3xl text-center align-middle">
                                <div class="flex flex-col items-center justify-center space-y-2">
                                    <div class="flex items-center gap-2">
                                        <label class="text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">Nombres</label>
                                        <input type="text" wire:model.live="nombres"
                                               class="p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500
                               focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                               dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <label class="text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">Apa</label>
                                        <input type="text" wire:model.live="apa"
                                               class="p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500
                               focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                               dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <label class="text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">Ama</label>
                                        <input type="text" wire:model.live="ama"
                                               class="p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500
                               focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                               dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>

                {{--                  ------------------------------------------------------------------------------------------------------------------------------------  --}}

                </p>
            </div>
        </div>
    </div>


{{--    {{$invtario}}--}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 dark:hover:text-base">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        id
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                   Dirección
                </th>
                <th scope="col" class="px-6 py-3">
                    Usuario
                </th>
                <th scope="col" class="px-6 py-3">
                    Datos
                </th>
                <th scope="col" class="px-6 py-3">
                    Accessories
                </th>
                <th scope="col" class="px-6 py-3">
                    Available
                </th>
                <th scope="col" class="px-6 py-3">
                    Price

                    Weight
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($inventario as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 text-10px dark:hover:text-base hover:text-base ">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        {{$item->id}}
                    </div>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                    {{$item->dir}}
                </th>
                <td class="px-6 py-4">
                    {{$item->resguardante}} <br>
                    {{$item->user}} <br>
                    {{$item->gpo}}
                </td>
                <td class="px-6 py-4">
                    {{$item->ni}} <br>
                    {{$item->articulo}} <br>
                    {{$item->marca}}

                </td>
                <td class="px-6 py-4">
                    {{$item->modelo}} <br>
                    {{$item->NS}} <br>
                    {{$item->marca}}
                </td>
                <td class="px-6 py-4">
                    {{$item->nombres}} <br>
                    {{$item->apa}} <br>
                    {{$item->ama}} <br>
                    {{$item->ter}}
                    <p >  </p>
                </td>
                <td class="px-6 py-4">

                    @php
                        $qrData = $this->mostrarQr($item);
                        $borderColor = $qrData['from_file'] ? 'fuchsia' : 'green';
                        $timestamp = $qrTimestamps[$item->ni] ?? '';
                        $imgSrc = $qrData['src'] . ($timestamp ? '?t=' . $timestamp : '');
                    @endphp

                    @if ($qrData['src'] && !str_contains($qrData['src'], 'ERROR'))
                        <div
                            style="display: inline-block; border: 4px solid {{ $borderColor }}; padding: 2px; cursor: pointer;"
                            wire:click="regenerarQr('{{ $item->ni }}')"
                            title="Haz clic para regenerar QR"
                        >
                            <img src="{{ $imgSrc }}" alt="QR Code" width="100" height="100">
                        </div>
                    @else
                        <p>No QR</p>
                    @endif




                    {{--                    @if($this->getQrCode($item))--}}
{{--                        --}}{{--                                    <img src="{{ $this->getQrCode($items) }}" alt="QR Code" style="width: 150px; height: 150px;">--}}
{{--                        <img src="{{ $this->getQrCode($item) }}" alt="QR Code" width="100" height="100">--}}
{{--                    @else--}}
{{--                        <p>No QR</p>--}}
{{--                    @endif--}}
                </td>
                <td class="flex items-center px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        {{ $inventario->links() }}

    </div>

</div>
