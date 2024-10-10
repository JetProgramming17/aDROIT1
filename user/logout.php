<?php
    session_start();
    session_destroy(); 
    
    // Ensure there is no output before the header call
    header("Location: ../index.php");
    exit();
?>
