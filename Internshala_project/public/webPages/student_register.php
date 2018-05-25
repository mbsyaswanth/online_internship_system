<div class="container body">
  <div class="row">
    <div class="col text-center">
      <h4>Student Registration</h4>
    </div>
  </div>
  <form class="form-signin" method="post" action="phpLogic/registration.php?user=student">
    <h1 class="h3 mb-3 font-weight-normal">start working now!</h1>
    <label for="inputEmail" class="text-left">Email address</label>
    <input type="email"  name="email" id="inputEmail" class="form-control" placeholder="name@company_name.com" required autofocus>
    <label for="inputPassword" class="text-left">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="row">
      <div class="col-6">
        <label for="firstName" class="text-left">First Name</label>
        <input type="text" name="firstName" id="firstName" class="form-control" required>
      </div>
      <div class="col-6">
        <label for="lastName" class="text-left">Last Name</label>
        <input type="text" name="lastName" id="lastName" class="form-control" placeholder="surname" required>
      </div>
    </div>
    <button class="btn btn-lg btn-primary btn-block" style="margin-top:10px;" type="submit">Register</button>
  </form>
</div>
