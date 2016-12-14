<?php
    // Includes username etc. information

    //$servername = getenv('IP');
    //$username = getenv('C9_USER');
    //$dbport = 3306;
     
    //$servername = 'localhost';
    $username = 'root';
    $password = "";
    $database = "restaurant";
    $table = 'restaurants';
  

/*    // Create connection
    $link = new mysqli($servername, $username, $password, $database, $dbport);
$servername = 'localhost';
    $username = 'root';
    $password = "";
    $database = "restaurant";
  

    // Create connection
    $link = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    } 
    echo "Connected successfully (".$link->host_info.")"; 
    
    $sql = "SELECT * FROM markers";
    $result = mysqli_query($link, $sql);
    //$result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Address: " . $row["address"].
            "Cordinates: ". $row["lat"]. " ". $row["lng"]. " ". $row["type"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $link->close();
    }
    //console.log("Connected successfully" .$link->host_info);
    //echo "Connected successfully (".$link->host_info.")"; 
    
    $sql = "SELECT * FROM `$table`";
    $result = mysqli_query($link, $sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["name"] . " - Address: " . $row["address"].
            "- Email: ". $row["useremail"]. "- Review: ". $row["review"]. "- Stars: ". $row["stars"]. "<br>";
        }
    } else {
        echo "No reviews yet!";
    }
    
    $link->close();
    */
?>    