<?php

$conn = mysqli_connect('localhost', 'root', '', '_name_of_db');
$query ='SELECT * FROM DB_TABLE_NAME';
$results = mysqli_query($conn,$query);
$users = mysqli_fetch_all($results, MYSQLI_ASSOC);
echo json_encode($users);