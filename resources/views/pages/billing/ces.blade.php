<x-app-layout>
    <div class="grid grid-cols-12 gap-5 mt-5">

        @if (Helper::getRouteAction() == 'create')
            <x-slot name="breadcrumb">{{ Breadcrumbs::render('billing.create') }}</x-slot>
        @elseif(Helper::getRouteAction() == 'edit')
            <x-slot name="breadcrumb">{{ Breadcrumbs::render('billing.edit', $data) }}</x-slot>
        @else
            <x-slot name="breadcrumb">{{ Breadcrumbs::render('billing.show', $data) }}</x-slot>
        @endif

        @livewire('form.billing-c-e-s', ['data' => $data])

    </div>
</x-app-layout>
