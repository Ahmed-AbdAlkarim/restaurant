<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PaymobService
{
    protected $apiKey;
    protected $merchantId;
    protected $iframeId;
    protected $integrationId;
    
    public function __construct()
    {
        $this->apiKey = env('PAYMOB_API_KEY');
        $this->merchantId = env('PAYMOB_MERCHANT_ID');
        $this->iframeId = env('PAYMOB_IFRAME_ID');
        $this->integrationId = env('PAYMOB_INTEGRATION_ID');
    }

    // 1. إنشاء Session للحصول على Token
    public function getAuthToken()
    {
        $response = Http::post('https://accept.paymob.com/api/auth/tokens', [
            'api_key' => $this->apiKey
        ]);

        return $response->json()['token'];
    }

    // 2. إنشاء طلب دفع
    public function createOrder($amount, $customerPhone, $customerEmail)
    {
        $authToken = $this->getAuthToken();

        $response = Http::post('https://accept.paymob.com/api/ecommerce/orders', [
            'auth_token' => $authToken,
            'delivery_needed' => false,
            'amount_cents' => $amount * 100, // تحويل الجنيه إلى قروش
            'currency' => 'EGP',
            'merchant_order_id' => uniqid(),
            'items' => []
        ]);

        return $response->json();
    }

    // 3. إنشاء Payment Key للحصول على رابط الدفع
    public function getPaymentKey($amount, $orderId, $customerPhone, $customerEmail, $customerFirstName, $customerLastName)
    {
        $authToken = $this->getAuthToken();

        $response = Http::post('https://accept.paymob.com/api/acceptance/payment_keys', [
            'auth_token' => $authToken,
            'amount_cents' => $amount * 100,
            'expiration' => 3600,
            'order_id' => $orderId,
            'billing_data' => [
                "first_name" => $customerFirstName,
                "last_name" => $customerLastName,
                "email" => $customerEmail,
                "phone_number" => $customerPhone,
                "apartment" => "NA",
                "floor" => "NA",
                "street" => "NA",
                "building" => "NA",
                "shipping_method" => "NA",
                "city" => "NA",
                "country" => "NA",
                "postal_code" => "NA"
            ],
            'currency' => 'EGP',
            'integration_id' => $this->integrationId
        ]);

        return $response->json();
    }

    // 4. الحصول على رابط الدفع
    public function getPaymentUrl($paymentKey)
    {
        return "https://accept.paymob.com/api/acceptance/iframes/{$this->iframeId}?payment_token={$paymentKey}";
    }
}
