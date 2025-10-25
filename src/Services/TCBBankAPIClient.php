<?php

namespace Quicksoftapp\TCBBankAPI\Services;

use Illuminate\Support\Facades\Http;

class TCBBankAPIClient
{
    protected $config;

    public function __construct()
    {
        $this->config = config('tcb-bank');
    }

    public function createReference($profileId, $reference, $name, $mobile, $message)
    {
        $url = $this->config['base_url'].'reference/'.$this->config['api_key'];
        $response = Http::asForm()->post($url, [
            'partnerCode' => $this->config['partner_code'],
            'profileID' => $profileId,
            'reference' => $reference,
            'name' => $name,
            'mobile' => $mobile,
            'message' => $message,
        ]);

        return $response->json();
    }

    public function reconcile($startDate, $endDate)
    {
        $url = $this->config['reconciliation_url'].$this->config['api_key'];
        $response = Http::asForm()->post($url, [
            'partnerCode' => $this->config['partner_code'],
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);

        return $response->json();
    }

    public function cancelReference($acctNo, $refNo)
    {
        $url = $this->config['base_url'].'reference/decline/'.$this->config['api_key'];
        $response = Http::post($url, [
            'partnerCode' => $this->config['partner_code'],
            'acctNo' => $acctNo,
            'refNo' => $refNo,
        ]);

        return $response->json();
    }

    public function handleCallback($payload)
    {
        return [
            'status' => $payload['status'] ?? null,
            'description' => $payload['statusDesc'] ?? '',
            'reference' => $payload['param']['reference'] ?? '',
            'amount' => $payload['param']['amount'] ?? 0,
            'currency' => $payload['param']['currency'] ?? '',
            'account_no' => $payload['param']['account_no'] ?? '',
        ];
    }
}
