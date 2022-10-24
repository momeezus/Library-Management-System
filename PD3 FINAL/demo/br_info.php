<!DOCTYPE html>
<html>
<head><title>Branch Information</title></head>

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
    echo "<h2>Branch Information</h2>";
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
        $title = $_POST["title"];
        $docid = $_POST["doc_id"];
        $publisher = $_POST["publisher"];

        $sql = "SELECT * FROM BRANCH";

        //echo $sql;
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td><b>Branch ID</b></td>";
            echo "<td><b>Branch Name</b></td>";
            echo "<td><b>Address</b></td>";
            echo "<td><b>Phone Number</b></td>";
            echo "<td><b>Library ID</b></td>";
            echo "</tr>";

            for($i = 0; $i<$result->num_rows; $i++)
            {
                $row = $result->fetch_assoc();
                echo "<tr>";
                echo "<td>" . $row["BRID"] . "</td>";
                echo "<td>" . $row["BNAME"] . "</td>";
                echo "<td>" . $row["ADDRESS"] . "</td>";
                echo "<td>" . $row["PHNUM"] . "</td>";
                echo "<td>" . $row["LIBID"] . "</td>";
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