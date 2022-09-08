<div class="grid-cols-3 gap-2 sm:grid">
    <x-simple-select name="doctor_id" id="doctor_id" label="Select Doctor" wire:model="doctor_id" :options="Helper::getKeyValuesWithMap('Doctor', 'doctor', 'id')"
        value-field='id' text-field='doctor' placeholder="Select Doctor" search-input-placeholder="Search Doctor"
        wire:click="calculate()" :searchable="true" />

    <x-form-input name="date" label="Select Date {{ $day }}" type="date" />
</div>

@if (!empty($this->doctor_id))
    @forelse ($appointment_dates as $key => $value)
        <x-form-label label="{{ $value->day }}" />
        <div class="grid grid-cols-12 gap-2 mt-5 gap-y-5">
            @foreach (Helper::getTimeSlots($value->from, $value->to, $value->appointment_duration) as $item)
                <div class="col-span-12 intro-y sm:col-span-1">
                    <label class="inline-flex items-center">
                        <input wire:key="5" type="radio" wire:model="time.{{ $item }}"
                            name="time.{{ $item }}" value="{{ $item }}">
                        <span class="ml-2">{{ $item }}</span>
                    </label>
                </div>
            @endforeach
        </div>
    @empty
        <h2>{{ __('No Data') }}</h2>
    @endforelse
@endif
