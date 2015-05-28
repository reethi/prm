<script src="<?php echo base_url();?>assets/custom/js/submitweight.js"></script>
<style>
.help-block {
    display: block;
    margin-top: 5px;
    margin-bottom: 10px;
    color: #E46F61;
}
</style>
<!-- Submit weight POPUP and success message -->
<div id="submit_weight_pop" class="modal fade modal-prm modal-prm-checklist" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                   Submit Weight
                </h4>
            </div>
            <form name="submit_weight" id="submit_weight" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label for="participant_id"><strong>Upload Batch</strong></label>
                                </div>
                                <div class="row form-group">
                                    <div class="">
                                        <div class="col-lg-11 col-sm-12 col-xs-12 input-group input-group-sm">
                                            <input type="text" class="form-control">
                                            <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" style="color:#0098DB;">Browse</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="clearfix">
                                        <strong>Add Individual</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-11">
                                <div class="row">
                                    <label for="participant_id">Name or Participant ID</label>
                                </div>
                                <div class="row form-group">
                                    <div class="clearfix">
                                        <input type="text" name="participant_name" id="participant_name" value="" class="form-control input-sm">
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <label for="participant_id">Select Class Date</label>
                                </div>
                                <div class="row input-group">
                                    <div class='input-group date end_date' id='date'>
                                            <input type='text' class="form-control" name="class_date" value="" />
                                            <span class="input-group-addon"><i class="icon-large ace-icon fa fa-calendar"></i></span>
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
                                        <input type="text" name="weight" id="weight" value="" class="form-control input-sm">
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

<!--Add participant POPUP and success message--->