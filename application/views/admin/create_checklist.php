<script src="<?php echo base_url();?>assets/custom/js/checklist.js"></script>
<div id="checklist_popup" class="modal fade modal-prm modal-prm-checklist" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Create Checklist Item
                </h4>
            </div>
            <form name="upload_participant" id="create_checklist" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label for="title"><strong>Title</strong></label>
                                </div>
                                <div class="row form-group">
                                    <div class="clearfix">
                                        <input type="text" name="title" id="title" class="form-control input-sm">
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-12 col-md-7 col-sm-12 col-xs-12">
                                <div class="row">
                                    <label for="url"><strong>URL</strong></label>
                                </div>
                                <div class="row form-group">
                                    <div class="clearfix">
                                        <input type="text" name="url" id="url" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <label for="start_date"><strong>Start Date</strong></label>
                                </div>
                                <div class="row input-group form-group">
                                    <div class='input-group date end_date' id='start_date1'>
                                            <input type='text' class="form-control" name="start_date1" value="" />
                                            <span class="input-group-addon"><i class="icon-large ace-icon fa fa-calendar"></i></span>
                                     </div>
                                </div> 
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <label for="end_date"><strong>End Date</strong></label>
                                </div>
                                <div class="row input-group form-group">
                                    <div class='input-group date end_date' id='end_date1'>
                                            <input type='text' class="form-control" name="end_date1" value="" />
                                            <span class="input-group-addon"><i class="icon-large ace-icon fa fa-calendar"></i></span>
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
                

    <div id="checklist_success_message" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Checklist Item Created
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully created a checklist item.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default no_button" data-dismiss="modal">OK</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    
    <div id="checklist_failure_message" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Checklist Item Creation failed
                </h4>
            </div>
            <div class="modal-body">
                <p>Checklist item creation failed. </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default no_button" data-dismiss="modal">OK</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>