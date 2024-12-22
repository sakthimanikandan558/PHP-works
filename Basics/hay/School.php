<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php
class Student {
    private $name;
    private $rollno;
    private $age;
    private $marks;

    public function __construct($name, $rollno, $age, $marks) {
        $this->name = $name;
        $this->rollno = $rollno;
        $this->age = $age;
        $this->marks = $marks;
    }

    public function getRollNo() {
        return $this->rollno;
    }

    public function getDetails() {
        echo '<div class="bg-gray-100 p-4 border border-gray-300 mb-4 text-gray-800">';
        echo '<p><span class="font-bold text-gray-700">Name: </span><span class="text-blue-500">' . $this->name . '</span></p>';
        echo '<p><span class="font-bold text-gray-700">Roll No: </span><span class="text-red-500">' . $this->rollno . '</span></p>';
        echo '<p><span class="font-bold text-gray-700">Age: </span><span class="text-yellow-500">' . $this->age . '</span></p>';
        echo '<p><span class="font-bold text-gray-700">Marks: </span><span class="text-purple-500">' . $this->marks . '</span></p>';
        echo '</div>';
    }
}

class ClassRoom {
    public $clsRoom = [];

    public function __construct(...$values) {
        $this->clsRoom = $values;
        echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">';
        echo '<strong class="font-bold">Success! </strong>';
        echo '<span class="block sm:inline">Students added successfully.</span>';
        echo '</div>';
    }

    public function addStudent($stu) {
        $this->clsRoom[] = $stu;
    }

    public function removeStudentByRollNo($rollno) {
        foreach ($this->clsRoom as $key => $student) {
            if ($student->getRollNo() == $rollno) {
                unset($this->clsRoom[$key]);
                $this->clsRoom = array_values($this->clsRoom);
                echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">';
                echo '<strong class="font-bold">Removed! </strong>';
                echo '<span class="block sm:inline">Student removed successfully.</span>';
                echo '</div>';
                return;
            }
        }
        echo '<div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">';
        echo '<strong class="font-bold">Not Found! </strong>';
        echo '<span class="block sm:inline">Student with roll number ' . $rollno . ' not found.</span>';
        echo '</div>';
    }

    public function getStudentDetailsByRollNo($rollno) {
        foreach ($this->clsRoom as $student) {
            if ($student->getRollNo() == $rollno) {
                $student->getDetails();
                return;
            }
        }
        echo '<div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">';
        echo '<strong class="font-bold">Not Found! </strong>';
        echo '<span class="block sm:inline">Student with roll number ' . $rollno . ' not found.</span>';
        echo '</div>';
    }

    public function listAllStudents() {
        foreach ($this->clsRoom as $student) {
            $student->getDetails();
        }
    }
}

$stu1 = new Student('Sakthi', 88, 22, 95);
$stu2 = new Student('Sankari', 95, 22, 98);
$stu3 = new Student('Kali', 96, 23, 95);
$stu4 = new Student('Rasathi', 97, 23, 93);

echo '<h1 class="text-4xl font-extrabold text-center text-gray-900 mb-8">Student Management System</h1>';


$class1 = new ClassRoom($stu1, $stu2, $stu3);

echo "<h2>All Students in the Class</h2>";
$class1->listAllStudents();

echo "<h2>Adding a New Student</h2>";
$class1->addStudent($stu4);

echo "<h2>All Students in the Class After Adding</h2>";
$class1->listAllStudents();

echo "<h2>Details of Student with Roll No 96</h2>";
$class1->getStudentDetailsByRollNo(96);

echo "<h2>Removing Student with Roll No 96</h2>";
$class1->removeStudentByRollNo(96);

echo "<h2>All Students in the Class After Removing</h2>";
$class1->listAllStudents();
?>
</body>
</html>
