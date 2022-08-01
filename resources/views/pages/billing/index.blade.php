<x-app-layout>
    <div class="grid grid-cols-12 gap-5 mt-5">

        <x-slot name="breadcrumb">{{ Breadcrumbs::render('billing.index') }}</x-slot>

        <div class="col-span-12">
            @livewire('tables.billings-table')
        </div>

    </div>
</x-app-layout>
