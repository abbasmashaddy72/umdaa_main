<?php

namespace App\Http\Livewire\Form;

use App\Models\User;
use App\Services\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class UserCES extends Component
{
    // Model Values
    public $name, $email, $password;

    // Custom Values
    public $data, $role;

    protected $rules = [
        'name' => '',
        'email' => '',
        'password' => '',
        'role' => ''
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['password'] = Hash::make($validatedData['password']);

        $role = $validatedData['role'];
        unset($validatedData['role']);

        $user = User::create($validatedData);

        User::find($user->id)->roles()->attach([$role]);

        notify()->success('User Saved Successfully!');

        return $this->redirectRoute('user.index');
    }

    public function update()
    {
        $validatedData = $this->validate();

        if ($this->data->password != $validatedData['password']) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $role = $validatedData['role'];
        unset($validatedData['role']);

        User::where('id', $this->data->id)->update($validatedData);

        User::find($this->data->id)->roles()->sync([$role]);

        notify()->success('User Updated Successfully!');

        return $this->redirectRoute('user.index');
    }

    public function mount($data)
    {
        if (Helper::getRouteAction() != 'create') {
            $this->name = $data->name;
            $this->email = $data->email;
            $this->password = $data->password;
        }
    }

    public function render()
    {
        return view('livewire.form.user-c-e-s');
    }
}
