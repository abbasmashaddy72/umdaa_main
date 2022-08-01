<x-app-layout>
    <div class="grid grid-cols-12 gap-5 mt-5">

        @if (substr(strstr(Route::currentRouteAction(), '@'), 1) == 'create')
            <x-slot name="breadcrumb">{{ Breadcrumbs::render('service.create') }}</x-slot>
        @elseif(substr(strstr(Route::currentRouteAction(), '@'), 1) == 'edit')
            <x-slot name="breadcrumb">{{ Breadcrumbs::render('service.edit', $data) }}</x-slot>
        @else
            <x-slot name="breadcrumb">{{ Breadcrumbs::render('service.show', $data) }}</x-slot>
        @endif

        @livewire('form.service-c-e-s', ['data' => $data])

    </div>
</x-app-layout>
