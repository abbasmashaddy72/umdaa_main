<x-modal form-action="add">
    <x-slot name="title">
        Add Education
    </x-slot>

    <x-slot name="content">
        <x-form-input wire:model='title' name="title" label="Title" type="text" />

        <x-form-input wire:model='completed' name="completed" label="Completed (Year Only YYYY)" type="text" />

        <x-form-input wire:model='where' name="where" label="Where" type="text" />
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary">Save</button>
    </x-slot>
</x-modal>
