<?php

#Final Calculator
#Author: Alexa Lopez
#Last modified: 11/19/2020


#Retrieving variables values from API 
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $op = $_GET['opposite'];
    $ad = $_GET['adjacent'];

    
    $opposite = floatval($op);
    $adjacent = floatval($ad);
    $result = $opposite / $adjacent;

    #Check if result is valid
    if (is_numeric($result) && !empty($result) && !is_nan($result) && !is_infinite($result) ){
        echo 'Tangent of Angle: ' . $result;
    } 
    #Check if either are empty, it's mostly relying on adjacent, opposite can pass with no value. 
    else if (!empty($op) && empty($ad)){
        echo "Missing input!";
        http_response_code(400);
        exit();
    }
    #Checking if empty is opposite and adjacent is not to pass as missing input
    else if ( empty($op) && !empty($ad)){
        echo "Missing input!";
        http_response_code(400);
        exit();
    
    }#Check if both are empty values
    else if ( empty($op) && empty($ad)){
        echo "Missing input!";
        http_response_code(400);
        exit();
    
    }#check if one is not a number
    else if (!is_numeric($op) || !is_numeric($ad)){
        echo "Some input was not a number!";
        http_response_code(400);
        exit();
    
    }#check if both arent numbers
    else if (!is_numeric($op) && !is_numeric($ad)){
        echo "Some input was not a number!";
        http_response_code(400);
        exit();
    }
    else {
        echo "Bad request!";
        http_response_code(400);
        exit();
  }
}else {
    http_response_code(405);
    exit();
}

?>
