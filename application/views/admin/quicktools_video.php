<script src="<?php echo base_url();?>assets/custom/js/upload_video.js"></script>
<?php
    $content = "";
    $header ="";
    if( $this->uri->segment(4) == 'video_success') {
        echo '<script>$(document).ready(function(){ $("#video_success_message").modal("show"); });</script>';
    } 
    else if( $this->uri->segment(4) == 'video_failure') {
        echo '<script>$(document).ready(function(){ $("#upload_video_fail").modal("show"); });</script>';
    } 
    else if( $this->uri->segment(4) == 'video_exists') {
        echo '<script>$(document).ready(function(){ $("#upload_video_exists").modal("show"); });</script>';
    } 
?>

<!-- Add participant POPUP and success message -->
<div id="create_video_popup" class="modal fade modal-prm modal-prm-checklist" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Add a Video
                </h4>
            </div>
            <form name="upload_participant" id="create_video" action="<?php echo base_url(); ?>index.php/admin/dashboard/upload" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label for="video_url"><strong>Embed Video</strong></label>
                                </div>
                                <div class="row form-group">
                                    <div class="clearfix">
                                        <input type="text" name="url" id="url" value="" class="form-control input-sm" placeholder="Enter URL here">
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
                                            <input type="file" name="file" id="file" /> 
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
                                        <input type="text" name="title" id="title" value="" class="form-control input-sm" placeholder="Enter text here">
                                    </div>
                                </div> 
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default transparentbutton" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn no_button" id="submit_particiant" value="Create" >
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="video_success_message" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_video_lists" class=" close">×</a>
                <h4 class="modal-title">
                    Video Added
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully added a new video.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_video_lists" class="btn btn-default no_button">OK</a>
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="upload_video_fail" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_video_lists" class=" close">×</a>
                <h4 class="modal-title">
                    Video Uploaded Failed
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
<div id="upload_video_exists" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_video_lists" class=" close">×</a>
                <h4 class="modal-title">
                    Video already Exists
                </h4>
            </div>
            <div class="modal-body">
                <p>Upload Video is already exists.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_video_lists" class="btn btn-default no_button">OK</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

