<script type="text/javascript" src="<?php echo base_url();?>assets/custom/js/admin_update.js"></script>
<?php
    $content = "";
    $header ="";
    if( $this->uri->segment(4) == 'password_update_failure') {
        echo '<script>$(document).ready(function(){ $("#password_update_failure1").modal("show"); });</script>';
    } 
    if( $this->uri->segment(4) == 'Update_failed') {
        echo '<script>$(document).ready(function(){ $("#password_update_failure").modal("show"); });</script>';
    } 
     if( $this->uri->segment(4) == 'Update_Success') {
        echo '<script>$(document).ready(function(){ $("#password_update_success").modal("show"); });</script>';
    } 
     if( $this->uri->segment(4) == 'upload_image_failure') {
        echo '<script>$(document).ready(function(){ $("#image_update_failed").modal("show"); });</script>';
    } 
    if( $this->uri->segment(4) == 'delete_Success') {
        echo '<script>$(document).ready(function(){ $("#delete_Success").modal("show"); });</script>';
    } 
    if( $this->uri->segment(4) == 'delete_failed') {
        echo '<script>$(document).ready(function(){ $("#delete_failed").modal("show"); });</script>';
    } 
?>

<div class="page-breadcrumbs" style="padding-left: 22px;">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo base_url(); ?>index.php/admin/dashboard/index" class="a-color">Administrator Dashboard</a>
        </li>
        <li class="active">
            Edit Profile
        </li>
    </ul>
</div>
<div class="page-body">
    <?php echo $adminprofile;?>
            <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
    <div class="col-lg-3 col-md-1 col-sm-2 col-xs-12"></div>
    <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
        <div class="widget">
            <div class="widget-header bg-prm">
                <span class="widget-caption"><strong>Edit Profile</strong></span>
            </div><!--Widget Header-->
            <div class="widget-body" style="background-color: white;">
                <div class="row">
                    <div class="col-md-4 col-sm-5">
                        <div style="padding-bottom:10px; ">
                             <?php if($values->profile_pic!=''){ ?>
                                <img src="<?php echo base_url();?>assets/images/<?php echo $values->profile_pic;?>" class="admin_padd">
                            <?php } else { ?>
                                <img src="<?php echo base_url();?>assets/images/profile_image.png" class="admin_padd">
                                <?php } ?>
                        </div>
                        <div style="padding-left:10px; ">
                            <button type="submit" class="yes_button" data-toggle="modal" data-target="#upload_picture">Change</button>&nbsp;
                            <a href="<?php echo base_url(); ?>index.php/admin/dashboard" class="menu-text" style="color:blue;">
                                <strong style="color:#0098DB;">Delete</strong>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-5">&nbsp;</div>
                    <div class="col-md-6 col-sm-7 details-res text-right" style="padding-top: 15px !important;">
                        <form id="admin_update_profile" action="<?php echo base_url(); ?>index.php/admin/dashboard/admin_update_details" method="post">
                            <div id="failure_message" style="display:none;">Profile update failed</div>
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" name="admin_name" id="admin_name" placeholder="Name" value="<?php echo $values->full_name;?> ">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" name="admin_email" id="admin_email" placeholder="Email" value="<?php echo $values->email;?>" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" name="admin_phone" id="admin_phone" placeholder="Phone" value="<?php echo $values->work_phone;?>">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control input-sm" name="admin_new_password" id="admin_new_password" placeholder="New Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control input-sm" name="admin_old_password" id="admin_old_password" placeholder="Old Password">
                            </div>
                            <div style="padding-left:10px; ">
                                <a href="<?php echo base_url(); ?>index.php/admin/dashboard" class="menu-text" style="color:blue;">
                                    <strong style="color:#0098DB;">Cancel</strong>
                                </a>&nbsp;
                                <button type="submit" class="yes_button">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!--Widget Body-->
        </div><!--Widget-->
    </div>
</div>
<div id="password_update_failure1" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                   password
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully added a new document.</p>
            </div>
            <div class="modal-footer">
            <a href="<?php echo base_url(); ?>index.php/admin/dashboard" class="btn btn-default no_button">OK</a>            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="upload_picture" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                   Upload Profile Picture
                </h4>
            </div>
            <form action="<?php echo base_url(); ?>index.php/admin/dashboard/edit_profile" name="form" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <input type="hidden" value="<?php echo $values->email;?>" name="email">
                <input type="file" name="file" id="file" /> 
                <br>
            </div>
            <div class="modal-footer">
            <input type="submit" class="btn btn-default no_button" value="Ok">
           </div>
           </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="password_update_failure1" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                   password
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully added a new document.</p>
            </div>
            <div class="modal-footer">
            <a href="<?php echo base_url(); ?>index.php/admin/dashboard" class="btn btn-default no_button">OK</a>            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="password_update_failure" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                   Updation Failed
                </h4>
            </div>
            <div class="modal-body">
                <p>Please enter correct password.</p>
            </div>
            <div class="modal-footer">
            <a href="<?php echo base_url(); ?>index.php/admin/dashboard/admin_update" class="btn btn-default no_button">OK</a>            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
     <div id="password_update_success" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                   Updation Successful
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully updated your profile.</p>
            </div>
            <div class="modal-footer">
            <a href="<?php echo base_url(); ?>index.php/admin/dashboard" class="btn btn-default no_button">OK</a>            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
     <div id="image_update_failed" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                   Failed to update
                </h4>
            </div>
            <div class="modal-body">
                <p>Please Upload png format.</p>
            </div>
            <div class="modal-footer">
            <a href="<?php echo base_url(); ?>index.php/admin/dashboard/admin_update" class="btn btn-default no_button">OK</a>            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="delete_Success" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                   Deleted Succesfully
                </h4>
            </div>
            <div class="modal-body">
                <p>You have succesfully deleted you profile picture.</p>
            </div>
            <div class="modal-footer">
            <a href="<?php echo base_url(); ?>index.php/admin/dashboard" class="btn btn-default no_button">OK</a>            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="delete_failed" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                   Deletion Failed
                </h4>
            </div>
            <div class="modal-body">
                <p>Please try again.</p>
            </div>
            <div class="modal-footer">
            <a href="<?php echo base_url(); ?>index.php/admin/dashboard/admin_update" class="btn btn-default no_button">OK</a>            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="delete_profile" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Delete Profile Picture 
                </h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                            <form action="<?php echo base_url(); ?>index.php/admin/dashboard/delete_profile" class="col-lg-12" method="post">

              <center>  <input type="button" name="" value="No"class="transparentbutton js-modal-close" data-dismiss="modal">
                    <input type="hidden" name="email" value="<?php echo $values->email; ?>">
                    <input type="submit" class="btn yes_button" value="Yes"> </center>
                </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
<?php echo $quicktools_weight;?>
<?php echo $quicktools_attendance;?>
<?php echo $quicktools_doc;?>
<?php echo $quicktools_video;?>
<?php echo $quicktools_participant;?>
<?php echo $create_checklist;?>
<?php echo $create_class;?>