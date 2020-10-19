<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "studentstudent";

// Create connection
$conn = new mysqli($servername, $username, $password);

function PageAccessed($LogMessage, $db){

  // Escape values
  $ID   = $db->escape_string($ID);
  $LogMessage = $db->escape_string($LogMessage);
  $TimeStamp = $db->escape_string($Timestamp);
 
  // Construct query
  $sql = "INSERT INTO LogginActivity (ID, LogMessage,Timestamp) VALUES('$ID','$LogMessage','$TimeStamp')";
    
   // Execute query and save data
   $result = $db->query($sql);

  if($result) {
    return array(status => true);  
  }
  else {
    return array(status => false, message => 'Unable to write to the database');
  }
 
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Lopez Calculator App</title>
        <meta charset="UTF-8">
        <meta content='width=device-width, initial-scale=1' name='viewport'/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
         
        
        
        <!--Boostrap Framework-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 
         <!--Custom CSS -->
        <link rel="stylesheet" media="all" href="../css/stylesheet.css" type="text/css">
   
        <!--Google fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@1,200&display=swap" rel="stylesheet">
    </head>
    <body>
     <div class="container">
                <div class="calcHead">
                    <input id='inputField' placeholder="Enter values here..." type="text">
                </div>     
         
                <div class="calcBody ">
                <button type="button" class="button disabled" disabled>&nbsp;</button>
                <button type="button" class="button disabled" disabled>&nbsp;</button>
                <button type="button" class="button disabled" disabled>&nbsp;</button>
                <button type="button" class="button work sign" id="add">+</button>
                
                <button type="button" class="button work" id="7">7</button>
                <button type="button" class="button work" id="8">8</button>
                <button type="button" class="button work" id="9">9</button>
                <button type="button" class="button work sign" id="subtract">-</button>
                
                <button type="button" class="button work" id="4">4</button>
                <button type="button" class="button work" id="5">5</button>
                <button type="button" class="button work" id="6">6</button>
                <button type="button" class="button work sign" id="multiply">×</button>
                
                <button type="button" class="button work" id="1">1</button>
                <button type="button" class="button work" id="2">2</button>
                <button type="button" class="button work" id="3">3</button>
                <button type="button" class="button work sign" id="divide">÷</button>
                
                <button type="button" class="button clear work" id="clear">C</button>
                <button type="button" class="button work" id="0">0</button>
                <button type="button" class="button work equals" id="equals" >=</button>
                <button type="button" class="button work sign" id="power">^</button>
                </div>
    </div>
        
      <script src="../js/scripts.js"></script>
    </body>
</html>
