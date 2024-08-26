<?php

namespace App\Traits;

trait ApiResponses
{
    protected function ok($data = null, $message = 'Success', $token = null)
    {
        return $this->success($data, $message, $token);
    }

    protected function success($data, $message, $token = null, $statusCode = 200)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'token' => $token,
            'status' => $statusCode,
        ], $statusCode);
    }
}
