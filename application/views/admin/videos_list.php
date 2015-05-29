<style>
.DTTT.btn-group {
  position: relative;
  right: 80px !important;
  top: 0px;
  float:right;
}
.ui-datepicker-inline{
   display:none !important;
}
.DTTTFooter
{
    visibility: visible !important;
    display: block !important;
}
.title_edit{
    cursor: pointer;
    float:right;
    margin-right: 30px;
    margin-top: 3px;
}

</style>
<?php
    $content = "";
    $header ="";
    if( $this->uri->segment(4) == 'video_edit_popup') {
        //echo 'hiiiii';
        echo '<script>$(document).ready(function(){ $("#edit_video_list").modal("show"); });</script>';
    } 
    else if( $this->uri->segment(4) == 'video_delete_popup') {
        //echo 'hiiiii';
        echo '<script>$(document).ready(function(){ $("#delete_video").modal("show"); });</script>';
    } 
    else if( $this->uri->segment(4) == 'video_edit_failure') {
        echo '<script>$(document).ready(function(){ $("#edit_video_list_fail").modal("show"); });</script>';
    } 
    else if( $this->uri->segment(4) == 'video_delete_failure') {
        echo '<script>$(document).ready(function(){ $("#video_delete_failure").modal("show"); });</script>';
    } 
     else if( $this->uri->segment(4) == 'video_edit_success') {
        echo '<script>$(document).ready(function(){ $("#edit_video_list_success").modal("show"); });</script>';
    } 
    else if( $this->uri->segment(4) == 'video_delete_success') {
        echo '<script>$(document).ready(function(){ $("#video_delete_success").modal("show"); });</script>';
    } 
    $data=$this->session->userdata('edit_videos');
    //print_r($data);
?>
<?php //echo "hi";echo"<pre>";print_r($result);exit; ?>
<!-- Data Grid -->
<style type="text/css">
    .btn .yes_button:focus {
    color: #fff;
    background-color: #0098DB;
    border-color: #CCC;
}
</style>
<script src="<?php echo base_url();?>assets/custom/js/beyondadmin.custom.js"></script>
<link href="<?php echo base_url();?>assets/beyondadmin/css/dataTables.bootstrap.css" rel="stylesheet" />
<div class="page-content">
    <div class="page-body">
    <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
        <div class="widget"style="min-height:400px;">
            <div class="widget-header bg-prm">
                <span class="widget-caption"><strong>Videos List</strong></span>
                <span class="widget-subcaption" id="add_submit_weight" style="cursor: pointer;">
                    <a href="#"data-toggle="modal" data-target="#create_video_popup"><strong style="color:#fff;">+ Add Video</strong></a>
                </span>
            </div>
            <div class="widget-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="videoslist">
                                <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Video Title
                                        </th>
                                        <th>
                                            Video Type
                                        </th>
                                        <th>
                                            Video Name
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $j=0; for($i=0;$i<count($videos);$i++){ $j++; ?> 
                                    <tr>
                                        <td class="col-md-1">
                                            <?php echo $j; ?>
                                        </td>
                                        <td class="col-md-3">
                                            <?php echo $videos[$i]->file_title; ?>
                                        </td>
                                        <td class="col-md-2">
                                            <?php echo $videos[$i]->file_type; ?>
                                        </td>
                                        <td class="col-md-3">
                                            <?php echo $videos[$i]->file_name; ?>
                                        </td>
                                        <td class="col-md-3">
                                                <a target="_blank" href="<?php echo base_url()?>uploads/videos/<?php echo $videos[$i]->file_name?>"class="col-lg-3 yes_button">
                                                    View
                                                </a>
                                                <form action="<?php echo base_url(); ?>index.php/admin/dashboard/edit_videos" class="col-lg-3" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $result[$i]->id; ?>">
                                                    <input type="submit" class="yes_button" value="Edit">
                                                </form>
                                                <form action="<?php echo base_url(); ?>index.php/admin/dashboard/delete_videos" class="col-lg-3" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $result[$i]->id; ?>">
                                                    <input type="submit" class="yes_button" style="background-color:#8D181B !important;margin-left:5px;" value="X">
                                                </form>
                                                <a download href="<?php echo base_url()?>uploads/videos/<?php echo $videos[$i]->file_name?>"class="col-lg-2 yes_button"style="margin-left: 10px;padding: 8px 11px 9px;">
                                                    <span class="glyphicon glyphicon-download-alt pull-right"></span>
                                                </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody> 
                            </table>
            </div>
        </div>
    </div>
    <!--Widget-->
</div>
</div>
<?php if(isset($data) && count($data)>0) { ?>
<div id="edit_video_list" class="modal fade modal-prm modal-prm-checklist" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Edit a Video
                </h4>
            </div>
            <form name="upload_participant" id="create_video" action="<?php echo base_url(); ?>index.php/admin/dashboard/videoUploadEdit" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label for="video_url"><strong>Embed Video</strong></label>
                                </div>

                                <div class="row form-group">
                                    <div class="clearfix">
                                        <input type="text" name="url" id="url" value="<?php echo $data[0]->file_url; ?>" class="form-control input-sm" placeholder="Enter URL here">
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-11 col-md-7 col-sm-12 col-xs-12">
                                <div class="row">
                                    <label for="video_file"><strong>Upload Video</strong></label>
                                </div>
                                <div class="row form-group">
                                    <div class="">
                                        <div class="col-lg-8 col-sm-12 col-xs-12 input-group input-group-sm">
                                            <!--<input type="text" class="form-control">
                                            <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" style="color:#0098DB;">Browse</button>
                                            </span>
                                            <label for="file"><span>Filename:</span></label>-->
                                            <input type="hidden" name="old_file" value="<?php echo $data[0]->file_name; ?>">
                                            <input type="file" name="file" id="file" /> 
                                            <span><?php echo $data[0]->file_name; ?> (Old File)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-11">
                                <div class="row">
                                    <label for="video_title"><strong>Video Title</strong></label>
                                </div>
                                <div class="row form-group">
                                    <div class="clearfix">
                                        <input type="text" name="title" id="title" value="<?php echo $data[0]->file_title; ?>" class="form-control input-sm" placeholder="Enter text here">
                                    </div>
                                </div> 
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($data[0]->id) && count($data[0]->id)>0) { ?>
                    <div class="modal-footer">
                        <input type="hidden" value="<?php if(isset($data[0])) { echo $data[0]->id; } ?>" name="user_id">
                        <button type="button" class="btn btn-default transparentbutton" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn no_button" id="submit_particiant" value="Create" >
                    </div>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
<div id="edit_video_list_fail" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Video Upload Failed
                </h4>
            </div>
            <div class="modal-body">
                <p>It accepts only mp4 type of video's.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_video_lists" class="btn btn-default no_button">OK</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="edit_video_list_success" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Video Updated 
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully Updated the old Video.</p>
            </div>
            <div class="modal-footer">
            <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_video_lists" class="btn btn-default no_button">OK</a>            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="delete_video" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Delete Video 
                </h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <form action="<?php echo base_url(); ?>index.php/admin/dashboard/delete_video_row" class="col-lg-12" method="post">
                    <center><input type="button" name="" value="No"class="transparentbutton js-modal-close" data-dismiss="modal">
                    <input type="hidden" name="id" value="<?php echo $data[0]->id; ?>">
                    <input type="submit" class="yes_button" value="Yes"> </center>
                </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
 <div id="video_delete_failure" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Failed to delete
                </h4>
            </div>
            <div class="modal-body">
                <p>Video can't be deleted.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_video_lists" class="btn btn-default no_button">OK</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    <div id="video_delete_success" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Successfully Deleted
                </h4>
            </div>
            <div class="modal-body">
                <p>Video deleted Succesfully.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_doc_lists" class="btn btn-default no_button">OK</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>

    </div>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/ZeroClipboard.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/datatables-init.js"></script>
<script type="text/javascript">
    InitiatevideosListTable.init();
    
</script>
