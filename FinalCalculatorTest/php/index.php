<?php

#Author: Alexa Lopez
#Date: 11/16/2020
#Final Calculator Design
#Outline code inspired by Dr. Thackston lectures

#POST sending variables for form calculation 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    #Applying tanget of angle formula from StackOverflow:https://stackoverflow.com/questions/27784776/how-do-i-calculate-the-angle-of-a-right-triangle-using-the-javascript-math-libra
    $opposite = intval($_POST['opposite']);
    $adjacent = intval($_POST['adjacent']);

    #Google Cloud Platform endpoint calculating results
    $endpoint = "https://us-east1-it-5236-286717.cloudfunctions.net/FinalCalc";

    #Building JSON string and convert it to JSON
    $ary = array("opposite" => $opposite, "adjacent" => $adjacent);
    $json = json_encode($ary);

    #Curl code provided by Postman Code Snippets: https://learning.postman.com/docs/sending-requests/generate-code-snippets/
    #Connecting cloud endpoint to server
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
        CURLOPT_POSTFIELDS => $json,
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Alexa Lopez">

    <!--Google Fonts:https://fonts.google.com/specimen/Nanum+Gothic?sidebar.open=true&selection.family=Nanum+Gothic|Ubuntu:wght@300-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <style>
        h1,
        h4 {
            font-family: 'Ubuntu', sans-serif;
            text-align: center;
        }

        input,
        label {
            display: block;
            font-family: 'Nanum Gothic', sans-serif;
        }

        /*Container display inspo by coder-coder: https://coder-coder.com/display-divs-side-by-side/ */
        #container {
            display: flex;
            padding-left: 30%;
        }

        #form {
            float: left;
            padding-top: 30px;
        }

        #image {
            margin-right: 20px;
        }
    </style>
    <title>Final Calculator</title>
</head>

<body>
    <h1>Determine the Angle (Tangent)</h1>
    <h4>Final by Alexa Lopez</h4>

    
    <!--Post form code from W3Schools: https://www.w3schools.com/tags/att_form_method.asp-->
    <!--Form for users to calculate tangent of angle-->
    <div id='container'>
        <div id='form'>
            <form action="index.php" method='POST'>
                <label for="opposite">Enter the lenght of the opposite side:</label>
                <input type="number" id="opposite" name='opposite' value="<?php echo $opposite; ?>">

                <label for="adjacent">Enter the lenght of the adjacent side:</label>
                <input type="number" id="adjacent" name="adjacent" value="<?php echo $adjacent; ?>"><br>

                <input type="submit" value="Calculate">
            </form>

            <!--Adding conditional stament for output incase if answer is non-numerical-->
            <h3 id="answer"><?php    
                //Check if response is a number:https://www.php.net/manual/en/function.is-numeric.php
                    if (is_numeric($response) && !empty($response)) {
                        //Both responses as zero brings an error message. 
                        if ($adjacent !==0 && $opposite !== 0){
                            #Formula for determining tangent angle from MathOpenRef:https://www.mathopenref.com/trigtangent.html#:~:text=In%20any%20right%20triangle%2C%20the,written%20simply%20as%20'tan'.&text=Often%20remembered%20as%20%22SOH%22%20%2D,See%20SOH%20CAH%20TOA.
                            #Calculator to verify tanget angle result: http://www.math.com/students/calculators/source/tangent.htm
                            echo "Tan 0: " . ($opposite/$adjacent);
                            echo "<br>";
                            #Source on Google Cloud Platform to create TAN angle into degrees from StackOverflow: (https://stackoverflow.com/questions/4715271/tan-in-javascript)
                            #Tested angle output on https://keisan.casio.com/exec/system/1223014436
                            echo "Tan 0 in degrees: " . $response;
                        }
                    else {
                        echo "Sorry! Something went wrong. ";
                    } 
                } else {
                    echo "";
                } ?> 
        </h3>
        </div>

        <div id='image'>
            <!--Diagram from ExcelTip: https://www.exceltip.com/mathematical-functions/excel-sin-function.html-->
            <img src="diagram.png" alt="Triangle Diagram" width="290" height="300">
        </div>
        <br>

    </div>
</body>
<footer>
    <p style="text-align: center; font-size:12px;">Image from <a href='https://www.exceltip.com/mathematical-functions/excel-sin-function.html'>ExcelTip</a></p>
</footer>

</html>