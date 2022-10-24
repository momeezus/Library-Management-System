<!DOCTYPE html>
<html>
<head><title>Publisher Listing</title></head>

<body>

<?php
session_start();
if (isset($_SESSION["login_id"]) && $_SESSION["login_id"]!="")
{

    echo $_SESSION["fullname"];
    echo "<br>";

    ?>
    <h1>List All Titles By Publisher</h1>

    <form action="listpub.php" method="POST">
        Publisher Name: <input type="text" name="publisher_list">
        <br><br>
        <input type="reset" value="Clear">
        <input type = "submit" value="Search">
    </form>

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
$publisher = $_POST["publisher_list"];

if (isset($_POST["publisher_list"]))
{
    echo "<h2>Search Results</h2>";
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
        $sql = "SELECT D.DOCID, D.TITLE, P.NAME PUBLISHER FROM DOCUMENT D, PUBLISHER P WHERE D.DOCID = P.DOCID AND P.NAME LIKE '%$publisher%'";

        //echo $sql;
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td><b>Title</b></td>";
            echo "<td><b>Document ID</b></td>";
            echo "<td><b>Publisher Name</b></td>";
            echo "</tr>";

            for($i = 0; $i<$result->num_rows; $i++)
            {
                $row = $result->fetch_assoc();
                echo "<tr>";
                echo "<td>" . $row["TITLE"] . "</td>";
                echo "<td>" . $row["DOCID"] . "</td>";
                echo "<td>" . $row["PUBLISHER"] . "</td>";
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
}
echo "<br><br><a href='javascript:history.go(-1)'>Go Back</a><br><br>";
?>

</body>
</html>