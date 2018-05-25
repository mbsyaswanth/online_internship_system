<?php
  session_start();
?>
<?php include '../../phpLogic/connection.php';?>
    <style media="screen">

    </style>
    <?php
       $stu_id=$_SESSION['id'];
       $query1="SELECT `stu_id` FROM `student_intern_view` WHERE `stu_id`='$stu_id'";
       $result=$mysqli->query($query1);
       $interns=$result->num_rows;
    ?>
    <!-- <div class="navbar fixed-top bg-white p box-shadow">
        <div class="row nav-scroller">
           <div class="col-sm-3 text-left nav-li" onclick="loadDoc('content','public/webPages/student_dashboard_home.php')">
            <strong> Dashboard </strong>
           </div>
           <div class="col-sm-3 text-left nav-li" onclick="loadDoc('content','public/webPages/student_dashboard_internships.php')">
            View applied Internships
           </div>
           <div class="col-sm-3 text-left nav-li" onclick="loadDoc('content','public/webPages/internlist.php')">
            Apply for new Internship
           </div>
        </div>
    </div> -->
    <script>loadDoc('dash','public/webPages/student_dashboard.php')</script>
    <div class="padding">

    </div>
     <h3 class="text-center">Insights</h3>
    <div class="container">
      <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Internsips Applied</h5>
        <h4 class="card-text text-primary"><?php echo $interns; ?></h4>
        <div onclick="loadDoc('content','public/webPages/student_dashboard_internships.php')" class="btn btn-primary">View Internships</div>
      </div>
    </div>
  </div>
</div>
    </div>
  <!-- </body>
</html> -->
