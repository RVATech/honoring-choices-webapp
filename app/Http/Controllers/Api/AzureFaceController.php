<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use \Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;

class AzureFaceController extends ApiController
{
    public function send(Request $request)
    {
        dd($request);
        $client = new Client([
            'base_url' => config('app.azure.url'),
            'headers' => [
                'content-type' => 'application/json',
                'Ocp-Apim-Subscription-Key' => config('app.azure.key')
            ]
        ]);

        $picture = $request->file();
        $url = $this->sendPhotoToS3($picture);
        $response = $client->post(config('app.azure.url').'/detect', [
            'json' => [
                'url' => $url
            ],
            'query' => [
                'returnFaceId' => 'true',
                'returnFaceLandmarks' => 'false'
            ]
        ]);

        return $response->getBody();
    }

    private function sendPhotoToS3($photo)
    {
        $photoUuid = Uuid::generate(4);
        Storage::disk('s3')->put($photoUuid.$photo->getClientOriginalExtension(), $photo);
        return Storage::disk('s3')->url($photoUuid);
    }
}
