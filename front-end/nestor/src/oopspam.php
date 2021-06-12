<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://oopspam.p.rapidapi.com/v1/spamdetection",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\r\n    \"checkForLength\": true,\r\n    \"content\": \"Dear Agent, We are a manufacturing company which specializes in supplying Aluminum Rod with Zinc Alloy Rod to customers worldwide, based in Japan, Asia. We have been unable to follow up payments effectively for transactions with debtor customers in your country due to our distant locations, thus our reason for requesting for your services representation.\",\r\n    \"senderIP\": \"85.249.71.83\"\r\n}",
    CURLOPT_HTTPHEADER => [
        "content-type: application/json",
        "x-rapidapi-host: oopspam.p.rapidapi.com",
        "x-rapidapi-key: dca25dc722msh9bae46460c69156p159237jsn12456da61ccf",
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
