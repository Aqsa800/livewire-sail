<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $form = [
        'email'   => '',
        'password'=> '',
    ];
    protected $rules = [
        'form.password' => 'required',
        'form.email' => 'required|email',
    ];

    protected $messages = [
        'form.email.required' => 'The Email Address  is required.',
        'form.email.email' => 'The Email Address format is not valid.',
        'form.password.required' => 'The Password is required.',
    ];

    public function submit()
    {
        $validatedData = $this->validate();

        if(\Auth::attempt($validatedData['form'])){
            session()->flash('message', 'Post successfully updated.');
            return redirect(route('home'));
        }else{
            session()->flash('error', 'Email and Password are Invalid.');

        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
