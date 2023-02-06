<?php
$consumer_key = "your_consumer_key";
$consumer_secret = "your_consumer_secret";

$url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));

$curl_post_data = array(
  //generate the json data
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

curl_close($curl);
Your response will contain the transaction status, the transaction id, and any other relevant information.
Once you have the status of the transaction, you can proceed with the checkout process, update the order status and notify the customer