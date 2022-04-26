<?php

session_start();
require "config.php";

$d=$_POST['delete']??null;
if($d!=null){
    $q="DELETE FROM students_info WHERE stud_id=".$_POST['delete'];
    $pdo->query($q);
}else{
    $studId=$_POST['stud_id']??null;
    $studName=$_POST['stud_name']??null;
    $studClass=$_POST['stud_class']??null;
    $studDiv=$_POST['stud_div']??null;
    $studCity=$_POST['stud_city']??null;

    $q="SELECT * FROM students_info WHERE stud_id=$studId";
    $res=$pdo->query($q);
    $numRows=$res->rowCount();

    if($numRows==1){
        $q="DELETE FROM students_info WHERE stud_id=$studId";
        $pdo->query($q);
        $q="INSERT INTO students_info VALUES ($studId,'$studName','$studClass',$studDiv,'$studCity')";
        $pdo->query($q);
    }else{
        $q="INSERT INTO students_info VALUES ($studId,'$studName','$studClass',$studDiv,'$studCity')";
        $pdo->query($q);
    }
}
unset($pdo);
header("Location: http://localhost:3000/index.php");
exit;
?>