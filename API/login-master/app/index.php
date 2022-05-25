<?php

require_once('api_endpoit');
//api_request("http://127.0.0.1/API/login-master/api/status/")

function api_request($endpoint, $user = null, $pass = null){

    $curl = curl_init($endpoint);
    $headers = array (
        'Content-Type: application/json',
        'Authorization: Basic', base64_encode("$user:$pass"),
    );

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($curl);
    
    if(curl_errno($curl)){
        throw new Exception(curl_error($curl));
    }
    curl_close($curl);

    echo $response;
}