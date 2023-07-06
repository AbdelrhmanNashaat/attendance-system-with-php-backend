<?php
    
    $conn = mysqli_connect("localhost", "root", "", "attendance");

    if(!$conn)
    {
        echo mysqli_error();
        exit;
    }
    else
    {
    //takin the data from the user input from the form
    $user_id = mysqli_escape_string($conn,$_POST['id']);
    $first_name = mysqli_escape_string($conn,$_POST['firstName']);
    $last_name = mysqli_escape_string($conn, $_POST['lastName']);
    $department = mysqli_escape_string($conn, $_POST['department']);
    $position = mysqli_escape_string($conn, $_POST['position']);
    $phone_number = mysqli_escape_string($conn, $_POST['phonenumber']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $address = mysqli_escape_string($conn, $_POST['address']);
    $age = mysqli_escape_string($conn, $_POST['age']);
    $image_path = $_POST['image_path'];
    $total_hours = mysqli_escape_string($conn, $_POST['total_hours']);
    $query = "UPDATE employee_data SET first_name='".$first_name."', last_name ='".$last_name."', department='".$department."', position='".$position."', phone_number='".$phone_number."', email ='".$email."', address='".$address."', age='".$age."',image_path='".$image_path."' WHERE id='".$user_id."';"; 
    $new_query = "UPDATE employee_attend SET total_hours='".$total_hours."' WHERE id='".$user_id."';";
    if(mysqli_query($conn,$query))
    {
        echo "Data Updated";
        echo '<br>';
    }  
    else
    {
        echo mysqli_error($conn);
    }
    if(mysqli_query($conn,$new_query))
    {
        echo "Data Updated";
        echo '<br>';
    }  
    else
    {
        echo mysqli_error($conn);
    }
    }
    mysqli_close($conn);
