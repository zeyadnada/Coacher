<?php

namespace App\Http\Controllers\appendages;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class WhatsAppController extends Controller
{
    public function order_confirmation($whatsapp_phone_number_id, $user_name, $user_phone, $package)
    {
        Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATSAPP_ACCESS_TOKEN'),
            'Content-Type' => 'application/json',
        ])->post("https://graph.facebook.com/v20.0/{$whatsapp_phone_number_id}/messages", [
            "messaging_product" => "whatsapp",
            "recipient_type" => "individual",
            "to" => $user_phone,
            "type" => "template",
            "template" => [
                "name" => "order_confirmation",
                "language" => [
                    "code" => "ar"
                ],
                "components" => [
                    [
                        "type" => "header",
                        "parameters" => [
                            [
                                "type" => "text",
                                "text" => $user_name
                            ]
                        ]
                    ],
                    [
                        "type" => "body",
                        "parameters" => [
                            [
                                "type" => "text",
                                "text" => $package
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }

    public function send_reminder_pending_subscriptions_message($whatsapp_phone_number_id, $user_name, $user_phone, $package)
    {
        Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATSAPP_ACCESS_TOKEN'),
            'Content-Type' => 'application/json',
        ])->post("https://graph.facebook.com/v20.0/{$whatsapp_phone_number_id}/messages", [
            "messaging_product" => "whatsapp",
            "recipient_type" => "individual",
            "to" => $user_phone,
            "type" => "template",
            "template" => [
                "name" => "order_confirmation",
                "language" => [
                    "code" => "ar"
                ],
                "components" => [
                    [
                        "type" => "header",
                        "parameters" => [
                            [
                                "type" => "text",
                                "text" => $user_name
                            ]
                        ]
                    ],
                    [
                        "type" => "body",
                        "parameters" => [
                            [
                                "type" => "text",
                                "text" => $package
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }
}
