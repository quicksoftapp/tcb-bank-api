# TCBBank API Laravel Integration

**Author:** Quicksoftapp  
**License:** MIT  

This package integrates Laravel with **Tanzania Commercial Bank (TCB)** CMS API for real-time reference creation, reconciliation, and payment status management.

## Installation

```bash
composer require quicksoftapp/tcb-bank-api
```

## Publish Config

```bash
php artisan vendor:publish --provider="Quicksoftapp\\TCBBankAPI\\TCBBankAPIServiceProvider" --tag=config
```

## Environment Setup (.env)

```env
TCB_API_KEY=< Your API Key >
TCB_PARTNER_CODE=PART-ABC
TCB_BASE_URL=https://partners.tcbbank.co.tz/public/api/
TCB_RECONCILE_URL=https://partners.tcbbank.co.tz:8444/public/api/reconciliation/
TCB_CALLBACK_URL=https://yourdomain.com/tcb/callback
TCB_SANDBOX=false
```

## Usage Example

```php
use Quicksoftapp\TCBBankAPI\Facades\TCBBankAPI;

// Create payment reference
$response = TCBBankAPI::createReference('1732XXXXXX', '999ABCXXXX', 'John Doe', '255713999999', 'Tuition Fee');

// Reconcile transactions
$response = TCBBankAPI::reconcile('2025-10-01', '2025-10-21');

// Cancel reference number
$response = TCBBankAPI::cancelReference('112XXXXXXX', '999ABCXXXX');

// Handle callback (example controller)
public function callback(Request $request) {
    $data = TCBBankAPI::handleCallback($request->all());
    // Update your order/payment record here
    return response()->json(['status' => 'received']);
}
```

## License
MIT © 2025 Quicksoftapp
