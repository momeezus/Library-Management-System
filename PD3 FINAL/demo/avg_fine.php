<!DOCTYPE html>
<html>
<head><title>Average Total Fines Per Member</title></head>

<body>

<?php
session_start();
if (isset($_SESSION["login_id"]) && $_SESSION["login_id"]!="")
{

    echo $_SESSION["fullname"];
    echo "<br>";

    ?>

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
echo "<h2>Average Total Fines Per Member</h2>";
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

    $sql = "SELECT AVG(DATEDIFF(CURDATE(), B.BORROWED_ON) * 0.25) AS FINE, B.MEMBERID, M.NAME FROM BORROWS B, DOCUMENT D, MEMBER M WHERE D.DOCID = B.DOCID AND B.MEMBERID = M.MEMID AND B.RETURNED_ON IS NULL GROUP BY B.MEMBERID";

    //echo $sql;
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<td><b>Member ID</b></td>";
        echo "<td><b>Name</b></td>";
        echo "<td><b>Fine</b></td>";
        echo "</tr>";

        for($i = 0; $i<$result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            echo "<tr>";
            echo "<td>" . $row["MEMBERID"] . "</td>";
            echo "<td>" . $row["NAME"] . "</td>";
            echo "<td>" . $row["FINE"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "Sorry! No results match your search.";
    }
    $conn->close();

}

?>
<br><br><a href="javascript:history.go(-1)">Go Back</a><br><br>
</body>
</html>