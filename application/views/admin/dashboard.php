<?php
    $content = "";
    $header ="";
    if( $this->uri->segment(4) == 'push_success') {
        //echo 'hiiiii';
        echo '<script>$(document).ready(function(){ $("#push_success").modal("show"); });</script>';
    } 
    else if( $this->uri->segment(4) == 'push_failure') {
        //echo 'hiiiii';
        echo '<script>$(document).ready(function(){ $("#push_failure").modal("show"); });</script>';
    } 
    
?>
<div class="page-breadcrumbs" style="padding-left: 22px;">
    <ul class="breadcrumb">
        <li class="active">
            <i class="fa fa-home"></i>
            <!--a href="#"-->&nbsp;Administrator Dashboard<!--/a-->
        </li>
    </ul>
</div>
<div class="page-body">
    <?php echo $adminprofile;?>
    <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">&nbsp;</div>
    <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
    <?php echo $quicktools;?>
    <?php echo $quicktools_weight;?>
    <?php echo $quicktools_attendance;?>
    <?php echo $quicktools_participant;?>
    <?php echo $quicktools_doc;?>
    <?php echo $quicktools_video;?>
    <?php echo $quicktools_push;?>
    <?php //echo $classdata;?>
    <?php echo $classlist;?>
    <?php echo $participantslist;?>
    <?php echo $create_checklist;?>
    <?php echo $create_class;?> 
</div>

<div id="push_success" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Pushed Successfully
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully pushed the documents.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard" class="btn btn-default no_button">OK</a>
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="push_failure" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                     Push Failed
                </h4>
            </div>
            <div class="modal-body">
                <p>Failed to push documents.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard" class="btn btn-default no_button">OK</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>