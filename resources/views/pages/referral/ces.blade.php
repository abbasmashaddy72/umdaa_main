<x-app-layout>

    @if (substr(strstr(Route::currentRouteAction(), '@'), 1) == 'create')
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('referral.create') }}</x-slot>
    @elseif(substr(strstr(Route::currentRouteAction(), '@'), 1) == 'edit')
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('referral.edit', $data) }}</x-slot>
    @else
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('referral.show', $data) }}</x-slot>
    @endif

    @livewire('form.referral-c-e-s', ['data' => $data])

</x-app-layout>
