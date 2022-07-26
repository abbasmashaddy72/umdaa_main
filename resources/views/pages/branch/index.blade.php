<x-app-layout>

    <x-slot name="breadcrumb">{{ Breadcrumbs::render('setting.index') }}</x-slot>

    <x-slot name="top_right_text">{{ __('Add') }}</x-slot>
    <x-slot name="top_right_url">{{ route('setting.create') }}</x-slot>

    <div class="col-span-12">
        @livewire('tables.branches-table')
    </div>

</x-app-layout>
