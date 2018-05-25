<?php
  session_start();
?>
<?php include 'connection.php';?>
<?php
   $who=$mysqli->real_escape_string($_GET['user']);
   if ($who=='student') {
     $id='stu_id';
   } else if ($who=='employee') {
     $id='emp_id';
   }
   $email=$mysqli->real_escape_string($_POST['email']);
   $password=$mysqli->real_escape_string($_POST['password']);
   $query = "SELECT `".$id."`,`email_id`,`password` FROM `".$who."` where `email_id`='".$email."'";
   if(!isset($_SESSION['user'])){
      $result = $mysqli->query($query);
   } else {
     echo "<script>alert('a account is already logged in');</script>";
     echo "<script>
         setTimeout(function(){
            window.location.href = '/internshala_project/index.php';
         }, 50);
         </script>";
   }
   /* associative and numeric array */
    $ro = $result->fetch_array(MYSQLI_BOTH);
   $Hpassword=$ro['password'];
   $row_cnt = $result->num_rows;
   if(password_verify($password, $Hpassword)){
     echo "<script>alert('Login success');</script>";
         $_SESSION['who']=$who;
         $_SESSION['user']=$email;
         $_SESSION['id']=$ro[$id];
         if($who=="employee"){
           setcookie("page_content", "employer_dashboard_home.php", time() + (86400), "/");
         } else if($who=="student"){
           setcookie("page_content", "student_dashboard_home.php", time() + (86400), "/");
           setcookie("dash", "student_dashboard.php", time() + (86400), "/");
         }
         echo "<script>
             setTimeout(function(){
                window.location.href = '/internshala_project/index.php';
             }, 50);
             </script>";
   }else{
     echo "<script>alert('Login Fail, verify account details');</script>";
     if($who=="employee"){
       setcookie("page_content", "login.php?user=employee", time() + (86400), "/");
     } else if($who=="student"){
       setcookie("page_content", "login_s.php?user=student", time() + (86400), "/");
     }
     echo "<script>
     setTimeout(function(){
     window.location.href = '/internshala_project/index.php';
     }, 50);
     </script>";
  }
  /* free result set */
  $result->free();
   /* close connection */
   $mysqli->close();
?>
