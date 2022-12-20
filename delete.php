<?php

require './classes/student.php';

$id = $_GET['id'];
$student = new student;
$result =  $student->remove($id);

if($result){
    $_SESSION['Message'] = "Raw Removed";
}else{
    $_SESSION['Message'] = "Error Try Again";
}

header("location: index.php");




?>