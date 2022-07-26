<x-app-layout>

    @if (substr(strstr(Route::currentRouteAction(), '@'), 1) == 'create')
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('setting.create') }}</x-slot>
    @elseif(substr(strstr(Route::currentRouteAction(), '@'), 1) == 'edit')
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('setting.edit', $data) }}</x-slot>
    @else
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('setting.show', $data) }}</x-slot>
    @endif

    @livewire('form.setting-c-e-s', ['data' => $data])

</x-app-layout>
