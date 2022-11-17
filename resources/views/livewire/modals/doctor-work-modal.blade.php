<x-modal form-action="add">
    <x-slot name="title">
        Add Work
    </x-slot>

    <x-slot name="content">
        <x-form-input wire:model='where' name='where' label='Where' type='text' />

        <x-form-input wire:model='designation' name="designation" label="Designation" type="text" />

        <x-form-input wire:model='from' name="from" label="From (Year Only YYYY)" type="number" />

        <x-form-input wire:model='to' name="to" label="Till (Year Only YYYY)" type="number" />
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary">Save</button>
    </x-slot>
</x-modal>
