<?php
  session_start();
  if($_SESSION['who']=='employee')
  {
    $eid=$_SESSION['id'];
    include 'connection.php';
    $title=$mysqli->real_escape_string($_POST['internName']);
    $location=$mysqli->real_escape_string($_POST['internLocation']);
    $duration=$mysqli->real_escape_string($_POST['internDuration']);
    $stipend=$mysqli->real_escape_string($_POST['internStipend']);
    $apply_by=$mysqli->real_escape_string($_POST['applyBy']);
    if($_GET["action"]=='create')
    {
      $posted_on=date("Y-m-d");
      $query="INSERT INTO `internlist`(`emp_id`, `intern_topic`, `intern_location`, `intern_duration`, `stipend`, `apply_by`, `posted_on`) ";
      $query.="VALUES ('$eid','$title','$location','$duration','$stipend','$apply_by','$posted_on')";
      if ($result = $mysqli->query($query)) {
        echo "<script>alert('internship created');</script>";
        setcookie("page_content", "created_interns.php", time() + (86400), "/");
        echo "<script>
            setTimeout(function(){
               window.location.href = '/internshala_project/index.php';
            }, 5);
            </script>";
            exit;
      }else {
        echo "<script>alert('failed to create, try again!');</script>";
        setcookie("page_content", "employer_dashboard_addintern.php", time() + (86400), "/");
        echo "<script>
            setTimeout(function(){
               window.location.href = '/internshala_project/index.php';
            }, 5);
            </script>";
            exit;
      }
    } else if ($_GET["action"]=='update') {
      $id=$_GET['id'];
      $query="UPDATE `internlist` SET `emp_id`='$eid',`intern_topic`='$title',";
      $query.="`intern_location`='$location',`intern_duration`='$duration',`stipend`='$stipend',`apply_by`='$apply_by' WHERE `intern_id`='$id'";
      if ($result = $mysqli->query($query)) {
        echo "<script>alert('Internship Updated');</script>";
        setcookie("page_content", "created_interns.php", time() + (86400), "/");
        echo "<script>
            setTimeout(function(){
               window.location.href = '/internshala_project/index.php';
            }, 5);
            </script>";
            exit;
      }else {
        echo "<script>alert('failed to update, try again!');</script>";
        setcookie("page_content", "created_interns.php", time() + (86400), "/");
        echo "<script>
            setTimeout(function(){
               window.location.href = '/internshala_project/index.php';
            }, 5);
            </script>";
      }
    }


  } else {
    echo "<script>alert('please login as employee');</script>";
        setcookie("page_content", "login.php?user=employee", time() + (86400), "/");
        echo "<script>
            setTimeout(function(){
               window.location.href = '/internshala_project/index.php';
            }, 50);
            </script>";
  }
  ?>
