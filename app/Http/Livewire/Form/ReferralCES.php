<?php

namespace App\Http\Livewire\Form;

use App\Models\Referral;
use App\Services\Helper;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class ReferralCES extends Component
{
    // Model Values
    public $name, $qualification, $department_id, $clinic_name, $contact_no, $personal, $location;

    // Custom Values
    public $data, $selectedLocalityId = null;

    protected $rules = [
        'name' => 'required|string|min:10',
        'qualification' => '',
        'department_id' => '',
        'clinic_name' => '',
        'contact_no' => '',
        'personal' => '',
        'location' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();

        Referral::create($validatedData);

        notify()->success('Referral Saved Successfully!');

        return $this->redirectRoute('referral.index');
    }

    public function update()
    {
        $validatedData = $this->validate();

        Referral::where('id', $this->data->id)->update($validatedData);

        notify()->success('Referral Updated Successfully!');

        return $this->redirectRoute('referral.index');
    }

    public function mount($data)
    {
        if (Helper::getRouteAction() != 'create') {
            $this->name = $data->name;
            $this->qualification = $data->qualification;
            $this->department_id = $data->department_id;
            $this->clinic_name = $data->clinic_name;
            $this->contact_no = $data->contact_no;
            $this->personal = $data->personal;
            $this->location = $data->location;
        }
    }

    public function render()
    {
        return view('livewire.form.referral-c-e-s');
    }
}
