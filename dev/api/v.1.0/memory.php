<?php
#Author: Alexa Lopez
#Last modified: 10/28/2020

header("Authorization: Basic VIP_Ticket");

#Returning cookie on a GET request
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

   #NOTE: Must implement security: $token = bin2hex(random_bytes(10));
   $headers = apache_request_headers();
   $token = $headers['Authorization'];
   if ($token !== 'Basic VIP_Ticket'){
       http_response_code(401);
       exit();
   }

    if (array_key_exists('brownie', $_COOKIE)){
        echo "GET Request (Cookie): " . $_COOKIE['brownie'];
        exit();
    } else {
        echo "GET Request (Cookie): 0";
        exit();
    }
 }

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
#Storing a cookie on a POST request
else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $headers = apache_request_headers();
    $token = $headers['Authorization'];
    if ($token !== 'Basic VIP_Ticket'){
        http_response_code(401);
        exit();
    }
    

    if (array_key_exists('value', $_POST)){
        $value = $_POST['value'];
        setcookie('brownie', $value);
        echo "POST Request: " . $value;
        exit();

    } else {
        http_response_code(400);
        exit();

    }

#Updating memory
}else if ($_SERVER['REQUEST_METHOD'] == 'PUT'){

    $headers = apache_request_headers();
    $token = $headers['Authorization'];
    if ($token !== 'Basic VIP_Ticket'){
        http_response_code(401);
        exit();
    }
    
    $current = 0;
    if (array_key_exists('brownie', $_COOKIE)){
        $current = $_COOKIE['brownie'];
    }

    #Body of the request 
    $fileHandler = fopen("php://input", "r");
    $buff = "";
    while ($data = fread($fileHandler , 1024)){
        $buff .= $data;
    }
    
    if ($buff !== ""){
        $value = 0;
        $json = json_decode($buff);


        if (isset ($json->value)){
            $value = $json->value;
            $value = $value + $current;
            setcookie('brownie', $value);
            echo "PUT Request: " .  $value;
            exit();
        }else {
            http_response_code(400);
            exit();
        }

    }else {
        http_response_code(400);
        exit();
    }

}else if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    
   $headers = apache_request_headers();
   $token = $headers['Authorization'];
   if ($token !== 'Basic VIP_Ticket'){
       http_response_code(401);
       exit();
   }

        setcookie("brownie", "",time() - 3600);
        echo "Cookie removed. Memory cleared.";
        exit();


}else {
	http_response_code(405);
    exit(); 
    }
?>