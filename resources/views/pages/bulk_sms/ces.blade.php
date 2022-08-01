<x-app-layout>

    @if (Helper::getRouteAction() == 'create')
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('bulk_sms.create') }}</x-slot>
    @elseif(Helper::getRouteAction() == 'edit')
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('bulk_sms.edit', $data) }}</x-slot>
    @else
        <x-slot name="breadcrumb">{{ Breadcrumbs::render('bulk_sms.show', $data) }}</x-slot>
    @endif

    @livewire('form.bulk-sms-c', ['data' => $data])

</x-app-layout>
