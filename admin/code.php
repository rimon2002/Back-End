<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['check_Emailbtn']))
{
    $checkmail="SELECT email FROM users WHERE email='$email'  ";
    $checkmail_run=mysqli_query($con,$checkmail);
    if(mysqli_num_rows($checkmail_run)>0)
    {
        echo "Email id already taken.!!";
    }
    else
    {
        echo "It's available.";
    } 
}



if(isset($_POST['addUser']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $password=$_POST['password'];
  $confirmpassword=$_POST['confirmpassword'];

  if($password==$confirmpassword)
  {
    $checkmail="SELECT email FROM users WHERE email='$email'  ";
    $checkmail_run=mysqli_query($con,$checkmail);
    if(mysqli_num_rows($checkmail_run)>0)
    {
        $_SESSION['status']="Email id already taken.!!";
        header("Location:registered.php");
    }
    else
    {
        $user_query="INSERT INTO users (name,email,phone,password) VALUES('$name','$email','$phone','$password') ";
        $user_query_run=mysqli_query($con, $user_query);
       
       if($user_query_run)
       {
        //Taken-Already Existist
           $_SESSION['status']="User Added Succesfully";
           header("Location:registered.php");
       exit;
       
       }
       
       else
       {
        //Available record not found
           $_SESSION['status']="User Added Failed";
           header("Location:registered.php");
       
       }  
    }
    
  }
else
{
    $_SESSION['status']="Password  and Confirmpassword doesn't match.";
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


if (isset($_POST['DeleteUserbtn'])) 


{
   $userid=$_POST['delete_id'];
   $query="DELETE FROM users WHERE id='$userid'";
   $query_run=mysqli_query($con,$query);

   if($query_run)
   {
       $_SESSION['status']="User Deleted Succesfully";
       header("Location:registered.php");
   
   
   }
   
   else
   {
       $_SESSION['status']="User Deleting Failed";
       header("Location:registered.php");
   
   }  
    

}


?>