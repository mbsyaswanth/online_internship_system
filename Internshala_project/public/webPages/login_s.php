<?php
  $who=$_GET['user'];
  if ($who='employee') {
    $user="employer";
  } else {
    $user="student";
  }
?>
<form class="form-signin" method="post" action="phpLogic/login_verify.php?user=student">
  <h1 class="h3 mb-3 font-weight-normal">Student Login</h1>
  <label for="inputEmail" class="text-left">Email address</label>
  <input name="email" type="email" id="inputEmail" class="form-control" placeholder="name@company_name.com" required autofocus>
  <label for="inputPassword" class="text-left">Password</label>
  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Login</button>
  <div class="text-center">Not registered? Register as <span class="text-primary" style="cursor:pointer;" onclick="loadDoc('content','public/webPages/student_register.php')">Student</span>/<span style="cursor :pointer;" class="text-primary" onclick="loadDoc('content','public/webPages/employee_register.php')">Company</span></div>
</form>
