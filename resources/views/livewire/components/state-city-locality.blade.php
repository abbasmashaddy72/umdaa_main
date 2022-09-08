<div>
    <div class="grid-cols-3 gap-2 sm:grid">
        <x-simple-select name="selectedState" id="selectedState" label="State" wire:model="selectedState" :options="$states"
            value-field='id' text-field='name' placeholder="Select State" search-input-placeholder="Search State"
            :searchable="true" />

        <x-simple-select name="selectedCity" id="selectedCity" label="City" wire:model="selectedCity" :options="$cities"
            value-field='id' text-field='name' placeholder="Select City" search-input-placeholder="Search City"
            :searchable="true" />

        <x-simple-select name="selectedLocality" id="selectedLocality" label="Locality" wire:model="selectedLocality"
            :options="$localities" value-field='id' text-field='name' placeholder="Select Locality"
            search-input-placeholder="Search Locality" :searchable="true" />
    </div>
</div>
