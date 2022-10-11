<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SPIN PRODUCTION</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/template');?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/template');?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/template');?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('assets/template');?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/template');?>/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div class="container">
     <div class="row">
     
     
     
     
    <div class="col-sm-6">
    
    
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?= base_url('auth');?>" method="post">
              <h1>Please Login</h1>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              
              <div>
                <button type="submit" class="btn btn-info btn-block" type="button">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>SPIN Production System</h1>
                  <p>Copyright &copy;2022 All Rights Reserved By IT SPIN</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Reset Password</h1>
             
              <div>
                <input type="email" class="form-control" placeholder="Username" required="" />
              </div>
            
              <div>
                <button type="button" class="btn btn-info btn-block submit">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                    <h1>SPIN Production System</h1>
                  <p>©2022 All Rights Reserved By IT SPIN</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
      </div>
      
      <div class="col-sm-6">
      <img src="<?= base_url('assets/images/cover.png');?>" width="100%"  height="auto">
       
       </div>
      
      </div>
      
      
      
    </div>
  </body>
</html>
