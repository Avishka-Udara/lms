<!DOCTYPE html>
<html>
    <head>
        <title>Cources</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('cources.index') }}"> {{ __('Cources') }} </a>
            </h2>
        </x-slot>
        <div class="container">
            @yield('content')
         </div>
    </x-app-layout>
    </body>

</html>
