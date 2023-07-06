<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <div class="main">
        <div class="list">
            <div class="navbar">
                <div class="search">
                    <input type="text" placeholder="Who are you looking for...">
                    <i class="fa-solid fa-magnifying-glass fa-beat"></i>
                </div>
                <div class="buttons">
                    <div class="button">
                    <input type="submit" class="button-1" value ="Search by Name" name="search">
                    <input type="submit" class="button-1" value ="Search by Email" name="search">
                    <input type="submit" class="button-1" value ="Search by Phone" name="search">
                        <!-- <button class="button-1">Phone Features</button>
                        <button class="button-1">Services Extentsions</button>
                        <button class="button-1">BA Telephone Guides</button> -->
                    </div>
                </div>
            </div>
            <div class="filter-nav-bar">
                <button class="button-2">See All</button>
                <button class="button-2">A</button>
                <button class="button-2">B</button>
                <button class="button-2">C</button>
                <button class="button-2">D</button>
                <button class="button-2">E</button>
                <button class="button-2">F</button>
                <button class="button-2">G</button>
                <button class="button-2">H</button>
                <button class="button-2">I</button>
                <button class="button-2">J</button>
                <button class="button-2">K</button>
                <button class="button-2">L</button>
                <button class="button-2">M</button>
                <button class="button-2">N</button>
                <button class="button-2">P</button>
                <button class="button-2">Q</button>
                <button class="button-2">R</button>
                <button class="button-2">S</button>
                <button class="button-2">T</button>
                <button class="button-2">U</button>
                <button class="button-2">V</button>
                <button class="button-2">W</button>
                <button class="button-2">X</button>
                <button class="button-2">Y</button>
                <button class="button-2">Z</button>
            </div>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "attendance");
            $sql = "SELECT * FROM employee_data ORDER BY id ASC";
            $result = mysqli_query($conn, $sql);
            echo "<div class='cards'>";
            while ($row = mysqli_fetch_assoc($result)) {
                $img = $row['image_path'];
                echo "<div class='card-container'>";
                echo "<img class='hero-image' src='../Images/$img'>";
                echo "<br>";
                echo "<main class='main-content'>";
                echo "<p> <span>Name</span> : " . $row['first_Name'] . " " . $row['last_Name'] . "</p>";
                echo "<p> <span>Department</span> : " . $row['department'] . "</p>";
                echo "<p> <span>E-mail</span> : " . $row['email'] . "</p>";
                echo "<p> <span>Phone Number</span> : " . $row['phone_Number'] . "</p>";
                echo "<p> <span>Age</span> : " . $row['age'] . "</p>";
                echo "<p> <span>Position</span> : " . $row['position'] . "</p>";
                $query = "SELECT * FROM employee_duration WHERE id = " . $row['id'];
                $result2 = mysqli_query($conn, $query);
                while($row2 = mysqli_fetch_assoc($result2)){
                    echo "<p> <span>Hours Per Week</span> : " . $row2['total_hours'] . "</p>";
                    echo "<p> <span>Attendance Percentage</span> : " . $row2['attendance_percentage'] . " %". "</p>";
                }
                echo "</main>";
                echo "</div>";
            }
            echo "</div>";
            echo "</div>";
            ?>
            <div class="filter">
                <h1>Filter</h1>
                <button class="button-1">Clear</button>
                <div class="filter-buttons">
                    <h3>Offline location</h3>
                    <button class="button-2">Acc</button>
                    <button class="button-2">Annex</button>
                    <button class="button-2">B1</button>
                    <button class="button-2">B1-مركز المؤتمرات</button>
                    <button class="button-2">B2</button>
                    <button class="button-2">Show more</button>
                    <h3>Sector</h3>
                    <button class="button-2">Academic Research</button>
                    <button class="button-2">Cultural Outreach</button>
                    <button class="button-2">Director's Ofiice</button>
                    <button class="button-2">Engineering</button>
                    <button class="button-2">Show more</button>
                    <h3>Department</h3>
                    <button class="button-2">Test</button>
                    <button class="button-2">Test</button>
                    <button class="button-2">Test</button>
                </div>
            </div>
        </div>

        <script src="../assets/js/calendar.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/all.js"></script>
</body>

</html>