<!DOCTYPE html>
<html>
<head><title>Painting Details</title></head>
    
<body>
    
<?php
    session_start();
    if (isset($_SESSION["login_id"]) && $_SESSION["login_id"]!="")
    {
        
        echo $_SESSION["fullname"];
        echo "<br>";
      }
    else
    {
        echo "You are not supposed to be here!<br>";
        echo "<a href=\"index.php\">Login</a> to continue.";
    }
    
    if (isset($_GET["workid"]) && $_GET["workid"]!=null )
    {
        echo "<h2>Painting Details</h2>";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vrg";
        
        // Create connection
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn -> connect_error)
        {
            die("Connection failed: " . $conn -> connect_error);
        }
        else
        {
            $workid = $_GET["workid"];
            
            $sql = "SELECT * from work, artist where work.artistid=artist.artistid and workid='" .$workid."'" ;
            
            echo $sql;        
            $result = $conn->query($sql);
            
            if($result->num_rows > 0)
            {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<td><b>WorkID</b></td>";
                echo "<td><b>Title</b></td>";
                echo "<td><b>Copy</b></td>";
                echo "<td><b>Medium</b></td>";
                echo "<td><b>Description</b></td>";
                echo "<td><b>Artist</b></td>";
                echo "</tr>";
            
                for($i = 0; $i<$result->num_rows; $i++)
                {
                    $row = $result->fetch_assoc();
                    echo "<tr>";
                    echo "<td>" . $row["WorkID"] . "</td>";
                    echo "<td>" . $row["Title"] . "</td>";
                    echo "<td>" . $row["Copy"] . "</td>";
                    echo "<td>" . $row["Medium"] . "</td>";
                    echo "<td>" . $row["Description"] . "</td>"; 
                    echo "<td>" . $row["FirstName"] . " " . $row["LastName"] . "</td>"; 
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
    
</body>
</html>