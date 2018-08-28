<?php

if (array_key_exists('t1', $_REQUEST)) { // checking the request array is empty or not
    $x = $_REQUEST['t1']; // copying value into variable x sent from script
    $con = mysql_connect('localhost', 'root') //connecting mysql with php script
            OR die("Connection Error-- " . mysql_error());
    $db = mysql_select_db('college', $con) // connection to database
            OR die("Database Error-- " . mysql_error());
    $query = "select course_name from course_student where student_id='$x'";
    $result = mysql_query($query) // execute sql query
            OR die("Can not run sql query");
    if ($row = mysql_fetch_array($result)) { // fetch result in $row and check condition is empty or not
        echo "The Courses taking by Student ID=" . $x;
        echo "<BR>" . $row[0]; // show value get from database table
    } else
        echo "Student ID not Found";
    mysql_close(); // closing database connection
}
?>