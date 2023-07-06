<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete Employee Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/all.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/calendar.css">
    <link rel="stylesheet" type="text/css" href="/css/stylesheet.css?v=1" /><style>

        body {
            background-color: #dee9ff;
        }

        .registration-form {
            padding: 50px 0;
        }

        .registration-form form {
            background-color: #fff;
            max-width: 600px;
            margin: auto;
            padding: 50px 70px;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
        }

        .registration-form .form-icon {
            display: flex;
        align-items: center;
        justify-content: center;
            text-align: center;
            background-color: #21273D;
            border-radius: 50%;
            font-size: 40px;
            color: white;
            width: 100px;
            height: 100px;
            margin: auto;
            margin-bottom: 50px;
            line-height: 100px;
        }


        .registration-form .delete-icon {
            max-width: 70%;
            height: 70%;
            margin-top: 5%;
            margin-left: 10%;
        }

        .registration-form .DeleteEmployee {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            background-color: #21273D;
            border: none;
            color: white;
            margin-top: 20px;
        }

        .registration-form .form-lable {
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            color: #21273D;
            margin-top: 20px;
        }

        .registration-form .item {
            border-radius: 20px;
            margin-bottom: 25px;
            padding: 10px 20px;
        }

        .registration-form .continue {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            background-color: #6A759B;
            border: none;
            color: white;
            margin-top: 20px;
        }

        .registration-form .adminLogin {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            background-color: #21273D;
            border: none;
            color: white;
            margin-top: 20px;
        }

        #back {
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            background-color: #21273D;
            border: none;
            color: white;
            margin-top: 20px;
        }

        .registration-form .previous-icon {
            max-width: 25px;
            height: 25px;
        }

        @media (max-width: 576px) {
            .registration-form form {
                padding: 50px 20px;
            }

            .registration-form .form-icon {
                width: 70px;
                height: 70px;
                font-size: 30px;
                line-height: 70px;
            }

        }
    </style>
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
    <form action="" method="post">
            <div class="form-icon">
                <img src="../assets/imgs/delete.png" alt="" class="delete-icon">
            </div>
            <div class="form-group">
                <label for="">ID</label>
                <input type="text" class="form-control item" id="id" name="id" placeholder="ID">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block  DeleteEmployee">Delete Employee</button>
            </div>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $conn = mysqli_connect("localhost", "root", "", "attendance");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
                echo '<br>';
            } else {
                $id_from_input = mysqli_escape_string($conn, $_POST['id']);
                echo $id_from_input;
                $query = "SELECT * FROM employee_data WHERE id = '".$id_from_input."';";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) == 0) {
                    echo "<script>alert('Employee Not Found');</script>";
                } else{
                    $row = mysqli_fetch_assoc($result);
                    $query1 = "DELETE FROM employee_data WHERE id = '".$id_from_input."';";
                    $query2 = "DELETE FROM employee_attend WHERE id = '".$id_from_input."';";
                    $query3 = "DELETE FROM employee_duartion WHERE id = '".$id_from_input."';";
                    if((mysqli_query($conn, $query1))&& (mysqli_query($conn, $query2))&& (mysqli_query($conn, $query3))){
                        echo "<script>alert('Employee Deleted Successfully');</script>";    
                    }
                }
            }
        }
        ?>
    </div>


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/calendar.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/all.js"></script>
</body>

</html>