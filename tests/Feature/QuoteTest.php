<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire;
use App\Http\Livewire\Quote;

class QuoteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_the_component_can_render()
    {
        Livewire::test(Quote::class)->assertStatus(200);
    }
}
