<script src="<?php echo base_url();?>assets/custom/js/push_participant.js"></script>

<style type="text/css">
.modal-prm-checklist .modal-body{
}
.modal-prm-checklist .modal_height1{
min-height: 350px !important;
}
</style>
<!-- Add participant POPUP and success message -->
<div id="push_participant_popup" class="modal fade modal-prm modal-prm-checklist" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Push to Participants
                </h4>
            </div>
            <form name="upload_participant" id="push_participant" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label for="videotype"><strong>Media Type</strong></label>
                                </div>
                                <div class="row form-group">
                                    <div class="clearfix">
                                        <select id="videotype" name="video_type" class="form-control">
                                           <!-- <option value="Yes">Video</option>-->
                                                <option value="">Choose Type</option>
                                            <?php for ($i = 0;$i < count($videos);$i++){?>
                                                <option value=<?php print_r($videos[$i]->file_name); ?>><?php print_r($videos[$i]->file_name); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <label for="participant_id"><strong>File Name</strong></label>
                                </div>
                                <div class="row form-group">
                                    <div class="clearfix">
                                        <select id="attend_class" name="doc_file" class="form-control">
                                            <option value="">Select the File</option>
                                              <?php for ($i = 0;$i < count($docs);$i++){?>
                                                <option value=<?php print_r($docs[$i]->file_name); ?>><?php print_r($docs[$i]->file_name); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                             <div class="col-lg-5">
                                <div class="row">
                                    <label for="time_to_push"><strong>Time to Push</strong></label>
                                </div>
                                <div class="row input-group">
                                    <div class='input-group date end_date' id='date'>
                                            <input type='text' class="form-control" name="date" value="" />
                                            <span class="input-group-addon"><i class="icon-large ace-icon fa fa-calendar"></i></span>
                                     </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <label for="class_to_push"><strong>Class to Push</strong></label>
                                </div>
                                <div class="row form-group">
                                    <div class="clearfix">
                                        <select id="class_to_push" name="class_to_push" class="form-control">
                                            <option value="">Choose class</option>
                                            <?php for ($i = 0;$i < count($class_details);$i++){?>
                                                <option value=<?php print_r($class_details[$i]->class_name); ?>><?php print_r($class_details[$i]->class_name); ?></option>
                                            <?php } ?>
                                        </select>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Video Added
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully added a new video.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard" class="btn btn-default no_button">OK</a>
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="upload_video_fail" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Video Uploaded Failed
                </h4>
            </div>
            <div class="modal-body">
                <p>It accepts only mp4 type of video's.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard" class="btn btn-default no_button">OK</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
