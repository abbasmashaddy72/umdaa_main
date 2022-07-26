<x-app-layout>

    <x-slot name="breadcrumb">{{ Breadcrumbs::render('role.index') }}</x-slot>

    <x-slot name="top_right_text">{{ __('Add') }}</x-slot>
    <x-slot name="top_right_url">{{ route('role.create') }}</x-slot>

    <div class="col-span-12">
        @livewire('tables.roles-table')
    </div>

</x-app-layout>
