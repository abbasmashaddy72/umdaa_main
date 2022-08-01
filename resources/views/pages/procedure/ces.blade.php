<x-app-layout>
    <div class="grid grid-cols-12 gap-5 mt-5">

        @if (substr(strstr(Route::currentRouteAction(), '@'), 1) == 'create')
            <x-slot name="breadcrumb">{{ Breadcrumbs::render('procedure.create') }}</x-slot>
        @elseif(substr(strstr(Route::currentRouteAction(), '@'), 1) == 'edit')
            <x-slot name="breadcrumb">{{ Breadcrumbs::render('procedure.edit', $data) }}</x-slot>
        @else
            <x-slot name="breadcrumb">{{ Breadcrumbs::render('procedure.show', $data) }}</x-slot>
        @endif

        @livewire('form.procedure-c-e-s', ['data' => $data])

    </div>
</x-app-layout>
