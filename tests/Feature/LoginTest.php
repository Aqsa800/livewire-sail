<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire;
use App\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

     /** @test */

    public function test_login()
    {

        Livewire::test('login')
        ->set('form.email', 'user@outlook.com')
        ->set('form.password', 'secret')
        ->call('submit')
        ->assertHasNoErrors(['form.email', 'form.password'])
        ->assertRedirect('/');
    }
}
