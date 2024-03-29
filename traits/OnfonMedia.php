<?php

namespace Noorfarooqy\LaravelOnfon\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait OnfonMedia
{

    public $api_key;
    public $client_id;
    public $access_key;
    public $api_url;
    public $api_urlv2;
    public $sender_id;
    public $endpoint;

    public $message_parameters;
    public $scheduleTime;
    public $is_unicode;
    public $is_flash;

    public $numbers;
    public $message;
    public $response;
    public $dlr_url;
    public function configOnfon()
    {
        $this->api_key = config('onfonmedia.api_key');
        $this->client_id = config('onfonmedia.client_id');
        $this->sender_id = config('onfonmedia.sender_id');
        $this->access_key = config('onfonmedia.access_key');
        $this->api_url = config('onfonmedia.api_url');
        $this->api_urlv2 = config('onfonmedia.api_urlv2');
        $this->dlr_url = config('onfonmedia.dlr_url');
    }

    public function formatNumber($number)
    {
        $len = strlen($number);
        if ($len != 10 && $len = 9 && $len != 12 & $len != 13) {
            $this->setError($m = 'The number is not valid');
            return $number;
        }
        switch (substr($number, 0, 1)) {
            case '7':
                $number = '254' . substr($number, 0, strlen($number));
                break;
            case '0':
                $number = '254' . substr($number, 1, strlen($number));
                break;
            case '+':
                $number = substr($number, 1, strlen($number));
                break;
            default:
                $number = $number;
                break;
        }

        return $number;
    }
    public function sendBulkSms()
    {
        $this->endpoint = $this->api_url . config('onfonmedia.endpoints.send_bulk_sms');
        $request_body = [
            "SenderId" => $this->sender_id,
            "IsUnicode" => true,
            "IsFlash" => true,
            "MessageParameters" => $this->message_parameters,
            "ApiKey" => $this->api_key,
            "ClientId" => $this->client_id,
        ];
        $headers = [
            'Content-Type' => 'application/json',
            'AccessKey' => $this->access_key,
        ];
        $this->response = Http::withHeaders($headers)->post($this->endpoint, $request_body);

        return $this->response;
    }
    public function sendBulkSmsV2($to, $content)
    {
        $this->endpoint = $this->api_urlv2 . config('onfonmedia.endpoints.send_sms_v2');
        
        $request_body = [
            "to" => $to,
            "from" => $this->sender_id,
            "content" => $content,
            "dlr" => 'yes',
            "dlr-url" => $this->dlr_url ?? env('APP_URL') . '/delivery',
            "dlr-level" => 1,
        ];
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer $this->access_key",
            'Accept' => 'application/json'
        ];
        $this->response = Http::withHeaders($headers)->post($this->endpoint, $request_body);

        return $this->response;
    }
}
