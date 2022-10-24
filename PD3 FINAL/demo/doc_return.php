<!DOCTYPE html>
<html>
<head><title>Search for a Document</title></head>

<body>
<br><br><a href="javascript:history.go(-1)">Go Back</a>
<?php
session_start();
$login_id = $_SESSION["login_id"];
if (isset($_SESSION["login_id"]) && $_SESSION["login_id"]!="")
{

    echo $_SESSION["fullname"];
    echo "<br>";

    ?>
    <h1>Document Returnal and Fine Processing Page:</h1>

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


    echo "<h2>Your List of Borrowed Documents</h2>";
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
        $fine = 0.25;
        $day_limit = 30;
        $sql = "SELECT D.TITLE, (DATEDIFF(CURDATE(), B.BORROWED_ON) * 0.25) AS FINE, B.DOCID, B.BORROWED_ON, B.RETURNED_ON FROM BORROWS B, DOCUMENT D WHERE D.DOCID = B.DOCID AND B.MEMBERID = '$login_id' AND B.RETURNED_ON IS NULL AND DATEDIFF(CURDATE(), B.BORROWED_ON) > 30 UNION SELECT D.TITLE, 0 AS FINE, B.DOCID, B.BORROWED_ON, B.RETURNED_ON FROM BORROWS B, DOCUMENT D WHERE D.DOCID = B.DOCID AND B.MEMBERID = '$login_id' AND B.RETURNED_ON IS NULL AND DATEDIFF(CURDATE(), B.BORROWED_ON) < 30";

        $result = $conn->query($sql) or die("Connection failed: " . $conn -> connect_error);
        $id_arr = [];
        if($result->num_rows >= 0)
        {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td><b>Title</b></td>";
            echo "<td><b>FINE</b></td>";
            echo "<td><b>Document ID</b></td>";
            echo "<td><b>Borrowed On</b></td>";
            echo "<td><b>Process</b></td>";
            echo "</tr>";

            for($i = 0; $i<$result->num_rows; $i++)
            {
                $row = $result->fetch_assoc();
                $id_arr[$i] = $row["DOCID"];
                echo "<tr>";
                echo "<td>" . $row["TITLE"] . "</td>";
                echo "<td>" . $row["FINE"] . "</td>";
                echo "<td>" . $row["DOCID"] . "</td>";
                echo "<td>" . $row["BORROWED_ON"] . "</td>";
                echo "<td><form action=\"process_return.php\" method=\"post\"><input type='submit' name='return_process' value='Return'><input type=\"hidden\" name=\"doc_id\" value= ". $row["DOCID"] . "></form></td>";
                echo "</tr>";
                $_SESSION["doc_id"] = $id_arr;
            }
        }
        else
        {
            echo "Great, seems like none of your documents are overdue for return";
        }

        $sql2 = "SELECT D.TITLE, B.DOCID, B.BORROWED_ON, B.RETURNED_ON FROM BORROWS B, DOCUMENT D WHERE D.DOCID = B.DOCID AND B.MEMBERID = '$login_id'";

        $result2 = $conn->query($sql2) or die("Connection failed: " . $conn -> connect_error);

        if($result2->num_rows >= 0)
        {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td><b>Title</b></td>";
            echo "<td><b>Document ID</b></td>";
            echo "<td><b>Borrowed On</b></td>";
            echo "<td><b>Returned On</b></td>";
            echo "</tr>";

            for($i = 0; $i<$result2->num_rows; $i++)
            {
                $row = $result2->fetch_assoc();
                echo "<tr>";
                echo "<td>" . $row["TITLE"] . "</td>";
                echo "<td>" . $row["DOCID"] . "</td>";
                echo "<td>" . $row["BORROWED_ON"] . "</td>";
                echo "<td>" . $row["RETURNED_ON"] . "</td>";
                echo "</tr>";
            }
        }
        else
        {
            echo "Sorry! You have no borrowed documents.";
        }
        $conn->close();

    }


?>
<h2>History of Borrowed Documents:</h2>
</body>
</html>