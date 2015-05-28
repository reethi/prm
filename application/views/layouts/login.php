<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>PRM</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="<?php echo base_url(); ?>/assets/aceadmin/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/aceadmin/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/aceadmin/css/ace-fonts.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/custom/css/main.css">
		<!-- ace styles -->

		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/aceadmin/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/aceadmin/css/ace-rtl.min.css" />

                <script type="text/javascript" src="<?php echo base_url(); ?>/assets/aceadmin/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
            <div class="main-container">
                <div class="main-content">
                    <div class="col-lg-5 col-sm-8 col-md-offset-3 col-sm-offset-2 login-padding">
                        
                            <div class="center">&nbsp;</div>
                            <div class="center">&nbsp;</div>
                            <div class="space-12"></div>
                            <div class="position-relative">
                                <form name="login_form" id='login_form' action="<?php echo base_url(); ?>index.php/accounts/login" method="post">
                                    <div id="login-box" class="login-box visible no-border">
                                        <div class="widget-body">
                                            <div class="widget-main text-center">
                                                <div class="center">&nbsp;</div>
                                                <div class="row">
                                                        <div class="col-lg-2">&nbsp;</div>
                                                        <div class="col-lg-8 text-center"><img src="<?php echo base_url(); ?>/assets/images/stanford_login_logo.png" class=""></div>
                                                        <div class="col-lg-2">&nbsp;</div>
                                                </div>
                                                <div class="row">&nbsp;</div>
                                                <div class="row">&nbsp;</div>
                                                <div class="row youmust_row">
                                                    <div class="col-lg-2">&nbsp;</div>
                                                    <div class="col-lg-8 text-center">
                                                        <h6 class="text-center">
                                                            <?php if($invalid==''){ ?>
                                                                You must log in to continue.
                                                            <?php }else if($invalid){ ?>
                                                                <div style="color:#D32D48;"><strong><?php echo $invalid;?></strong></div>
                                                            <?php } ?>
                                                        </h6>
                                                    </div>
                                                    <div class="col-lg-2">&nbsp;</div>
                                                </div> 
                                                <div class="row">
                                                    &nbsp;
                                                </div> 
                                                <div class="row email_row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-8"><label for="username" class="text-center"><strong>Email</strong></label></div>
                                                    <div class="col-lg-2"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-8 text-center"><input type="text" class="input-xlarge" name="username" id="username" style="background-color: #EDEDED;text-align:center" /></div>
                                                    <div class="col-lg-2"></div>
                                                </div>
                                                <div class="row">
                                                    &nbsp;
                                                </div> 
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-8"><label for="password" class="text-center"><strong>Password</strong></label></div>
                                                    <div class="col-lg-2"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-8  text-center"><input type="password" class="input-xlarge" name="password" id="password" class="text-center" style="background-color: #EDEDED;text-align:center"  /></div>
                                                    <div class="col-lg-2">&nbsp;</div>
                                                </div>
                                                 <div class="row">&nbsp;</div>
                                                 <div class="row">&nbsp;</div>
                                                <div class="row login_row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-8"><button type="submit" class="login_button" style="height:35px;">Log In</button></div>
                                                    <div class="col-lg-2"></div>
                                                </div>
                                                <div class="row">
                                                    &nbsp;
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-8"><a class="btn btn-link" id="forgot_password">Forgot Password</a></div>
                                                    <div class="col-lg-2">&nbsp;</div>
                                                </div>
                                            </div><!-- /widget-main -->
                                        </div><!-- /widget-body -->
                                        <div style="background-color: #8D181B; height: 30px;">&nbsp;</div>
                                    </div><!-- /login-box -->
                                </form>
                                <form name="password_recover" id="password_recover" action="<?php echo base_url(); ?>index.php/accounts/forgot_password" method="post" style="display:none;">
                                    <div id="login-box" class="login-box visible no-border">
                                        <div class="widget-body">
                                            <div class="widget-main text-center">
                                                <div class="center">&nbsp;</div>
                                                <div class="row">
                                                        <div class="col-lg-2">&nbsp;</div>
                                                        <div class="col-lg-8 text-center"><img src="<?php echo base_url(); ?>/assets/images/stanford_login_logo.png" class="login_image"></div>
                                                        <div class="col-lg-2">&nbsp;</div>
                                                </div>
                                                <div class="row">&nbsp;</div>
                                                <div class="row">&nbsp;</div>
                                                <div class="row">
                                                    &nbsp;
                                                </div> 
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-8"><label for="email" class="text-center"><strong>Email</strong></label></div>
                                                    <div class="col-lg-2"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-lg-8 text-center"><input type="text" class="input-xlarge" name="email" id="email" style="background-color: #EDEDED;text-align:center" /></div>
                                                    <div class="col-lg-2"></div>
                                                </div>
                                                <div class="row">&nbsp;</div>
                                                <div class="row">&nbsp;</div>
                                                <div class="row">
                                                    &nbsp;
                                                </div> 
                                                <div class="row">
                                                    <div class="col-lg-2">&nbsp;</div>
                                                    <div class="col-lg-8"><button type="submit" class="login_button" style="height:35px;">Get Password</button></div>
                                                    <div class="col-lg-2">&nbsp;</div>
                                                </div>
                                                <div class="row">
                                                    &nbsp;
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-2">&nbsp;</div>
                                                    <div class="col-lg-8"><a class="btn btn-link" id="login_link">Log In</a></div>
                                                    <div class="col-lg-2">&nbsp;</div>
                                                </div>
                                            </div><!-- /widget-main -->
                                        </div><!-- /widget-body -->
                                        <div style="background-color: #8D181B; height: 30px;">&nbsp;</div>
                                    </div><!-- /login-box -->
                                </form>
                            </div><!-- /position-relative -->
                        
                    </div><!-- /.col -->
                </div>
            </div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/aceadmin/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url(); ?>assets/aceadmin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			function show_box(id) {
			 jQuery('.widget-box.visible').removeClass('visible');
			 jQuery('#'+id).addClass('visible');
			}
                        jQuery(function($) {
                           /*$('#forgot_password').click(function(){
                               $('#login_form').hide(); 
                               $('#password_recover').show(); 
                               
                           });*/
                           $('#login_link').click(function(){
                               $('#login_form').show(); 
                               $('#password_recover').hide(); 
                               
                           }); 
                            
                            
                            
                        });
		</script>
	</body>
</html>