<x-app-layout>

    <x-slot name="breadcrumb">{{ Breadcrumbs::render('user.index') }}</x-slot>

    <x-slot name="top_right_text">{{ __('Add') }}</x-slot>
    <x-slot name="top_right_url">{{ route('user.create') }}</x-slot>

    <div class="col-span-12">
        @livewire('tables.users-table')
    </div>

</x-app-layout>
