<?php

    //include('connect.php');
 /*   
    $servername;
    $username = 'johannrt';
    $password = '';
    $database = 'Projekti';
    $table = 'restaurants';
    
    
    
    $address = $_GET["address"];
    $stars = $_GET["stars"];
    $review = $_GET["review"];
    
    
    */


    function getResource() {
        
        # returns numerically indexed array of URI parts
        $resource_string = $_SERVER['HTTP_REFERER']; //OIKEA
        //$resource_string = $_SERVER['REQUEST_URI'];
       //$resource_string = 'https://testi-johannrt.c9users.io/Ravintola/rewievspage.html?name=momo';
        
        if (strstr($resource_string, '?')) {
            $resource_string  = substr($resource_string, strpos($resource_string, '?') + 1, strlen($resource_string)-strpos($resource_string, '?'));
        }
        //echo $resource_string;
       // $resource = array();
       
       $x = str_replace('+', ' ', $resource_string);
        $resource = explode('=', $x);
        
        
        //array_shift($resource); 
        //echo $resource[1];
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
        
        $link = new mysqli($servername,'johannrt', '', 'Projekti');

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
        
        //echo $restaurant;
        
        $link = new mysqli('localhost', 'johannrt', '', 'Projekti');

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
            //echo "No reviews yet!";
        
        }
        
        $link->close();
        
    }
    

    
    //$name = $_GET["name"];
	$resource = getResource();
    //$parameters = getParameters();
    $method = $_SERVER['REQUEST_METHOD'];

  
    //showRestRev($resource[1]);
    switch ($method) {
        case 'GET' && $resource[0]=='name':
            showRestRev($resource[1]);
            break;
        case 'GET' && $resource[1]=='':
            showAll();
            break;
        case 'POST':
            add($parameters);
            break;
        default:
            http_response_code(405); # Method not allowed
            break;
    } 

    //showRestRev('momo'); 
?>    
