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
    $name = $_SESSION["fullname"];
    $login_id = $_SESSION["login_id"];
}
else
{
    echo "<h1>ERROR!</h1>";
    echo "You are not supposed to be here!<br>";
    echo "<a href=\"index.php\">Login</a> to continue.";
}
?>
<h1>Add A New Member</h1>

<form action="new_member_message.php" method="POST">
    Name: <input type="text" name="name"/>
    <br><br>
    Phone Number: <input type="text" name="phone"/>
    <br><br>
    Email Address: <input type="text" name="email"/>
    <br><br>
    Address: <input type="text" name="address"/>
    <br><br>
    Password: <input type="password" name="pass"/>
    <br><br>
    Admin Status: <select name="admin_stat">
        <option value= 1>Yes</option>
        <option value= 0>No</option>
    </select>
    <br><br>
    <input type="reset" value="Clear">
    <input type = "submit" value="Search">
</form>

<br><br><a href="javascript:history.go(-1)">Go Back</a><br><br>

</body>
</html>