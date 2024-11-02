<?php

    session_start();

    if (isset($_SESSION["user_id"])) 
        $userid = $_SESSION["user_id"];
    else {
        $userid = "";
    }
        
    if (isset($_SESSION["user_name"])) 
        $username = $_SESSION["user_name"];
    else 
        $username = "";          
      
?>