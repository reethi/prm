<script src="<?php echo base_url();?>assets/aceadmin/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url();?>assets/custom/js/add_participant.js"></script>

<?php
    $content = "";
    $header ="";
    if( $this->uri->segment(4) == 'video_success') {
        echo '<script>$(document).ready(function(){ $("#video_success_message").modal("show"); });</script>';
    } 
    else if( $this->uri->segment(4) == 'upload_video_fail') {
        echo '<script>$(document).ready(function(){ $("#upload_video_fail").modal("show"); });</script>';
    } 
?>
<style type="text/css">
    .modal.in .modal-dialog .modal_height2{
        margin-top: -19% !important;
    }
</style>
<!-- Add participant POPUP and success message -->
<div id="add_participant_popup" class="modal fade modal-prm modal-prm-checklist" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Add a Participant
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form name="upload_batch" id="upload_batch" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="col-lg-12">
                                <div class="col-lg-11 col-md-7 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <label for="participant_id"><strong>Upload Batch</strong></label>
                                    </div>
                                    <div class="row form-group">
                                        <div class="">
                                            <div class="col-lg-8 col-sm-12 col-xs-12 input-group input-group-sm">
                                                <input type="text" class="form-control">
                                                <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" style="color:#0098DB;">Browse</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form name="upload_participant" id="upload_participant" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <label for="participant_id"><strong>Add Individual</strong></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <label for="participant_name">Name</label>
                                    </div>
                                    <div class="row form-group">
                                        <div class="clearfix">
                                            <input type="text" name="participant_name" id="participant_name" value="" class="form-control input-sm">
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-lg-1">&nbsp;</div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <label for="diet">Diet</label>
                                    </div>
                                    <div class="row form-group">
                                        <div class="clearfix">
                                            <select id="diet" name="diet" class="form-control">
                                                <option value="">Select Diet</option>
                                                <?php foreach ($diet as $key => $value) {?>
                                                    <option value="<?php echo $value->id;?>"><?php echo $value->diet_name;?></option>    
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <label for="participant_id">Participant ID</label>
                                    </div>
                                    <div class="row form-group">
                                        <div class="clearfix">
                                            <input type="text" name="participant_id" id="participant_id" value="" class="form-control input-sm">
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <label for="class_name">Class</label>
                                    </div>
                                    <div class="row form-group">
                                        <div class="clearfix">
                                            <select id="class_name" name="class_name" class="form-control">
                                                <option value=""> Select Class Name</option>
                                                <?php foreach ($class_time as $key1 => $value1) {?>
                                                    <option value="<?php echo $value1->id;?>"><?php echo $value1->class_time_name;?></option>    
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <label for="address">Address</label>
                                    </div>
                                    <div class="row form-group">
                                        <div class="clearfix">
                                            <input type="text" name="address" id="address" value="" class="form-control input-sm">
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <label for="phone">Phone</label>
                                    </div>
                                    <div class="row form-group">
                                        <div class="clearfix">
                                            <input type="text" name="phone" id="phone" value="" class="form-control input-sm">
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-lg-1">&nbsp;</div>
                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="row form-group">
                                        <div class="clearfix">
                                            <input type="text" name="email" id="email" value="" class="form-control input-sm">
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
            </form>
        </div>
    </div>
</div>
<div id="participant_success_message" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Participants Added
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully added more participants.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default no_button" data-dismiss="modal">Ok</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="participant_failure_message" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Participants adding failed
                </h4>
            </div>
            <div class="modal-body">
                <p>Adding particiants failed.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default no_button" data-dismiss="modal">Ok</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>