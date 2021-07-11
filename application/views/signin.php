<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AMDABIDSS HEALTH Login</title>
    <meta name="description" content="R2N Login">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo-b.png">

    <link rel="stylesheet" href="<?=base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">

    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/signincss.css">

</head>

<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
                <div class="login-logo p-2 mr-2 ml-2 pb-0" style="background-color:rgba(255,255,255,0.10); margin:0px;"> 
                    <a>
                        <img class="align-content" src="<?=base_url()?>assets/images/logo.png" alt="" style="width:100%">
                    </a>
                    <h2 class = "title"><strong>AMDABIDSS-HEALTH</strong></h2>
                    <hr>
                </div>
                <div class="login-form pt-1">
                    <form method="POST" action="<?=base_url()?>Main_C/login">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="user_name">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="user_pass">
                        </div>
                            <?php if($this->session->flashdata("error")){ ?>
                            <div class="col-sm-12 center">
                                <?php echo '<label class ="text-danger">'.$this->session->flashdata("error").'</label>' ?>
                            </div>
                            <?php } ?>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox"> Remember Me
                            </label>
                                    <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>
                                </div>

                                <button type="submit"  class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                        <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                                    </div>
                                </div> -->
                                <!-- <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                                </div> -->
                    </form>
                </div>
            </div>
        </div> 
    </div>


    <script src="<?=base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/main.js"></script>
    <script src="<?=base_url()?>assets/js/customlogin.js"></script>


</body>

</html>
