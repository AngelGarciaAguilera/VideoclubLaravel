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

    <div class="flex flex-wrap mx-auto py-12 w-3/6">
        @foreach( $films as $film )
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 px-4 text-center">
                <a href="{{ url('/catalog/show/' . $film['id'] ) }}">
                    <img src="{{$film['poster']}}" class="h-48 object-cover mx-auto"/>
                    <h4 class="min-h-12 my-2">
                        {{$film['title']}}
                    </h4>
                </a>
            </div>
        @endforeach
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
<h1>Index</h1>
</body>
</html>--}}
