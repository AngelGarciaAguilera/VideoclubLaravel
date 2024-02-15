<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight py-2">
            {{ __('VideoClub') }}
        </h2>
    </x-slot>

    @if(session('notification'))
        <x-slot name="notification">
            <p class="text-white font-bold">
                {{ session('notification') }}
            </p>
        </x-slot>
    @endif

    <div class="w-3/6 py-12 mx-auto flex flex-wrap items-center justify-center">
        <div class="w-full sm:w-1/2">
            <img class="w-96 object-cover" src="{{$film['poster']}}"/>
        </div>
        <div class="w-full sm:w-1/2 ">
            <h1 class="mb-2 text-xl font-bold">{{$film['title']}}</h1>
            <h2>{{__("Año: ").$film['year']}}</h2>
            <h2>{{__("Director: ").$film['director']}}</h2>
            <p class="my-5"><strong>{{__("Resumen: ")}}</strong>{{$film['synopsis']}}</p>
            <p class="my-5"><strong>{{__("Estado: ")}}</strong>{{$film['rented'] ? "Película actualmente alquilada" : "Película disponible"}}</p>
            <section class="flex">
                @if($film['rented'])
                    <form action="{{ route('catalog.return', $film['id']) }}" method="POST" class="w-fit">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="mr-2 py-2 px-4 bg-red-500 text-white border border-black rounded-md cursor-pointer">{{__("Devolver película")}}</button>
                    </form>
                @else
                    <form action="{{ route('catalog.rent', $film['id']) }}" method="POST" class="w-fit">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="mr-2 py-2 px-4 bg-sky-500 text-white border border-black rounded-md cursor-pointer">{{__("Alquilar película")}}</button>
                    </form>
                @endif

                {{--En caso de más de un parámetro se pasará como un array asociativo--}}
                <a href="{{ route("catalog.edit", $film['id']) }}" class="mr-2 py-2 px-4 bg-yellow-500 text-white border border-black rounded-md cursor-pointer">{{__("Editar")}}</a>
                <form action="{{ route('catalog.delete', $film['id']) }}" method="POST" class="w-fit">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="mr-2 py-2 px-4 bg-red-500 text-white border border-black rounded-md cursor-pointer">{{__("Eliminar")}}</button>
                </form>
                <a href="{{ route("catalog.index") }}" class="mr-2 py-2 px-4 bg-white-500 text-black border border-black rounded-md cursor-pointer">{{__("Volver")}}</a>
            </section>
        </div>
    </div>
</x-app-layout>
{{--<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Show</h1>
<p>ID: {{$id}}</p>
</body>
</html>--}}
