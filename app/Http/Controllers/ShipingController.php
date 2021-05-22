<?php

namespace App\Http\Controllers;


use App\Models\Modeweight_cost;
use App\Models\User;
use App\Models\Order_details;
use Illuminate\Http\Request;

class ShipingController extends Controller
{
    //create function
    public function calculate(Request $request)

    {



        $modewei = Modeweight_cost::find(1);
        $aircost = $modewei->aircost;
        $watercost = $modewei->watercost;
        $airweightcost = $modewei->airweightcost;
        $waterweightcost = $modewei->waterweightcos;
        $uk = $modewei->uk;
        $us = $modewei->us;
        $order_datails = new Order_details();


        // uk destination and air mode of transportation cost
        if ($request['destination'] == "uk" && $request['mode'] == "air") {
            $request['destination'] = $uk;
            $request['mode'] =  $aircost;
            $weight =  $request['weight'] * $airweightcost;
            $subtotal = $request['destination']  +  $request['mode'] + $weight;
            $total = 0.1 * $subtotal + $subtotal;
            //$order_datails = new Order_details();
            $order_datails->weight = $request['weight'];
            $order_datails->cost = $total;
            $order_datails->destination = 'uk';
            $order_datails->save();
            return view('calculate', ['total' => $total]);
            //echo ($total);

        };

        if ($request['destination'] == "uk" && $request['mode'] == "water") {
            $request['destination'] = $uk;
            $request['mode'] =  $watercost;
            $weight =  $request['weight'] * $waterweightcost;
            $subtotal = $request['destination']  +  $request['mode'] + $weight;
            $total = 0.1 * $subtotal + $subtotal;

            $order_datails->weight = $request['weight'];
            $order_datails->cost = $total;
            $order_datails->destination = 'uk';
            $order_datails->save();
            return view('calculate', ['total' => $total]);
        };

        if ($request['destination'] == "us" && $request['mode'] == "air") {
            $request['destination'] = $us;
            $request['mode'] =  $aircost;
            $weight =  $request['weight'] * $airweightcost;
            $subtotal = $request['destination']  +  $request['mode'] + $weight;
            $total = 0.1 * $subtotal + $subtotal;

            $order_datails->weight = $request['weight'];
            $order_datails->cost = $total;
            $order_datails->destination = 'us';
            $order_datails->save();
            return view('calculate', ['total' => $total]);
        };
        if ($request['destination'] == "us" && $request['mode'] == "water") {
            $request['destination'] =  $us;
            $request['mode'] =  $watercost;
            $weight =  $request['weight'] * $waterweightcost;
            $subtotal = $request['destination']  +  $request['mode'] + $weight;
            $total = 0.1 * $subtotal + $subtotal;

            $order_datails->weight = $request['weight'];
            $order_datails->cost = $total;
            $order_datails->destination = 'us';
            $order_datails->save();
            return view('calculate', ['total' => $total]);
        };
    }

    public function payment(Request $request)
    {
        $url = "https://api.paystack.co/transaction";
        $fields = [
            'email' => "customer@email.com",
            'amount' => '2000000',

        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer sk_test_42c41abe67f20b48b853a52e310297e13008c5cf",
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        echo  $result;
    }
}
