<!DOCTYPE html>
<html>
<head><title>Sign up to the City Library</title></head>
    
<body>
<?php
    if (isset($_POST["userid"]) && !($_POST["userid"]==null && $_POST["password"]==null && $_POST["fname"]==null && $_POST["lname"]==null))
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "library";
        
        // Create connection
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn -> connect_error)
        {
            die("Connection failed: " . $conn -> connect_error);
        }
        else
        {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $userid = $_POST["userid"];
            $password = $_POST["password"];
            
            
            $sql = "insert into member(firstname,lastname,userid,password) values ('" . $fname . "','". $lname . "','". $userid. "','" . $password . "')";
            //echo $sql;        
            $result = $conn->query($sql);
            if ($result)
            {
                echo "User ". $userid . " created successfully.";
                echo "<br><br>Go to the <a href='index.php'>Login page</a>.";
            }
            else
            {
                echo "<h1>Oops! Something bad happened!</h1>";
                echo "<br><br> <a href='signup.php'>Try again</a>.<br><br>";
            }
        }
    }
    else
    {
        
  ?>
    
<h1>Create an Account on City Library</h1>
<h3>Please enter your information below</h3>
<form action="signup.php" method="POST">
    Firstname: <input type="text" name="fname">
    <br><br>
    Lastname: <input type="text" name="lname">
    <br><br>
    Username: <input type="text" name="userid">
    <br><br>
    Password: <input type="password" name="password">
    <br><br>
    Re-type Password: <input type="password" name="password2">
    <br><br>
    
    <br><br>
    <input type="reset" value="Clear">
    <input type = "submit" value="Sign Up">
</form>

<?php
    }
    ?>
</body>
</html>