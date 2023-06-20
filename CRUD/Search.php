<?php
include('Connection.php');

// ADD
if(isset($_POST['ADD'])){
    $name = $_POST['input1'];
    $email = $_POST['input2'];
    $position = $_POST['input3'];
    $ADD = "INSERT INTO `employee_table`(`name`, `email`, `position`) 
    VALUES ('$name','$email','$position')";
    $add_data = $con->query($ADD);
    echo"<script>alert('Add success');</script>";
}
// UPDATE
if(isset($_POST['update'])){
    $update_name = $_POST['input1'];
    $update_email = $_POST['input2'];
    $update_position = $_POST['input3'];

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $update = "UPDATE `employee_table` SET `name`='$update_name',`email`='$update_email',`position`='$update_position' WHERE `id` = '$id'";
    $update_DATA = $con->query($update);
    echo"<script>alert('update success');</script>";

}}

// Delete



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

        
        echo"
        <form method='post'>
        <div class='box1'>
            <label>Name</label>
            <input type='text' name='input1' value=".$display['name'].">
        </div>
        <div class='box2'>
            <label>Email</label>
            <input type='text' name='input2' value=".$display['email'].">
        </div>
        <div class='box3'>
            <label>Position</label>
            <input type='text' name='input3' value=".$display['position'].">
        </div>
        <br>
        <div class='btn'>
            <input type='submit' value='ADD' name='ADD' class='btn btn-primary'>
            <input type='button' value='UPDATE' name='' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
            
            
        </div>
        </form>
        </div>"
        ?>
    

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>position</th>
            <th>email</th>
            <th>update</th>
            <th>delete</th>
            
        </tr>
        <?php
        $Crud = "SELECT * FROM `employee_table`";
        $connect = $con->query($Crud);
        $num = mysqli_num_rows($connect);
        if($num>0){
        while($showData = mysqli_fetch_assoc($connect)){
            echo"
            <tr>
            <td>".$showData['id']."</td>
            <td>".$showData['name']."</td>
            <td>".$showData['position']."</td>
            <td>".$showData['email']."</td>
            <td><a href='Main.php? id=".$showData['id']."' class='btn btn-primary'>UPDATE</a></td>
            <td><a href='Delete.php? id=".$showData['id']."' class='btn btn-primary'>DELETE</a></td>
            </tr>
            
            
            ";  
        }
    }
        
        ?>
        </div>
        </div>
    </table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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

        
        echo"
        <form method='post'>
        <div class='box1'>
            <label>Name</label>
            <input type='text' name='input1' value=".$display['name'].">
        </div>
        <div class='box2'>
            <label>Email</label>
            <input type='text' name='input2' value=".$display['email'].">
        </div>
        <div class='box3'>
            <label>Position</label>
            <input type='text' name='input3' value=".$display['position'].">
        </div>
        <br>
        <div class='btn'>
            <input type='submit' value='ADD' name='ADD' class='btn btn-primary'>
            <input type='button' value='UPDATE' name='' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
            
            
        </div>
        </form>
        </div>"
        ?>
        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Script -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>