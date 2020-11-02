<?php

#Author: Alexa Lopez
#Last modified: 10/28/2020
header("Authorization: Basic VIP_Ticket");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $num1= $_GET['num1'];
    $num2 = $_GET['num2'];
    $op = $_GET['operation'];  

    #NOTE: Must implement security: $token = bin2hex(random_bytes(10));
    $headers = apache_request_headers();
    $token = $headers['Authorization'];
   if ($token !== 'Basic VIP_Ticket'){
       http_response_code(401);
       exit();
   }

    if ($op ==="+" || $op ==="-" || $op === "*" || $op === "/" || $op === "**"){

		$n1 = floatval($num1);
		$n2 = floatval($num2);
        
        $result= Null;
		switch ($op){
            case "+":
                $result = $n1 + $n2;
                break;
            case "-":
                $result = $n1 - $n2;
                break;
            case "*":
                $result = $n1 * $n2;
                break;
            case "/":
                $result = $n1 / $n2;
                break;
            case "**":
                $result = $n1 ** $n2;
                break;
        }
            
        if ($result !== Null){
            echo 'Math Result: ' . $result;
        }
        else {
            http_response_code(500);
            }
        }
    else {
        http_response_code(400);
        exit();
     }
 }
    
#validating input
else if ($_SERVER['REQUEST_METHOD'] == 'HEAD'){
    
    $headers = apache_request_headers();
    $token = $headers['Authorization'];
    if ($token !== 'Basic VIP_Ticket'){
        http_response_code(401);
        exit();
    }else {
        var_dump($headers);
        exit();
    }

    } 
else {
    http_response_code(405);
    exit();
}


?>