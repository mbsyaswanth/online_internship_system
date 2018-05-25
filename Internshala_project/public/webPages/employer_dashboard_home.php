<?php
  session_start();
  if($_SESSION['who']==='student'){
    header('Location:student_dashboard_home.php');
    exit;
  }

?>
<?php include '../../phpLogic/connection.php';?>
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
    <?php
       $emp_id=$_SESSION['id'];
       $query1="select`emp_id` from `internships_list` where `emp_id`='$emp_id'";
       $result=$mysqli->query($query1);
       $interns=$result->num_rows;
       $query2="SELECT `stu_id` FROM `student_intern_view` WHERE `emp_id`='$emp_id'";
       $result=$mysqli->query($query2);
       $applicants=$result->num_rows;
    ?>
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
             View/Modify Internship
           </div>
        </div>
    </div>
    <div class="padding">

    </div>
     <h3 class="text-center">Insights</h3>
    <div class="container">
      <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Internsips Created</h5>
        <h4 class="card-text text-primary"><?php echo $interns; ?></h4>
        <div onclick="loadDoc('content','public/webPages/created_interns.php')" class="btn btn-primary">View Internships</div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Applicants</h5>
        <h4 class="card-text text-primary"><?php echo $applicants; ?></h4>
        <div onclick="loadDoc('content','public/webPages/employer_dashboard_applicants.php')" class="btn btn-primary">View Applicants</div>
      </div>
    </div>
  </div>
</div>
    </div>
  <!-- </body>
</html> -->
