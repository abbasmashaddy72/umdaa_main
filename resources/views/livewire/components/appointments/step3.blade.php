<div class="grid-cols-2 gap-2 sm:grid">
    <div class="col-span-12 intro-y sm:col-span-1">
        <x-form-label label="Amount Calculation" />
        <div class="grid-cols-2 gap-2 sm:grid">
            <x-form-input name="doctorRegistrationFee" label="Doctor Registration Fee" type="number" disabled />

            <x-form-input name="doctorConsultationFee" label="Doctor Consultation Fee" type="number" disabled />

        </div>
        <x-form-input name="procedureFee" label="Procedure Fee" type="number" disabled />

        <div class="grid-cols-2 gap-2 sm:grid">
            <x-form-input name="discount" wire:click="calculate()" label="Discount" type="number" />

            <x-form-input name="round_off" wire:click="calculate()" label="Round Off" type="number" step=".01" />
        </div>

        <div class="grid-cols-2 gap-2 sm:grid">
            <x-form-input name="totalPayment" label="Total Payment" type="number" disabled />

            <x-simple-select name="mode_of_payment" id="mode_of_payment" label="Select Mode of Payment"
                wire:model="mode_of_payment" :options="Helper::getEnum('billings', 'mode_of_payment')" placeholder="Please Select Mode of Payment"
                search-input-placeholder="Search Mode of Payment" :searchable="true" />
        </div>
    </div>
</div>
