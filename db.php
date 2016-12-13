<?php

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'restaurant';
    $table = 'restaurants';

    $method = $_SERVER['REQUEST_METHOD'];
    
    //$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
    $name = $_GET["name"];
    
    
    
    switch ($method) {
      case 'GET':
          //showRestRev($name);
          
          showAll();
          break;
        //$sql = "select * from `$table`".($key?" WHERE id=$key":''); break;
      case 'PUT':
        //$sql = "update `$table` set $set where id=$key";
        break;
      case 'POST':
          add('r1','os', 'rev',2);
        //$sql = "insert into `$table` set $set";
        break;
      case 'DELETE':
        //$sql = "delete `$table` where id=$key";
        break;
    }
    

    


    //include('connect.php');




    
    function showAll() { 
        
        $link = new mysqli($servername, 'root', '', 'restaurant');

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
            echo "No reviews yet!";
        
        }
        
        $link->close();
    }
    
    
    function add($name, $add, $r, $s) {
        
        //json_decode()
        
        $link = new mysqli('localhost', 'root', '', 'restaurant');

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
        
        echo ('New review added!');
         $link->close();

    }
    
    function showRestRev($res){
        
        $restaurant = $res;
        
        $link = new mysqli($servername, 'root', '', 'restaurant');

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
            echo "No reviews yet!";
        
        }
        
        $link->close();
        
    }
?>    
