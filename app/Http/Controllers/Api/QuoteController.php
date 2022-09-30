<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Traits\ApiResponser;
use App\Services\QuoteService;

class QuoteController extends Controller
{
    use ApiResponser;

    protected $quoteService;

    public function __construct(QuoteService $quoteService)
    {
        $this->quoteService = $quoteService;
    }

    public function __invoke()
    {
        $quotes = $this->quoteService->getRandomQuotes();
        return $this->success([
            $quotes
        ], "Quotes List");
    }
}
