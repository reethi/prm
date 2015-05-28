<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PRM</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link href="<?php echo base_url(); ?>/assets/aceadmin/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/aceadmin/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/aceadmin/css/ace-fonts.css" />

        
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/custom/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/aceadmin/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/aceadmin/css/ace-rtl.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/aceadmin/css/ace-skins.min.css" />
        <link href="<?php echo base_url(); ?>/assets/custom/css/modified.css" rel="stylesheet">

        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/aceadmin/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
        <script src="<?php echo base_url(); ?>/assets/aceadmin/js/ace-extra.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/aceadmin/js/bootstrap-datepicker.js" charset="UTF-8"></script>

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

    
    </head>

    <body style="background-color:#EEEEEE;" >
    <?php if($login){?>
        <script type="text/javascript">
            $( document ).ready(function() {
                $('#myModal').modal('show');
            });
        </script>
        <!-- Modal -->
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" style="width:100%;">
                <div class="modal-content" style="border:0px !important;">
                    <!--Modal Content Starts Here-->
                        
                        <div class="col-md-7 col-sm-7" style="background:white;margin-right:0px;min-height:225px;border-width:1px 1px 1px 1px; border-style: solid; border-color: #DDD;">
                            <div class="row">&nbsp;</div>
                            <div class="col-md-4 col-sm-5 ">
                                <img src="<?php echo base_url();?>assets/images/dustin_profile_image.png">
                            </div>
                            <div class="col-md-5 col-sm-7 details-res">
                                <strong><h3><?php echo $values->first_name;?> <?php echo $values->last_name;?></h3></strong>
                                <strong>Diet:</strong> <?php  echo $profile->diet;?><br>
                                <strong>Class:</strong> <?php echo $profile->class_name;?><br>
                                <strong>Health Educator:</strong> Jane Doe[<a href="" style="color:#0098DB;">email</a>]
                            </div>
                            <div class="col-md-3 col-sm-7 details-edit text-right" style="padding-top:160px;padding-bottom: 10px;">
                                &nbsp;
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 text-center" style="background-color: white;height:75px; border-width:1px 1px 1px 1px; border-style: solid; border-color: #DDD;padding-top: 20px;">
                            <h4><b>Participant ID: <?php echo $values->participant_id;?></b></h4>
                        </div>
                        <div class="col-md-5 col-sm-5 text-center" style="background-color: white;height:75px; border-width:1px 1px 1px 1px; border-style: solid; border-color: #DDD;padding-top:20px;">
                            <i class="icon-map-marker mapicon_result" style="vertical-align:middle;"></i>&nbsp;
                            <?php if($values->address!=''){
                                echo $values->address;
                            }
                            if($values->city!=''){
                                echo ",".$values->city;
                            }
                            if($values->state!=''){
                                echo ",".$values->state;
                            }
                            if($values->zip!='0'){
                                echo ",".$values->zip;
                            }
                            ?>
                        </div>
                        <div class="col-md-2 col-sm-2 text-center" style="background-color: white;height:75px; border-width:1px 1px 1px 1px; border-style: solid; border-color: #DDD;padding-top: 20px;">
                            <i class="icon-phone mapicon_result"></i>&nbsp;<?php echo $values->phone;?>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 text-center" style="background-color: white;height:75px; border-width:1px 1px 1px 1px; border-style: solid; border-color: #DDD;padding-top: 20px;">
                            <i class="icon-envelope mapicon_result"></i>&nbsp;<?php echo $values->email;?>
                        </div>

                        <div class="modal-content popup2">
                            <div style="border-bottom:5px solid #8D181B !important;padding:10px 0 5px 20px !important;background-color:#F5F5F5 !important;">
                                <h5><strong>Please Verify</strong></h5>
                            </div>
                            <div class="modal-body">
                                <strong>Is the above Information in your profile correct?</strong>
                            </div>
                            <div class="modal-footer login_footer" style="background-color:#F5F5F5 !important;">
                                    <button  onClick="window.location.href='<?php echo base_url(); ?>index.php/dashboard/update_details'" class="no_button js-modal-close" style="height:35px;">No, I want to update.</button>&nbsp;
                                    <button onClick="window.location.href='<?php echo base_url(); ?>index.php/result'" class="yes_button js-modal-close" style="height:35px;">Yes</button></div>
                            </div>
                        </div>
                    <!--Modal Content Ends Here-->
                </div>
            </div>
        </div>

    <?php } ?>
    
    <div class="navbar navbar-default posfixed" id="navbar" style="background-color:#8D181B;" >
        <script type="text/javascript">
                try{ace.settings.check('navbar' , 'fixed')}catch(e){}
        </script>
        <div class="navbar-container" id="navbar-container">
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <span class="span3"><img src="<?php echo base_url(); ?>/assets/images/stanford_header_logo.png"></span>
                </a>
            </div><!-- /.navbar-header -->
              
            <ul class="nav ace-nav pull-right usermenulist">
                <li>
                    <img src="<?php echo base_url(); ?>assets/images/icon_profile.png" />
                    <span style="color:#FFF;padding: 15px;">
                       <?php echo $this->session->userdata('first_name');?> <?php echo $this->session->userdata('last_name');?>
                    </span>
                    
                </li>
                <li style="border-left:none !important;">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="background-color:#8D181B !important" >
                            <i class="icon-cog"></i>    
                        </a>
                        <ul class="pull-right dropdown-menu dropdown-yellow dropdown-caret">
                            <li>
                                <a href="<?php echo base_url();?>index.php/accounts/signout">
                                    <i class="icon-off"></i>
                                    Logout
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
                               <!--<input type="text" class="input-medium search-query" style="height:30px;border-radius:5px;" /> !-->
                    </form>
        </div>  
        <ul class="nav nav-list">
                    <li class="<?= ($action == 'dashboard') ? 'active' : '' ?>">
                            <a href="<?php echo base_url(); ?>index.php/dashboard/profile" class="dropdown-toggle">
                                    <i class="icon-star"></i>
                                    <span class="menu-text">Dashboard</span>
                            </a>
                    </li>
                    <li class="<?= ($action == 'result') ? 'active' : '' ?>">
                            <a href="<?php echo base_url(); ?>index.php/result" class="dropdown-toggle">
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
                    <div class="breadcrumb" style="padding-left:10px;color:#565656;"><strong>Stanford PRM Dashboard</strong></div>
                </div>
                <div class="page-content" style="background-color:#EEEEEE;padding-left:20px;">
                    <!-- PAGE CONTENT BEGINS -->
                        <?php echo $content;?>
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.page-content -->
            </div><!-- /.main-content -->
    </div><!-- /.main-container-inner -->
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="icon-double-angle-up icon-only bigger-110"></i>
        </a>
    </div>
    </body>
</html>