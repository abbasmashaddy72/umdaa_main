<x-app-layout>
    <div class="grid grid-cols-12 gap-5 mt-5">

        <x-slot name="breadcrumb">{{ Breadcrumbs::render('branch.index') }}</x-slot>

        <x-slot name="top_right_text">{{ __('Add') }}</x-slot>
        <x-slot name="top_right_url">{{ route('branch.create') }}</x-slot>

        <div class="col-span-12">
            @livewire('tables.branches-table')
        </div>

    </div>
    <div class="grid grid-cols-12 gap-5 mt-5 mb-5">

        <div class="col-span-12">
            @livewire('form.settings-static')
        </div>

    </div>
</x-app-layout>
