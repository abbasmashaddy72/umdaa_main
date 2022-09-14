<div class="grid-cols-3 gap-2 sm:grid">
    <x-simple-select name="doctor_id" id="doctor_id" label="Select Doctor" wire:model="doctor_id" :options="Helper::getKeyValuesWithMap('Doctor', 'doctor', 'id')"
        value-field='id' text-field='doctor' placeholder="Select Doctor" search-input-placeholder="Search Doctor"
        wire:click="calculate()" :searchable="true" />

    <x-form-input name="date" label="Select Date" type="date" min="{{ today()->format('Y-m-d') }}" />
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
            {{ __('No Slots Available Today, Next Slots Available on ' . implode(', ', $working_days)) }}</h2>
    @endforelse
@endif
