<?php
$conn = mysqli_connect("localhost","root","","attendance");
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
    echo '<br>';
}else{
$id_from_input = mysqli_escape_string($conn,$_POST['id']);
  $query = "DELETE FROM employee_data WHERE id = '$id_from_input'";
if(mysqli_multi_query($conn,$query)){
    if($result = mysqli_store_result($conn)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo "Deleted Successfully ";
            }
        }
    }else{
        echo "Id not found";
    }
}
}
?>