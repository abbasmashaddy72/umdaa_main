<x-app-layout>
    <div class="grid grid-cols-12 gap-5 mt-5">

        @if (Helper::getRouteAction() == 'create')
            <x-slot name="breadcrumb">{{ Breadcrumbs::render('appointment.create') }}</x-slot>
        @elseif(Helper::getRouteAction() == 'edit')
            <x-slot name="breadcrumb">{{ Breadcrumbs::render('appointment.edit', $data) }}</x-slot>
        @else
            <x-slot name="breadcrumb">{{ Breadcrumbs::render('appointment.show', $data) }}</x-slot>
        @endif

        @livewire('form.appointment-c-e-s', ['data' => $data])

    </div>
</x-app-layout>
