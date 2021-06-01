<?php 
$server="localhost";
$username="root";
$password="";
$database="idiscuss";

$conn=mysqli_connect($server, $username, $password, $database);

if($conn){
    //echo "successfully connected";
}
else{
    echo "Failed".mysqli_connect_error();
}

?>