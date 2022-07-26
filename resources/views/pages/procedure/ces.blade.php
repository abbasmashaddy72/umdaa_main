<x-app-layout>

    @if (substr(strstr(Route::currentRouteAction(), '@'), 1) == 'create')
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('procedure.create') }}</x-slot>
    @elseif(substr(strstr(Route::currentRouteAction(), '@'), 1) == 'edit')
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('procedure.edit', $data) }}</x-slot>
    @else
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('procedure.show', $data) }}</x-slot>
    @endif

    @livewire('form.procedure-c-e-s', ['data' => $data])

</x-app-layout>
