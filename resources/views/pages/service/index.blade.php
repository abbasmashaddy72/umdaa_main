<x-app-layout>

    <x-slot name="breadcrumb">{{ Breadcrumbs::render('service.index') }}</x-slot>

    <x-slot name="top_right_text">{{ __('Add') }}</x-slot>
    <x-slot name="top_right_url">{{ route('service.create') }}</x-slot>

    <div class="col-span-12">
        @livewire('tables.services-table')
    </div>

</x-app-layout>
