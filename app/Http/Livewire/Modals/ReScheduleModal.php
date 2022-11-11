<?php

namespace App\Http\Livewire\Modals;

use LivewireUI\Modal\ModalComponent;

class ReScheduleModal extends ModalComponent
{
    // Set Data
    public $appointment_id;

    public function render()
    {
        return view('livewire.modals.re-schedule-modal');
    }
}
