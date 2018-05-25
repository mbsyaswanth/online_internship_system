<?php
  session_start();
  if(isset($_SESSION['id']))
  {
    $id=$_SESSION['id'];
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
       $query="UPDATE `employee` SET `organization`='$organization',`email_id`='$email',`first_name`='$firstName',`last_name`='$lastName',`phone_number`='$phone' WHERE `emp_id`=$id";
     }else if($who=='student') {
       $query="UPDATE `student` SET `email_id`='$email',`firstName`='$firstName',`lastName`='$lastName' WHERE `stu_id`=$id";
     }
      if ($result = $mysqli->query($query)) {
        echo "<script>alert('Profile Updated');</script>";
            setcookie("page_content", "employee_details_update.php", time() + (86400), "/");
            echo "<script>
                setTimeout(function(){
                   window.location.href = '/internshala_project/index.php';
                }, 50);
                </script>";
      } else{
        echo "<script>alert('Failed to update profile, try again!');</script>";
      }
  } else{
  echo "alert('login first')";
}
?>
