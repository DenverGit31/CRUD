<?php
$localhost = 'localhost';
$user = 'root';
$password ='';
$db = 'employee';

$con = mysqli_connect($localhost,$user,$password,$db);
if($con->connect_error){
    die('Connection Fail' . $con->connect_error);
}
// else{
//     echo'<script>alert("connection success")</script>';
// }
?>