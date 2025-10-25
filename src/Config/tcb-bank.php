<?php

return [
    'api_key' => env('TCB_API_KEY', ''),
    'partner_code' => env('TCB_PARTNER_CODE', ''),
    'base_url' => env('TCB_BASE_URL', 'https://partners.tcbbank.co.tz/public/api/'),
    'reconciliation_url' => env('TCB_RECONCILE_URL', 'https://partners.tcbbank.co.tz:8444/public/api/reconciliation/'),
    'callback_url' => env('TCB_CALLBACK_URL', ''),
    'sandbox' => env('TCB_SANDBOX', false),
];
