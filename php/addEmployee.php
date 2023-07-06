<?php
    //connection between database and PHP
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
    // the query (insert)
    $query = "INSERT INTO employee_data SET id='".$user_id."', first_name='".$first_name."', last_name ='".$last_name."', department='".$department."', position='".$position."', phone_number='".$phone_number."', email ='".$email."', address='".$address."', age='".$age."',image_path='".$image_path."';"; 
    $query1 = "INSERT INTO employee_attend SET id='".$user_id."', total_hours='".$total_hours."';";  
    if(mysqli_multi_query($conn,$query))
    {
        echo "Data inserted";
        echo '<br>';
    }  
    else
    {
        echo mysqli_error($conn);
    }
    if(mysqli_multi_query($conn,$query1))
    {
        echo "Data inserted";
        echo '<br>';
    }  
    else
    {
        echo mysqli_error($conn);
    }
    }
    mysqli_close($conn);

?>