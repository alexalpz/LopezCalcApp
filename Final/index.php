
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

     $endpoint = "https://us-east1-it-5236-286717.cloudfunctions.net/function-add";


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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Alexa Lopez">
    <link rel="stylesheet" href="styles.css">
    <title>Final Calculator</title>
</head>
<body>
    <h1>The Problem Solver</h1>
    <h4>Final by Alexa Lopez</h4>

    <!--Post form code from W3Schools: https://www.w3schools.com/tags/att_form_method.asp-->
    <form action="index.php" method='POST'>
        <label for="x">Enter two values to {blank}:</label><br>
        <input type="number" id="x" name="x" value="<?php echo $x; ?>">

        <!--Select field from W3Schools: https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_select_form -->
        <select name="op" id="op">
            <option  value="add" <?php if ($op ==="add") {echo "Selected ";}?>>+</option>
        </select><br>
        <input type="number" id="y" name='y' value="<?php echo $y; ?>">            
        <input type="submit" value="Calculate">
    </form>

    <br>
    <p id="answer"><?php echo $answer; ?> </p>

</body>
</html>
