<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = $request->validate([
            'firstName'=> 'required|string|max:20',
            'lastName'=> 'required|string|max:20',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'city' => 'required|string|max:25',
            'zip' => 'required|numeric',
            'customPhoto' => 'image|size:20480',
            'description' => 'string|max:200|nullable'
        ]);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://send.api.mailtrap.io/api/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"from":{"email":"dorb343@gmail.com","name":"Mailtrap Test"},"to":[{"email":"dorb343@gmail.com"}],"subject":"You are awesome!","text":"Congrats for sending test email with Mailtrap!","category":"Integration Test"}',
            CURLOPT_HTTPHEADER => array(
                'Authorization: 4bb04cbf48c5f6abe1e5e3df80681e8d',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        if ($response === false) {
            echo 'cURL Error: ' . curl_error($curl);
        }

        curl_close($curl);
        echo $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function send(Request $request)
    {

        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
