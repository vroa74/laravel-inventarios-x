@extends('layouts.admin')

@section('title', 'Panel de Administración')

@section('header')
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-1 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Panel de Administración') }}
            </h2>
        </div>
    </header>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <h3>Bienvenido al Panel de Administración</h3>
                <p>Aquí va el contenido dinámico...</p>
            </div>
        </div>
    </div>
@endsection
