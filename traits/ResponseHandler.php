<?php
namespace Noorfarooqy\LaravelOnfon\Traits;

trait ResponseHandler
{
    use ErrorHandler;
    public function getResponse($data = [])
    {
        return response()->json([
            'error_code' => $this->getErrorCode(),
            'error_description' => $this->getErrorDescription(),
            'status' => $this->getStatus(),
            'success_message' => $this->getSuccessMessage(),
            'error_message' => $this->getErrorMessage(),
            'data' => $data,
        ], $this->getStatus());

    }

}
