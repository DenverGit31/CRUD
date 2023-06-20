

<?php
include('Connection.php');

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $delete ="DELETE FROM `employee_table` WHERE `id` = '$id'";
    $delete_date = $con->query($delete);
    header('location:Main.php');

}


?>