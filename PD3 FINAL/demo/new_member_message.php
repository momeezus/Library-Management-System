<!DOCTYPE html>
<html>
<head><title>Check Out a Document</title></head>

<body>

<?php
session_start();
if (isset($_SESSION["login_id"]) && $_SESSION["login_id"]!="")
{
    echo $_SESSION["fullname"];
    echo "<br>";
    $name = $_SESSION["fullname"];
    $usr_id = $_SESSION["uname"];
}
else
{
    echo "<h1>ERROR!</h1>";
    echo "You are not supposed to be here!<br>";
    echo "<a href=\"index.php\">Login</a> to continue.";
}
?>
<?php

if (isset($_POST["name"]) AND isset($_POST["phone"]) AND isset($_POST["email"]) AND isset($_POST["address"]) AND
    isset($_POST["pass"]) AND isset($_POST["admin_stat"])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Nerji_Library";

    // Create connection
    $conn = new mysqli($servername,$username,$password,$dbname);
    if ($conn -> connect_error)
    {
        die("Connection failed: " . $conn -> connect_error);
    }
    else
    {
        if($_POST["name"] != "" && $_POST["phone"] != ""  && $_POST["email"] != ""  && $_POST["address"] != ""  && $_POST["pass"] != "" && $_POST["admin_stat"] != "" ) {
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $pass = $_POST["pass"];
            $admin_stat = $_POST["admin_stat"];


            $sql = "INSERT INTO MEMBER (NAME, PHONE, EMAIL, ADDRESS, PASSWORDS, BRID, ADMIN) VALUES ('$name', '$phone', '$email', '$address', '$pass', '1', '$admin_stat')";
            //echo $sql;
            $result = $conn->query($sql);
            $conn->close();
            echo "Member successfully added.";
            echo "<br><br><a href='javascript:history.go(-1)'>Go Back</a><br><br>";
        }
        else{
            echo "You have not filled all the fields, please fill all the fields!";
            echo "<br><br><a href='javascript:history.go(-1)'>Go Back</a><br><br>";
        }
    }
}
else{
    echo "You have missing field values, please go back and enter all information.";
}
?>
</body>
</html>
