<x-app-layout>

    <x-slot name="breadcrumb">{{ Breadcrumbs::render('procedure.index') }}</x-slot>

    <x-slot name="top_right_text">{{ __('Add') }}</x-slot>
    <x-slot name="top_right_url">{{ route('procedure.create') }}</x-slot>

    <div class="col-span-12">
        @livewire('tables.procedures-table')
    </div>

</x-app-layout>
