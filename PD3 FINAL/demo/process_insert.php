<!DOCTYPE html>
<html>
<head><title>Check Out Processing Page</title></head>

<body>
<?php
session_start();
$doc_type = $_POST["type"];
$doc_title = $_POST["title"];
$doc_creator = $_POST["creator"];
$doc_pub = $_POST["publisher"];
$creator_id = $_POST["creator_id"];


if (isset($_POST["type"]) AND isset($_POST["title"]) AND isset($_POST["creator"]) AND isset($_POST["publisher"]) AND isset($_POST["creator_id"]))
{
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
        if (isset($doc_type) && isset($doc_title) && isset($doc_creator) && $doc_type != "" && $doc_title != "" && $doc_creator != ""){
            $insert = "INSERT INTO DOCUMENT (BRID, TYPE, TITLE, CREATOR) VALUES('1', '$doc_type' , '$doc_title', '$doc_creator')";
            $insert = $conn->query($insert);
            $extract_docid = $conn->insert_id;

            $sql = "INSERT INTO PUBLISHER (NAME, DOCID) VALUES ('$doc_pub', '$extract_docid')";
            if ($doc_type == 'B') {
                $insert = "INSERT INTO BOOK ( ISBN, DOCID) VALUES ('$creator_id', '$extract_docid')";
                $insert = $conn->query($insert);
            }
            if ($doc_type == 'D') {
                $insert = "INSERT INTO DVD ( DVDID, DOCID) VALUES ('$creator_id', '$extract_docid')";
                $insert = $conn->query($insert);
            }
            if ($doc_type == 'J') {
                $insert = "INSERT INTO JOURNAL( JOURNALID, DOCID) VALUES ('$creator_id', '$extract_docid')";
                $insert = $conn->query($insert);
            }

            //echo $sql;
            $result = $conn->query($sql);
            echo "$doc_title has been inserted.";
            $conn->close();

        }
        else{
            echo "You have not filled all the fields, please fill all the fields!";
            echo "<br><br><a href='javascript:history.go(-1)'>Go Back</a><br><br>";

        }
    }

}

?>
<br><br><a href="logout.php" target="_self">Log Out</a>
</body>
</html>
