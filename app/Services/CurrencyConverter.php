<?php
namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class CurrencyConverter
{
    private $apiKey;
    protected $baseUrl="https://api.freecurrencyapi.com/v1/latest";
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }
    public function convert($from,$to,$amount=1): float
    {
        try {

     $response = Http::get($this->baseUrl,[
        'apikey' => $this->apiKey,
        'base_currency' => $from,
        'currencies' => $to,
     ]);
     if ($response->successful()) {
        $result = $response->json();
        $conversionRate = $result['data'][$to] ?? 0;
        return $conversionRate * $amount;
    }  else {
        // Handle the case where the API response is not successful
        throw new Exception("Failed to fetch conversion rate.");
    }
} catch (Exception $e) {
    // Log the error or handle it as needed
    // Optionally, you can log the error message here
    // Log::error($e->getMessage());
    
    // Return a default value in case of failure
    return 0; // or return $amount if you want to return the original amount
}
    }
}