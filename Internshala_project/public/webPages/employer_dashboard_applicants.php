
<?php
  session_start();
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
     <?php
         $emp_id=$_SESSION['id'];
         $query="SELECT * FROM `internships_list` WHERE `emp_id`='$emp_id'";
         $interns=$mysqli->query($query);
     ?>
     <h3 class="text-center">Applicants</h3>
    <div class="container">
      <?php
      while($intern=$interns->fetch_array(MYSQLI_ASSOC))
      {
         $internship=$intern['intern_id'];
         $query1="SELECT * FROM `employee_view` WHERE `intern_id`='$internship'";
         $result=$mysqli->query($query1);
      ?>
      <div class="box-shadow downround">
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
         <div class="lh-100">
           <h4 class="mb-0 text-white lh-100"><?php echo $intern['intern_title']; ?></h4>


           <small>Duraion:<?php echo $intern['duration']; ?></small>
           <small>&nbsp stipend: ₹<?php echo $intern['stipend']; ?></small>
         </div>
        </div>

        <div class="contain downround">
          <?php
          while($row=$result->fetch_array(MYSQLI_ASSOC))
          {
          ?>
         <div class="card text-left">
          <div class="card-header">
            <?php echo $row['firstName']; ?> <?php echo $row['lastName']; ?>
          </div>
          <div class="card-body">
            <div class="card-text text-left">
              <div class="row">
                 <div class="col-sm-3 text-muted">
                   <p>Email:</p>
                 </div>
                 <div class="col-sm-9">
                    <p><?php echo $row['email']; ?></p>
                 </div>
              </div>
              <div class="row">
                 <div class="col-sm-3 text-muted">
                   <p>Applied on:</p>
                 </div>
                 <?php
                 $date = new DateTime($row['applied_on']);
                 $applied_on = $date->format('d-M-Y');
                 ?>
                 <div class="col-sm-9">
                    <p><?php echo $applied_on; ?></p>
                 </div>

              </div>
              <div class="row">
                 <div class="col-sm-3 text-muted">
                   <p>Locations:</p>
                 </div>
                 <div class="col-sm-9">
                    <p><?php echo $row['intern_location']; ?></p>
                 </div>

              </div>
              <div class="row">
                    <div class="col-sm-6">

                    </div>

                   <div class="text-right col-3">
                      <a href="#" class="btn btn-primary">Reject</a>
                   </div>

                   <div class="text-right col-3">
                      <a href="#" class="btn btn-primary">Accept</a>
                   </div>

              </div>
            </div>
          </div>
         </div>
         <?php } ?>
         <?php
         $date = new DateTime($intern['posted_on']);
         $posted_on = $date->format('d-M-Y');
         $date = new DateTime($intern['apply_by']);
         $apply_by = $date->format('d-M-Y');
         ?>
         <div class="foot">
           <div class="row">
             <div class="col-6 text-left">
                posted on: <?php echo $posted_on; ?>
             </div>
             <div class="col-6 text-right">
               apply by: <?php echo $apply_by; ?>
             </div>
           </div>
         </div>
        </div>
      </div>
      <?php

      }
      ?>
    </div>
