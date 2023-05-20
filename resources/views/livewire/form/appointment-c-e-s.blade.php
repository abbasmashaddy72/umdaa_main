<x-custom-form>
    @if (is_null($doctor_id) || is_null($date) || is_null($time))
        {{-- Doctor Check --}}
        <div>
            @if (count(Helper::getKeyValues('Doctor', 'doctor', 'id')) <= 5)
                <div class="flex flex-col mt-2 sm:flex-row">
                    @wire()
                        @foreach (Helper::getKeyValues('Doctor', 'doctor', 'id') as $key => $value)
                            <x-form-radio label="{{ $value }}" value="{{ $key }}" name="doctor_id" />
                        @endforeach
                    @endwire
                </div>
            @endif

            <div class="grid-cols-3 gap-2 sm:grid">
                @wire()
                    <x-simple-select name="doctor_id" id="doctor_id" label="Select Doctor" wire:model="doctor_id"
                        :options="Helper::getKeyValuesWithMap('Doctor', 'doctor', 'id')" value-field='id' text-field='doctor' placeholder="Select Doctor"
                        search-input-placeholder="Search Doctor" :searchable="true" />

                    <x-form-input name="date" label="Select Date" type="date" min="{{ today()->format('Y-m-d') }}" />
                @endwire
            </div>

            @if (!empty($this->doctor_id))
                @forelse ($appointment_dates as $key => $value)
                    <div class="grid grid-cols-12 gap-2 mt-5 gap-y-5">
                        @foreach (Helper::getTimeSlots($value->from, $value->to, $value->appointment_duration) as $item)
                            <div class="col-span-12 sm:col-span-1">
                                <label class="inline-flex items-center">
                                    <input wire:key="5" type="radio" wire:model="time" name="time"
                                        value="{{ $item }}" class="form-check-input"
                                        @if ($date == today()->format('Y-m-d') && \Carbon\Carbon::parse($item)->format('H:i') <= now()->format('H:i')) disabled @endif
                                        @if (\Carbon\Carbon::parse($this->time)->format('H:i') == \Carbon\Carbon::parse($item)->format('H:i')) checked @endif>
                                    <span
                                        class="ml-2 form-check-label @if ($date == today()->format('Y-m-d') && \Carbon\Carbon::parse($item)->format('H:i') <= now()->format('H:i')) text-gray-600 @endif">{{ $item }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                @empty
                    <h2 class="col-span-12 mt-4 text-center">
                        @if (empty($working_days))
                            {{ __('Please Add Slots to') . $doctorName }}
                            <a class="underline text-primary" target="__blank"
                                href="{{ route('doctor.edit', [$doctor_id]) }}">{{ __('Click Hear to Redirect') }}</a>
                        @else
                            {{ __('No Slots Available Today, Next Slots Available on ' . implode(', ', $working_days)) }}
                        @endif
                    </h2>
                @endforelse
            @endif
        </div>
    @endif

    @if (!is_null($doctor_id) && !is_null($date) && !is_null($time))

        <div>
            {{-- Patient Select --}}
            <div class="flex justify-center">
                <div class="text-lg font-medium">
                    Doctor: {{ $doctorName }}, Date: {{ $date }}, Day: {{ $day }} & Time:
                    {{ $time }}
                </div>
            </div>
            <div class="grid-cols-12 gap-4 sm:grid">
                <div class="col-span-6">
                    <div class="p-5 mt-4 shadow-md drop-shadow-lg box">
                        <div class="mt-3">
                            <label class="text-base font-medium">{{ __('Select Patient') }}</label>
                            <div class="flex flex-col mt-2 sm:flex-row">
                                <div class="mr-2 form-check">
                                    <label class="inline-flex items-center">
                                        <input type="radio" wire:model="radio_patient_id" name="radio_patient_id"
                                            value="New Patient" class="form-check-input">
                                        <span class="ml-2 form-check-label">{{ __('New Patient') }}</span>
                                    </label>
                                </div>
                                <div class="mt-2 mr-2 form-check sm:mt-0">
                                    <label class="inline-flex items-center">
                                        <input type="radio" wire:model="radio_patient_id" name="radio_patient_id"
                                            value="Old Patient" class="form-check-input" checked>
                                        <span class="ml-2 form-check-label">{{ __('Old Patient') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        @if ($this->radio_patient_id == 'New Patient')
                            <div class="col-span-12 lg:col-span-12">
                                <div class="p-2">
                                    <div class="grid-cols-4 gap-2 sm:grid">
                                        @wire('debounce.200ms')
                                            <x-form-input name="name" label="Name" type="text" />

                                            <x-simple-select name="gender" id="gender" label="Gender"
                                                wire:model="gender" :options="Helper::getEnum('patients', 'gender')" placeholder="Please Select"
                                                search-input-placeholder="Search Gender" :searchable="true" />

                                            <x-form-input name="dob" label="Date of Birth" type="date">
                                                <small class="ml-2 text-green-600 form-text">
                                                    {{ \Carbon\Carbon::parse($dob)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days') }}
                                                </small>
                                            </x-form-input>

                                            <x-input-with-search name="age" label="Age" type="number"
                                                :options="$options" />
                                        @endwire
                                    </div>

                                    @livewire('components.state-city-locality', ['selectedLocality' => $selectedLocalityId])

                                    <div class="grid-cols-3 gap-2 sm:grid">
                                        @wire('debounce.200ms')
                                            <x-form-input name="contact_no" label="Contact No." type="number" />

                                            <x-simple-select name="blood_group" id="blood_group" label="Blood Group"
                                                wire:model="blood_group" :options="Helper::getEnum('patients', 'blood_group')" placeholder="Please Select"
                                                search-input-placeholder="Search Blood Group" :searchable="true" />

                                            <x-form-textarea name="description" label="About Patient" />
                                        @endwire
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($radio_patient_id == 'Old Patient')
                            <x-simple-select name="patient_id" id="patient_id" label="Select Patient"
                                wire:model="patient_id" :options="Helper::getKeyValuesWithMap('Patient', 'patient', 'id')" value-field='id' text-field='patient'
                                placeholder="Select Patient" search-input-placeholder="Search Patient"
                                :searchable="true" />
                        @endif

                        <x-simple-select name="referral_id" id="referral_id" label="Select Referral Doctor"
                            wire:model="referral_id" :options="Helper::getKeyValuesWithMap('Referral', 'doctor', 'id')" value-field='id' text-field='doctor'
                            placeholder="Select Referral Doctor" search-input-placeholder="Search Referral Doctor"
                            :searchable="true" />

                        <x-simple-select name="procedure_id" id="procedure_id" label="Select Procedure (If Any)"
                            wire:model="procedure_id" :options="Helper::getKeyValuesWithMap('Procedure', 'name', 'id')" value-field='id' text-field='name'
                            placeholder="Select Procedure" search-input-placeholder="Search Procedure"
                            :searchable="true" />
                    </div>
                </div>

                <div class="col-span-3">
                    <x-form-group label="Vitals" class="p-5 shadow-md drop-shadow-lg box">
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
                                        <small class="ml-2 text-orange-600 form-text">
                                            Underweight
                                        @elseif ($bmi > 18.5 && $bmi <= 24.9)
                                            <small class="ml-2 text-green-600 form-text">
                                                Normal Weight
                                            @elseif ($bmi >= 25 && $bmi <= 29.9)
                                                <small class="ml-2 text-yellow-600 form-text">
                                                    Overweight
                                                @else
                                                    <small class="ml-2 text-red-600 form-text">
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
                                            <small class="ml-2 text-green-600 form-text">
                                                Low Health Risk
                                            @elseif ($wh_ratio > 0.81 && $wh_ratio <= 0.84)
                                                <small class="ml-2 text-orange-600 form-text">
                                                    Moderate Health Risk
                                                @else
                                                    <small class="ml-2 text-red-600 form-text">
                                                        High Health Risk
                                        @endif
                                    @else
                                        @if ($wh_ratio <= 0.95)
                                            <small class="ml-2 text-green-600 form-text">
                                                Low Health Risk
                                            @elseif ($wh_ratio > 0.96 && $wh_ratio <= 1.0)
                                                <small class="ml-2 text-orange-600 form-text">
                                                    Moderate Health Risk
                                                @else
                                                    <small class="ml-2 text-red-600 form-text">
                                                        High Health Risk
                                        @endif
                                    @endif
                                    </small>
                                </x-form-input>
                            @endwire
                        </div>
                    </x-form-group>
                </div>

                <div class="col-span-3">
                    <x-form-group label="Amount Calculation" class="p-5 shadow-md drop-shadow-lg box">
                        @wire('debounce.200ms')
                            <x-form-input name="registration_fee" label="Doctor Registration Fee" type="number"
                                disabled />

                            <x-form-input name="consultation_fee" label="Doctor Consultation Fee" type="number"
                                disabled />

                            <x-form-input name="procedure_price" label="Procedure Fee" type="number" disabled />

                            <div class="grid-cols-2 gap-2 sm:grid">
                                <x-form-input name="discount" label="Discount (%)" type="number" />
                                <x-form-input name="discount_inr" label="Discount (INR)" type="number" />
                            </div>

                            <x-form-input name="round_off" label="Round Off" type="number" step=".01" />

                            <x-form-input name="totalPayment" label="Total Payment" type="number" disabled />

                            <div class="grid-cols-2 gap-2 sm:grid">
                                <x-simple-select name="mode_of_payment" id="mode_of_payment" label="Mode of Payment"
                                    wire:model="mode_of_payment" :options="Helper::getEnum('billings', 'mode_of_payment')"
                                    placeholder="Please Select Mode of Payment"
                                    search-input-placeholder="Search Mode of Payment" :searchable="true" />

                                @if ($mode_of_payment != 'Cash' && !is_null($mode_of_payment))
                                    <x-form-input name="transaction_details" label="Transaction Id" type="text" />
                                @endif
                            </div>

                            <div class="mt-2">
                                <x-form-checkbox name="billing_status" label="Pay Later" />
                            </div>
                        @endwire
                    </x-form-group>
                </div>
            </div>
        </div>
    @endif
</x-custom-form>
