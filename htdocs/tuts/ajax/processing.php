<?php

$myDBconn = mysqli_connect('localhost','root', '','_name_of_db');
echo 'working on it ...';

// GET
if(isset($_GET['name'])){
    echo 'GET name: ' .$_GET['name']; // show case : without security wrap function 
}

// $_POST superglobal
if(isset($_POST['name'])){
    $name = mysqli_real_escape_string($myDBconn, $_POST['name'] );
    echo 'POST name: ' .$_POST['name']; 
    $query = "INSERT INTO users(username) VALUES ('$name')";
    if(mysqli_query($myDBconn, $query)){
        echo ' Added name ...';
    } else {
        echo 'Error: ' .mysqli_error($myDBconn);
    }
}
