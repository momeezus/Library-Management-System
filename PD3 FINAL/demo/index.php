<!DOCTYPE html>
<html>
<head><title>Welcome to Nerji Library</title></head>
    
<body>
<h1>Welcome to Nerji Library</h1>
<h3>Please log into the system to continue</h3>
<form action="welcome.php" method="POST">
    Member ID: <input type="text" name="login_id">
    <br><br>
    Password: <input type="password" name="password">
    <br><br>
    Don't have an account yet? Sign up <a href="signup.php">here</a>.
    <br><br>
    <input type="reset" value="clear">
    <input type = "submit" value="login">
</form>

</body>
</html>