<?php

//Global function to include majorMinor class in another file.
//include_once("classes/majorMinorClass.php");

Class MajorMinor{
    public $major;
    public $minor;
    public $interdisciplinary_major;
    public $interdisciplinary_minor;

    /**===========================================================================================================================================================================
     * Method to print all majors from database table 'majors'
     */
    public function print_Majors(){
        include("includes/connect.php");
        $sql = "SELECT * FROM majors_minors";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            if ($row['majors'] != NULL){
            echo $row['majors'];
            echo "<br>";
            }
        }
    }

    /**===========================================================================================================================================================================
     * Method to print all minors from database table 'minors'
     */
    public function print_Minors(){
        include("includes/connect.php");
        $sql = "SELECT * FROM majors_minors";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            if($row['minors'] != NULL){
            echo $row['minors'];
            echo "<br>";
            }
        }
    }

    /**===========================================================================================================================================================================
     * Method to print all interdisciplinary majors from database table 'interdisciplinary_majors'
     */
    public function print_Interdisciplinary_Majors(){
        include("includes/connect.php");
        $sql = "SELECT * FROM majors_minors";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            if($row['interdisciplinary_majors'] != NULL){
            echo $row['interdisciplinary_majors'];
            echo "<br>";
            }
        }
    }
    

    /**===========================================================================================================================================================================
     * Method to print all interdisciplinary minors from database table 'interdisciplinary_minors'
     */
    public function print_Interdisciplinary_Minors(){
        include("includes/connect.php");
        $sql = "SELECT * FROM majors_minors";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            if($row['interdisciplinary_minors'] != NULL){
            echo $row['interdisciplinary_minors'];
            echo "<br>";
            }
        }

    }
}

?>