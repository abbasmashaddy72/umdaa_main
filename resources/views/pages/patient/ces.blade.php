<x-app-layout>

    @if (substr(strstr(Route::currentRouteAction(), '@'), 1) == 'create')
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('patient.create') }}</x-slot>
    @elseif(substr(strstr(Route::currentRouteAction(), '@'), 1) == 'edit')
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('patient.edit', $data) }}</x-slot>
    @else
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('patient.show', $data) }}</x-slot>
    @endif

    @livewire('form.patient-c-e-s', ['data' => $data])

</x-app-layout>
