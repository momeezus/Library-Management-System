<!DOCTYPE html>
<html>
<head><title>Search for a Document</title></head>

<body>

<?php
session_start();
if (isset($_SESSION["login_id"]) && $_SESSION["login_id"]!="")
{

    echo $_SESSION["fullname"];
    echo "<br>";

    ?>
    <h1>Search for a Document</h1>

    <form action="status_report.php" method="POST">
        ID: <input type="text" name="doc_id">
        <br><br>
        Title: <input type="text" name="title">
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

if (isset($_POST["doc_id"]) OR isset($_POST["title"]) OR isset($_POST["publisher"]))
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
        $title = $_POST["title"];
        $docid = $_POST["doc_id"];
        if ($title == null AND $docid != null) {
            $sql = "SELECT D.DOCID, D.TITLE, D.TYPE, 'Can be Borrowed' AS STATUS FROM DOCUMENT D WHERE D.DOCID = $docid AND D.DOCID NOT IN (SELECT D.DOCID FROM DOCUMENT D, BORROWS B WHERE D.DOCID = B.DOCID) UNION SELECT D.DOCID, D.TITLE, D.TYPE, 'Cannot be Borrowed' AS STATUS FROM DOCUMENT D, BORROWS B WHERE D.DOCID = B.DOCID AND D.DOCID = $docid";
        }
        if ($title != null AND $docid == null) {
            $sql = "SELECT D.DOCID, D.TITLE, D.TYPE, 'Can be Borrowed' AS STATUS FROM DOCUMENT D WHERE D.TITLE LIKE '%$title%' AND D.DOCID NOT IN (SELECT D.DOCID FROM DOCUMENT D, BORROWS B WHERE D.DOCID = B.DOCID) UNION SELECT D.DOCID, D.TITLE, D.TYPE, 'Cannot be Borrowed' AS STATUS FROM DOCUMENT D, BORROWS B WHERE D.DOCID = B.DOCID AND D.TITLE LIKE '%$title%'";
        }
        //echo $sql;
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td><b>Document ID</b></td>";
            echo "<td><b>Title</b></td>";
            echo "<td><b>Type</b></td>";
            echo "<td><b>Status</b></td>";
            echo "</tr>";

            for($i = 0; $i<$result->num_rows; $i++)
            {
                $row = $result->fetch_assoc();
                echo "<tr>";
                echo "<td>" . $row["DOCID"] . "</td>";
                echo "<td>" . $row["TITLE"] . "</td>";
                echo "<td>" . $row["TYPE"] . "</td>";
                echo "<td>" . $row["STATUS"] . "</td>";
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


?>
<br><br><a href="javascript:history.go(-1)">Go Back</a><br><br>
</body>
</html>