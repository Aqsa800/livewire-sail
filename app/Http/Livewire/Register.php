<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class Register extends Component
{
    public $form = [
        'name'                  => '',
        'email'                 => '',
        'password'              => '',
        'password_confirmation' => '',
    ];

    protected $rules = [
        'form.email'    => 'required|email',
        'form.name'     => 'required',
        'form.password_confirmation' => 'required',
        'form.password' => 'required|confirmed',

    ];

    protected $messages = [
        'form.name.required' => 'The Name is required.',
        'form.email.required' => 'The Email Address  is required.',
        'form.email.email' => 'The Email Address format is not valid.',
        'form.password.required' => 'The Password is required.',
        'form.password.confirmed' => 'The Password doest match Confirm Password.',
        'form.password_confirmation.required' => 'The Confirm Password is required.',
    ];


    public function submit()
    {
        $validatedData = $this->validate();
        User::create($validatedData['form']);
        return redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.register');
    }
}
