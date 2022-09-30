<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Services\QuoteService;

class Quote extends Component
{
    public $quotes = array();

    protected $listeners = [
        'refreshComponent' => 'refreshComponent',
    ];
    public function refreshComponent()
    {
        $this->quotes = array();
    }
    public function render()
    {
        $quoteService = new QuoteService();
        $this->quotes = $quoteService->getRandomQuotes();
        return view('livewire.quote');
    }
}
