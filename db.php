<?php

//TIETOKANNASTA

    include('connect.php');

    //Opens connection to MySQL
    
    $connection=mysql_connect ($servername, $username, $password);
    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }
    
        $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
        die ('Can\'t use db : ' . mysql_error());
    }
    
    // Select all the rows in the markers table
    $query = "SELECT * FROM markers";
    $result = mysql_query($query);
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }
    
    $selectall = array();
    while($row = mysqli_fetch_assoc($result)){
        $selectall[]=$row;
    }
    echo json_encode($emparray);
    
    /*
        //write to json file
    $fp = fopen('empdata.json', 'w');
    fwrite($fp, json_encode($emparray));
    fclose($fp);
    */
    
 /* ********   //TIETOKANTAAAN ********* 
    
    $connection=mysql_connect ($servername, $username, $password);
    if (!$connection) {
      die('Not connected : ' . mysql_error());
    }
    
        $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
        die ('Can\'t use db : ' . mysql_error());
    }
    
    
    //read the json file contents
    $jsondata = file_get_contents('empdetails.json');
    //convert json object to php associative array
    $data = json_decode($jsondata, true);
    
    
    //get the details
    $id = $data['empid'];
    $name = $data['personal']['name'];
    $gender = $data['personal']['gender'];
    $age = $data['personal']['age'];
    $streetaddress = $data['personal']['address']['streetaddress'];
    $city = $data['personal']['address']['city'];
    $state = $data['personal']['address']['state'];
    $postalcode = $data['personal']['address']['postalcode'];
    $designation = $data['profile']['designation'];
    $department = $data['profile']['department'];
    
    //insert into mysql table
    $sql = "INSERT INTO tbl_emp(empid, empname, gender, age, streetaddress, city, state, postalcode, designation, department)
    VALUES('$id', '$name', '$gender', '$age', '$streetaddress', '$city', '$state', '$postalcode', '$designation', '$department')";
    if(!mysql_query($sql,$con))
    {
        die('Error : ' . mysql_error());
    } */
?>    
