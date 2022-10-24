<!DOCTYPE html>
<html>
<head><title>Search for a Document</title></head>
    
<body>
    
<?php
    session_start();

    $welcome_page = $_SERVER['HTTP_REFERER'];
    if (isset($_SESSION["login_id"]) && $_SESSION["login_id"]!="")
    {
        
        echo $_SESSION["fullname"];
        echo "<br>";
  
?>
<h1>Search for a Document</h1>
    
<form action="search.php" method="POST">
    ID: <input type="text" name="doc_id">
    <br><br>
    Title: <input type="text" name="title">
    <br><br>
    Publisher Name: <input type="text" name="publisher">
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
        $publisher = $_POST["publisher"];
        if ($title != null AND $docid == null AND $publisher == null) {
            $sql = "SELECT D.TITLE, D.DOCID, P.NAME, D.TYPE FROM DOCUMENT D, PUBLISHER P WHERE D.DOCID = P.DOCID AND D.TITLE LIKE '%$title%' ";
        }
        if ($title == null AND $docid != null AND $publisher == null) {
            $sql = "SELECT D.TITLE, D.DOCID, P.NAME, D.TYPE FROM DOCUMENT D, PUBLISHER P WHERE D.DOCID = P.DOCID AND D.DOCID = '$docid' ";
        }
        if ($title == null AND $docid == null AND $publisher != null) {
            $sql = "SELECT D.TITLE, D.DOCID, P.NAME, D.TYPE FROM DOCUMENT D, PUBLISHER P WHERE D.DOCID = P.DOCID AND P.NAME LIKE '%$publisher%' ";
        }
        //echo $sql;
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td><b>Title</b></td>";
            echo "<td><b>Document ID</b></td>";
            echo "<td><b>Publisher Name</b></td>";
            echo "<td><b>Type</b></td>";
            echo "</tr>";

            for($i = 0; $i<$result->num_rows; $i++)
            {
                $row = $result->fetch_assoc();
                echo "<tr>";
                echo "<td>" . $row["TITLE"] . "</td>";
                echo "<td>" . $row["DOCID"] . "</td>";
                echo "<td>" . $row["NAME"] . "</td>";
                echo "<td>" . $row["TYPE"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "Sorry! No results match your search.";
        }
        $conn->close();
        echo "<br><br><a href='javascript:history.go(-1)'>Go Back To Search</a><br><br>";
    }

}

echo "<br><br><a href='javascript:history.go(-1)'>Go Back To Home Screen</a><br><br>";
?>
</body>
</html>