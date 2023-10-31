<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "todo-db";

$conn = "";
$sql = "";
$result = ""; 

try
{
    $conn = mysqli_connect($server_name, $user_name, $password, $database);
}
catch(mysqli_sql_exception)
{
    echo mysqli_connect_error()." We are failed to connect with the server";
}

?>