<?php
$title = "Register";
include_once "layouts/header.php";
include_once 'layouts/navbar.php';
include_once 'layouts/breadcrumb.php';
include_once 'app/requests/AuthenticationRequest.php';
include_once 'app/models/User.php';
include_once './app/middlewares/mail.php';
if ($_POST) {
  $authRequest = new AuthenticationRequest;
  $authRequest->setFirst_name($_POST['first_name']);
  $fistNameValidationResult = $authRequest->validationFirstName();
  $authRequest->setLast_name($_POST['last_name']);
  $lastNameValidationResult = $authRequest->validationLastName();
  $authRequest->setEmail($_POST['email']);
  $emailValidationResult = $authRequest->validationEmail();
  $authRequest->setPhone($_POST['phone']);
  $phoneValidationResult = $authRequest->validationPhone();
  $authRequest->setPassword($_POST['password']);
  $passwordValidationResult = $authRequest->validationPassword();
  $authRequest->setConfirmPassword($_POST['confirm_password']);
  $confirmPasswordValidationResult = $authRequest->validationConfirmPassword();
  if (empty($fistNameValidationResult) && empty($lastNameValidationResult) && empty($emailValidationResult) && empty($phoneValidationResult) && empty($passwordValidationResult)) {
    // insert into database
    $code = rand(10000, 99999);
    $userObject = new User;
    $userObject->setFirst_name($_POST['first_name']);
    $userObject->setLast_name($_POST['last_name']);
    $userObject->setEmail($_POST['email']);
    $userObject->setPhone($_POST['phone']);
    $userObject->setPassword($_POST['password']);
    $userObject->setGender($_POST['gender']);
    $userObject->setCode($code);
    $result = $userObject->create();
    if($result){
      $subject = "Ecommerce NTI Verfication Code";
      $body = "<p>Hello {$_POST['first_name']} . {$_POST['last_name']}</p> <p>Your verfication Code is <b style='color :red'>$code</b></p> <p>Thank you ..</p>";
      $mail = new Mail($_POST['email'], $subject, $body);
      $mailResult = $mail->send();
      if($mailResult){
        $_SESSION['checkcode_mail'] = $_POST['code'];
        header('location: checkcode.php?page=register');
      }else{
        echo "error";die;
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
            <a class="active" data-toggle="tab" href="#lg2">
              <h4> <?= $title ?> </h4>
            </a>
          </div>
          <div class="tab-content">
            <div id="lg1" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form">
                  <?php
                    if(isset($result) &&  !$result) echo "<div class='alert alert-danger'>Try Again Later</div>";
                    if(isset($mailResult) && !$mailResult) echo "<div class='alert alert-danger'>Something Went Wrong Error !</div>"
                  ?>
                  <form method="post">
                    <input type="text" name="first_name" placeholder="Firstname" value="<?= (isset($_POST['first_name'])) ? $_POST['first_name'] : '' ?>">
                    <?php
                      if(!empty($fistNameValidationResult)){
                        foreach ($fistNameValidationResult as $index => $error) {
                          echo $error;
                        }
                      }
                    ?>
                    <input type="text" name="last_name" placeholder="Lastname" value="<?= (isset($_POST['last_name'])) ? $_POST['last_name'] : '' ?>">
                    <?php 
                      
                      if(!empty($lastNameValidationResult)){
                        foreach ($lastNameValidationResult as $index => $error) {
                          echo $error;
                        }
                      }
                    ?>
                    <input type="email" name="email" placeholder="Email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>">
                    <?php 
                      if (!empty($emailValidationResult)) {
                        foreach ($emailValidationResult as $index => $error) {
                          echo $error;
                        }
                      } 
                    ?>
                    <input type="number" name="phone" placeholder="Phone" value="<?php (isset($_POST['phone'])) ? $_POST['phone'] : '' ?>">
                    <?php 
                      if (!empty($phoneValidationResult)) {
                        foreach ($phoneValidationResult as $index => $error) {
                          echo $error;
                        }
                      } 
                    ?>
                    
                    <input type="password" name="password" placeholder="Password" value="<?= (isset($_POST['password'])) ? $_POST['password'] : '' ?>">
                    <?php if (!empty($passwordValidationResult)) {
                      foreach ($passwordValidationResult as $index => $error) {
                        echo $error;
                      }
                    } ?> <input type="password" name="confirm_password" placeholder="ConfirmPassowrd" value="<?= (isset($_POST['confirm_password'])) ? $_POST['confirm_password'] : '' ?>"> 
                    <?php
                      if (!empty($confirmPasswordValidationResult)) {
                        foreach ($confirmPasswordValidationResult as $index => $error) {
                          echo $error;
                        }
                      }
                    ?>
                     <select class="form-control" name="gender" id="gender">
                      <option value="m" <?= (isset($_POST['m'])) ? 'selected' : '' ?>>Male </option>
                      <option value="f" <?= (isset($_POST['f'])) ? 'selected' : '' ?>>Female </option>
                    </select>
                    <div class="button-box">
                      <div class="login-toggle-btn">
                        <input type="checkbox">
                        <label>Remember me</label>
                        <a href="#">Forgot Password?</a>
                      </div>
                      <button type="submit"><span><?= $title ?></span></button>
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
        include_once 'layouts/footer.php';
        ?>