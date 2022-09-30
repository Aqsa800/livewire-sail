<?php


namespace App\Services;


use App\Exceptions\GuzzleRequestException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class QuoteService
{
    public $quotes = array();

    public function getRandomQuotes()
    {
        try{
            for ($i=0; $i<5; $i++) {
                $response = Http::get('https://api.kanye.rest/');
                $quote = json_decode($response)->quote;
                array_push($this->quotes, $quote);
            }
            return $this->quotes;
        }
        catch(\Exception $e){
            return false;
        }
    }
}
