<?php

    include('connect.php');
 /*   
    $servername;
    $username = 'johannrt';
    $password = '';
    $database = 'Projekti';
    $table = 'restaurants';
    
    
    $name = $_GET["name"];
    $address = $_GET["address"];
    $stars = $_GET["stars"];
    $review = $_GET["review"];
    
    
    */

    function getResource() {
        
        # returns numerically indexed array of URI parts
        $resource_string = $_SERVER['REQUEST_URI'];
        
        if (strstr($resource_string, '?')) {
            $resource_string = substr($resource_string, 0, strpos($resource_string, '?'));
        }
        
        $resource = array();
        $resource = explode('/', $resource_string);
        array_shift($resource);   
        return $resource;
    }

    function getParameters() {
        
        # returns an associative array containing the parameters
        $resource = $_SERVER['REQUEST_URI'];
        $param_string = "";
        $param_array = array();
        
        if (strstr($resource, '?')) {
            
            # URI has parameters
            $param_string = substr($resource, strpos($resource, '?')+1);
            $parameters = explode('&', $param_string);                      
            foreach ($parameters as $single_parameter) {
                $param_name = substr($single_parameter, 0, strpos($single_parameter, '='));
                $param_value = substr($single_parameter, strpos($single_parameter, '=')+1);
                $param_array[$param_name] = $param_value;
            }
        }
        return $param_array;
    }


    
    function showAll() { 
        
        $link = new mysqli($servername, 'johannrt', '', 'Projekti');

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
    
    
    function add($n, $add, $r, $s) {
        
    
        $link = new mysqli('localhost', 'johannrt', '', 'Projekti');

        // Check connection
        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        }
        
        $name = $n;
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

            }
            echo json_encode($arr);
        } else {
            echo "No reviews yet!";
        
        }
        
        $link->close();
        
    }
    

	$resource = getResource();
    $parameters = getParameters();
    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case 'GET' && $resource[1]=='name':
            showRestRev($resource[1]);
            break;
        case 'GET':
            showAll();
            break;
        case 'POST' && $resource[1] == 'name':
            add($parameters);
            break;
        default:
            http_response_code(405); # Method not allowed
            break;
    }

    
?>    
