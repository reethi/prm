<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/custom/css/participants.css" />


<!--script src="<?php echo base_url(); ?>/assets/custom/js/modernizr.js"></script-->
<script src="<?php echo base_url();?>assets/aceadmin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/aceadmin/js/jquery.dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/aceadmin/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/custom/js/additional-methods.min.js"></script>
<script src="<?php echo base_url();?>assets/custom/js/studyresult.js"></script>

<script type="text/javascript">
// Wait for window load
$(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
});
</script>
<?php if($status_msg!=''){?>
<script type="text/javascript">
    $( document ).ready(function() {
        $('#myModal').modal('show');
    });
</script>
<!-- Modal -->
<div class="modal popup_hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog pop1" style="width:100%;">
        <div class="modal-content" style="">
            <div class="modal-body pop" style="padding:0px;">
                <center>
                    <div class="modal-content popup2" style=" ">
                        <div class="modal-body model-custom-body" style="background-color:#f1f1f1;">
                            <div class="row">
                                <div class="col-lg-12 popup2_text">
                                    <h4>
                                        <b style="float:left !important;padding-left: 24px;padding-top: 10px;">
                                            Study Results Upload
                                        </b>
                                    </h4>
                                    <hr class="model-hr" style=""></hr>
                                </div><br>
                                <div class="col-lg-11 popup2_text popup2_text1" style="width: 93.667%;background-color: #FFF;margin-left: 12px;margin-top: -20px;margin-bottom: -20px;padding-bottom: 15px;">
                                    <div>
                                        <strong class="popup2_text_strong" style="padding-left: 24px;">
                                            <?php echo $status_msg;?>
                                        </strong>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-11">&nbsp;</div> 
                                <div class="row">&nbsp;</div>
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <?php if($excel==true){?>
                                        <a href="<?php echo base_url();?>assets/files/log_studyresults_upload.txt" download="log_studyresults_upload.txt"><strong>Download Log file</strong></a>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <button  class="no_button js-modal-close" style="height:35px;">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<div id="popup" class="modal-box" style="margin-top: -100px;margin-left: -100px;position:top !important;width:40%;"> 
    <header style="background-color:rgba(117, 0, 0, 1);padding: 0.25em 1.5em;">
        <a href="#" style="color:#fff;" class="js-modal-close close"><b>×</b></a>
        <h6 style="color:#fff;"><b>Upload Study result</b></h6>
    </header>
    <div class="modal-body">
        <div class="col-lg-11">
            <div class="row">
                <div class="col-lg-11">
                    <div class="row">
                        <h6><b>Upload Batch</b></h6>
                    </div>
                    <form name="upload_study_batch" id="upload_study_batch" action="<?php echo base_url();?>index.php/admin/studyresult/import" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="row form-group">
                                    <div class="clearfix">
                                        <input type="file" id="study_batch" name="study_batch"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button style="background-color: #0098DB;border:none;border-radius: 5px;color: #FFF;padding: 3px 15px;font-weight: bold; height:30px;">Upload </button>
                            </div>
                            <!--div class="col-lg-4" style="padding:7px 10px !important;">
                                <a href="<?php echo base_url();?>assets/files/Study_Results_Batch.xlsx" download="Study_Results_Batch.xlsx">Download Template</a>
                            </div-->
                        </div>
                    </form>
                </div>
            </div>
           
            <form name="upload_study_result" id="upload_study_result" action="<?php echo base_url();?>index.php/admin/studyresult/add_study_result" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="row">
                            <h6><b>Upload Individual</b></h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-11">
                        <div class="row">
                            <label for="study_name">Study Name</label>
                        </div>
                        <div class="row form-group">
                            <div class="clearfix">
                                <select id="study_name" name="study_name" class="input-xxlarge">
                                    <option value="1">Lipids Study</option>
                                    <option value="2">Glucose Study</option>
                                    <option value="3">Random Questionnaire</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-11">
                        <div class="row">
                            <label for="participant_id">Participant ID</label>
                        </div>
                        <div class="row form-group">
                            <div class="clearfix">
                                <input type="text" name="participant_id" id="participant_id" value="" class="input-xxlarge">
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-11">
                        <div class="row">
                            <h6><b>Select File</b></h6>
                        </div>
                        <div class="row form-group">
                            <div class="clearfix">
                                <input type="file" id="study_file" name="study_file"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-lg-2">&nbsp;</div>
                    <div class="col-lg-9">
                        <input type="reset" class="no_button js-modal-close" name="Cancel" value="Cancel" style="height:35px; border:none;">&nbsp;
                        <a href="#openModal">
                            <button class="yes-button" style="background-color: #0098DB;border:none;border-radius: 5px;color: #FFF;padding: 3px 15px;font-weight: bold; height:35px;">Upload Results</button>
                        </a>
                    </div>
                </div>
            </form>
            <div class="row">&nbsp;</div>
        </div>
    </div>
    <div class="row">&nbsp;</div>
</div>
<div>&nbsp;</div>
<div id="openModal" class="modalDialog">
    <div>
        <!--<a href="#close" title="Close" class="close1">x</a> !-->
        <h4 style="padding-left:15px;padding-top:15px;">File Uploaded</h4>
        <hr class="model-hr" style="margin-top:0px;"></hr>

        <p style="padding-left:15px;">Your file has been successfully uploaded.</p>
        <hr style=""></hr><a href="#close" title="Close" class=""><button class="no_button" style="margin-left: 80%;margin-bottom: 14px;" >Ok</button></a>
    </div>
</div>
<form class="form-horizontal" name="update_profile" id="update_profile" action="" method="post">
    <div class="col-lg-12" style="padding-left:10px;">
        <div class="row">
            <div class="col-lg-12" style="padding-left:5px;">
                <a class="js-open-modal" href="#" data-modal-id="popup"><button class="yes-button" style="background-color: #0098DB;border:none;border-radius: 5px;color: #FFF;padding: 3px 15px;font-weight: bold;height:35px;">Upload Study Results</button></a>
            </div>
        </div>
        <div class="row">&nbsp;</div>
    </div>
</form>
<div class="row">&nbsp;</div>
<div class="row-fluid" style="padding-left:0px;">
    <table id="study_results-table" class="table table-bordered" style="background-color: #FFF;width:100% !important;">
        <thead>
            <tr>
                <th class="td-background">Name</th>
                <th class="td-background center" width="15%">Participant ID</th>
                <th class="td-background center" width="15%">Lipids Study</th>
                <th class="td-background center" width="15%">Glucose Results</th>
                <th class="td-background center" width="15%">Random Questionnaire</th>
            </tr>   
        </thead>
        <tbody>
        <?php if(count($study_results)>0){?>
            <?php foreach ($study_results as $key => $value) {?>
            <tr>
                <td class="left"><?php echo $value->first_name;?> <?php echo $value->last_name;?></td>
                <td class="left"><?php echo $value->participant_id;?></td>
                <td class="center">
                  <?php if($value->lipids_study!=''){ ?><a href="<?php echo base_url();?>index.php/admin/studyresult/download?id=<?php echo $value->record_id;?>&studytype=lipids_study"><span><center>View</center></span></a> <?php } else { echo "N/A"; }?>
                </td>
                <td class="center">
                  <?php if($value->glucose_results!=''){ ?><a href="<?php echo base_url();?>index.php/admin/studyresult/download?id=<?php echo $value->record_id;?>&studytype=glucose_results"><span><center>View</center></span></a> <?php } else { echo "N/A"; }?>
                </td>
                <td class="center">
                  <?php if($value->random_questionnaire!=''){ ?><a href="<?php echo base_url();?>index.php/admin/studyresult/download?id=<?php echo $value->record_id;?>&studytype=random_questionnaire"><span><center>View</center></span></a> <?php } else { echo "N/A"; }?>
                </td>
            </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>

<div class="col-lg-1">&nbsp;</div>