<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class BranchCES extends Component
{
    // Custom Values
    public $data, $selectedLocalityId = null;

    // Listeners
    protected $listeners = ['locality_changed' => 'locality_changed'];

    // Listeners Function
    public function locality_changed($locality_id)
    {
        $this->selectedLocalityId = $locality_id;
    }

    public function render()
    {
        return view('livewire.form.branch-c-e-s');
    }
}
