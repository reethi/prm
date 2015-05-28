<style type="text/css">

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
<script src="<?php echo base_url();?>assets/custom/js/upload_doc.js"></script>
<?php
    $content = "";
    $header ="";
    if( $this->uri->segment(4) == 'doc_success') {
        echo '<script>$(document).ready(function(){ $("#doc_success_message").modal("show"); });</script>';
    } 
    else if( $this->uri->segment(4) == 'doc_failure') {
        echo '<script>$(document).ready(function(){ $("#upload_doc_fail").modal("show"); });</script>';
    } 
    else if( $this->uri->segment(4) == 'doc_exists') {
        echo '<script>$(document).ready(function(){ $("#upload_doc_exists").modal("show"); });</script>';
    } 
?>

<!-- Add participant POPUP and success message -->
<div id="create_doc_popup" class="modal fade modal-prm modal-prm-checklist" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Add a Document
                </h4>
            </div>
            <form name="upload_participant" id="create_doc" action="<?php echo base_url(); ?>index.php/admin/dashboard/do_upload" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label for="document_url"><strong>Embed Document</strong></label>
                                </div>
                                <div class="row form-group">
                                    <div class="clearfix">
                                        <input type="text" name="url" id="url" value="" class="form-control input-sm" placeholder="Enter URL here">
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-11 col-md-7 col-sm-12 col-xs-12">
                                <div class="row">
                                    <label for="doc_file"><strong>Upload Document</strong></label>
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
                                    <label for="doc_title"><strong>Document Title</strong></label>
                                </div>
                                <div class="row form-group">
                                    <div class="clearfix">
                                        <input type="text" name="title" id="title" value="" class="form-control input-sm" placeholder="Enter text here">
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <label for="push_user_date"><strong>Push to Users</strong></label>
                                </div>
                                <div class="row input-group form-group">
                                    <div class='input-group date end_date' id='date'>
                                            <input type='text' class="form-control" name="push_users_date" value="" />
                                            <span class="input-group-addon"><i class="icon-large ace-icon fa fa-calendar"></i></span>
                                     </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <label for="class_name">&nbsp;</label>
                                </div>
                                <div class="row form-group">
                                    <div class="clearfix">
                                        <select id="class_name" name="class_name" class="form-control">
                                           <option value="">Choose class</option>
                                        <?php for ($i = 0;$i < count($class_details);$i++){?>
                                            <option value="<?php print_r($class_details[$i]->class_name); ?>"><?php print_r($class_details[$i]->class_name); ?></option>
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
            </form>
        </div>
    </div>
</div>
    <div id="doc_success_message" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Document Added 
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully added a new document.</p>
            </div>
            <div class="modal-footer">
            <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_doc_lists" class="btn btn-default no_button">OK</a>            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="upload_doc_fail" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Document Failed 
                </h4>
            </div>
            <div class="modal-body">
                <p>Document Upload failed.It accepts only pdf format files to upload</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_doc_lists" class="btn btn-default no_button">OK</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="upload_doc_exists" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Document already Exists 
                </h4>
            </div>
            <div class="modal-body">
                <p>Upload document is already exists.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_doc_lists" class="btn btn-default no_button">OK</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
