<?php
include('Connection.php');

// // ADD
// if(isset($_POST['ADD'])){
//     $name = $_POST['input1'];
//     $email = $_POST['input2'];
//     $position = $_POST['input3'];
//     $ADD = "INSERT INTO `employee_table`(`name`, `email`, `position`) 
//     VALUES ('$name','$email','$position')";
//     $add_data = $con->query($ADD);
//     echo"<script>alert('Add success');</script>";
// }
// UPDATE
if(isset($_POST['update'])){
    $update_name = $_POST['input1'];
    $update_email = $_POST['input2'];
    $update_position = $_POST['input3'];

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $update = "UPDATE `employee_table` SET `name`='$update_name',`email`='$update_email',`position`='$update_position' WHERE `id` = '$id'";
    $update_DATA = $con->query($update);
    echo"<script>alert('update success'); window.location.href = 'Main.php?'</script>";

}}

// Search

// if(isset($_POST['search'])){
//     $name_search = $_POST['input1'];
//     $position_search = $_POST['input2'];
//     $email_search = $_POST['input3'];
    
//     $search = "SELECT * FROM `employee_table` WHERE `name` = '$name_search' and `email` = '$position_search' Or `position` = ''";
//     $search_date = $con->query($search);

// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>EXAM</title>
</head>
<body>
    <br><br><br>
    <h1 style='text-align:center;'>CRUD</h1>
    <div class="con">
        <div class="mid">
        <div class="forms">
        
        <?php
        if(isset($_REQUEST['id'])){
        $ID_show = $_REQUEST['id'];
        }
        $show = "SELECT * FROM `employee_table` where `id` = '$ID_show'";
        
        $DataShow = $con->query($show);
        $display = mysqli_fetch_assoc($DataShow);
        $f_name = $display['name'];
        
        echo"
        <form method='post'>
        <div class='box1'>
            <label>Name</label>
            <input type='text' name='input1' value='".$display['name']."' required>
        </div>
        <div class='box2'>
            <label>Email</label>
            <input type='email' name='input2' value='".$display['email']."' required>
        </div>
        <div class='box3'>
            <label>Position</label>
            <input type='text' name='input3' value='".$display['position']."' required>
        </div>
        <br>
        <div class='btn'>
            <input type='submit' value='UPDATE' name='update' class='btn btn-primary' onclick='return confirm(`Are you sure you want to update`)'>
            <a href='Main.php' class='btn btn-secondary'>BACK</a>
        </div>
        </form>
        </div>"
        ?>
    
    </div>
        </div>

    
<!-- Script -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.2/b-2.3.4/b-html5-2.3.4/datatables.min.css" />
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.2/b-2.3.4/b-html5-2.3.4/datatables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#itemTable').DataTable({
                    "dom": 'Bfrtip',
                    buttons: [
                        'copyHtml5',
                        'csvHtml5'
                    ]

                })
            });
        </script> -->
</body>
</html>