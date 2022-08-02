<?php

namespace App\Http\Livewire\Form;

use App\Services\Helper;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingsStatic extends Component
{
    use WithFileUploads;

    // Static Key
    public $name, $contact_no, $image, $gst;

    public function mount()
    {
        $this->name = Helper::get_static_option('name');
        $this->contact_no = Helper::get_static_option('contact_no');
        $this->image = Helper::get_static_option('image');
        $this->gst = Helper::get_static_option('gst');
    }

    protected $rules = [
        'name' => '',
        'contact_no' => '',
        'image' => '',
        'gst' => ''
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $validatedData = $this->validate();

        foreach ($validatedData as $key => $value) {
            if ($key == 'image') {
                $image = $value->store('logo', 'public');
                Helper::set_static_option($key, $image);
            } else {
                unset($validatedData['image']);
                Helper::set_static_option($key, $value);
            }
        }

        return $this->redirectRoute('branch.index');
    }

    public function render()
    {
        return view('livewire.form.settings-static');
    }
}
