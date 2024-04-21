<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addUser']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $password=$_POST['password'];
 $user_query="INSERT INTO users (name,email,phone,password) VALUES('$name','$email','$phone','$password') ";
 $user_query_run=mysqli_query($con, $user_query);

if($user_query_run)
{
    $_SESSION['status']="User Added Succesfully";
    header("Location:registered.php");


}

else
{
    $_SESSION['status']="User Added Failed";
    header("Location:registered.php");

}


}

?>