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
    $password = $_SESSION["password"];
    $login_id = $_SESSION["login_id"];

}
else
{
    echo "<h1>ERROR!</h1>";
    echo "You are not supposed to be here!<br>";
    echo "<a href=\"index.php\">Login</a> to continue.";
}
?>
<h1>Check Out a Document</h1>

<form action="doc_checkout.php" method="POST">
    ID: <input type="text" name="doc_id"/>
    <br><br>
    Title: <input type="text" name="title"/>
    <br><br>
    Creator: <input type="text" name="creator"/>
    <br><br>
    <input type="reset" value="Clear">
    <input type = "submit" value="Search">
</form>


<?php

if (isset($_POST["doc_id"]) OR isset($_POST["title"]) OR isset($_POST["creator"]))
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

        $docid = $_POST["doc_id"];
        $title = $_POST["title"];
        $creator = $_POST["creator"];

        if ($title != null AND $docid == null AND $creator == null && $title != "") {
            $sql = "SELECT D.TITLE, D.CREATOR, D.DOCID, D.TYPE, P.NAME FROM DOCUMENT D, PUBLISHER P WHERE D.DOCID = P.DOCID AND D.DOCID NOT IN (SELECT D.DOCID FROM DOCUMENT D, BORROWS B WHERE D.DOCID = B.DOCID AND B.RETURNED_ON IS NULL) AND D.TITLE LIKE '%$title%'";
        }
        elseif ($title == null AND $docid != null AND $creator == null && $docid != "") {
            $sql = "SELECT D.TITLE, D.CREATOR,D.DOCID, D.TYPE, P.NAME FROM DOCUMENT D, PUBLISHER P WHERE D.DOCID = P.DOCID AND D.DOCID NOT IN (SELECT D.DOCID FROM DOCUMENT D, BORROWS B WHERE D.DOCID = B.DOCID AND B.RETURNED_ON IS NULL) AND D.DOCID = '$docid'";

        }
        elseif ($title == null AND $docid == null AND $creator != null && $creator != "") {
            $sql = "SELECT D.TITLE, D.CREATOR,D.DOCID, D.TYPE, P.NAME FROM DOCUMENT D, PUBLISHER P WHERE D.DOCID = P.DOCID AND D.DOCID NOT IN (SELECT D.DOCID FROM DOCUMENT D, BORROWS B WHERE D.DOCID = B.DOCID AND B.RETURNED_ON IS NULL) AND D.CREATOR LIKE '%$creator%'";
        }
        else{
            echo "You have not filled any the fields, please fill at least one fields!";
            echo "<br><br><a href='javascript:history.go(-1)'>Go Back</a><br><br>";
        }
        //echo $sql;
        $result = $conn->query($sql);
        $arr_id = [];
        if($result->num_rows > 0)
        {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td><b>Title</b></td>";
            echo "<td><b>Creator</b></td>";
            echo "<td><b>Document ID</b></td>";
            echo "<td><b>Type</b></td>";
            echo "<td><b>Publisher</b></td>";
            echo "<td><b>Process</b></td>";
            echo "</tr>";

            for($i = 0; $i<$result->num_rows; $i++)
            {
                $row = $result->fetch_assoc();
                $arr_id[$i] = $row["DOCID"];
                echo "<tr>";
                echo "<td>" . $row["TITLE"] . "</td>";
                echo "<td>" . $row["CREATOR"] . "</td>";
                echo "<td>" . $row["DOCID"] . "</td>";
                echo "<td>" . $row["TYPE"] . "</td>";
                echo "<td>" . $row["NAME"] . "</td>";
                echo "<td><form action=\"process_checkout.php\" method=\"post\"><input type='submit' name='checkout_process' value='Check Out'><input type=\"hidden\" name=\"doc_id\" value= ". $row["DOCID"] . "><input type='hidden' name='login_id' value='$login_id'><input type='hidden' name='login_id' value='$password'></form></td>";
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
echo "<br><br><a href='javascript:history.go(-1)'>Go Back To Welcome Page</a><br><br>";
?>
</body>
</html>