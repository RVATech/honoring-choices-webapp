<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AzureFaceController extends ApiController
{
    public function send(Request $request)
    {
        $client = new \GuzzleHttp\Client([
            'base_url' => ''
        ]);
    }
}
