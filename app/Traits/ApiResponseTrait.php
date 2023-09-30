<?php
namespace App\Traits;

trait ApiResponseTrait {
    public function responseJson(?array $dataResponse, int $responseCode = HTTP_SUCCESS, array $headers = []) {
        if (is_array($dataResponse)) {
            return response()->json($dataResponse, $responseCode, $headers);
        }
        return response(null, $responseCode, $headers);
    }
}
