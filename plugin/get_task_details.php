<?php 
	session_start();
	$job_id = $_POST['job_id'];
	$access_token = $_SESSION['access_token'];
	$user_id = $_SESSION['user_id']; 
	
$url = "https://api.tookanapp.com/view_task_profile";

$ch = curl_init();



curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

curl_setopt($ch, CURLOPT_HEADER, FALSE);



curl_setopt($ch, CURLOPT_POST, TRUE);



curl_setopt($ch, CURLOPT_POSTFIELDS, "{

  \"access_token\": \"$access_token\",

  \"job_id\": \"$job_id\",

  \"user_id\": $user_id

}");



curl_setopt($ch, CURLOPT_HTTPHEADER, array(

  "Content-Type: application/json"

));



$response = curl_exec($ch);

curl_close($ch);



var_dump($response);


?>




