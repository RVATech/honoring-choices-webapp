<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller {
    protected $statusCode = 200;

    public function respondWithSuccess($payload)
    {
        return $this->respondWithJson($payload);
    }

    public function respondWithCreated($payload)
    {
        $this->statusCode = 201;
        return $this->respondWithJson($payload);
    }

    public function respondNotImplemented()
    {
        $this->statusCode = 501;
        return $this->respondWithJson(['message' => 'This feature is not yet implemented.']);
    }

    private function respondWithJson($payload)
    {
        return response()->json($payload, $this->statusCode);
    }
}