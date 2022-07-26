<x-app-layout>

    @if (substr(strstr(Route::currentRouteAction(), '@'), 1) == 'create')
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('role.create') }}</x-slot>
    @elseif(substr(strstr(Route::currentRouteAction(), '@'), 1) == 'edit')
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('role.edit', $data) }}</x-slot>
    @else
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('role.show', $data) }}</x-slot>
    @endif

    @livewire('form.role-c-e-s', ['data' => $data])

</x-app-layout>
