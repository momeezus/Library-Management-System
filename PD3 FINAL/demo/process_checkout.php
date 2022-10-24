<!DOCTYPE html>
<html>
<head><title>Check Out Processing Page</title></head>

<body>
<?php
session_start();
$memid = $_SESSION["login_id"];
$doc_id = $_POST["doc_id"];
$password = $_SESSION["password"];
$login_id = $_SESSION["login_id"];
if (isset($_SESSION["login_id"]) && $_SESSION["login_id"]!="")
{

    echo $_SESSION["fullname"];
    echo "<br>";

    ?>
    <h1>Check Out Processing Page</h1>
    <a href="welcome.php?login_id" target="_self"></a>
    <?php
}
else
{
    echo "<h1>ERROR!</h1>";
    echo "You are not supposed to be here!<br>";
    echo "<a href=\"index.php\">Login</a> to continue.";
}
?>
<a href="doc_checkout.php">Go Back</a>
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
    $count = "SELECT COUNT(MEMBERID) FROM BORROWS WHERE MEMBERID = $memid AND RETURNED_ON IS NULL GROUP BY MEMBERID";
    $count = $conn->query($count);
    if($count < 6) {
        $sql = "INSERT INTO BORROWS (BORROWED_ON, MEMBERID, DOCID) VALUES (CURRENT_TIMESTAMP, $memid, $doc_id) ";

        //echo $sql;
        $result = $conn->query($sql);
        echo 'Document has been borrowed, Thank you!';
    }
    else{
        echo "Sorry, you have borrowed the maximum number of books :( Return one to get more!";
    }

}

?>
<br><br><a href="javascript:history.go(-1)">Go Back</a><br><br>
</body>
</html>