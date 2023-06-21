<?php

return [
    'api_key' => env('ONFON_API_KEY'),
    'client_id' => env('ONFON_API_CLIENT_ID'),
    'access_key' => env('ONFON_API_ACCESS_KEY'),
    'api_url' => env('ONFON_API_URL'),
    'api_urlv2' => env('ONFON_API_URL_V2','https://api.onfonmedia.co.ke/'),
    'sender_id' => env('ONFON_SENDER_ID'),
    'dlr_url' => env('ONFON_DELIVER_URL'),

    'endpoints' => [
        'get_balance' => 'Balance',
        'get_compaigns' => 'Campaign',
        'get_compaign_stats' => 'Campaign/Statistics', // Get compaign message status
        'get_groups' => 'Group',
        'post_group' => 'Group',
        'update_group' => 'Group?id=',
        'post_sub_group' => 'Group?{Id}/SubGroup',
        'delete_group' => 'Group',
        'get_senders' => 'SenderId',
        'post_senders' => 'SenderId',
        'update_senders' => 'SenderId?id=',
        'delete_senders' => 'SenderId',
        'get_sms' => 'SMS',
        'get_sms_status' => 'MessageStatus',
        'send_sms' => 'SendSMS',
        'send_bulk_sms' => 'SendBulkSMS',
        'dlr_url' => env('APP_DLR_URL', env('APP_URL')) . '/notifications/onfon/dlr',
        //v2
        'auth_url' => '/v1/authorization',
        'send_sms_v2' => 'v2_send',
    ],
];
