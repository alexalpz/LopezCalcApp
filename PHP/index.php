<?php
     $pagecontents = file_get_contents("index.html");
        echo str_replace("Banana", "Pineapple", $pagecontents);

?>