<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <form  action="" method="post">
            <div class="form-icon">
                <img src="../assets/imgs/profile.png" alt="" class="profile-icon">
            </div>
            <div class="form-group">
                <label for="">ID</label>
                <input type="text" class="form-control item" id="id" name="id" placeholder="ID" required>
            </div>
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" class="form-control item" id="firstName" name="firstName" placeholder="First Name" required>
            </div>
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" class="form-control item" id="lastName" name="lastName" placeholder="Last Name" required>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control item" id="email" name="email" placeholder="Email" required> 
            </div>
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" class="form-control item" id="phoneNumber" name="phonenumber" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
                <label for="">Age</label>
                <input type="text" class="form-control item" id="age" name="age" placeholder="Age" required>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control item" id="address" name="address" placeholder="Address" required>
            </div>
            <div class="form-group">
                <label for="">Department</label>
                <input type="text" class="form-control item" id="department" name="department" placeholder="Department" required>
            </div>
            <div class="form-group">
                <label for="">Position</label>
                <input type="text" class="form-control item" id="position" name="position" placeholder="Position" required>
            </div>
            <div class="form-group">
                <label for="">Image Path</label>
                <input type="text" class="form-control item" id="image_path" name="image_path" placeholder="Image Path" required>
            </div>
            <div class="form-group">
                <label for="">Total Hours</label>
                <input type="text" class="form-control item" id="total_hours" name="total_hours" placeholder="Total Hours" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block  addEmployee" onclick="Funct()">Add Employee</button>
            </div>
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $conn = mysqli_connect("localhost", "root", "", "attendance");

            if (!$conn) {
                echo mysqli_error();
            } else {
                //takin the data from the user input from the form
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
                // the query (insert)
                $query = "INSERT INTO employee_data SET id='" . $user_id . "', first_name='" . $first_name . "', last_name ='" . $last_name . "', department='" . $department . "', position='" . $position . "', phone_number='" . $phone_number . "', email ='" . $email . "', address='" . $address . "', age='" . $age . "',image_path='" . $image_path . "';";
                mysqli_multi_query($conn, $query);
                $query1 = "INSERT INTO employee_duration (id,total_hours) VALUES ('$user_id','$total_hours');";
                if (mysqli_multi_query($conn, $query1)) {
                    echo "<script>alert('Employee Added Successfully');</script>";
                } else {
                    
                    echo "<script>alert('Error: This person already exist ');</script>";
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