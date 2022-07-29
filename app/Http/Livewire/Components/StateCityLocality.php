<?php

namespace App\Http\Livewire\Components;

use App\Models\City;
use App\Models\Locality;
use App\Services\Helper;
use Livewire\Component;

class StateCityLocality extends Component
{
    public $states;
    public $cities;
    public $localities;

    public $selectedState = null;
    public $selectedCity = null;
    public $selectedLocality = null;

    public function mount($selectedLocality = null)
    {
        $this->states = Helper::getKeyValues('State', 'name', 'id');
        $this->cities = collect();
        $this->localities = collect();
        $this->selectedLocality = $selectedLocality;

        if (!is_null($selectedLocality)) {
            $locality = Locality::find($selectedLocality);
            $this->localities = Helper::getKeyValues('Locality', 'name', 'id', 'city_id', $locality->city_id);
            $city = City::find($locality->city_id);
            $this->cities = Helper::getKeyValues('City', 'name', 'id', 'state_id', $city->state_id);
            $this->selectedCity = $locality->city_id;
            $this->selectedState = $city->state_id;
        }
    }

    public function render()
    {
        return view('livewire.components.state-city-locality');
    }

    public function updatedSelectedState($state)
    {
        $this->cities = Helper::getKeyValues('City', 'name', 'id', 'state_id', $state);
        $this->selectedCity = null;
    }

    public function updatedSelectedCity($city)
    {
        $this->localities = Helper::getKeyValues('Locality', 'name', 'id', 'city_id', $city);
    }

    public function updatedSelectedLocality()
    {
        $this->emit('locality_changed', ['locality_id' => $this->selectedLocality]);
    }
}
