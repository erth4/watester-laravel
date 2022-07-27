<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WatesterController extends Controller
{
    public function index()
    {
        $data = [
            'receiver' => '628123456789', // remove [ and ]
            'message' => 'test api wa'
        ];
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
                CURLOPT_URL => "https://wainaja.ngrdev.com/api/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => http_build_query($data),
                CURLOPT_HTTPHEADER => array(
                        "Authorization: Bearer secret key device", // remove { and }
                        "Content-Type: application/x-www-form-urlencoded"
                ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
    }
}
