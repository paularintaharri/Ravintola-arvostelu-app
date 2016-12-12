<?php

//TIETOKANNASTA
    

    
    $servername = 'localhost';
    $username = 'johannrt';
    $password = '';
    $database = 'Projekti';
    $table = 'restaurants';

    //include('connect.php');

    // Create connection


        //console.log("Connection successfully");
        //echo "Connected successfully (".$link->host_info.")"; 

    
    function showAll() { 
        
        $link = new mysqli($servername, 'johannrt', '', 'Projekti');

        // Check connection
        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        }
        
        $sql = "SELECT * FROM $table";
        $result = mysqli_query($link, $sql);
    
        $rows = [];
        $inc = 0;
        
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                
                $jsonObject = (array('name' => $row["name"], 'address' => $row["address"],
                'review' => $row["review"], 'stars'=> $row["stars"]));
                
                $arr[$inc] = $jsonObject;
                $inc++;
                
              /*  echo "Name: " . $row["name"] . " - Address: " . $row["address"].
                " - Email: ". $row["useremail"]. " - Review: ". $row["review"]. " - Stars: ". $row["stars"]. "<br>";
                */
            }
            echo json_encode($arr);
        } else {
            echo "No reviews yet!";
        
        }
        
        $link->close();
    }
    
    
    function add($name, $add, $r, $s) {
        
        //json_decode()
        
        $link = new mysqli('localhost', 'johannrt', '', 'Projekti');

        // Check connection
        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        }
        
        $name = $name;
        $address = $add;
        $review = $r;
        $stars = $s;
        
        $sql = "INSERT INTO `restaurants`(`name`, `address`, `review`, `stars`)
        VALUES ('$name', '$address', '$review', $stars)";
        
        if(!mysqli_query($link, $sql)){
            die('Error : ' . $link->error);
        }
        
         $link->close();

    }
    
    function showRestRev($res){
        
        $restaurant = $res;
        
        $link = new mysqli($servername, 'johannrt', '', 'Projekti');

        // Check connection
        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        }
        
        $sql = "SELECT * FROM restaurants WHERE name= '$restaurant'";
        $result = mysqli_query($link, $sql);
    
        $rows = [];
        $inc = 0;
        
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                
                $jsonObject = (array('name' => $row["name"], 'address' => $row["address"],
                'review' => $row["review"], 'stars'=> $row["stars"]));
                
                $arr[$inc] = $jsonObject;
                $inc++;
                
              /*  echo "Name: " . $row["name"] . " - Address: " . $row["address"].
                " - Email: ". $row["useremail"]. " - Review: ". $row["review"]. " - Stars: ". $row["stars"]. "<br>";
                */
            }
            echo json_encode($arr);
        } else {
            echo "No reviews yet!";
        
        }
        
        $link->close();
        
    }

    
 //   add("r1", "os", "g@h.com", "arv", 3);
    showRestRev('Love.Fish');
?>    
