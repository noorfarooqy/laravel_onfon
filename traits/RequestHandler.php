<?php
namespace Noorfarooqy\LaravelOnfon\Traits;

use Illuminate\Support\Facades\Validator;

trait RequestHandler
{
    use ErrorHandler;

    protected $rules;
    protected $request;
    protected $validator;
    protected $has_failed;
    protected $is_json;

    public function customValidate()
    {
        $this->validator = Validator::make($this->request->all(), $this->rules);
        $this->has_failed = $this->validator->fails();
        $this->setError($this->validator->errors()->first());
    }

    public function validatedData(): array
    {
        return $this->validator->validated();
    }
    public function setResponseType()
    {
        $this->is_json = $this->request?->expectsJson() ?? true;
    }
}
