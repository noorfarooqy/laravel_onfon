<?php
namespace Noorfarooqy\LaravelOnfon\Services;

use Noorfarooqy\LaravelOnfon\Contracts\ServiceContract;
use Noorfarooqy\LaravelOnfon\Traits\ErrorHandler;
use Noorfarooqy\LaravelOnfon\Traits\RequestHandler;
use Noorfarooqy\LaravelOnfon\Traits\ResponseHandler;

abstract class DefaultService implements ServiceContract
{
    use ErrorHandler;
    use RequestHandler;
    use ResponseHandler;
}
