<?php
namespace Noorfarooqy\LaravelOnfon\Services;

use Noorfarooqy\LaravelOnfon\Traits\OnfonMedia;

class SmsServices extends DefaultService
{
    use OnfonMedia;

    public function __construct($params, array $numbers = [], $message = '', )
    {
        $this->numbers = $numbers;
        $this->message = $message;
        // $this->setMessageParameters();
        $this->message_parameters = $params;
        $this->configOnfon();
    }

    // public function setMessageParameters()
    // {
    //     $this->message_parameters = [];

    //     foreach ($this->numbers as $key => $number) {
    //         $number = $this->formatNumber($number);
    //         $this->message_parameters;
    //     }
    // }
}
