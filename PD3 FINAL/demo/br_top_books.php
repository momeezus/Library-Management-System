<!DOCTYPE html>
<html>
<head><title>Most Frequently Borrowed Books</title></head>

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
echo "<h2>Most Frequently Borrowed Books</h2>";
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

    $sql = "SELECT D.TITLE, COUNT(B.DOCID) AS COUNT FROM DOCUMENT D, BORROWS B WHERE D.DOCID = B.DOCID AND D.TYPE = 'B' GROUP BY B.DOCID ORDER BY 2 DESC";

    //echo $sql;
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<td><b>Book Title</b></td>";
        echo "<td><b>Borrow Count</b></td>";
        echo "</tr>";

        for($i = 0; $i<$result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            echo "<tr>";
            echo "<td>" . $row["TITLE"] . "</td>";
            echo "<td>" . $row["COUNT"] . "</td>";
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