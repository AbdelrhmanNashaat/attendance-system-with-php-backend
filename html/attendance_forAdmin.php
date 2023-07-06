<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
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
    <div class="attendance">
        <div class="time-table">
            <div class="time">
            <div class="att-search">
                    <form method="post">
                        <input type="text" name="from" value="From">
                        <input type="text" name="to" value="To">
                        <input type="submit" class="button-1" value ="Show Attendance" name="search">
                    </form>
                </div>

                <div class="att-search">
                    <form method="post">
                        <input type="text" name="name" value="Search by Name Or Id">
                        <input type="submit" class="button-1" value =" Show Attendance" name="search2">
                    </form>
                </div>
            </div>
            <?php
            if(isset($_POST['search2'])){
            $value= $_POST['name'];
            $conn = mysqli_connect("localhost", "root", "", "attendance");
            $query = "SELECT * FROM employee_data WHERE id ='".$value."' OR first_Name LIKE'%".$value."%';"; 
            $result = mysqli_query($conn, $query);
            echo '<table>';
            echo '<tr class="head">';
            echo '<td>ID</td>';
            echo '<td>Name</td>';
            echo '<td>Day</td>';
            echo '<td>Date</td>';
            echo '<td>Time In</td>';
            echo '<td>Time Out</td>';
            echo '<td>Attendance Percentage</td>';
            echo '</tr>';
            while ($row = mysqli_fetch_array($result)) {
                $emp_id = $row['id'];
                $emp_name = $row['first_Name'];
                $query1 = "SELECT * FROM employee_data WHERE id = '".$value."' Or first_Name LIKE'%".$value."%';";
                $result1 = mysqli_query($conn, $query1);
                while ($row1 = mysqli_fetch_array($result1)) {
                    $query3 = "SELECT * FROM employee_attend WHERE id = '$emp_id'";
                    $result3 = mysqli_query($conn, $query3);
                    while ($row2 = mysqli_fetch_array($result3)) {
                    $date = $row2['date'];
                    $time_in = $row2['time_in'];
                    $time_out = $row2['time_out'];
                    $day = $row2['day'];
                    $query2 = "SELECT * FROM employee_duration WHERE id = '$emp_id'";
                    $result2 = mysqli_query($conn, $query2);
                    while ($row2 = mysqli_fetch_array($result2)) {
                        $attendance_percentage = $row2['attendance_percentage'] . " %";
                        echo "<tr>";
                        echo "<td>$emp_id</td>";
                        echo "<td>$emp_name</td>";
                        echo "<td>$day</td>";
                        echo "<td>$date</td>";
                        echo "<td>$time_in</td>";
                        echo "<td>$time_out</td>";
                        echo "<td>$attendance_percentage</td>";
                        echo "</tr>";
                    }
                }
                }
            }
            }
            echo '</table>';
            ?>
            <?php
            if (isset($_POST['search'])) {
                $from = $_POST['from'];
                $to = $_POST['to'];
                $conn = mysqli_connect("localhost", "root", "", "attendance");
                $query = "SELECT * FROM employee_data ORDER BY id ASC";
                $result = mysqli_query($conn, $query);
                echo '<table>';
                echo '<tr class="head">';
                echo '<td>ID</td>';
                echo '<td>Name</td>';
                echo '<td>Day</td>';
                echo '<td>Date</td>';
                echo '<td>Time In</td>';
                echo '<td>Time Out</td>';
                echo '<td>Attendance Percentage</td>';
                echo '</tr>';
                while ($row = mysqli_fetch_array($result)) {
                    $emp_id = $row['id'];
                    $emp_name = $row['first_Name'];
                    $query1 = "SELECT * FROM employee_attend WHERE id = '$emp_id' AND date BETWEEN '$from' AND '$to' ORDER BY date ASC";
                    $result1 = mysqli_query($conn, $query1);
                    while ($row1 = mysqli_fetch_array($result1)) {
                        $date = $row1['date'];
                        $time_in = $row1['time_in'];
                        $time_out = $row1['time_out'];
                        $day = $row1['day'];
                        $query2 = "SELECT * FROM employee_duration WHERE id = '$emp_id'";
                        $result2 = mysqli_query($conn, $query2);
                        while ($row2 = mysqli_fetch_array($result2)) {
                            $attendance_percentage = $row2['attendance_percentage'] . " %";
                            echo "<tr>";
                            echo "<td>$emp_id</td>";
                            echo "<td>$emp_name</td>";
                            echo "<td>$day</td>";
                            echo "<td>$date</td>";
                            echo "<td>$time_in</td>";
                            echo "<td>$time_out</td>";
                            echo "<td>$attendance_percentage</td>";
                            echo "</tr>";
                        }
                    }
                }
                echo "</table>";
                mysqli_close($conn);
            }
            ?>
            <?php
            if(!isset($_POST['search']) && !isset($_POST['search2'])){
            $emp_id;
            $conn = mysqli_connect("localhost", "root", "", "attendance");
            $query = "SELECT * FROM employee_data ORDER BY id ASC";
            if($result = mysqli_query($conn, $query)){
                echo '<table>';
                echo '<tr class="head">';
                echo '<td>ID</td>';
                echo '<td>Name</td>';
                echo '<td>Day</td>';
                echo '<td>Date</td>';
                echo '<td>Time In</td>';
                echo '<td>Time Out</td>';
                echo '<td>Attendance Percentage</td>';
                echo '</tr>';
                while ($row = mysqli_fetch_array($result)) {
                    $emp_id = $row['id'];
                    $emp_name = $row['first_Name'];
                    $query1 = "SELECT * FROM employee_attend WHERE id = '".$emp_id."' ORDER BY date ASC";
                    $result1 = mysqli_query($conn, $query1);
                    while ($row1 = mysqli_fetch_array($result1)) {
                        $date = $row1['date'];
                        $time_in = $row1['time_in'];
                        $time_out = $row1['time_out'];
                        $day = $row1['day'];
                        $query2 = "SELECT * FROM employee_duration WHERE id = '".$emp_id."';";
                        $result2 = mysqli_query($conn, $query2);
                        while ($row2 = mysqli_fetch_array($result2)) {
                            $attendance_percentage = $row2['attendance_percentage'] . " %";
                            echo "<tr>";
                            echo "<td>$emp_id</td>";
                            echo "<td>$emp_name</td>";
                            echo "<td>$day</td>";
                            echo "<td>$date</td>";
                            echo "<td>$time_in</td>";
                            echo "<td>$time_out</td>";
                            echo "<td>$attendance_percentage</td>";
                            echo "</tr>";
                        }
                    }
                }
                echo "</table>";
            }else{
                echo mysqli_error($conn);
            }
            mysqli_close($conn);
            }
            ?>

        </div>
        <div class="calendar">
            <div class="yellow">
                <div id="calendar">
                    <div id="toolbar"></div>
                    <div id="dates" class="show">
                        <div id="lastMt">&lsaquo;</div>
                        <div id="nextMt">&rsaquo;</div>
                        <div id="months-cont">
                            <div id="months">
                                <span class="active month">January</span><span class="month">February</span><span class="month">March</span><span class="month">April</span><span class="month">May</span><span class="month">June</span><span class="month">July</span><span class="month">August</span><span class="month">September</span><span class="month">October</span><span class="month">November</span><span class="month">December</span>
                            </div>
                        </div>
                        <div id="daysotweek">
                            <div class="day">S</div>
                            <div class="day">M</div>
                            <div class="day">T</div>
                            <div class="day">W</div>
                            <div class="day">T</div>
                            <div class="day">F</div>
                            <div class="day">S</div>
                        </div>
                        <div id="days">
                        </div>
                    </div>
                    <div id="info" class="hide">
                        <div id="actual-date"></div>
                        <div id="back">
                        </div>
                        <div id="month-name"></div>
                        <div id="weather">
                            <div id="sun"></div>
                            <div id="mountains"></div>
                            <div id="rain">
                                <div class="raindrop" id="drop-1"></div>
                                <div class="raindrop center" id="drop-2"></div>
                                <div class="raindrop center" id="drop-3"></div>
                                <div class="raindrop" id="drop-4"></div>
                            </div>
                            <div id="temp">57&deg;<span>F</span></div>
                        </div>
                        <div id="bg-card">
                            <div class="content"></div>
                        </div>
                        <div id="card">
                            <div class="content">
                                <div id="event-name"></div>
                                <div id="event-details">
                                    <div class="col-3">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <h3>Location</h3>
                                        <p>12345 Generic Ave., Some City, Some State, 12345
                                    </div>
                                    <div class="col-3">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <h3>Time</h3>
                                        <6666p> 12:00 AM </666666p>
                                    </div>
                                    <div class="col-3">
                                        <i class="fa fa-user" aria-hidden="true">6</i>
                                        <h3>Attendee</h3>
                                        <p>Me, You, and 2+</p>
                                    </div>
                                    <div style="clear: both"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/calendar.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/all.js"></script>
</body>

</html>