<?php

//Global function to include courses class in another file.
//include_once("classes/coursesClass.php");

Class Courses{
    private $CLID;
    public $crn;
    public $course;
    public $sec;
    public $title;
    public $instructional_method;
    public $credits;
    public $dates;
    public $days;
    public $time;
    public $loc;
    public $instructor;
    public $attributes;
    public $available_seats;

    /**===========================================================================================================================================================================
     * Method to print all courses from database table 'courses'
     */
    public function get_Courses(){
        include("includes/connect.php");
        $sql = "SELECT * FROM courses";
        $result = mysqli_query($conn, $sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='course-card'>";
                echo "<h3> Course: ".$row['course']."</h3>";
                echo "<p> Title: ".$row['title']."</p>";
                echo "<p> Instructor:".$row['instructor']."</p>";
                echo "<p> Days: ".$row['days']."</p>";
                echo "<p> Time: ".$row['time']."</p>";
                echo "<p> Location: ".$row['loc']."</p>";
                echo "<p> Attributes: ".$row['attributes']."</p>";
                echo "<p> Available Seats: ".$row['available_seats']."</p>";
                echo "<br>";
                echo "</div>";
            }
        }
        else{
            header("Location: ../administration/adminHome.php?error=No courses found");
            exit();
        }
    }

    /**===========================================================================================================================================================================
     * Method to insert a course into the database table 'courses'
     */
    public function insert_Course($header, $crn, $course, $sec, $title, $instructional_method, $credits, $dates, $days, $time, $loc, $instructor, $attributes, $available_seats){
        include("includes/connect.php");
        $sql = "INSERT INTO courses (header, crn, course, sec, title, instructional_method, credits, dates, days, time, loc, instructor, attributes, available_seats) VALUES ('$header', '$crn', '$course', '$sec', '$title', '$instructional_method', '$credits', '$dates', '$days', '$time', '$loc', '$instructor', '$attributes', '$available_seats')";
        $result = mysqli_query($conn, $sql);
    }   

    /**===========================================================================================================================================================================
     * Method to update a course into the database table 'courses'
     */
    public function update_Course($header, $crn, $course, $sec, $title, $instructional_method, $credits, $dates, $days, $time, $loc, $instructor, $attributes, $available_seats){
        include("includes/connect.php");
        $sql = "UPDATE courses SET header='$header', crn='$crn', course='$course', sec='$sec', title='$title', instructional_method='$instructional_method', credits='$credits', dates='$dates', days='$days', time='$time', loc='$loc', instructor='$instructor', attributes='$attributes', available_seats='$available_seats' WHERE CLID='$CLID'";
        $result = mysqli_query($conn, $sql);
    }

    /**===========================================================================================================================================================================
     * Method to delete a course into the database table 'courses'
     */
    public function delete_Course($CLID){
        include("includes/connect.php");
        $sql = "DELETE FROM courses WHERE CLID='$CLID'";
        $result = mysqli_query($conn, $sql);
    }

    /**===========================================================================================================================================================================
     * Method to view a course in database table 'courses' using CLID
     */
    public function view_Course($CLID){
        include("includes/connect.php");
        $sql = "SELECT * FROM courses WHERE CLID='$CLID'";
        $result = mysqli_query($conn, $sql);
    }

    /**===========================================================================================================================================================================
     * Method to view all courses in database table 'courses'
     */
    public function view_All_Courses(){
        include("includes/connect.php");
        $sql = "SELECT * FROM courses";
        $result = mysqli_query($conn, $sql);
    }

    /**===========================================================================================================================================================================
     * Method to view a course in database table 'courses' using CRN
     */
    public function view_Course_By_CRN($crn){
        include("includes/connect.php");
        $sql = "SELECT * FROM courses WHERE crn='$crn'";
        $result = mysqli_query($conn, $sql);
    }

    /**===========================================================================================================================================================================
     * Method to view a course in database table 'courses' using Course
     */
    public function view_Course_By_Course($course){
        include("includes/connect.php");
        $sql = "SELECT * FROM courses WHERE course='$course'";
        $result = mysqli_query($conn, $sql);
    }

    /**===========================================================================================================================================================================
     * Method to view a course in database table 'courses' using Section
     */
    public function view_Course_By_Sec($sec){
        include("includes/connect.php");
        $sql = "SELECT * FROM courses WHERE sec='$sec'";
        $result = mysqli_query($conn, $sql);
    }

    /**===========================================================================================================================================================================
     * Method to view a course in database table 'courses' using Instructor
     */
    public function view_Course_By_Instructor($instructor){
        include("includes/connect.php");
        $sql = "SELECT * FROM courses WHERE instructor='$instructor'";
        $result = mysqli_query($conn, $sql);
    }

    /**===========================================================================================================================================================================
     * Method to view a course in database table 'courses' using Attributes
     */
    public function view_Course_By_Attributes($attributes){
        include("includes/connect.php");
        $sql = "SELECT * FROM courses WHERE attributes='$attributes'";
        $result = mysqli_query($conn, $sql);
    }

    /**===========================================================================================================================================================================
     * Method to print a list of courses in database table 'courses' as a table format
     */
    public function print_As_Table(){
        include("includes/connect.php");
        $sql = "SELECT * FROM courses";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<table>";
            echo "<tr>";
            echo "<th>Header</th>";
            echo "<th>CRN</th>";
            echo "<th>Course</th>";
            echo "<th>Section</th>";
            echo "<th>Title</th>";
            echo "<th>Instructional Method</th>";
            echo "<th>Credits</th>";
            echo "<th>Dates</th>";
            echo "<th>Days</th>";
            echo "<th>Time</th>";
            echo "<th>Location</th>";
            echo "<th>Instructor</th>";
            echo "<th>Attributes</th>";
            echo "<th>Available Seats</th>";
            echo "</tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['header']."</td>";
                echo "<td>".$row['crn']."</td>";
                echo "<td>".$row['course']."</td>";
                echo "<td>".$row['sec']."</td>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['instructional_method']."</td>";
                echo "<td>".$row['credits']."</td>";
                echo "<td>".$row['dates']."</td>";
                echo "<td>".$row['days']."</td>";
                echo "<td>".$row['time']."</td>";
                echo "<td>".$row['loc']."</td>";
                echo "<td>".$row['instructor']."</td>";
                echo "<td>".$row['attributes']."</td>";
                echo "<td>".$row['available_seats']."</td>";
        }
    }
}
}

?>