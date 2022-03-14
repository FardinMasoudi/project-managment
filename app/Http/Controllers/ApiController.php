<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;


class ApiController extends Controller
{
    private $hasError = false;
    private $responseCode = 200;


    public function setHasError($hasError)
    {
        $this->hasError = $hasError;
        return $this;
    }

    public function setResponseCode($code)
    {
        $this->responseCode = $code;
        return $this;
    }

    public function response($data, $code)
    {
        return response()->json([
            'error' => $this->hasError,
            'code' => $code,
            'data' => $data
        ], 200);
    }

    public function responseOk($data = null, $code = 200): \Illuminate\Http\JsonResponse
    {
        return $this->setHasError(false)
            ->setResponseCode(Response::HTTP_OK)
            ->response($data, $code);
    }

    public function responseError($error = null, $code = 400): \Illuminate\Http\JsonResponse
    {
        return $this->setHasError(true)
            ->serResponseCode(Response::HTTP_BAD_REQUEST)
            ->response($error, $code);
    }
}
