<?php
$title = "Check Code";
if($_GET){
  if(isset($_GET['page'])){
    $pages = ['register', 'login', 'reset-password'];
    if(!in_array($_GET['page'], $pages)){
      header("Location: errors/404.php");
    }
  }else{
    header("Location: errors/404.php");
    
  }
}else{
  header("Location: errors/404.php");

}
include_once './layouts/header.php';
include_once './layouts/navbar.php';
include_once './layouts/breadcrumb.php';
if($_POST){


}
?> <div class="login-register-area ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav">
            <a class="active" data-toggle="tab" href="#lg1">
              <h4> Check Code </h4>
            </a>
          </div>
          <div class="tab-content">
            <div id="lg1" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form">
                  <form action="#" method="post">
                    <input type="code" name="code" placeholder="Code">
                    <div class="button-box">
                      <button type="submit" class="btn btn-success"><span>Check</span></button>
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