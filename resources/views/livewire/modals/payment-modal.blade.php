<x-modal form-action="add">
    <x-slot name="title">
        Update Payment of {{ $name }}
    </x-slot>

    <x-slot name="content">
        @wire('debounce.200ms')
            <x-simple-select name="procedure_id" id="procedure_id" label="Select Procedure (If Any)"
                wire:model="procedure_id" :options="Helper::getKeyValuesWithMap('Procedure', 'name', 'id')" value-field='id' text-field='name'
                placeholder="Select Procedure" search-input-placeholder="Search Procedure" :searchable="true" />

            <x-form-input name="registration_fee" label="Doctor Registration Fee" type="number" disabled />

            <x-form-input name="consultation_fee" label="Doctor Consultation Fee" type="number" disabled />

            <x-form-input name="procedure_price" label="Procedure Fee" type="number" disabled />

            <x-form-input name="discount" label="Discount" type="number" />

            <x-form-input name="round_off" label="Round Off" type="number" step=".01" />

            <x-form-input name="totalPayment" label="Total Payment" type="number" disabled />

            <x-simple-select name="mode_of_payment" id="mode_of_payment" label="Select Mode of Payment"
                wire:model="mode_of_payment" :options="Helper::getEnum('billings', 'mode_of_payment')" placeholder="Please Select Mode of Payment"
                search-input-placeholder="Search Mode of Payment" :searchable="true" />

            @if ($mode_of_payment != 'Cash' && !is_null($mode_of_payment))
                <x-form-input name="transaction_details" label="Transaction Details (ID, Check No.)" type="text" />
            @endif
        @endwire
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary">Save</button>
    </x-slot>
</x-modal>
