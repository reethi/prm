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
</style>
<?php
    $content = "";
    $header ="";
    if( $this->uri->segment(4) == 'attendance_success_message') {
        echo '<script>$(document).ready(function(){ $("#attendance_success_message").modal("show"); });</script>';
    }
?>
<script src="<?php echo base_url();?>assets/custom/js/submit_attendence.js"></script>

<!--<script src="<?php echo base_url();?>assets/beyondadmin/js/bootbox/bootbox.js"></script> -->

<!-- JS files for calander and validations -->
 <!--   <link href="<?php echo base_url(); ?>assets/beyondadmin/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/beyondadmin/js/moment-with-locales.js"></script>
    <script src="<?php echo base_url(); ?>assets/beyondadmin/js/bootstrap-datetimepicker.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/beyondadmin/js/validate.min.js"></script>

<!--Add Attendance POPUP and success message-->
<div id="add_attendance_pop" class="modal fade modal-prm modal-prm-checklist" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <form name="add_attendance" id="add_attendance" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">
                       Submit Attendance
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-5">
                        <div class="row">
                            <label for="participant_id">Select Class</label>
                        </div>
                        <div class="row form-group">
                            <div class="clearfix">
                                 <select id="class_val" name="class_val" class="form-control">
                                        <option value="">--select--</option>
                                         <?php foreach ($classes as $key => $value) {?>
                                            <option value="<?php echo $value->id; ?>"><?php echo $value->class_name; ?> </option>
                                        <?php } ?>
                                </select>     
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                        <div class="row">
                            <label for="participant_id">Select Date</label>
                        </div>
                        <div class="row input-group">
                            <div class='input-group date end_date' id='date'>
                                    <input type='text' class="form-control" name="date" value="" />
                                    <span class="input-group-addon"><i class="icon-large ace-icon fa fa-calendar"></i></span>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
                        <div class="row body_scroll">
                            <table class="table table-striped table-bordered table-hover" id="attendance_list">
                                <thead>
                                    <tr>
                                        <th>
                                           Name 
                                        </th>
                                        <th>
                                            Weight
                                        </th>
                                        <th class="text-center">
                                            Attended?
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($participant_details)){ for($i=0;$i<count($participant_details);$i++){ ?>
                                        <tr>
                                            <td class="blue col-lg-6">
                                                <input type="hidden" name="participant_id[]" id="participant_id" value="<?php echo $participant_details[$i]->id;?>"/>
                                                <a href="#"><?php echo $participant_details[$i]->username; ?></a>
                                            </td>
                                            <td class="col-lg-2">
                                                <div class=" form-group" style="margin-right: 0px !important;margin-left: 0px !important;">
                                                    <div class="clearfix">
                                                        <input type="text" name="weight[]" id="weight<?php echo $i;?>" class="form-control col-lg-6">
                                                    </div>
                                                </div> 
                                            </td>
                                            <td class="col-lg-4">
                                                <label>
                                                    <input type="radio" name="yes_<?php echo $i; ?>" value="1" class="colored-blue" checked />
                                                    <span class="text">Yes</span>&nbsp;&nbsp;
                                                </label>
                                                <label>
                                                    <input type="radio" name="yes_<?php echo $i; ?>" value="2" class="colored-blue" />
                                                    <span class="text">No</span>
                                                </label>
                                            </td>
                                        </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <script>
                        //InitiatesubmitAttendanceListTable.init();
                    </script>
                </div>
                <div class="modal-footer" style="margin-top: 16px;">
                        <button data-bb-handler="Cancel"  data-dismiss="modal" type="button" class="btn transparentbutton js-modal-close">
                                Cancel
                        </button>
                        <input type="submit" class="btn no_button" value="Submit">
                </div>
            </div>
        </div>
    </form>
</div>
<div id="attendance_success_message_table" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top:5.5% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="float: right;">×</button>
                <i class="fa fa-minus " style="float: right;padding:7px 10px 10px;"></i>
                <i class="fa fa-expand " style="float: right;padding:7px 10px 10px;"></i>
                    <h4 class="modal-title">
                        Class Attendance
                    </h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="widget">
                        <div class="widget-body table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="ClassAttendanceList">
                                <thead>
                                    <tr>
                                        <th>
                                            Username
                                        </th>
                                        <th>
                                            Email
                                        </th>

                                        <th>
                                            Points
                                        </th>
                                        <th>
                                            Joined
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php for($i=0;$i<count($participant_details);$i++){ ?> 
                                    <tr>
                                        <td>
                                            <?php echo $participant_details[$i]->username; ?>
                                        </td>
                                        <td>
                                            <form name="upload_batch1" id="upload_batch1" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                             <a href="" class="a-color"><?php echo $participant_details[$i]->email; ?></a>
                                            </form>
                                        </td>
                                       
                                        <td class="center ">
                                           120
                                        </td>
                                        <td class="center ">
                                           12 Jan 2012
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody> 
                            </table>
                        </div>
                    </div><!--Widget-->
                </div>
                <script>
                    InitiateClassAttendanceListTable.init();
                </script>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="attendance_success_message" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Attendance Submitted
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully submitted attendance.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default no_button" data-dismiss="modal">Ok</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="attendance_failure_message" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Attendance Submission failed
                </h4>
            </div>
            <div class="modal-body">
                <p>Attendance submit failed.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default no_button" data-dismiss="modal">Ok</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
