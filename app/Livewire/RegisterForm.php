<?php

namespace App\Livewire;

use Livewire\Component;

class RegisterForm extends Component
{

    public $firstName = '';
    public $lastName = '';
    public $email = '';
    public $password = '';
    public $role = 'customer';
    public $company_name = '';
    public $vat_number = '';

    protected $rules = [
        'firstName' => ['required', 'min:2'],
        'lastName' => ['required', 'min:2'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8'],
        'role' => ['required'],
        'company_name' => ['required_if:role,vendor'],
        'vat_number' => ['required_if:role,vendor'],
    ];


    public function render()
    {
        return view('livewire.register-form');
    }


    public function submit()
    {
        $this->validate();

        // Register customer
        session()->flash('message', 'Customer created!');


       $this->firstName = '';
       $this->lastName = '';
       $this->email = '';
       $this->password = '';
       $this->role = 'customer';
       $this->company_name = '';
       $this->vat_number = '';
    }

    public function updated($property)
    {
        $this->validateOnly($property);

        if ($property === 'role') {
            $this->validateOnly('company_name');
            $this->validateOnly('vat_number');
        }
    }

}
