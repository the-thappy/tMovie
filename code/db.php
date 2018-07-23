<?php
$servername = "localhost";
$username = "root";
$password = ""; // password goes here
$dbname = "tmdb"; // database name goes here
$db = new mysqli("$servername", "$username", "$password", "$dbname");
$api_key = "605090f15f815c8c4887dbfb8e73c9ee";
//$configResponse = file_get_contents("./cache/configArray");
$configArray = json_decode(file_get_contents("./code/configArray"), true);
//file_put_contents("./cache/configArray" , $configResponse);
//$configURL = "https://api.themoviedb.org/3/configuration?api_key=" . $api_key;
//$dbcon = mysqli_connect("localhost", "root", "", "material");
//$db = mysqli_connect("$servername", "$username", "$password", "$dbname");
header("Cache-Control: max-age=2592000"); 
?>
