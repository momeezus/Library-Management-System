<!DOCTYPE html>
<html>
<head><title>Return Processing Page</title></head>

<body>

<?php

session_start();
$memid = $_SESSION["login_id"];
$doc_id = $_POST["doc_id"];
if (isset($_SESSION["login_id"]) && $_SESSION["login_id"]!="")
{

    echo $_SESSION["fullname"];
    echo "<br>";

    ?>
    <h1>Return Processing Page</h1>

    <?php
}
else
{
    echo "<h1>ERROR!</h1>";
    echo "You are not supposed to be here!<br>";
    echo "<a href=\"index.php\">Login</a> to continue.";
}
?>
<?php


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
    $bid = "SELECT BID FROM BORROWS WHERE MEMBERID = '$memid' AND DOCID = '$doc_id' AND RETURNED_ON IS NULL";
    $bid = $conn->query($bid);
    $row = $bid->fetch_assoc();
    $bid = $row["BID"];

    $sql = "UPDATE BORROWS SET RETURNED_ON = CURRENT_TIMESTAMP WHERE BID = '$bid'";

    //echo $sql;
    $result = $conn->query($sql);
    echo 'Document has been returned, Thank you!';
    echo "<br><br><a href='javascript:history.go(-1)'>Go Back</a><br><br>";


}

?>
</body>
</html>