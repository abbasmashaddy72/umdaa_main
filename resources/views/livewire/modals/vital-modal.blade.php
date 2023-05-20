<x-modal form-action="add">
    <x-slot name="title">
        Update Vitals of {{ $name }}
    </x-slot>

    <x-slot name="content">
        <div class="grid-cols-2 gap-2 row-gap-0 sm:grid">
            @wire('debounce.200ms')
                <x-form-input name="pulse_rate" label="Pulse Rate" type="number" />

                <x-form-input name="bp" label="BP" type="text" />

                <x-form-input name="resp_rate" label="Resp. Rate" type="number" />

                <x-form-input name="temp" label="Temperature" type="number" />

                <x-form-input name="spo2" label="SpO2" type="number" />

                <x-form-input name="height" label="Height" type="number" />

                <x-form-input name="weight" label="Weight" type="number" />

                <x-form-input name="bmi" label="BMI" type="number" disabled>
                    @if ($bmi <= 18.5)
                        <small class="text-orange-600 form-text">
                            Underweight
                        @elseif ($bmi > 18.5 && $bmi <= 24.9)
                            <small class="text-green-600 form-text">
                                Normal Weight
                            @elseif ($bmi >= 25 && $bmi <= 29.9)
                                <small class="text-yellow-600 form-text">
                                    Overweight
                                @else
                                    <small class="text-red-600 form-text">
                                        Obesity
                    @endif
                    </small>
                </x-form-input>

                <x-form-input name="bsa" label="BSA" type="number" disabled />

                <x-form-input name="waist" label="Waist" type="number" />

                <x-form-input name="hip" label="Hip" type="number" />

                <x-form-input name="wh_ratio" label="WH Ratio" type="number" disabled>
                    @if ($gender == 'FeMale')
                        @if ($wh_ratio <= 0.8)
                            <small class="text-green-600 form-text">
                                Low Health Risk
                            @elseif ($wh_ratio > 0.81 && $wh_ratio <= 0.84)
                                <small class="text-orange-600 form-text">
                                    Moderate Health Risk
                                @else
                                    <small class="text-red-600 form-text">
                                        High Health Risk
                        @endif
                    @else
                        @if ($wh_ratio <= 0.95)
                            <small class="text-green-600 form-text">
                                Low Health Risk
                            @elseif ($wh_ratio > 0.96 && $wh_ratio <= 1.0)
                                <small class="text-orange-600 form-text">
                                    Moderate Health Risk
                                @else
                                    <small class="text-red-600 form-text">
                                        High Health Risk
                        @endif
                    @endif
                    </small>
                </x-form-input>
            @endwire
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot>
</x-modal>
