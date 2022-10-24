<!DOCTYPE html>
<html>
<head><title>Welcome to the City Library</title></head>
    
<body>
    
<?php
session_start();
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
    else{

        $login_id = $_POST["login_id"];
        $password = $_POST["password"];
        $_SESSION["login_id"] = $login_id;
        $_SESSION["password"] = $password;

        $sql = "SELECT * FROM MEMBER WHERE MEMID = '$login_id' AND PASSWORDS = '$password' ";
        $result = $conn->query($sql);

        $_SESSION["login_id"] = $login_id;
        $_SESSION["fullname"] = $row["NAME"];

        if (isset($_SESSION["login_id"]) && $_SESSION["login_id"] != "") {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<h1>Nerji Library Home Screen</h1>";
                echo "<h2>Welcome, " . $row["NAME"] . "</h2>";
                if ($row["ADMIN"] == 1) {
                    echo "<h3>Admin Menu</h3>";
                    echo "<ul>";
                    echo "<li> <a href=\"insert_doc.php\"> Insert Document </li>";
                    echo "<br>";
                    echo "<li> <a href=\"new_member.php\"> Add New Reader </a></li>";
                    echo "<br>";
                    echo "<li> <a href=\"status_report.php\"> Document Search And Status Report </a></li>";
                    echo "<br>";
                    echo "<li> <a href=\"br_info.php\"> Branch Information </li>";
                    echo "<br>";
                    echo "<li> <a href=\"freq_borrowers.php\"> Most Frequent Borrowers </li>";
                    echo "<br>";
                    echo "<li> <a href=\"br_top_books.php\"> Most Frequently Borrowed Books </li>";
                    echo "<br>";
                    echo "<li> <a href=\"popular_book_yearly.php\"> Most Popular Books Of The Year </li>";
                    echo "<br>";
                    echo "<li> <a href=\"avg_fine.php\"> Average Fine Per Member </li>";


                } elseif ($row["ADMIN"] == 0) {
                    echo "<h3>Member Menu</h3>";
                    echo "<ul>";
                    echo "<li> <a href=\"search.php\"> Search for A Document </li>";
                    echo "<br>";
                    echo "<li> <a href=\"doc_checkout.php\"> Checkout a document </li>";
                    echo "<br>";
                    echo "<li> <a href=\"doc_return.php\"> Return a document </li>";
                    echo "<br>";
                    echo "<li> <a href=\"listpub.php\"> View Documents by Publisher </li>";
                    echo "<br>";
                }
            } else {
                echo "Sorry! You don't have a login.";
            }

            $conn->close();

        }
    }

    
?>

    <br><br><a href="logout.php">Sign Out</a>
</body>
</html>

