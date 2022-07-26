<x-app-layout>

    <x-slot name="breadcrumb">{{ Breadcrumbs::render('billing.index') }}</x-slot>

    <div class="col-span-12">
        @livewire('tables.billings-table')
    </div>

</x-app-layout>
