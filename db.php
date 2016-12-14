<?php

<<<<<<< HEAD
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'restaurant';
    $table = 'restaurants';
    
    
    $name = $_GET["name"];
    $address = $_GET["address"];
    $stars = $_GET["stars"];
    $review = $_GET["review"];
=======
>>>>>>> 6b81c51763b70daba4094bb4c6c24c5c945eb161

 
    function getResource() {
        
        # returns numerically indexed array of URI parts
        $resource_string = $_SERVER['HTTP_REFERER']; //OIKEA

        
        if (strstr($resource_string, '?')) {
            $resource_string  = substr($resource_string, strpos($resource_string, '?') + 1, strlen($resource_string)-strpos($resource_string, '?'));
        }
        
        $replace = str_replace('&', '=', $resource_string);
        
        $x = str_replace('+', ' ', $replace);
        $resource = explode('=', $x);
 
        return $resource;
    }

    
    function showAll() { 
        
<<<<<<< HEAD
        $link = new mysqli($servername, 'root', '', 'restaurant');
=======
        $link = new mysqli('localhost', 'johannrt', '', 'Projekti');
>>>>>>> 6b81c51763b70daba4094bb4c6c24c5c945eb161

        // Check connection
        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        }
        
        $sql = "SELECT * FROM restaurants";
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

            }
            echo json_encode($arr);
        } else {
            //echo json_encode("No reviews yet!";
        
        }
        
        $link->close();
    }
    
    
    function add($n, $add, $r, $s) {
        
        $link = new mysqli('localhost', 'root', '', 'restaurant');

        // Check connection
        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        }
        
        $name = strip_tags($n);
        $address = strip_tags($add);
        $review = strip_tags($r);
        $stars = strip_tags($s);
        
        $sql = "INSERT INTO `restaurants`(`name`, `address`, `review`, `stars`)
        VALUES ('$name', '$address', '$review', $stars)";
        
        if(!mysqli_query($link, $sql)){
            die('Error : ' . $link->error);
            echo ('Something went wrong :(');
        }
        
        echo ('New review added! Thank you for your input.');
        
        $link->close();

    }
    
    function showRestRev($res){
        
        $restaurant = strip_tags($res);
        
        
        
<<<<<<< HEAD
        $link = new mysqli($servername, 'root', '', 'restaurant');
=======
        $link = new mysqli('localhost', 'johannrt', '', 'Projekti');
       
>>>>>>> 6b81c51763b70daba4094bb4c6c24c5c945eb161

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

            }
        
           
            echo json_encode($arr);
            
        } else {
            return false;
        
        }
        
        $link->close();
        
    }
    


    $resource = getResource();

    $method = $_SERVER['REQUEST_METHOD'];
    

    switch ($method) {
        case 'GET' && $resource[0]=='name' && $resource[2]=='address':
            add($resource[1],$resource[3],$resource[7],$resource[5]);
            break;
        case 'GET' && $resource[0]=='all':
            showAll();
<<<<<<< HEAD
            break;
        case 'POST':
            add($parameters);
=======
            break; 
        case 'GET' && $resource[0]=='name':
            showRestRev($resource[1]);
>>>>>>> 6b81c51763b70daba4094bb4c6c24c5c945eb161
            break;
        default:
            //http_response_code(405); # Method not allowed
            break;
    } 

?>    
