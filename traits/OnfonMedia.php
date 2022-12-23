<?php
namespace Noorfarooqy\LaravelOnfon\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait OnfonMedia
{

    protected $api_key;
    protected $client_id;
    protected $access_key;
    protected $api_url;
    protected $sender_id;

    protected $message_parameters;
    protected $scheduleTime;
    protected $is_unicode;
    protected $is_flash;

    protected $numbers;
    protected $message;
    public function configOnfon()
    {
        $this->api_key = config('onfonmedia.api_key');
        $this->client_id = config('onfonmedia.client_id');
        $this->sender_id = config('onfonmedia.sender_id');
        $this->access_key = config('onfonmedia.access_key');
        $this->api_url = config('onfonmedia.api_url');
    }

    public function formatNumber($number)
    {
        $len = strlen($number);
        if ($len != 10 && $len = 9 && $len != 12&$len != 13) {
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
        $endpoint = $this->api_url . config('onfonmedia.endpoints.send_bulk_sms');
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
        $response = Http::withHeaders($headers)->post($endpoint, $request_body);

        Log::info($response->json());

    }
}
