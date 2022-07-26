<x-app-layout>

    <x-slot name="breadcrumb">{{ Breadcrumbs::render('department.index') }}</x-slot>

    <x-slot name="top_right_text">{{ __('Add') }}</x-slot>
    <x-slot name="top_right_url">{{ route('department.create') }}</x-slot>

    <div class="col-span-12">
        @livewire('tables.departments-table')
    </div>

</x-app-layout>
