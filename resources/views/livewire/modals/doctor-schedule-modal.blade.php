<x-modal form-action="add">
    <x-slot name="title">
        Add Schedule
    </x-slot>

    <x-slot name="content">
        <x-simple-select label="Select Day" placeholder="Select Day" :options="['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']" wire:model="day" />

        <x-form-input wire:model='appointment_duration' name="appointment_duration" label="Per Patient Time"
            type="number" />

        <x-form-input wire:model='from' name="from" label="From Time" type="time" />

        <x-form-input wire:model='to' name="to" label="Till Time" type="time" />
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary">Save</button>
    </x-slot>
</x-modal>
