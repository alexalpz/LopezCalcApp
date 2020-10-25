<?php

/* 
 * Author: Alexa Lopez
 * Project: Calculator Application  
 * Last updated: 10/19/2020 by Alexa Lopez
 */

//Note: Will try to change as ini file soon. 
require('../config/cred.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Uh oh! Something went wrong! ");
}
echo "";

// Recording user login in database
$sql = "INSERT INTO LogginActivity (ID, timestamp, message) VALUES (NULL, NULL, 'Page accessed from production environment')";
if (mysqli_query($conn, $sql)) {
      echo "";
} else {
    echo "Uh oh! Something went wrong.";
}
mysqli_close($conn);

?>