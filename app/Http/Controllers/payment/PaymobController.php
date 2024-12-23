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
    private $paymob_secret_key;
    private $paymob_public_key;


    public function __construct()
    {
        $this->paymob_api_key = config('services.paymob.api_key');
        $this->paymob_iframe_id =  config('services.paymob.card_iframe_id');
        $this->paymob_secret_key = "Token" . " " . config('services.paymob.secret_key');
        $this->paymob_public_key  = config('services.paymob.public_key');
    }

    /**
     * Display checkout page.
     * @param $payment_method
     * @param $order_id
     */

    // public function checkingOut_old($order, $paymob_integration_id)
    // {
    //     // step 1: login to paymob
    //     $request_new_token  = Http::withHeaders([
    //         'content-type' => 'application/json'
    //     ])->post('https://accept.paymobsolutions.com/api/auth/tokens', [
    //         "api_key" => $this->paymob_api_key
    //     ])->json();
    //     // dd($request_new_token );


    //     // step 2: send order data
    //     $merchant_order_id = $order['id'] . '_' . time();
    //     $paymob_order  = Http::withHeaders([
    //         'content-type' => 'application/json'
    //     ])->post('https://accept.paymobsolutions.com/api/ecommerce/orders', [
    //         "auth_token" => $request_new_token['token'],
    //         "delivery_needed" => "false",
    //         "amount_cents" => $order['amount_paid'] * 100,
    //         "merchant_order_id" => $merchant_order_id
    //     ])->json();
    //     // dd($paymob_order);


    //     //  step 3: send customer data (payment token request)
    //     $payment_token = Http::withHeaders([
    //         'content-type' => 'application/json'
    //     ])->post('https://accept.paymobsolutions.com/api/acceptance/payment_keys', [
    //         "auth_token" => $request_new_token['token'],
    //         "expiration" => 36000,
    //         "amount_cents" => $paymob_order['amount_cents'],
    //         "order_id" => $paymob_order['id'],
    //         "billing_data" => [
    //             "first_name"            => $order['name'],
    //             "last_name"             => "NA",
    //             "phone_number"          => $order['whatsapp_phone'],
    //             "email"                 => $order['email'],
    //             "apartment"             => "NA",
    //             "floor"                 => "NA",
    //             "street"                => "NA",
    //             "building"              => "NA",
    //             "shipping_method"       => "NA",
    //             "postal_code"           => "NA",
    //             "city"                  => "NA",
    //             "state"                 => "NA",
    //             "country"               => "NA",
    //         ],
    //         "currency" => "EGP",
    //         "integration_id" => $paymob_integration_id
    //     ])->json();
    //     // dd($payment_token);

    //     if ($order['payment_method'] == 'paymob_wallet_payment') {
    //         $response_iframe = Http::withHeaders([
    //             'content-type' => 'application/json'
    //         ])->post('https://accept.paymob.com/api/acceptance/payments/pay', [
    //             "source" => [
    //                 // "identifier" => $order['whatsapp_phone'],
    //                 "identifier" => "01010101010",
    //                 "subtype" => "WALLET"
    //             ],
    //             "payment_token" => $payment_token['token'],
    //         ]);
    //         // dd($response_iframe->json());
    //         return redirect($response_iframe->json()['iframe_redirection_url']);
    //     } else {
    //         return redirect()->away(("https://accept.paymob.com/api/acceptance/iframes/{$this->paymob_iframe_id}?payment_token={$payment_token['token']}"));
    //     }
    // }

    public function checkingOut($order, $paymob_integration_id)
    {
        $paymob_integration_id = (int) $paymob_integration_id;

        // Step 1: Initial Request to Intention Endpoint
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => $this->paymob_secret_key,
        ])->post("https://accept.paymob.com/v1/intention/", [
            'amount' => $order['amount_paid'] * 100,  // Convert amount to cents
            'currency' => 'EGP',
            'payment_methods' => [$paymob_integration_id],  // Use integration ID(s)
            'billing_data' => [
                'first_name' => $order['name'],
                'last_name' => "NA",
                'phone_number' => $order['whatsapp_phone'],
                'email' => $order['email'],
            ],
            'extras' => [
                'ee' => 22
            ],
            'special_reference' => $order['id'] . '_' . time()
            // 'notification_url' => 'https://webhook.site/f60597f3-97b9-4992-90e1-6f98a63fc32d',
            // 'redirection_url' => 'http://127.0.0.1:8000/paymob/callback'
            //Notification and redirection URL are working only with Cards and they overlap the transaction processed and response callbacks sent per Integration ID
        ])->json();

        // Check if the response contains a client_secret
        if (isset($response['client_secret'])) {
            // Step 2: Redirect to Unified Checkout using client_secret from the response         
            return redirect()->away("https://accept.paymob.com/unifiedcheckout/?publicKey={$this->paymob_public_key}&clientSecret={$response['client_secret']}");
        } else {
            // Handle the error if client_secret is missing in the response
            $order_id = $order['id'];
            return (new SubscriptionController())->failed_payment($order_id);
        }
    }

    public function callback(Request $request): RedirectResponse
    {
        $string = $request['amount_cents'] . $request['created_at'] . $request['currency'] . $request['error_occured'] . $request['has_parent_transaction'] . $request['id'] . $request['integration_id'] . $request['is_3d_secure'] . $request['is_auth'] . $request['is_capture'] . $request['is_refunded'] . $request['is_standalone_payment'] . $request['is_voided'] . $request['order'] . $request['owner'] . $request['pending'] . $request['source_data_pan'] . $request['source_data_sub_type'] . $request['source_data_type'] . $request['success'];

        if (hash_equals(hash_hmac('sha512', $string, config('services.paymob.hmac')), $request['hmac'])) {
            if ($request['success'] == "true") {
                $payment_details = ($request->all());
                return (new SubscriptionController())->success_payment($payment_details);
            } else {
                $order_id = $request['merchant_order_id'];
                return (new SubscriptionController())->failed_payment($order_id);
                // return (new SubscriptionController())->failed_payment();
            }
        } else {
            $order_id = $request['merchant_order_id'];
            return (new SubscriptionController())->failed_payment($order_id);
            // return (new SubscriptionController())->failed_payment();
        }
    }


    public function refund(Request $request): array
    {
        $validated = $request->validate([
            'transaction_id' => 'required|string',
            'amount' => 'required|integer|min:1', // amount in cents
        ]);

        $refund_process = Http::withHeaders([
            'content-type' => 'application/json',
            'Authorization' => $this->paymob_secret_key
        ])->post('https://accept.paymob.com/api/acceptance/void_refund/refund', [
            'transaction_id' => $validated['transaction_id'],
            'amount_cents' => $validated['amount'],
        ])->json();

        return $refund_process; // Handle response appropriately
    }


    public function voidRefund(Request $request): array
    {
        $validated = $request->validate([
            'transaction_id' => 'required|string',
        ]);

        $void_process = Http::withHeaders([
            'content-type' => 'application/json',
            'Authorization' => $this->paymob_secret_key
        ])->post('https://accept.paymob.com/api/acceptance/void_refund/void', [
            'transaction_id' => $validated['transaction_id'],
        ])->json();

        return $void_process; // Handle response appropriately
    }
}