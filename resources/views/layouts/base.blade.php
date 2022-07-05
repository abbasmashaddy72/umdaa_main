<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $dark_mode ? 'dark' : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">

    @yield('head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{ $slot }}

</html>
