<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Employee Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/addEmpolyee.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/all.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/calendar.css">
    <link rel="stylesheet" type="text/css" href="/css/stylesheet.css?v=1" />
</head>

<body>
<nav>
        <div class="container">
            <div class="header">
                <div class="tabs">
                    <div class="tab">
                        <i class="fa-solid fa-square-phone-flip"></i>
                        <a href="phoneDirectoryForAdmin.php">Phone Directory</a>
                    </div>
                    <div class="tab">
                        <i class="fa-solid fa-sitemap"></i>
                        <a href="attendance_forAdmin.php">Attendance</a>
                    </div>
                    <div class="tab">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <a href="idForUpdate.html">Ubdate Employee </a>
                    </div>
                    <div class="tab">
                        <i class="fa-solid fa-user-plus"></i>
                        <a href="addEmpolyee.php">Add Employee</a>
                    </div>
                    <div class="tab">
                        <i class="fa-solid fa-trash"></i>
                        <a href="deleteEmployee.php">Delete Employee</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="registration-form">
        <form method="post" action="">
            <div class="form-icon">
                <img src="../assets/imgs/update.png" alt="" class="profile-icon">
            </div>
            <?php
            if (isset($_POST['go'])) {
                $emp_id = $_POST['id'];
                $conn = mysqli_connect("localhost", "root", "", "attendance");
                $query = "SELECT * FROM employee_data WHERE id='" . $emp_id . "';";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) == 0) {
                    echo "<script>alert('Employee Not Found');</script>";
                    header("Location: idForUpdate.html");
                }
                while ($row = mysqli_fetch_array($result)) {
                    $first_name = $row['first_Name'];
                    $last_name = $row['last_Name'];
                    $department = $row['department'];
                    $position = $row['position'];
                    $phone_number = $row['phone_Number'];
                    $email = $row['email'];
                    $address = $row['address'];
                    $age = $row['age'];
                    $image_path = $row['image_path'];
                    echo "<div class='form-group'>
                    <label>ID</label>
                <input type='text' class='form-control item' id='id' name='id' value='$emp_id'>
            </div>";
                    echo "<div class='form-group'>
                    <label>First Name</label>
                <input type='text' class='form-control item' id='firstName' name='firstName' value='$first_name'>
            </div>";
                    echo " <div class='form-group'>
                    <label>Last Name</label>
                <input type='text' class='form-control item' id='lastName' name='lastName' value='$last_name' >
            </div>";
                    echo "  <div class='form-group'>
                    <label>Email</label>
                <input type='text' class='form-control item' id='email' name='email'value = '$email'>
            </div>";
                    echo " <div class='form-group'>
                    <label >Phone Number</label>
                <input type='text' class='form-control item' id='phoneNumber' name='phonenumber' value ='$phone_number'>
            </div>";
                    echo "  <div class='form-group'>
                    <label>Age</label>
                <input type='text' class='form-control item' id='age' name='age' value='$age '>
            </div>";
                    echo " <div class='form-group'>
                    <label>Address</label>
                <input type='text' class='form-control item' id='address' name='address' value='$address'>
            </div>";
                    echo " <div class='form-group'>
                    <label>Department</label>
                <input type='text' class='form-control item' id='department' name='department' value='$department'>
            </div>";
                    echo "  <div class='form-group'>
                    <label>Position</label>
                <input type='text' class='form-control item' id='position' name='position' value='$position'>
            </div>";
                    echo " <div class='form-group'>
                    <label>Image Path</label>
                <input type='text' class='form-control item' id='image_path' name='image_path' value='$image_path'>
            </div>";
                }
                $query1 = "SELECT * FROM employee_duration WHERE id='" . $emp_id . "';";
                $result1 = mysqli_query($conn, $query1);
                while ($row = mysqli_fetch_array($result1)) {
                    $total_hours = $row['total_hours'];
                    echo " <div class='form-group'>
                    <label>Total Hours</label>
                <input type='text' class='form-control item' id='total_hours' name='total_hours' value='$total_hours'>
            </div>";
                }
                echo "<div class='form-group'>
                <button type='submit' class='btn btn-block  addEmployee' onclick='Funct()' name='Update'>Update</button>
            </div>";
                echo "</form>";
            }
            ?>
            <?php
            if (isset($_POST['Update'])) {
                $conn = mysqli_connect("localhost", "root", "", "attendance");

                if (!$conn) {
                    echo mysqli_error();
                } else {
                    $user_id = mysqli_escape_string($conn, $_POST['id']);
                    $first_name = mysqli_escape_string($conn, $_POST['firstName']);
                    $last_name = mysqli_escape_string($conn, $_POST['lastName']);
                    $department = mysqli_escape_string($conn, $_POST['department']);
                    $position = mysqli_escape_string($conn, $_POST['position']);
                    $phone_number = mysqli_escape_string($conn, $_POST['phonenumber']);
                    $email = mysqli_escape_string($conn, $_POST['email']);
                    $address = mysqli_escape_string($conn, $_POST['address']);
                    $age = mysqli_escape_string($conn, $_POST['age']);
                    $image_path = $_POST['image_path'];
                    $total_hours = mysqli_escape_string($conn, $_POST['total_hours']);
                    $query = "UPDATE employee_data SET first_name='" . $first_name . "', last_name ='" . $last_name . "', department='" . $department . "', position='" . $position . "', phone_number='" . $phone_number . "', email ='" . $email . "', address='" . $address . "', age='" . $age . "',image_path='" . $image_path . "' WHERE id='" . $user_id . "';";
                    $new_query = "UPDATE employee_attend SET total_hours='" . $total_hours . "' WHERE id='" . $user_id . "';";
                    mysqli_query($conn, $query);
                    if (mysqli_query($conn, $new_query)) {
                        echo "<script>alert('Employee Updated Successfully');</script>";
                    } else {
                        echo "<script>alert('Employee Update Failed');</script>";

                        
                    }
                }
                mysqli_close($conn);
            }
            ?>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../assets/js/calendar.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/all.js"></script></body>

</html>