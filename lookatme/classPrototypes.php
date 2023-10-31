<?php
class User
{ //here we go!
    public $name;
    public $UUID;
    public $classes = array();

}
abstract class Course
{
    private int $uuid = 0;
    private int $credits = 3;
    /*
    incoming nasty code
    was considering making time class, but this works well enough as is
    */
    private int $startHour = 0;
    private int $endHour = 0;
    private int $startMinute = 0;
    private int $endMinute = 0;
    static public $classcount = 0;
    //end of gross code
    public function getStartTime(): string
    {
        return $this->startHour . ":" . $this->startMinute;
    }
    public function getEndTime(): string
    {
        return $this->endHour . ":" . $this->endMinute;
    }
    abstract public function isInCourse($user): bool; // §todo
    public function getCredits(): int
    {
        return self::$credits;
    } // ok so this one is kinda important for calculating credits. so be careful!
    public function __construct()
    {
        $uuid = self::$classcount++; // do not touch. inheritance does what it does best here
    } // alright so please reference all courses through their UUID and the name should be !!!PURELY DECORATIVE!!! use the uuid to reference a class.
}
class Professor
{

}
class Student extends User{
public function getCredits(): int {
    $totalCredits = 0;
    foreach ($this->classes as $class) {
        $totalCredits += $class->getCredits();
    }
    return $totalCredits; }
public function isInCourse($course): bool
{
    foreach ($this->classes as $class) {
        if ($class->UUID === $course->UUID) {
            return true; // The user is enrolled in the specified course
        }
    }
    return false; // The user is not enrolled in the specified course
}
//i am not sure if i did this right but it looks okay
}
class AuthKey
{

}
?>