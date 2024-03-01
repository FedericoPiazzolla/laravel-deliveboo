<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;

class BraintreeController extends Controller
{
    public function generateToken(Gateway $gateway)
    {
        $clientToken = $gateway->clientToken()->generate();

        return response()->json(['clientToken' => $clientToken]);
    }
}
