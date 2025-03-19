<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymobService;

class PaymentController extends Controller
{
    private $paymobService;

    public function __construct(PaymobService $paymobService)
    {
        $this->paymobService = $paymobService;
    }

    /**
     * إنشاء طلب دفع وإرجاع رابط الدفع
     */
    public function checkout(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'street' => 'required|string',
        ]);

        $merchantOrderId = uniqid(); // إنشاء ID فريد للطلب
        $orderId = $this->paymobService->createOrder($request->amount, $merchantOrderId);

        $billingData = [
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "city" => $request->city,
            "country" => $request->country,
            "street" => $request->street,
        ];

        $paymentToken = $this->paymobService->getPaymentKey($request->amount, $orderId, $billingData);
        $paymentUrl = $this->paymobService->getPaymentUrl($paymentToken);

        return response()->json([
            'payment_url' => $paymentUrl
        ]);
    }
}