<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <style>
    
        table, th, td, tr {
            border: solid black;
            border-collapse: collapse
        }
        
    </style>
</head>
<body>
    
<?php
     session_start();
     if(isset($_SESSION["login_id"]) && $_SESSION["login_id"]!="")
        {
            echo $_SESSION["fullname"];
            echo " You have logged out successfully.";
            session_destroy();
     }
            
?>
<br><br><a href="index.php" target="_self">Go Home:</a>
</body>
</html>