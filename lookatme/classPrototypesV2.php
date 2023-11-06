<?php
abstract class Course
{
    private static $classList = array();
    private static int $courseCount = 0;
    private int $uuid = 0;
    private int $credits = 3;
    private int $startHour = 0;
    private int $startMinute = 0;
    private int $endHour = 0;
    private int $endMinute = 0;
    //end of gross code
    public function getStartTime(): string
    {
        return $this->startHour . ":" . $this->startMinute;
    }
    public function getEndTime(): string
    {
        return $this->endHour . ":" . $this->endMinute;
    }
    public function isInCourse($user)
    {
        return in_array($user, self::$classList);
    } // todo
    public function getCredits(): int
    {
        return self::$credits;
    } // ok so this one is kinda important for calculating credits. so be careful!
    public function __construct(string $courseName, int $credits, int $startHour, int $startMinute, int $endHour, int $endMinute)
    {
        $this->courseName = $courseName;
        $this->credits = $credits;
    }
    private function setCredits(int $credits)
    {
        $this->credits = $credits;
    }
}
class Professor extends User
{

    private $teaching = array();
    public function __construct(string $username, string $password)
    {
        //check if database has $username with $password
        #todo
    }
    public function getClasses()
    {
        return $this->teaching;
    }
    private function addClass(Course $course)
    {
        array_push($this->teaching, $course);
    }

    public function removeClass(string $class)
    {
        $this->teaching = array_diff($this->teaching, array($class));
    }


}
class Student extends User
{
    public $classes = array();
    public function getCredits(): int
    {
        $totalCredits = 0;
        foreach ($this->classes as $class) {
            $totalCredits += ($class);
        }
        return $totalCredits;
    }
    public function isInCourse($course): bool
    {
        foreach ($this->classes as $class) {
            if ($class->UUID === $course->UUID) {
                return true; // The user is enrolled in the specified course
            }
        }
        return false; // The user is not enrolled in the specified course
    }
    public function getCourses()
    {
        return $this->classes;
    }
    public function addCourse(Course $course)
    {
        array_push($this->classes, $course);
    }
    public function removeCourse(Course $course)
    {
        $this->classes = array_diff($this->classes, array($course));
    }
}
?>