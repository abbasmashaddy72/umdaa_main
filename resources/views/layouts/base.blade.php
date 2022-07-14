<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $dark_mode ? 'dark' : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon" type="image/svg+xml">

    <title>
        @if (Route::getCurrentRoute()->middleware()[1] == 'guest')
            {{ $title . ' | ' ?? '' }}{{ config('app.name', 'Laravel') }}
        @else
            @if (substr(strstr(Route::currentRouteAction(), '@'), 1) == 'create')
                {{ __('Create') . ' ' . $title . ' | ' ?? '' }}
            @elseif(substr(strstr(Route::currentRouteAction(), '@'), 1) == 'edit')
                {{ __('Edit') . ' ' . $title . ' | ' ?? '' }}
            @elseif(substr(strstr(Route::currentRouteAction(), '@'), 1) == 'show')
                {{ __('Show') . ' ' . $title . ' | ' ?? '' }}
            @else
                {{ $title . ' | ' ?? '' }}
            @endif
            {{ config('app.name', 'Laravel') }}
        @endif
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

{{ $slot }}

</html>
