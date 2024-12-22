<?php
$host="localhost";
$port=5432;
$username="postgres";
$password="postgres";
$dbname="Exercise";
$conn_string = "host=$host port=$port dbname=$dbname user=$username password=$password";
$conn=pg_connect($conn_string);
if($conn){
    echo "Connected Successfully";
}
else{
    echo "Connection Failed";
}

$uname=$_POST['name'];
$email=$_POST['email'];
$age=$_POST['age'];
$phone=$_POST['phone'];

$insert="INSERT INTO userdetails VALUES ('$uname','$email','$age','$phone')";
$result=pg_query($conn,$insert);


?>