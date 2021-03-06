<x-app-layout>

    <x-slot name="breadcrumb">{{ Breadcrumbs::render('referral.index') }}</x-slot>

    <x-slot name="top_right_text">{{ __('Add') }}</x-slot>
    <x-slot name="top_right_url">{{ route('referral.create') }}</x-slot>

    <div class="col-span-12">
        @livewire('tables.referrals-table')
    </div>

</x-app-layout>
