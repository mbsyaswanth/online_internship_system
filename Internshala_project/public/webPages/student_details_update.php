<?php
  session_start();
?>
<?php include '../../phpLogic/connection.php';?>
<?php
  $id=$_SESSION['id'];
  $query="SELECT * FROM `student` WHERE stu_id=$id";
  $result = $mysqli->query($query);
  $row=$result->fetch_array(MYSQLI_ASSOC);
?>

<div class="container body">
  <form class="form-signin" method="post" action="phpLogic/update.php?user=student">
    <h1 class="h3 mb-3 font-weight-normal">Your profile</h1>
    <label for="inputEmail" class="text-left">Email address</label>
    <input type="email" name="email" value="<?php echo $row['email_id']; ?>" id="inputEmail" class="form-control-plaintext rw" placeholder="name@company_name.com" required readonly autofocus>
    <label for="inputPassword" class="text-left">Password</label>
    <input type="password" name="password" value="<?php echo $row['password']; ?>" id="inputPassword" class="form-control-plaintext" placeholder="Password" required readonly>
    <div class="row">
      <div class="col-6">
        <label for="firstName" class="text-left">First Name</label>
        <input type="text" name="firstName" value="<?php echo $row['firstName']; ?>" id="firstName" class="form-control-plaintext rw" required readonly>
      </div>
      <div class="col-6">
        <label for="lastName" class="text-left">Last Name</label>
        <input type="text" name="lastName" value="<?php echo $row['lastName']; ?>" id="lastName" class="form-control-plaintext rw" placeholder="surname" required readonly>
      </div>
    </div>
    <div id="Ubuttons">
      <button class="btn btn-lg btn-primary btn-block" type="button" style="margin-top:10px;" onclick="eupdate()">Edit</button>
    </div>
  </form>
</div>
