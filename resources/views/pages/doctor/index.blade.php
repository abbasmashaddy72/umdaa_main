<x-app-layout>

    <x-slot name="breadcrumb">{{ Breadcrumbs::render('doctor.index') }}</x-slot>

    <x-slot name="top_right_text">{{ __('Add') }}</x-slot>
    <x-slot name="top_right_url">{{ route('doctor.create') }}</x-slot>

    <div class="col-span-12">
        @livewire('tables.doctors-table')
    </div>

</x-app-layout>
