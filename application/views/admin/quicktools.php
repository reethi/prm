
<style>
.btn:focus {
    background-color: #0098DB;
}
</style>
<script src="<?php echo base_url();?>assets/beyondadmin/js/bootbox/bootbox.js"></script>
<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 quick_tools">
    <div class="widget">
        <div class="widget-header bg-prm">
            <span class="widget-caption"><strong>Quick Tools</strong></span>
        </div>
        <div class="widget-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="hr_quicktools">Classes and Participants</div>
                    <div class="buttons-preview">
                        <a class="btn yes_button add_participant_open" data-toggle="modal" data-target="#add_participant_popup">Add Participant</a>
                        <a class="btn yes_button submit_weight_open" data-toggle="modal" data-target="#submit_weight_pop">Submit Weight</a>
                        <a class="btn yes_button add_attendance_open" data-toggle="modal" data-target="#add_attendance_pop">Submit Attendance</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-10">
                    <div class="hr_quicktools">Documents and Videos</div>
                    <div class="buttons-preview">
                        <a class="btn yes_button upload_doc_open" href="<?php echo base_url(); ?>index.php/admin/dashboard/get_doc_lists">Upload Doc</a>
                        <a class="btn yes_button upload_video_open" href="<?php echo base_url(); ?>index.php/admin/dashboard/get_video_lists">Upload Video</a>
                        <a class="btn yes_button" id="push_participant_open"data-toggle="modal"data-target="#push_participant_popup">Push to Participants</a>
                    </div>
           </div>
    </div><!--Widget-->
</div>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/ZeroClipboard.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/datatables-init.js"></script>
