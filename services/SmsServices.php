<?php
namespace Noorfarooqy\LaravelOnfon\Services;

use Noorfarooqy\LaravelOnfon\Traits\OnfonMedia;

class SmsServices extends DefaultService
{
    use OnfonMedia;
    
    
    public function __construct($numbers, $message)
    {
        $this->numbers = $numbers;
        $this->message = $message;
    }

    private function setMessageParameters()
    {
        $this->message_parameters = [];

        foreach ($this->numbers as $key => $number) {
            $number = $this->formatNumber($number);
            $this->message_parameters = [
                'Number' => $number,
                'Text' => $this->message,
            ];
        }
    }
}
