


<html>
<head>
    <title>Test Printing of Classes</title>

    </head>

    <body>

    <div class = "input-class-info">
        <h1>Insert Class Information</h1>
        <form action="" method="post">
            <input type="text" name="header" placeholder="Header" required>
            <input type="text" name="crn" placeholder="CRN" required>
            <input type="text" name="course" placeholder="Course" required>
            <input type="text" name="sec" placeholder="Section" required>
            <input type="text" name="title" placeholder="Title" required>
            <input type="text" name="instructional_method" placeholder="Instructional Method" required>
            <input type="number" name="credits" placeholder="Credits" required>
            <input type="text" name="dates" placeholder="Dates" required>
            <input type="text" name="days" placeholder="Days" required>
            <input type="text" name="time" placeholder="Time" required>
            <input type="text" name="loc" placeholder="Location" required>
            <input type="text" name="instructor" placeholder="Instructor" required>
            <input type="text" name="attributes" placeholder="Attributes" required>
            <input type="text" name="available_seats" placeholder="Available Seats" required>
            <button type="submit" name="submit">Submit</button>
        </form>

    </div>


    <div class = "printing-classes">
        <h1>Test Printing of Classes</h1>
        <?php
            include("classes/coursesClass.php");
            $courses = new Courses();
            $result = $courses->print_As_Table();
            echo $result;
        ?>
    </div>

    </body>
</html>


<?php
if (isset($_POST['submit'])){
    $header = $_POST['header'];
    $crn = $_POST['crn'];
    $course = $_POST['course'];
    $sec = $_POST['sec'];
    $title = $_POST['title'];
    $instructional_method = $_POST['instructional_method'];
    $credits = $_POST['credits'];
    $dates = $_POST['dates'];
    $days = $_POST['days'];
    $time = $_POST['time'];
    $loc = $_POST['loc'];
    $instructor = $_POST['instructor'];
    $attributes = $_POST['attributes'];
    $available_seats = $_POST['available_seats'];

    $courses->insert_Course($header, $crn, $course, $sec, $title, $instructional_method, $credits, $dates, $days, $time, $loc, $instructor, $attributes, $available_seats);


}
?>
