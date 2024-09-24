<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Controllers\user\SubscriptionController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymobController extends Controller
{
    private $paymob_api_key;
    private $paymob_iframe_id;


    public function __construct()
    {
        $this->paymob_api_key = env('PAYMOB_API_KEY');
        $this->paymob_iframe_id =   env('PAYMOB_CARD_IFRAME_ID');
    }

    /**
     * Display checkout page.
     * @param $payment_method
     * @param $order_id
     */

    public function checkingOut($order, $paymob_integration_id)
    {
        // step 1: login to paymob
        $request_new_token  = Http::withHeaders([
            'content-type' => 'application/json'
        ])->post('https://accept.paymobsolutions.com/api/auth/tokens', [
            "api_key" => $this->paymob_api_key
        ])->json();
        // dd($request_new_token );


        // step 2: send order data
        $merchant_order_id = $order['id'] . '_' . time();
        $paymob_order  = Http::withHeaders([
            'content-type' => 'application/json'
        ])->post('https://accept.paymobsolutions.com/api/ecommerce/orders', [
            "auth_token" => $request_new_token['token'],
            "delivery_needed" => "false",
            "amount_cents" => $order['amount_paid'] * 100,
            "merchant_order_id" => $merchant_order_id
        ])->json();
        // dd($paymob_order);


        //  step 3: send customer data (payment token request)
        $payment_token = Http::withHeaders([
            'content-type' => 'application/json'
        ])->post('https://accept.paymobsolutions.com/api/acceptance/payment_keys', [
            "auth_token" => $request_new_token['token'],
            "expiration" => 36000,
            "amount_cents" => $paymob_order['amount_cents'],
            "order_id" => $paymob_order['id'],
            "billing_data" => [
                "first_name"            => $order['name'],
                "last_name"             => "NA",
                "phone_number"          => $order['whatsapp_phone'],
                "email"                 => $order['email'],
                "apartment"             => "NA",
                "floor"                 => "NA",
                "street"                => "NA",
                "building"              => "NA",
                "shipping_method"       => "NA",
                "postal_code"           => "NA",
                "city"                  => "NA",
                "state"                 => "NA",
                "country"               => "NA",
            ],
            "currency" => "EGP",
            "integration_id" => $paymob_integration_id
        ])->json();
        // dd($payment_token);

        if ($order['payment_method'] == 'paymob_wallet_payment') {
            $response_iframe = Http::withHeaders([
                'content-type' => 'application/json'
            ])->post('https://accept.paymob.com/api/acceptance/payments/pay', [
                "source" => [
                    // "identifier" => $order['whatsapp_phone'],
                    "identifier" => "01010101010",
                    "subtype" => "WALLET"
                ],
                "payment_token" => $payment_token['token'],
            ]);
            // dd($response_iframe->json());
            return redirect($response_iframe->json()['iframe_redirection_url']);
        } else {
            return redirect()->away(("https://accept.paymob.com/api/acceptance/iframes/{$this->paymob_iframe_id}?payment_token={$payment_token['token']}"));
        }
    }

    public function callback(Request $request): RedirectResponse
    {
        $string = $request['amount_cents'] . $request['created_at'] . $request['currency'] . $request['error_occured'] . $request['has_parent_transaction'] . $request['id'] . $request['integration_id'] . $request['is_3d_secure'] . $request['is_auth'] . $request['is_capture'] . $request['is_refunded'] . $request['is_standalone_payment'] . $request['is_voided'] . $request['order'] . $request['owner'] . $request['pending'] . $request['source_data_pan'] . $request['source_data_sub_type'] . $request['source_data_type'] . $request['success'];

        if (hash_equals(hash_hmac('sha512', $string, env('PAYMOB_HMAC')), $request['hmac'])) {
            if ($request['success'] == "true") {
                $payment_details = ($request->all());
                return (new SubscriptionController())->success_payment($payment_details);
            } else {
                return (new SubscriptionController())->failed_payment();
            }
        } else {
            return (new SubscriptionController())->failed_payment();
        }
    }
    // public function refund($transaction_id, $amount): array
    // {
    //     $request_new_token = Http::withHeaders(['content-type' => 'application/json'])
    //         ->post('https://accept.paymobsolutions.com/api/auth/tokens', [
    //             "api_key" => $this->paymob_api_key
    //         ])->json();
    //     $refund_process = Http::withHeaders(['content-type' => 'application/json', 'Authorization' => $request_new_token['token']])
    //         ->post('https://accept.paymob.com/api/acceptance/void_refund/refund', ['auth_token' => $request_new_token['token'], 'transaction_id' => $transaction_id, 'amount_cents' => $amount])->json();

    //     dd($refund_process);
    //     return [
    //         'transaction_id' => $transaction_id,
    //         'amount' => $amount,
    //     ];
    // }
}