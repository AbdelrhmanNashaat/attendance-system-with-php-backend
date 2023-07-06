<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Attendance</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/all.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/calendar.css">
</head>

<body>
    <nav>
    <nav>
        <div class="container">
            <div class="header">
                <div class="tabs">
                    <div class="tab">
                        <i class="fa-solid fa-square-phone-flip"></i>
                        <a href="phoneDirectory.php">Phone Directory</a>
                    </div>
                    <div class="tab">
                        <i class="fa-solid fa-sitemap"></i>
                        <a href="attendance.php">Attendance</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="attendance">
        <div class="time-table">
            <div class="time">
                <form method="post">
                    <label for="from">From</label>
                    <input type="text" name="from">
                    <label for="to">To</label>
                    <input type="text" name="to">
                    <input type="submit" class="button-1 value =" Show Attendance" name="search">
                </form>
                <button class="button-1" onclick="window.location.href='login.php'">Log Out</button>
            </div>
            <?php
            if (isset($_POST['search'])) {
                $from = $_POST['from'];
                $to = $_POST['to'];
                $conn = mysqli_connect("localhost", "root", "", "attendance");
                $query = "SELECT * FROM employee_attend WHERE date BETWEEN '$from' AND '$to' ORDER BY date ASC;";
                $result = mysqli_query($conn, $query);
                echo '<table>';
                echo '<tr class="head">';
                echo '<td>Day</td>';
                echo '<td>Date</td>';
                echo '<td>Time In</td>';
                echo '<td>Time Out</td>';
                echo '</tr>';
                while ($row1 = mysqli_fetch_array($result)) {
                    $emp_id = $row1['id'];
                    $date = $row1['date'];
                    $time_in = $row1['time_in'];
                    $time_out = $row1['time_out'];
                    $day = $row1['day'];
                    echo "<tr>";
                    echo "<td>$day</td>";
                    echo "<td>$date</td>";
                    echo "<td>$time_in</td>";
                    echo "<td>$time_out</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
            ?>
            <?php
            if (isset($_POST['time_in'])) {
                $emp_id  = $_POST['id'];
                function getDatee()
                {
                    $date = date('m/d/Y', time());
                    return $date;
                }
                function getTimeeIn()
                {
                    date_default_timezone_set("africa/cairo");
                    $Time = date('h:i:s a', time());
                    return $Time;
                }

                function getDayy()
                {
                    $day = date('l', time());
                    return $day;
                }
                $time_in = getTimeeIn();
                $date = getDatee();
                $day = getDayy();
                $conn = mysqli_connect("localhost", "root", "", "attendance");
                $query1 = "INSERT INTO employee_attend (id,date,day,time_in,time_out) VALUES ('$emp_id', '$date', '$day', '$time_in','00:00:00');";
                if (mysqli_multi_query($conn, $query1)) {
                }
                $query = "SELECT * FROM employee_attend WHERE id = '$emp_id'";
                $result = mysqli_query($conn, $query);
                echo '<table>';
                echo '<tr class="head">';
                echo '<td>Day</td>';
                echo '<td>Date</td>';
                echo '<td>Time In</td>';
                echo '<td>Time Out</td>';
                echo '</tr>';
                while ($row1 = mysqli_fetch_array($result)) {
                    $emp_id = $row1['id'];
                    $date = $row1['date'];
                    $time_in = $row1['time_in'];
                    $time_out = $row1['time_out'];
                    $day = $row1['day'];
                    echo "<tr>";
                    echo "<td>$day</td>";
                    echo "<td>$date</td>";
                    echo "<td>$time_in</td>";
                    echo "<td>$time_out</td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_close($conn);
            }
            if (isset($_POST['time_out'])) {
                $emp_id  = $_POST['id'];
                function getTimeeOut()
                {
                    date_default_timezone_set("africa/cairo");
                    $Time = date('h:i:s a', time());
                    return $Time;
                }
                function getDatee()
                {
                    $date = date('m/d/Y', time());
                    return $date;
                }
                $time_out = getTimeeOut();
                $date = getDatee();
                $conn = mysqli_connect("localhost", "root", "", "attendance");
                $query2 = "UPDATE employee_attend SET time_out = '$time_out' WHERE id = '$emp_id' AND date = '$date';";
                if (mysqli_multi_query($conn, $query2)) {
                }
                $query = "SELECT * FROM employee_attend WHERE id = '" . $emp_id . "';";
                $result = mysqli_query($conn, $query);
                $time_in;
                $time_out;
                $emp_id;
                echo '<table>';
                echo '<tr class="head">';
                echo '<td>Day</td>';
                echo '<td>Date</td>';
                echo '<td>Time In</td>';
                echo '<td>Time Out</td>';
                echo '</tr>';
                while ($row1 = mysqli_fetch_array($result)) {
                    $emp_id = $row1['id'];
                    $date = $row1['date'];
                    $time_in = $row1['time_in'];
                    $time_out = $row1['time_out'];
                    $day = $row1['day'];
                    echo "<tr>";
                    echo "<td>$day</td>";
                    echo "<td>$date</td>";
                    echo "<td>$time_in</td>";
                    echo "<td>$time_out</td>";
                    echo "</tr>";
                }
                echo "</table>";
                $hours = substr($time_out, 0, 2);
                $minutes = substr($time_out, 3, 2);
                $seconds = substr($time_out, 6, 2);
                $hoursInt = intval($hours);
                $minutesInt = intval($minutes);
                $secondsInt = intval($seconds);
                $hours1 = substr($time_in, 0, 2);
                $minutes1 = substr($time_in, 3, 2);
                $seconds1 = substr($time_in, 6, 2);
                $hoursInt1 = intval($hours1);
                $minutesInt1 = intval($minutes1);
                $secondsInt1 = intval($seconds1);
                $hoursInt2 = $hoursInt - $hoursInt1;
                if (strlen($hoursInt2) < 2) {
                    $pad_string = "0";
                    $hoursInt2 = str_pad($hoursInt2, 2, $pad_string, STR_PAD_LEFT);
                } else {
                    $hoursInt2 = $hoursInt2;
                }
                $minutesInt2;
                if ($minutesInt > $minutesInt1) {
                    $minutesInt2 = $minutesInt - $minutesInt1;
                } else {
                    $minutesInt2 = $minutesInt1 - $minutesInt;
                }
                if (strlen($minutesInt2) < 2) {
                    $pad_string = "0";
                    $minutesInt2 = str_pad($minutesInt2, 2, $pad_string, STR_PAD_LEFT);
                } else {
                    $minutesInt2 = $minutesInt2;
                }
                $secondsInt2;
                if ($secondsInt > $secondsInt1) {
                    $secondsInt2 = $secondsInt - $secondsInt1;
                } else {
                    $secondsInt2 = $secondsInt1 - $secondsInt;
                }

                if (strlen($secondsInt2) < 2) {
                    $pad_string = "0";
                    $secondsInt2 = str_pad($secondsInt2, 2, $pad_string, STR_PAD_LEFT);
                } else {
                    $secondsInt2 = $secondsInt2;
                }
                $total;
                $attendancePercentage;
                $total_hours;
                $query4 = "SELECT hours_worked , attendance_percentage , total_hours FROM employee_duration WHERE id = '" . $emp_id . "';";
                $result4 = mysqli_query($conn, $query4);
                while ($row4 = mysqli_fetch_array($result4)) {
                    $total = $row4['hours_worked'];
                    $total_hours = $row4['total_hours'];
                }
                $total_hours = intval($total_hours);
                $hours2;
                $minutes2;
                $seconds3;
                $hours2 = substr($total, 0, 2);
                $minutes2 = substr($total, 3, 2);
                $seconds3 = substr($total, 6, 2);
                $hoursInt3 = intval($hours2);
                $minutesInt3 = intval($minutes2);
                $secondsInt3 = intval($seconds3);
                $hoursInt4 = $hoursInt3 + $hoursInt2;
                $minutesInt4 = $minutesInt3 + $minutesInt2;
                $secondsInt4 = $secondsInt3 + $secondsInt2;
                $worked_hours = "$hoursInt4:$minutesInt4:$secondsInt4";
                $minutesParse = ($minutesInt4 / 60);
                $secondsParse = ($secondsInt4 / 3600);
                $Percentage = (round((($hoursInt4 + $minutesParse + $secondsParse) / $total_hours) * 100, 2));
                echo $Percentage;
                $hours_worked = "$hoursInt4:$minutesInt4:$secondsInt4";
                $query3 = "UPDATE employee_duration SET hours_worked = '" . $hours_worked . "' , attendance_percentage = '" . $Percentage . "' WHERE id = '" . $emp_id . "';";
                mysqli_multi_query($conn, $query3);
                mysqli_close($conn);
            }
            ?>
        </div>
        <d66iv class="calendar">
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
                                        <p> 12:00 AM </p>
                                    </div>
                                    <div class="col-3">
                                        <i class="fa fa-user" aria-hidden="true"></i>
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


            <?php
            if (isset($_POST['time_in']) || isset($_POST['time_out'])) {
                $conn = mysqli_connect("localhost", "root", "", "attendance");
                $query = "SELECT total_hours , hours_worked , attendance_percentage FROM employee_duration WHERE id = '" . $emp_id . "';";
                $result = mysqli_query($conn, $query);
                $total;
                $total_hours;
                $Percentage;
                while ($row = mysqli_fetch_array($result)) {
                    $total = $row['hours_worked'];
                    $total_hours = $row['total_hours'];
                    $Percentage = $row['attendance_percentage'];
                }
                echo "  <div class='total'>
                <button class='button-1'>View Attendance</button>
                <div class='percentage'>";
                echo "<div class='block'>";
                echo "<div class='box'>
                            <p class='number'>
                            <br>
                                <span class='num'>$total</span>
                                <br>
                                <span class='sub'>Hour</span>
                            </p>
                            <p class='title'>Worked Hours</p>
                        </div>
                        <span class='dots'></span>
                        <svg class='svg'>
                            <defs>
                                <linearGradient id='gradientStyle'>
                                    <stop offset='0%' stop-color='#565656' />
                                    <stop offset='100%' stop-color='#b7b5b5' />
                                </linearGradient>
                            </defs>
                            <circle class='circle' cx='90' cy='90' r='80'/>
                        </svg>
                    </div>";
                echo "<div class='block'>
                        <div class='box'>
                            <p class='number'>
                                <span class='num'>$total_hours</span>
                                <span class='sub'>Hour</span>
                            </p>
                            <p class='title'>Total Hours</p>
                        </div>
                        <span class='dots'></span>
                        <svg class='svg'>
                            <circle class='circle' cx='90' cy='90' r='80' />
                        </svg>
                    </div>";
                echo " <div class='block'>
                        <div class='box'>
                            <p class='number'>
                                <span class='num'>$Percentage</span>
                                <span class='sub'>%</span>
                            </p>
                            <p class='title'>percentage</p>
                        </div>
                        <span class='dots'></span>
                        <svg class='svg'>
                            <circle class='circle' cx='90' cy='90' r='80' />
                        </svg>
                    </div>";
                echo "  </div>
                <button class='button-1'>Leaves/Permissions</button>
            </div>";
            }
            ?>
    </div>
    </div>
    <script src="../assets/js/calendar.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/all.js"></script>
</body>

</html>