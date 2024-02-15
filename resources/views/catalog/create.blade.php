<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight py-2">
            {{ __('VideoClub') }}
        </h2>
    </x-slot>

    <div class="m-12 flex justify-center">
        <div class="md:col-start-4 md:col-span-6">
            <div class="bg-white shadow-md rounded-md overflow-hidden">
                <div class="text-center text-lg font-medium py-4 bg-gray-200">
                    Añadir película
                </div>
                <div class="p-6">
                    <form action="{{route('catalog.store')}}" method="POST">
                        {{-- Protección contra CSRF --}}
                        {{-- Imprescindible en los formularios --}}
                        @csrf

                        <div class="mb-6">
                            {{--<x-input-label for="title">Título</x-input-label>
                            <x-text-input name="title" id="title"></x-text-input>--}}
                            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 p-2 w-full border rounded-md">

                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="year" class="block text-sm font-medium text-gray-700">Año</label>
                            <input type="number" name="year" id="year" value="{{ old('year') }}" class="mt-1 p-2 w-full border rounded-md">

                            @error('year')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-6">
                            <label for="director" class="block text-sm font-medium text-gray-700">Director</label>
                            <input type="text" name="director" id="director" value="{{ old('director') }}" class="mt-1 p-2 w-full border rounded-md">

                            @error('director')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="poster" class="block text-sm font-medium text-gray-700">Poster</label>
                            <input type="text" name="poster" id="poster" value="{{ old('poster') }}" class="mt-1 p-2 w-full border rounded-md">

                            @error('poster')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="synopsis" class="block text-sm font-medium text-gray-700">Resumen</label>
                            <textarea name="synopsis" id="synopsis" class="mt-1 p-2 w-full border rounded-md" rows="3"> {{ old('synopsis') }}</textarea>

                            @error('synopsis')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Añadir película
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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
<h1>Create</h1>
</body>
</html>--}}
