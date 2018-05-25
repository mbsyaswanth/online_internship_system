
  <div class="container body">
    <div class="row">
      <div class="col text-center">
        <h4>Employee Registration</h4>
      </div>
    </div>
    <form class="form-signin" method="post" action="phpLogic/registration.php?user=employee">
      <h1 class="h3 mb-3 font-weight-normal">start hiring now!</h1>
      <label for="organizationName" class="text-left">Organization Name</label>
      <input type="text" name="organization" id="organizationName" class="form-control"  required autofocus>
      <label for="inputEmail" class="text-left">Official Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="name@company_name.com" required autofocus>
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
      <label for="mobileNo" class="text-left">Mobile Number</label>
      <input type="text" id="mobileNo" name="phone" class="form-control" placeholder="ex:9034563456" required>
      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;">Register</button>
    </form>
</div>
