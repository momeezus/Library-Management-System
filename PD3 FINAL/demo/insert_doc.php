<!DOCTYPE html>
<html>
<head><title>Insert a Document</title></head>

<body>

<?php
session_start();
$login_id = $_SESSION["login_id"];
$_SESSION["login_id"] = $login_id;
if (isset($_SESSION["login_id"]) && $_SESSION["login_id"]!="")
{

    echo $_SESSION["fullname"];
    echo "<br>";

    ?>
    <h1>Insert a Document</h1>

    <form action="process_insert.php" method="POST">
        Document Type: <select name="type">
            <option value="B">Book</option>
            <option value="J">Journal</option>
            <option value="D">DVD</option>
        </select>
        <br><br>
        Title: <input type="text" name="title">
        <br><br>
        Creator: <input type="text" name="creator">
        <br><br>
        Publisher Name: <input type="text" name="publisher">
        <br><br>
        Creator ID: <input type="text" name="creator_id">
        <br><br>
        <input type="reset" value="Clear">
        <input type = "submit" value="Insert">
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
<br><br><a href="javascript:history.go(-1)">Go Back</a><br><br>
</body>
</html>