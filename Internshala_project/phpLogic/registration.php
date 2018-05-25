<?php
  session_start();
?>
<?php include 'connection.php';?>
<?php
  $who=$mysqli->real_escape_string($_GET['user']);//to find whether employee or user is registering.
?>
<?php
 $email=$mysqli->real_escape_string($_POST['email']);
 $password=$mysqli->real_escape_string($_POST['password']);
 $password=password_hash($password, PASSWORD_DEFAULT);
 $firstName=$mysqli->real_escape_string($_POST['firstName']);
 $lastName=$mysqli->real_escape_string($_POST['lastName']);
 if($who=='employee'){
   $organization=$mysqli->real_escape_string($_POST['organization']);
   $phone=$mysqli->real_escape_string($_POST['phone']);
   $query2="INSERT INTO `employee`(`organization`, `email_id`, `password`, `first_name`, `last_name`, `phone_number`) ";
   $query2.="VALUES ('$organization','$email','$password','$firstName','$lastName','$phone')";
 }else if($who=='student') {
   $query2="INSERT INTO `student`(`email_id`, `password`, `firstName`, `lastName`) ";
   $query2.="VALUES ('$email','$password','$firstName','$lastName')";
 }
 $query1="SELECT * FROM `$who` WHERE `email_id`='$email'";
 $verify= $mysqli->query($query1);
 $row_cnt = $verify->num_rows;
 if($row_cnt===1){
   echo "<script>alert('Account already exist on this email');</script>";
       setcookie("page_content", "/internshala_project/public/webPages/login.php", time() + (86400), "/");
       echo "<script>
           setTimeout(function(){
              window.location.href = '/internshala_project/index.php';
           }, 50);
           </script>";
 } else {
   $result = $mysqli->query($query2);
   if ($result) {
     echo "<script>alert('successfully Registered');</script>";
     echo "<script>
     setTimeout(function(){
     window.location.href = '/internshala_project/index.php';
     }, 50);
     </script>";
   } else {
     echo "<script>alert('Registration failed, try again');</script>";
     echo "<script>
     setTimeout(function(){
     window.location.href = '/internshala_project/index.php';
     }, 50);
     </script>";
   }
 }
?>
