<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire;
class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_register()
    {
        Livewire::test('register')
        ->set('form.name', 'user')
        ->set('form.email', 'user@outlook.com')
        ->set('form.password', 'secret')
        ->set('form.password_confirmation', 'secret')
        ->call('submit')
        ->assertHasNoErrors(['form.name', 'form.email', 'form.password','form.password_confirmation'])
        ->assertRedirect('login');
    }
}
