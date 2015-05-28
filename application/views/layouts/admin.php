<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PRM</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- basic styles -->

        <link href="<?php echo base_url(); ?>/assets/aceadmin/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/aceadmin/css/font-awesome.min.css" />
        
        <!-- page specific plugin styles -->

        <!-- fonts -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/aceadmin/css/ace-fonts.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/aceadmin/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/aceadmin/css/ace-rtl.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/aceadmin/css/ace-skins.min.css" />
        
        <!-- inline styles related to this page -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/custom/css/main.css">

        <!-- ace settings handler -->
        <script src="<?php echo base_url(); ?>/assets/aceadmin/js/ace-extra.min.js"></script>
        <link href="<?php echo base_url(); ?>/assets/custom/css/modified.css" rel="stylesheet">
        
        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/aceadmin/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/aceadmin/js/bootstrap-datepicker.js" charset="UTF-8"></script>
        
    </head>

    <body>
        <div class="se-pre-con"></div>
        <div class="navbar navbar-default posfixed" id="navbar">
            <script type="text/javascript">
                    try{ace.settings.check('navbar' , 'fixed')}catch(e){}
            </script>
            <div class="navbar-container" id="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <span class="span3">
                            <img src="<?php echo base_url(); ?>/assets/images/stanford_header_logo.png">
                        </span>
                    </a><!-- /.brand -->
                    <!--div class="btn-group btn-group-vertical">
                        <hr class="hr_user">
                        <hr class="hr_user">
                        <hr class="hr_user">
                    </div-->
                </div><!-- /.navbar-header -->
                <ul class="nav ace-nav pull-right usermenulist">
                    <li>
                        <img src="<?php echo base_url(); ?>assets/images/icon_profile.png" />
                        <span class="userprofile">
                            <?php echo " ".ucwords(strtolower($this->session->userdata('first_name')));?> <?php echo " ".ucwords(strtolower($this->session->userdata('last_name')));?>
                        </span>
                    </li>
                    <li class="settingmenu">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"></a>
                        <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
                            <li>
                                <a href="<?php echo base_url();?>index.php/accounts/signout">
                                    <i class="icon-off"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.container -->
        </div>
        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>
            <div class="main-container-inner">
                <a class="menu-toggler" id="menu-toggler" href="#">
                    <span class="menu-text"></span>
                </a>
                <div class="sidebar sidefixed" id="sidebar">
                    <script type="text/javascript">
                        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
                    </script>
                    <div style="padding:14px 3px 5px 12px;color:#8D181B;">
                        <form class="form-search">
                            <i class="icon-search icon-on-right bigger-110"></i>&nbsp;
                        </form>
                    </div>  
                    <ul class="nav nav-list">
                        <li class="<?= ($action == 'dashboard') ? 'active' : '' ?>">
                            <a href="<?php echo base_url(); ?>index.php/admin/dashboard/index" class="dropdown-toggle">
                                <i class="icon-star"></i>
                                <span class="menu-text">Admin Dashboard</span>
                            </a>
                        </li>
                        <li class="<?= ($action == 'participants') ? 'active' : '' ?>">
                            <a href="<?php echo base_url(); ?>index.php/admin/participants/index" class="dropdown-toggle">
                                    <i class="icon-group"></i>
                                    <span class="menu-text">Participants</span>
                            </a>
                        </li>
                        <li class="<?= ($action == 'studyresult') ? 'active' : '' ?>">
                            <a href="<?php echo base_url(); ?>index.php/admin/studyresult/index" class="dropdown-toggle">
                                    <img src="<?php echo base_url(); ?>/assets/images/icon_admin_studyresults.png" style="padding-left:6px;">
                                    <span class="menu-text" style="padding-left: 10px;">Study Results</span>
                            </a>
                        </li>
                    </ul><!-- /.nav-list -->
                    <script type="text/javascript">
                        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
                    </script>
                </div>
                <div class="main-content">
                    <div class="breadcrumbs" id="breadcrumbs" style="background-color:#D8D8D8;">
                        <div class="breadcrumb">
                            <div class="active" style="padding-left:30px;color:#000;"><strong>Stanford PRM Dashboard - ADMIN</strong></div>
                        </div><!-- /.breadcrumb -->
                    </div>
                    <div class="page-content" style="background-color:#EEEEEE;">
                        <div class="row pagecontent_style">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                    <?php echo $content;?>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div><!-- /.main-content -->
            </div><!-- /.main-container-inner -->
            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="icon-double-angle-up icon-only bigger-110"></i>
            </a>
        </div>
        <!-- basic scripts -->
        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo base_url(); ?>/assets/aceadmin/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
        </script>
        <!-- <![endif]-->
        <!--[if IE]>
        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo base_url(); ?>/assets/aceadmin/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
        </script>
        <![endif]-->
        <script type="text/javascript">
            if("ontouchend" in document) document.write("<script src='<?php echo base_url(); ?>/assets/aceadmin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="<?php echo base_url(); ?>/assets/aceadmin/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/aceadmin/js/typeahead-bs2.min.js"></script>

        <!-- page specific plugin scripts -->
        <script src="<?php echo base_url(); ?>/assets/aceadmin/js/jquery-ui-1.10.3.full.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/aceadmin/js/jquery.ui.touch-punch.min.js"></script>

        <!-- ace scripts -->

        <script src="<?php echo base_url(); ?>/assets/aceadmin/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/aceadmin/js/ace.min.js"></script>
        <!-- inline scripts related to this page -->
    </body>
</html>