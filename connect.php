<?php
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
?>    