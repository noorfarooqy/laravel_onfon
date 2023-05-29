<?php
namespace Noorfarooqy\LaravelOnfon\Traits;

trait ResponseHandler
{
    use ErrorHandler;
    public function getResponse($data = []) : object
    {
        return response()->json($this->getPlainResponse($data), $this->getStatus());

    }
    public function getPlainResponse($data = []) : object
    {
        return [
            'error_code' => $this->getErrorCode(),
            'error_message' => $this->getMessage(),
            'error_description' => $this->getErrorDescription(),
            'status' => $this->getStatus(),
            'success_message' => $this->getSuccessMessage(),
            'data' => $data,
        ];

    }

}
