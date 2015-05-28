<div class="page-breadcrumbs">
    <ul class="breadcrumb">
        <li class="active">
            <i class="fa fa-home"></i>
            <!--a href="#"-->&nbsp;Administrator Dashboard<!--/a-->
        </li>
    </ul>
</div>
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Administrator Dashboard
        </h1>
    </div>
</div>

<div class="page-body">
    <!--- Block for top Class name and Other details ---->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cohort_header">
        <div class="row">&nbsp;</div>
        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class=" text-center">
                <h1 class="text-center">
                    Cohort 1A
                </h1>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">Monday's @ 2pm | 32 Participants</div>
                <div class="row">&nbsp;</div>
                <div class="row">
                
                        <div class="col-md-12  col-sm-12 col-xs-12 buttons-preview"><br></div>
                        <button id="add_participant_open" class="yes-button cohort_participant">Add Participants</button>
                      <button id="submit_weight_open" class="yes-button cohort_weight">Add Weight</button>
                     <button id="add_attendance_open" class="yes-button cohort_attendance">Add Attendance</button>
                </div>
            </div>
        </div>
    </div>
    <!--- top bloc end ----->

<div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">&nbsp;</div>
<!--- graph Block---->
<script src="<?php echo base_url();?>assets/beyondadmin/js/charts/morris/raphael-2.0.2.min.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/charts/morris/morris.js"></script>
<script src="<?php echo base_url();?>assets/custom/js/beyondadmin.custom.js"></script>

    
<script type="text/javascript">
    
    $( document ).ready(function() {
        themeprimary = getThemeColorFromCss('themeprimary');
        themesecondary = getThemeColorFromCss('themesecondary');
        themethirdcolor = getThemeColorFromCss('themethirdcolor');
        themefourthcolor = getThemeColorFromCss('themefourthcolor');
        themefifthcolor = getThemeColorFromCss('themefifthcolor');

        InitiateLineChart.init();
        InitiateLineChart2.init();
        
        $('#line-chart-2').hide();
        
        $('#graphbuttons1').click(function(){
            $('#graphbuttons2').removeClass('graphactive');
            $('#graphbuttons1').addClass('graphactive');
            $('#bar-chart').show();
            $('#bar-chart-2').hide();
            
        });
        
        $('#graphbuttons2').click(function(){
            $('#graphbuttons1').removeClass('graphactive');
            $('#graphbuttons2').addClass('graphactive');
            $('#bar-chart-2').show();
            $('#bar-chart').hide();
        });
        
    });
    
    
</script>
    <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
    <div class="widget">
        <div class="widget-header bg-prm">
            <span class="widget-caption"><strong>Class Averages</strong></span>
        </div>
        <div class="widget-body">
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" id="graphbuttons1" class="btn btn-default graphactive">Weight</button>
                <button type="button" id="graphbuttons2" class="btn btn-default">Attendance</button>
            </div>
            <div id="line-chart" class="table-responsive chart chart-lg"></div>
            <div id="line-chart-2" class="table-responsive chart chart-lg"></div>
        </div>
    </div><!--Widget-->
</div>

<!-- Data Grid -->
<link href="<?php echo base_url();?>assets/beyondadmin/css/dataTables.bootstrap.css" rel="stylesheet" />
    <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bg-prm">
                <span class="widget-caption"><strong>Your Classes</strong></span>
            </div>
        <div class="widget-body">
        <div class="table-responsive">
            <table class="table table-hover" id="your_class_list">
                <thead>
                    <tr>
                        <th>
                            <div class="checker"><span class=""><input type="checkbox" class="group-checkable" data-set="#flip .checkboxes"></span></div>
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Participant ID
                        </th>
                        <th>
                            Diet
                        </th>
                        <th>
                            Class
                        </th>
                         <th>
                            Email
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Phone
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="checker"><span class=""><input type="checkbox" class="checkboxes" value="1"></span></div>
                        </td>
                        <td class="blue">
                            Dustin Yoder
                        </td>
                        
                        <td>
                            12033222
                        </td>
                        <td class="center ">
                            Low fat
                        </td>
                        <td>
                            Mon @ 3.00pm
                        </td>
                        <td>
                            dustin@sureify.com
                        </td>
                        <td>
                            123,Street,City,State,Zip
                        </td>
                        <td class="center ">
                            408.123.4567
                    </tr>
                    <tr>
                        <td>
                            <div class="checker"><span class=""><input type="checkbox" class="checkboxes" value="1"></span></div>
                        </td>
                        <td class="blue">
                            Dustin Yoder
                        </td>
                        
                        <td>
                            12033222
                        </td>
                        <td class="center ">
                            Low fat
                        </td>
                        <td>
                            Mon @ 3.00pm
                        </td>
                        <td>
                            dustin@sureify.com
                        </td>
                        <td>
                            123,Street,City,State,Zip
                        </td>
                        <td class="center ">
                            408.123.4567
                    </tr>
                    <tr>
                       <td>
                            <div class="checker"><span class=""><input type="checkbox" class="checkboxes" value="1"></span></div>
                        </td>
                        <td class="blue">
                            John Doe
                        </td>
                        
                        <td>
                            12033222
                        </td>
                        <td class="center ">
                            Low fat
                        </td>
                        <td>
                            Tues @ 2.00pm
                        </td>
                        <td>
                            john@sureify.com
                        </td>
                        <td>
                            123,Street,City,State,Zip
                        </td>
                        <td class="center ">
                            408.123.4567
                    </tr>
                    <tr>
                       <td>
                            <div class="checker"><span class=""><input type="checkbox" class="checkboxes" value="1"></span></div>
                        </td>
                        <td class="blue">
                            Princess Lela
                        </td>
                        
                        <td>
                            12033222
                        </td>
                        <td class="center ">
                            Low fat
                        </td>
                        <td>
                            wed @ 4.00pm
                        </td>
                        <td>
                            prince@sureify.com
                        </td>
                        <td>
                            123,Street,City,State,Zip
                        </td>
                        <td class="center ">
                            408.123.4567
                    </tr>
                    <tr class="odd gradeX">
                        <td>
                            <div class="checker"><span class=""><input type="checkbox" class="checkboxes" value="1"></span></div>
                        </td>
                        <td class="blue">
                            Miley Syres
                        </td>
                       
                        <td>
                            12033222
                        </td>
                        <td class="center ">
                            Low fat
                        </td>
                        <td>
                            Thu @ 1.00pm
                        </td>
                        <td>
                            miley@sureify.com
                        </td>
                        <td>
                            123,Street,City,State,Zip
                        </td>
                        <td class="center ">
                            408.123.4567
                    </tr>
                    <tr>
                        <td>
                            <div class="checker"><span class=""><input type="checkbox" class="checkboxes" value="1"></span></div>
                        </td>
                        <td class="blue">
                            Dustin Yoder
                        </td>
                       
                        <td>
                            12033222
                        </td>
                        <td class="center ">
                            Low fat
                        </td>
                        <td>
                            Mon @ 3.00pm
                        </td>
                        <td>
                            dustin@sureify.com
                        </td>
                        <td>
                            123,Street,City,State,Zip
                        </td>
                        <td class="center ">
                            408.123.4567
                    </tr>
                   
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <!--Widget-->
</div>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/ZeroClipboard.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/datatables-init.js"></script>
<script type="text/javascript">
    InitiateclassparticipantListTable.init();
    //$('#your_participants_list_info').hide();
</script>
    
</div>
<!-- Data Grid -->


<!-- participants popup -->


<style type="text/css">
    .modal-dialog{
        max-width: 500px;
    }
</style>
<div id="add_participant">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form name="upload_batch" id="upload_batch" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="col-lg-11 col-md-7 col-sm-12 col-xs-12">
                    <div class="row">
                        <label for="participant_id"><strong>Upload Batch</strong></label>
                    </div>
                    <div class="row form-group">
                        <div class="clearfix">
                            <input type="file" name="batch_file" id="file"/>&nbsp;
                        </div>
                    </div>
                </div>
            </form>
            <form name="upload_participant" id="upload_participant" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="clearfix">
                            <h6><strong>Add Individual</strong></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <label for="participant_id">Name</label>
                    </div>
                    <div class="row form-group">
                        <div class="clearfix">
                            <input type="text" name="participant_id" id="participant_id" value="" class="form-control input-sm">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-1">&nbsp;</div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <label for="participant_id">Diet</label>
                    </div>
                    <div class="row form-group">
                        <div class="clearfix">
                            <select id="diet" name="diet" class="form-control">
                                <option value="">Select Diet</option>
                                <option value="Low Fat">Low Fat</option>
                                <option value="High Fat">High Fat</option>
                            </select>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <label for="participant_id">Participant ID</label>
                    </div>
                    <div class="row form-group">
                        <div class="clearfix">
                            <input type="text" name="participant_id" id="participant_id" value="" class="form-control input-sm">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-1">&nbsp;</div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <label for="participant_id">Class</label>
                    </div>
                    <div class="row form-group">
                        <div class="clearfix">
                            <select id="class_name" name="class_name" class="form-control">
                                <option value=""> Select Class Name</option>
                              <option value="Mon @ 3pm">Mon @ 3pm</option>
                              <option value="Tue @ 3pm">Tue @ 3pm</option>
                            </select>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <label for="participant_id">Address</label>
                    </div>
                    <div class="row form-group">
                        <div class="clearfix">
                            <input type="text" name="participant_id" id="participant_id" value="" class="form-control input-sm">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <label for="participant_id">Phone</label>
                    </div>
                    <div class="row form-group">
                        <div class="clearfix">
                            <input type="text" name="participant_id" id="participant_id" value="" class="form-control input-sm">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-1">&nbsp;</div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <label for="participant_id">Email</label>
                    </div>
                    <div class="row form-group">
                        <div class="clearfix">
                            <input type="text" name="participant_id" id="participant_id" value="" class="form-control input-sm">
                        </div>
                    </div> 
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
 <script src="<?php echo base_url();?>assets/beyondadmin/js/bootbox/bootbox.js"></script>
    <script type="text/javascript">
    $("#add_participant").hide();
    $("#add_participant_open").on('click', function () {
            bootbox.dialog({
                message: $("#add_participant").html(),
                title: "Add Participant",
                className: "modal-prm",
                buttons: {
                    "Cancel": {
                        label: "Cancel",
                        className: "transparentbutton js-modal-close",
                        callback: function () { }
                    },
                    "Add": {
                        className: "no_button",
                        callback: function () { showPopup();}
                    }
                }
            });
        });
        
        function showPopup(){
            $('#add_participant').hide();
            $('#participant_success_message').modal('show');
        }
            
</script>
<!-- Add participant POPUP and success message -->

<!--Add Attendance POPUP and success message -->
<div id="add_attendance" style="display:none;">
    <div class="row">
        <div class="col-lg-12 col-md-10 col-sm-10 col-xs-12">
            <form name="upload_batch" id="upload_batch" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <label for="participant_id"><strong>Upload Batch</strong></label>
                    </div>
                    <div class="form-group">
                        <div class="clearfix">
                            <input type="file" name="batch_file" id="file"/>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="clearfix">
                            <h6><strong>Add Individual</strong></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <label for="participant_id">Name or Participant ID</label>
                    </div>
                    <div class="row form-group">
                        <div class="clearfix">
                            <input type="text" name="participant_id" id="participant_id" value="" class="form-control input-sm">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-1">&nbsp;</div>
                <div class="col-lg-4">
                    <div class="row">
                        <label for="participant_id">Attend Class?</label>
                    </div>
                    <div class="row form-group">
                        <div class="clearfix">
                            <select id="attend_class" name="attend_class" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div> 
                </div>
            </form>
        </div>
    </div>
    </div>
    <div id="attendance_success_message" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <!-- <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Attendance Submitted
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully submitted new attendance.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default no_button" data-dismiss="modal">Ok</button>
            </div>
        </div><!-- /.modal-content -->
 <!--   </div> --><!-- /.modal-dialog -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Attendance Submitted
                </h4>
            </div>
            <div class="modal-body">
                
    <div class="col-lg-6 col-md-10 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bg-prm">
                <span class="widget-caption"><strong>Your Participants</strong></span>
            </div>
            <div class="widget-body table-responsive">
                <table class="table table-striped table-bordered table-hover" id="your_participants_list">
                    <thead>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Class
                            </th>

                            <th>
                                Diet
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                 <a href="<?php echo base_url(); ?>index.php/admin/cohort/checklist" class="a-color">Dustin Yoder</a>
                            </td>
                            <td>
                                Cohort 1A
                            </td>
                            <td class="center ">
                               Low Fat
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/admin/cohort/checklist" class="a-color">John Deo</a>
                            </td>
                            <td>
                               Cohort 1B
                            </td>
                            <td class="center ">
                                Low Carb
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/admin/cohort/checklist" class="a-color">Princess lela</a>
                            </td>
                            <td>
                                Cohort 2A
                            </td>
                            <td class="center ">
                                Low Carb
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <a href="<?php echo base_url(); ?>index.php/admin/cohort/checklist" class="a-color">Miley Cyrus</a>
                            </td>
                            <td>
                                Cohort 2B
                            </td>
                            <td class="center ">
                                Low Fat
                            </td>
                        </tr>

                    </tbody> 
                </table>
            </div>
        </div><!--Widget-->
    </div>

<script>
    InitiateParticipntaListTable.init();
    $('#your_participants_list_length').remove();
</script>
            </div>
        </div><!-- /.modal-content -->
 <!--   </div>
    </div>
<script src="<?php echo base_url();?>assets/beyondadmin/js/bootbox/bootbox.js"></script>
<script type="text/javascript">
    $("#add_attendance_open").on('click', function () {
            bootbox.dialog({
                message: $("#add_attendance").html(),
                title: "Submit Attendance",
                className: "modal-prm",
                buttons: {
                    "Cancel": {
                        label: "Cancel",
                        className: "transparentbutton js-modal-close",
                        callback: function () { }
                    },
                    "Submit": {
                        className: "no_button",
                        callback: function () { showAttendanceSuccess();}
                    }
                }
            });
        });
        
        function showAttendanceSuccess(){
            $('#add_attendance').hide();
            $('#attendance_success_message').modal('show');
        }
</script>
<!-- Add participant POPUP and success message -->

<!-- Submit weight POPUP and success message -->
<div id="submit_weight" style="display:none;">
    <div class="row">
        <div class="col-lg-12 col-md-10 col-sm-10 col-xs-12">

            <form name="upload_batch" id="upload_batch" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <label for="participant_id"><strong>Upload Batch</strong></label>
                    </div>
                    <div class="form-group">
                        <div class="clearfix">
                            <input type="file" name="batch_file" id="file"/>&nbsp;
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="clearfix">
                            <strong>Add Individual</strong>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <label for="participant_id">Name or Participant ID</label>
                    </div>
                    <div class="row form-group">
                        <div class="clearfix">
                            <input type="text" name="participant_id" id="participant_id" value="" class="form-control input-sm">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-1">&nbsp;</div>
                <div class="col-lg-4">
                    <div class="row">
                        <label for="participant_id">Weight</label>
                    </div>
                    <div class="row form-group">
                        <div class="clearfix">
                            <input type="text" name="participant_id" id="participant_id" value="" class="form-control input-sm">
                        </div>
                    </div> 
                </div>
            </form>
        </div>
    </div>
    </div>
    <div id="weights_success_message" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Weights Submitted
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully submitted a new weight.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default no_button" data-dismiss="modal">Ok</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
<script type="text/javascript">
    $("#submit_weight_open").on('click', function () {
            bootbox.dialog({
                message: $("#submit_weight").html(),
                title: "Submit Weight",
                className: "modal-prm",
                buttons: {
                    "Cancel": {
                        label: "Cancel",
                        className: "transparentbutton js-modal-close",
                        callback: function () { }
                    },
                    "Submit": {
                        className: "no_button",
                        callback: function () { showWeightSuccess();}
                    }
                }
            });
        });
        
        function showWeightSuccess(){
            $('#submit_weight').hide();
            $('#weights_success_message').modal('show');
        }
</script>
<!--Add participant POPUP and success message--->