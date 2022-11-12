<x-modal form-action="add">
    <x-slot name="title">
        Re Schedule Appointment of {{ $name }}
    </x-slot>

    <x-slot name="content">
        @if (count(Helper::getKeyValues('Doctor', 'doctor', 'id')) <= 5)
            <div class="flex flex-col mt-2 sm:flex-row">
                @wire()
                    @foreach (Helper::getKeyValues('Doctor', 'doctor', 'id') as $key => $value)
                        <x-form-radio label="{{ $value }}" value="{{ $key }}" name="doctor_id" disabled />
                    @endforeach
                @endwire
            </div>
        @endif

        <div class="grid-cols-2 gap-2 sm:grid">
            @wire()
                <x-simple-select name="doctor_id" id="doctor_id" label="Select Doctor" wire:model="doctor_id" :options="Helper::getKeyValuesWithMap('Doctor', 'doctor', 'id')"
                    value-field='id' text-field='doctor' placeholder="Select Doctor" search-input-placeholder="Search Doctor"
                    :searchable="true" disabled />

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
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary">Save</button>
    </x-slot>
</x-modal>
