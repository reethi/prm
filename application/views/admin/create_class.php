<script src="<?php echo base_url();?>assets/custom/js/createclass.js"></script>
<!-- Datetime Picker styles and scripts -->
<link href="<?php echo base_url(); ?>assets/beyondadmin/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/beyondadmin/js/moment-with-locales.js"></script>
<script src="<?php echo base_url(); ?>assets/beyondadmin/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/beyondadmin/js/validate.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('.end_date').datetimepicker({ 
            format: 'YYYY/MM/DD'
        });
    });
</script>
<style>
.modal-prm-checklist .modal-dialog {
    width: 600px;
}

.modal-body{
    padding-bottom:0px;
}
</style>

<!-- Add participant POPUP and success message -->
<div id="create_class_popup" class="modal fade modal-prm modal-prm-checklist" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Create Class
                </h4>
            </div>
        <form name="create_class" id="create_class" action="" method="post" enctype="multipart/form-data" class="form-horizontal">    
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
                    <div class="col-lg-12">
                        <div class="row">
                            <label for="participant_id"><strong>Class Name</strong></label>
                        </div>
                        <div class="row form-group">
                            <div class="clearfix">
                            <!--    <select id="create_class_name" name="create_class_name" class="form-control">
                                    <option value="">--Select--</option>
                                <?php for($i=0;$i<count($class_details);$i++)
                                { ?>
                                    <option value="<?php echo $class_details[$i]->id; ?>"><?php echo $class_details[$i]->class_name; ?> </option>
                                <?php } ?>
                                </Select> -->
                                <input type="text" id="create_class_name" name="create_class_name" value="" class="form-control">
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-12 col-md-7 col-sm-12 col-xs-12">
                        <div class="row">
                            <label for="participant_id"><strong>Health Educator</strong></label>
                        </div>
                        <div class="row form-group">
                            <div class="clearfix">
                                <select id="class_health_educator" name="class_health_educator" class="form-control">
                                    <option value="">--Select--</option>
                               <?php foreach ($health_educator as $key => $value) { ?>
                                   <option value="<?php echo $value->id; ?>"><?php echo $value->full_name; ?> </option>
                                <?php } ?>
                                
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <label for="participant_id"><strong>Room / Location</strong></label>
                        </div>
                        <div class="row form-group">
                            <div class="clearfix">
                                <select id="location" name="location" class="form-control">
                                    <option value="">--Select--</option>
                                     <?php foreach ($locations as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>"><?php echo $value->location_name; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5">
                        <div class="row">
                            <label for="participant_id"><strong>Diet</strong></label>
                        </div>
                        <div class="row form-group">
                            <div class="clearfix">
                                <select id="diet" name="diet" class="form-control">
                                    <option value="">--Select--</option>
                                     <?php foreach ($diets as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>"><?php echo $value->diet_name; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <label for="participant_id"><strong>Class Time</strong></label>
                        </div>
                        <div class="row form-group">
                            <div class="clearfix">
                                <select id="class_time" name="class_time" class="form-control">
                                    <option value="">--Select--</option>
                                    <?php foreach ($class_times as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>"><?php echo $value->class_time_name; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5">
                        <div class="row">
                            <label for="participant_id"><strong>Color</strong></label>
                        </div>
                        <div class="row form-group">
                            <div class="clearfix">
                                <select id="color" name="color" class="form-control">
                                    <option value="">--Select--</option>
                                     <?php foreach ($colors as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>"><?php echo $value->color_name; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-1 col-md-10 col-sm-10 col-xs-12"></div>
                <div class="col-lg-4 col-md-10 col-sm-10 col-xs-12">
                    <div class="col-lg-10">
                        <div class="row">
                            <label for="participant_id"><strong>Class Dates</strong></label>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <input type='hidden' name='count_dates' id='count_dates' value='0'/>
                        <div class="row form-group" id="class_date_1">
                            <div class="clearfix">
                                <div class='input-group date end_date' id='end_date_1'>
                                    <input type='text' class="form-control" name="date[]" value="2015-05-22" />
                                    <span class="input-group-addon"><i class="icon-large ace-icon fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <a class="transparentbutton text-left" id="addMore" style="curor:pointer;" href="#">Add Date</a>
                            <a class="transparentbutton text-left" id="removeDate" style="curor:pointer;display:none;" href="#">Remove Date</a>
                        </div>
                    </div> 
                    
                </div>
            </div>
                <div class="modal-footer" style="margin-left:-15px;margin-right:-15px;">
                    <button data-bb-handler="Cancel"  data-dismiss="modal" type="button" class="btn transparentbutton js-modal-close">
                            Cancel
                    </button>
                    <input type="submit" class="btn no_button" value="Create">
                </div>
        </div>
        </form>
        </div>
    </div>
</div>

<div id="class_success_message" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Class Created
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully created a class.</p>
            </div>
            <div class="modal-footer" style="margin-left: 0px;margin-right: 0px;">
                <button type="button" class="btn btn-default no_button" data-dismiss="modal">Ok</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="class_failure_message" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Class Not Created
                </h4>
            </div>
            <div class="modal-body">
                <p>Class creation failed.</p>
            </div>
            <div class="modal-footer" style="margin-left: 0px;margin-right: 0px;">
                <button type="button" class="btn btn-default no_button" data-dismiss="modal">Ok</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
     <div id="created_class_exists" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Class Not Created
                </h4>
            </div>
            <div class="modal-body">
                <p>You have already created this class.</p>
            </div>
            <div class="modal-footer" style="margin-left: 0px;margin-right: 0px;">
                <button type="button" class="btn btn-default no_button" data-dismiss="modal">Ok</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
<!-- Script for add more functionality -->
    <script>
        $(document).ready(function() {
            $('#addMore').click(function(){
                var count = parseInt($('#count_dates').val())+1;
                if(count < 6){
                    $('#class_date_'+count).after($('#class_date_'+count).clone());
                    $('#count_dates').val(count);
                    var newcnt = count+1;
                    $('#class_date_'+count+':first').attr('id','class_date_'+newcnt);
                    $('#end_date_'+count+':first').attr('id','end_date_'+newcnt);
                    if(newcnt==6){
                        $('#addMore').hide();    
                    }
                    if(count > 0){
                        $('#removeDate').show();
                    }

                }
                
                
            });
            $('#removeDate').click(function(){
                var totcnt = parseInt($('#count_dates').val());
                if(totcnt!=0){
                  $('#class_date_'+totcnt).remove();  
                  $('#addMore').show();
                }else{
                    $('#removeDate').hide();
                    $('#addMore').show();
                }
                var newcntmin = totcnt-1;
                $('#count_dates').val(newcntmin);                
            });

        }); 

    </script>

