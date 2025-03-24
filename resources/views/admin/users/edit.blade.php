<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit
        </h2>
    </x-slot>
    @if(session ('info'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">{{session ('info')}}</p>
            <p>La operación se realizó correctamente.</p>
        </div>

    @endif



    <hr>
    <br>

    <p class="text-yellow-200 ml-[120px]"> User Name: {{  $user->name }} </p>
    <hr>
    <div class="text-sky-200 ml-[100px]" >

        <form action="{{ route('admin.user.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            @foreach($roles as $role)
                <div>
                    <label>
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="mr-1">
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Asignar rol</button>
        </form>
{{--        {!! Form::mmodel(['route' => ['admon.users.update', $user], 'method' => 'put']) !!}--}}
{{--        @foreach($roles as $role)--}}
{{--            <div>--}}
{{--                <label>--}}
{{--                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}--}}
{{--                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}--}}

{{--                    {{$role->name}}--}}
{{--                </label>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--        {!! Form::submit('asignar rol', ['class' => 'btn btn-primary']) !!}--}}
{{--        {!! Form::close() !!}--}}

{{--        <form action="{{ route('admin.user.update', $user) }}" method="POST">--}}
{{--            @csrf--}}
{{--            <p class="text-pink-200 text-center">--}}
{{--                {{$user->id}} <br>{{$user->name}} <br>{{$user->email}}<br><br>--}}
{{--            </p>--}}
{{--            <input type="text" value="{{$user->name}}" readonly>--}}
{{--            <input type="hidden" name="user_id" value="{{ $user->id }}">--}}

{{--            @method('PUT')--}}

{{--            @foreach($roles as $role)--}}

{{--                <div>--}}
{{--                    <label>--}}
{{--                        <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="mr1">--}}
{{--                        {{ $role->name }}--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--            <x-button class=" mt-2"> Asignar rol</x-button>--}}
{{--        </form>--}}
    </div>


{{--            @livewire('admin.user.index')--}}


</x-app-layout>
