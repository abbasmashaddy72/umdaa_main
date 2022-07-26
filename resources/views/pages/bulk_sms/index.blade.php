<x-app-layout>

    <x-slot name="breadcrumb">{{ Breadcrumbs::render('bulk_sms.index') }}</x-slot>

    <x-slot name="top_right_text">{{ __('Add') }}</x-slot>
    <x-slot name="top_right_url">{{ route('bulk_sms.create') }}</x-slot>

    <div class="col-span-12">
        @livewire('tables.bulk-s-m-s-table')
    </div>

</x-app-layout>
