<?php
$title = "Login";
include_once './layouts/header.php';
include_once './layouts/navbar.php';
include_once './layouts/breadcrumb.php';
include_once './app/Requests/AuthenticationRequest.php';
include_once './app/Models/User.php';
if($_POST){
  $authRequest = new AuthenticationRequest;
  $authRequest->setEmail($_POST['email']);
  $emailValidationResult = $authRequest->validationEmail();
  $authRequest->setPassword($_POST['password']);
  $passwordValidationResult = $authRequest->validationPassword();
  if(empty($emailValidationResult) && empty($passwordValidationResult)){
    $userObject = new User;
    $userObject->setEmail($_POST['email']);
    $userObject->setPassword($_POST['password']);
    $result = $userObject->login();
    if($result){
      $user = $result->fetch_object();
      // user if exists => check status
      switch ($user->status) {
        case '0':
          $_SESSION['checkcode-email'] = $_POST['email'];
          header('location: checkcode.php?page=login');
          break;
          case '1':  
            $_SESSION['user'] = $user;
          header('location: index.php');
          break;
        default:
          # code...
          header('location: errors/404.php');
          break;
      }
    }
  }
}
?> <div class="login-register-area ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav">
            <a class="active" data-toggle="tab" href="#lg1">
              <h4> <?=$title?> </h4>
            </a>
          </div>
          <div class="tab-content">
            <div id="lg1" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form">
                  <?php
                    if(isset($result) && !$result) echo "<div class='alert alert-danger'>Login Faild</div>";
                  ?>
                  <form action="#" method="post">
                    <input type="text" name="email" placeholder="Email">
                    <?php
                      if(!empty($_POST['email'])){
                        foreach ($emailValidationResult as $key => $error) {
                         echo $error;
                        }
                      }
                    ?>
                    <input type="password" name="password" placeholder="Password">
                    <?php
                      if(!empty($_POST['password'])){
                        foreach ($passwordValidationResult as $key => $error) {
                         echo $error;
                        }
                      }
                    ?>
                    <div class="button-box">
                      <div class="login-toggle-btn">
                        <input type="checkbox">
                        <label>Remember me</label>
                        <a href="#">Forgot Password?</a>
                      </div>
                      <button type="submit"><span>Login</span></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <?php
        include_once './layouts/footer.php';
        ?>