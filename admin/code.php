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

if(isset($_POST['updateUser']))
{
    $user_id=$_POST['user_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
$query="UPDATE users SET name='$name', email='$email',phone='$phone', password='$password' WHERE id='$user_id'  ";
$query_run=mysqli_query($con,$query);

if($query_run)
{
    $_SESSION['status']="User Updated Succesfully";
    header("Location:registered.php");


}

else
{
    $_SESSION['status']="User Updating Failed";
    header("Location:registered.php");

}




}



?>