<?php
  session_start();
?>
<?php include '../../phpLogic/connection.php';?>
<?php
  $id=$_SESSION['id'];
  $query="SELECT * FROM `internships_list` where `emp_id`='$id'";
  $result = $mysqli->query($query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>internlist</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/internshala_project/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/internshala_project/public/css/home.css">
    <link rel="stylesheet" href="/internshala_project/public/css/formstyle.css">
    <script src="/internshala_project/public/js/jquery-3.3.1.js"></script>
    <style media="screen">
      .card{
        margin:15px;
        box-shadow: 0px 0px 8px 1px #b3afaf;
        border-color: #c6c7ca!important;
      }
     .card-header {
        background-color: rgba(25, 24, 24, 0.08);
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        font-weight: bold;
        font-size: x-large;
    }
    .contain{
      display: flex;
      flex-direction: column;
      align-items: center;
     }
    </style>
  </head>
  <body>
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
       if($result->num_rows==0){
         echo "<h5>No internships created.</h5>";
         exit;
       }
    ?>
    <h3 class="text-center">Created Internships</h3>
    <div class="contain">
      <?php
       while($row = $result->fetch_array(MYSQLI_ASSOC))
       {
      ?>
       <div class="card text-left w-75">
        <div class="card-header">
          <?php echo $row['intern_title']; ?>
        </div>
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['organization']; ?></h5>
          <div class="card-text text-left">
            <div class="row">
               <div class="col-sm-3 text-muted">
                 <p>Location(s):</p>
               </div>
               <div class="col-sm-9">
                  <p><?php echo $row['location']; ?></p>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-3 text-muted">
                 <p>Stipend:</p>
               </div>
               <div class="col-sm-3">
                  <p>₹<?php echo $row['stipend']; ?></p>
               </div>
               <div class="text-right col-sm-6">
                 <?php
                   $url="public/webPages/editIntern.php?internid=".$row['intern_id'];
                  ?>
                     <input type="submit" onclick="loadDoc('content','<?php echo $url ?>')" name="submit" class="btn btn-primary" value="Edit">
               </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted">
          <div class="row">
              <?php
                $date = new DateTime($row['posted_on']);
                $posted_on = $date->format('d-M-Y');
                $date = new DateTime($row['apply_by']);
                $apply_by = $date->format('d-M-Y');
              ?>
            <div class="col text-left">
               posted on: <?php echo $posted_on; ?>
            </div>
            <div class="col text-right">
              apply by: <?php echo $apply_by; ?>
            </div>
          </div>
        </div>
       </div>
       <?php
         }
       ?>
       <div class="text-center"><span class="text-primary" style="cursor:pointer;" onclick="loadDoc('content','public/webPages/employer_dashboard_addintern.php')">Add new internship</span></div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="/internshala_project/public/js/popper.min.js"></script>
    <script src="/internshala_project/public/js/bootstrap.min.js"></script>
  </body>
</html>
