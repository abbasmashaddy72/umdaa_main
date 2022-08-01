<x-app-layout>
    <div class="grid grid-cols-12 gap-5 mt-5">

        <x-slot name="breadcrumb">{{ Breadcrumbs::render('role.index') }}</x-slot>

        <x-slot name="top_right_text">{{ __('Add') }}</x-slot>
        <x-slot name="top_right_url">{{ route('role.create') }}</x-slot>

        <div class="col-span-12">
            @livewire('tables.roles-table')
        </div>

    </div>
</x-app-layout>
