<?php

if($_POST['type'] == "pickup_task")
{

session_start();
$token = $_SESSION['access_token'];
$get_data = $_POST;

$url = "https://api.tookanapp.com/create_task";

$array2 = array("access_token" => $token, "has_pickup" =>1, "has_delivery" => 0, "layout_type" => 0);
$result1 = array_merge($get_data, $array2);


$send_data = json_encode($result1, 128);


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json"
));
curl_setopt($ch, CURLOPT_POSTFIELDS, $send_data);



$response = curl_exec($ch);
curl_close($ch);

var_dump($response);

}
else if ($_POST['type'] == "delivery_task") {

session_start();
$token = $_SESSION['access_token'];
$get_data = $_POST;
$url = "https://api.tookanapp.com/create_task";


$array2 = array("access_token" => $token, "has_pickup" =>0, "has_delivery" => 1, "layout_type" => 0);
$result1 = array_merge($get_data, $array2);

 var_dump($result1);

$send_data = json_encode($result1, 128);

var_dump($send_data);


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json"
));
curl_setopt($ch, CURLOPT_POSTFIELDS, $send_data);



$response = curl_exec($ch);
curl_close($ch);

var_dump($response);

}

else if ($_POST['type'] == "pickup_and_delivery_task") {

$token = $_SESSION['access_token'];
$get_data = $_POST;
$url = "https://api.tookanapp.com/create_task";

$array2 = array("access_token" => $token, "has_pickup" =>1, "has_delivery" => 1, "layout_type" => 0);
$result1 = array_merge($get_data, $array2);

 var_dump($result1);

$send_data = json_encode($result1, 128);

var_dump($send_data);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json"
));
curl_setopt($ch, CURLOPT_POSTFIELDS, $send_data);



$response = curl_exec($ch);
curl_close($ch);

var_dump($response);

}
else {

session_start();
$token = $_SESSION['access_token'];
  echo $token;
$get_data = $_POST;
$url = "https://api.tookanapp.com/create_task";

$array2 = array("access_token" => $token, "has_pickup" =>0, "has_delivery" => 0, "layout_type" => 1);
$result1 = array_merge($get_data, $array2);


 var_dump($result1);

$send_data = json_encode($result1, 128);

var_dump($send_data);


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json"
));
curl_setopt($ch, CURLOPT_POSTFIELDS, $send_data);


$response = curl_exec($ch);
curl_close($ch);

var_dump($response);


}

?>