<?php
  session_start();
?>
<?php include '../../phpLogic/connection.php';?>
<?php
  if ($_SESSION['who']=='employee') {
     $intern_id=$_GET['internid'];
     $query="SELECT * FROM `internlist` WHERE `intern_id`='$intern_id'";
     $result = $mysqli->query($query);
     $row=$result->fetch_array(MYSQLI_ASSOC);
  }else {
    echo "<script>alert('please login as employee');</script>";
        setcookie("page_content", "index.php", time() + (86400), "/");
        echo "<script>
            setTimeout(function(){
               window.location.href = '/internshala_project/index.php';
            }, 50);
            </script>";
            exit;
  }

?>

<style media="screen">
  .rounded{
     border-bottom-right-radius: 0rem !important;
     border-bottom-left-radius: 0rem !important;
  }

  .downround {
    border-bottom-left-radius: 0.25rem !important;
    border-bottom-right-radius: 0.25rem !important;
  }
  .card {
    width: 95%!important;
    box-shadow: 0px 0px 0px;
  }
  .my-3 {
    margin-bottom: 0rem !important;
  }
  .contain {
    border: 1px solid #6f42c1;

  }
  .foot {
    width: 100%;
    padding: 5px;
  }
  .small{
    color: papayawhip !important;
  }
</style>
<div class="navbar fixed-top bg-white p box-shadow">
    <div class="row nav-scroller">
       <div class="col-sm-3 text-left nav-li" onclick="loadDoc('content','public/webPages/employer_dashboard_home.php')">
        <strong> Dashboard </strong>
       </div>
       <div class="col-sm-3 text-left nav-li" onclick="loadDoc('content','public/webPages/employer_dashboard_applicants.php')">
        View Applicants
       </div>
       <div class="col-sm-3 text-left nav-li" onclick="loadDoc('content','public/webPages/employer_dashboard_addintern.php')">
        Add new Internship
       </div>
       <div class="col-sm-3 text-left nav-li" onclick="loadDoc('content','public/webPages/created_interns.php')">
        View/modify Internship
       </div>
    </div>
</div>
<div class="padding">

</div>
<div class="container">
  <div class="container body">
    <form class="form-signin" method="post" action="phpLogic/createInternship.php?action=update&id=<?php echo $intern_id; ?>">
      <h1 class="h3 mb-3 font-weight-normal">Edit Internship!</h1>
      <label for="internName" class="text-left">Internship Name</label>
      <input type="text" value="<?php echo $row['intern_topic']; ?>" name="internName" id="internName" class="form-control" placeholder="ex: Web Developer"  required  autofocus>
      <label for="internLocation" class="text-left">Available Location(s)</label>
      <input type="text" value="<?php echo $row['intern_location']; ?>" name="internLocation" id="internLocation" class="form-control" placeholder="location1, location2" required  autofocus>
      <label for="internDuration" class="text-left">Duration</label>
      <input type="text" value="<?php echo $row['intern_duration']; ?>" name="internDuration" id="internDuration" class="form-control" placeholder="3 weeks" required >
      <label for="internStipend" class="text-left">Stipend</label>
      <input type="text" value="<?php echo $row['stipend']; ?>" name="internStipend" id="internStipend" class="form-control" placeholder="(inr only) ex: 1000" required >
      <label for="applyBy" class="text-left">Last date for application</label>
      <input type="date" value="<?php echo $row['apply_by']; ?>" name="applyBy" id="applyBy" class="form-control" placeholder="ex:24-05-2018" required >

      <div class="row">
        <div class="col-12">
          <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Update" style="margin-top:10px;">
        </div>
      </div>
      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
    </form>
</div>
</div>
