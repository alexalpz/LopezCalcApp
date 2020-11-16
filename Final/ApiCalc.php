<?php

#
#Author: Alexa Lopez
#Date: 11/16/2020
#Final Calculator Design
#Outline code inspired by Dr. Thackston lectures


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    #Validate check for blanks, non-numerics, etc.
    $x = intval($_POST['x']);
    $y = intval($_POST['y']);
    $op = $_POST['op'];


    #Figure out which endpoint
    if ($op ==="add"){
        $endpint = "https://us-east1-it-5236-286717.cloudfunctions.net/function-add";
    }

    #Building JSON string and convert it to JSON
    $ary = array("x"=>$x, "y"=>$y);
    $json = json_encode($ary);


    #Curl code provided by Postman Code Snippets 
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>$json,
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
    ),
));

    $response = curl_exec($curl);
    curl_close($curl);
    $answer  = "The answer is " . $response;


}

?>
