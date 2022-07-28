<div>
    @wire('debounce.200ms')
        <x-form-select name="selectedState" label="Select State" :options="$states" placeholder="Please Select" />

        @if (!is_null($selectedState))
            <x-form-select name="selectedCity" label="Select City" :options="$cities" placeholder="Please Select" />
        @endif

        @if (!is_null($selectedCity))
            <x-form-select name="selectedLocality" label="Select Locality" :options="$localities" placeholder="Please Select" />
        @endif
    @endwire
</div>
