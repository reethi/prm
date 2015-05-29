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
.title_edit{
    cursor: pointer;
    float:right;
    margin-right: 30px;
    margin-top: 3px;
}
.table thead > tr > th{
    text-align: center;
}
td{
    text-align: center;
}
</style>
<?php
    $content = "";
    $header ="";
    if( $this->uri->segment(4) == 'doc_edit_popup') {
        //echo 'hiiiii';
        echo '<script>$(document).ready(function(){ $("#edit_doc_list").modal("show"); });</script>';
    } 
    else if( $this->uri->segment(4) == 'doc_delete_popup') {
        //echo 'hiiiii';
        echo '<script>$(document).ready(function(){ $("#delete_document").modal("show"); });</script>';
    } 
    else if( $this->uri->segment(4) == 'doc_edit_failure') {
        echo '<script>$(document).ready(function(){ $("#edit_doc_list_fail").modal("show"); });</script>';
    } 
    else if( $this->uri->segment(4) == 'doc_delete_failure') {
        echo '<script>$(document).ready(function(){ $("#doc_delete_failure").modal("show"); });</script>';
    } 
     else if( $this->uri->segment(4) == 'doc_edit_success') {
        echo '<script>$(document).ready(function(){ $("#edit_doc_list_success").modal("show"); });</script>';
    } 
    else if( $this->uri->segment(4) == 'doc_delete_success') {
        echo '<script>$(document).ready(function(){ $("#doc_delete_success").modal("show"); });</script>';
    } 
    $data=$this->session->userdata('edit_docs');
    //print_r($data);
?>
<!-- Data Grid -->
<script src="<?php echo base_url();?>assets/custom/js/beyondadmin.custom.js"></script>
<link href="<?php echo base_url();?>assets/beyondadmin/css/dataTables.bootstrap.css" rel="stylesheet" />
<div class="page-content">
    <div class="page-body">
    <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
        <div class="widget"style="min-height:400px;">
             <div class="widget-header bg-prm">
                <span class="widget-caption"><strong>Document List</strong></span>
                <span class="widget-subcaption" id="add_submit_weight" style="cursor: pointer;">
                    <a href="#"data-toggle="modal" data-target="#create_doc_popup"><strong style="color:#fff;">+ Add Document</strong></a>
                </span>
            </div>
            <div class="widget-body">
            <div class="table-responsive">
               <table class="table table-striped table-bordered table-hover" id="docslist">
                    <thead>
                        <tr>
                            <th>
                                Id
                            </th>
                            <th>
                                Document Title
                            </th>
                            <th>
                                Document Name
                            </th>
                            <th>
                                Class
                            </th>
                            <th>
                            Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $j=0; for($i=0;$i<count($result);$i++){ $j++; ?> 
                            <tr>
                                <td class="col-md-1">
                                    <?php echo $j; ?>
                                </td>
                                <td class="col-md-3">
                                    <?php echo ucfirst($result[$i]->file_title); ?>
                                </td>
                                <td class="col-md-3">
                                    <?php echo ucfirst($result[$i]->file_name); ?>
                                </td>
                                <td class="col-md-2"> 
                                    <?php echo ucfirst($result[$i]->class); ?>
                                </td>
                                <td class="col-md-3">
                                    <a target="_blank" href="<?php echo base_url()?>uploads/docs/<?php echo $result[$i]->file_name?>"class="col-lg-3 yes_button">
                                        View
                                    </a>
                                    <form action="<?php echo base_url(); ?>index.php/admin/dashboard/edit_docs" class="col-lg-3" method="post">
                                        <input type="hidden" name="id" value="<?php echo $result[$i]->id; ?>">
                                        <input type="submit" class=" yes_button" value="Edit">
                                    </form>
                                    <form action="<?php echo base_url(); ?>index.php/admin/dashboard/delete_docs" class="col-lg-3" method="post">
                                        <input type="hidden" name="id" value="<?php echo $result[$i]->id; ?>">
                                        <input type="submit" class="yes_button" style="background-color:#8D181B !important;margin-left:5px;" value="X">
                                    </form>
                                    <a download href="<?php echo base_url()?>uploads/docs/<?php echo $result[$i]->file_name?>"class="col-lg-2 yes_button"style="margin-left: 10px;padding: 8px 11px 9px;">
                                        <span class="glyphicon glyphicon-download-alt pull-right"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!--Widget-->
                    <?php if(isset($data) && count($data[0])>0) { ?>
<div id="edit_doc_list" class="modal fade modal-prm modal-prm-checklist" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Edit a Document
                </h4>
            </div>
            <?php //print_R($result); exit;?>
            <form name="upload_participant" id="create_doc" action="<?php echo base_url(); ?>index.php/admin/dashboard/do_upload_edit" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="modal-body" style="min-height:325px !important;">
                    <div class="col-lg-11">
                        <div class="row">
                            <label for="document_url"><strong>Embed Document</strong></label>
                        </div>
                        <div class="row form-group">
                            <div class="clearfix">
                                <input type="text" name="url" id="url" value="<?php echo $data[0]->file_url; ?>" class="form-control input-sm" placeholder="Enter URL here">
                            </div>
                        </div> 
                    </div>
                    <!--<div class="col-lg-11 col-md-7 col-sm-12 col-xs-12">
                        <div class="row">
                            <label for="participant_id"><strong>Upload Document</strong></label>
                        </div>
                       <div class="row form-group">
                            <div class="">
                                <div class="col-lg-12 col-sm-12 col-xs-12 input-group input-group-sm">
                                    <input type="text" class="form-control">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" style="color:#0098DB;">Browse</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>-->
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
                                    <input type="hidden" name="old_file" value="<?php echo $data[0]->file_name; ?>">
                                    <input type="file" name="file" id="file" /> 
                                    <span><?php echo $data[0]->file_name; ?> (Old File)</span>
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
                                <input type="text" name="title" id="title" value="<?php echo $data[0]->file_title; ?>" class="form-control input-sm" placeholder="Enter text here">
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <label for="push_user_date"><strong>Push to Users</strong></label>
                        </div>
                        
                    <div class="row input-group form-group">
                        
                        <div class='input-group date end_date' id='date'>
                                <input type='text' class="form-control" name="push_users_date" value="<?php echo $data[0]->push_users_date; ?>" />
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
                                    <option value="<?php print_r($class_details[$i]->class_name); ?>" <?php if($class_details[$i]->class_name==$data[0]->class){ echo "selected='selected'"; } ?>><?php print_r($class_details[$i]->class_name); ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div> 

                    </div>
                    </div>
                    <div class="col-lg-12 text-center"style="background-color: #F5F5F5;padding-left:0px;padding-right:0px;padding-top: 12px;padding-bottom: 14px;">
                            <input type="hidden" name="user_id" value="<?php echo $data[0]->id; ?>">

                            <input type="button" name="" value="Cancel"class="transparentbutton js-modal-close" data-dismiss="modal"/>
                            <input type="submit" name="submit" value="Submit"class="no_button" />
                    </div>
                </div>
        </form>
        </div>
    </div>
</div>
                    <?php } ?>

 <div id="edit_doc_list_fail" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Document Upload Failed
                </h4>
            </div>
            <div class="modal-body">
                <p>It accepts only pdf type of video's.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_doc_lists" class="btn btn-default no_button">OK</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="edit_doc_list_success" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Document Updated 
                </h4>
            </div>
            <div class="modal-body">
                <p>You have successfully Updated the old document.</p>
            </div>
            <div class="modal-footer">
            <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_doc_lists" class="btn btn-default no_button">OK</a>            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="delete_document" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Delete Document 
                </h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                            <form action="<?php echo base_url(); ?>index.php/admin/dashboard/delete_docs_row" class="col-lg-12" method="post">

              <center>  <input type="button" name="" value="No"class="transparentbutton js-modal-close" data-dismiss="modal">
                    <input type="hidden" name="id" value="<?php echo $data[0]->id; ?>">
                    <input type="submit" class="yes_button" value="Yes"> </center>
                </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
 <div id="doc_delete_failure" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Failed to delete
                </h4>
            </div>
            <div class="modal-body">
                <p>Document can't be deleted.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_doc_lists" class="btn btn-default no_button">OK</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>
    <div id="doc_delete_success" class="modal fade modal-prm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    Successfully Deleted
                </h4>
            </div>
            <div class="modal-body">
                <p>Document deleted Succesfully.</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/admin/dashboard/get_doc_lists" class="btn btn-default no_button">OK</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    </div>

<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/ZeroClipboard.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/datatable/datatables-init.js"></script>
<script type="text/javascript">
    InitiatedocsListTable.init();
    
</script>
