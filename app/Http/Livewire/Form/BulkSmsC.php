<?php

namespace App\Http\Livewire\Form;

use App\Services\Helper;
use Livewire\Component;

class BulkSmsC extends Component
{
    //Custom Values
    public $templates = [], $doctors, $patients, $selectedDoctors = [], $selectedPatients = [], $contactNumbers, $selectedTemplate, $variableCount;

    public function mount()
    {
        $this->doctors = Helper::getKeyValues('Doctor', 'doctorNumber', 'contact_no');
        $this->patients = Helper::getKeyValues('Patient', 'patient', 'contact_no');
        $this->templates = [
            'Hello variable1,%nYour Policy is expired on variable2, to renew your Policy,%nPlease Contact variable3, - SONU',
            'Dear Agent variable1,%nYou have variable2 Balance to be paid.%nPlease make sure you pay by variable3.%nIf Paid, Please ignore - SONU',
            'Thank You for Purchasing Policy from variable1,%nWe ensure your Safety Always - SONU',
            'Hello variable1,%nYour Policy is being expiring on variable2, to renew your Policy,%nPlease Contact variable3, - SONU'
        ];
    }

    public function updatedSelectedDoctors()
    {
        $this->contactNumbers = implode(', ', array_keys(array_filter($this->selectedDoctors) + array_filter($this->selectedPatients)));
    }

    public function updatedSelectedPatients()
    {
        $this->contactNumbers = implode(', ', array_keys(array_filter($this->selectedDoctors) + array_filter($this->selectedPatients)));
    }

    public function updatedSelectedTemplate()
    {
        $this->selectedTemplate = $this->templates[$this->selectedTemplate];
        $this->variableCount = substr_count($this->selectedTemplate, 'variable');
    }

    public function render()
    {
        return view('livewire.form.bulk-sms-c');
    }
}
