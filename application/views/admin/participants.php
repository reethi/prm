<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/custom/css/participants.css" />


<!--script src="<?php echo base_url(); ?>/assets/custom/js/modernizr.js"></script-->
<script src="<?php echo base_url();?>assets/aceadmin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/aceadmin/js/jquery.dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/aceadmin/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url();?>assets/aceadmin/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/custom/js/additional-methods.min.js"></script>
<script src="<?php echo base_url();?>assets/custom/js/participants.js"></script>
  
<script type="text/javascript">
    //Script to Have a Loading image fade out as the page loading is complete
    $(window).load(function() {
        $(".se-pre-con").fadeOut("slow");
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
                                            Participants Added
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
                                        <a href="<?php echo base_url();?>assets/files/log_participants_upload.txt" download="log_participants_upload.txt"><strong>Download Log file</strong></a>
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

<!---Add participant Popup Start-->
<div id="popup" class="modal-box" style="margin-top: -100px;margin-left: -100px;position:top !important;width:55%;"> 
    <header style="background-color:rgba(117, 0, 0, 1);padding: 0.25em 1.5em;">
        <a href="#" style="color:#fff;" class="js-modal-close close"><b>×</b></a>
        <h6 style="color:#fff;"><b>Add Participant</b></h6>
    </header>
    <div class="modal-body">
        <div class="col-lg-12">
            <form name="upload_batch" id="upload_batch" action="<?php echo base_url();?>index.php/admin/participants/import" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <h6><strong>Upload Batch</strong></h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="clearfix">
                                <input type="file" name="batch_file" id="file"/>&nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button style="background-color: #0098DB;border:none;border-radius: 5px;color: #FFF;padding: 3px 5px;font-weight: bold;height:30px;">Upload </button>
                    </div>
                    <div class="col-lg-4" style="padding:7px 10px !important;">
                        <a href="<?php echo base_url();?>assets/files/Participants_Batch.xlsx" download="Participants_Batch.xlsx">Download Template</a>
                    </div>
                </div>
            </form> 
            <form name="upload_participant" id="upload_participant" action="<?php echo base_url();?>index.php/admin/participants/add_participant" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="row">
                            <h6><b>Add Individual</b></h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row form-group">
                            <div class="clearfix">
                                <input type="text" id="first_name" name="first_name" class="input-xxlarge" placeholder="First Name">
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-2">&nbsp;</div>
                    <div class="col-lg-4">
                        <div class="row form-group">
                            <div class="clearfix">
                                <input type="text" id="last_name" name="last_name" class="input-xxlarge" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10">
                        <div class="row form-group">
                            <div class="span10 clearfix">
                                <input type="text" name="address" id="address" class="input-xxlarge" placeholder="Address">
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row form-group">
                            <div class="clearfix">
                                <input type="text" id="city" name="city" class="input-xxlarge" placeholder="City">
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-2">&nbsp;</div>
                    <div class="col-lg-4">
                        <div class="row form-group">
                            <div class="clearfix">
                                <input type="text" id="state" name="state" class="input-xxlarge" placeholder="State">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row form-group">
                            <div class="clearfix">
                                <input type="text" id="zip" name="zip" class="input-xxlarge" placeholder="ZIP">
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-2">&nbsp;</div>
                    <div class="col-lg-4">
                        <div class="row form-group">
                            <div class="clearfix">
                                <input type="text" id="participant_id" name="participant_id" class="input-xxlarge" placeholder="Participant ID">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row form-group">
                            <div class="clearfix">
                                <select id="diet" name="diet" class="input-large">
                                    <option value="">Select Diet</option>
                                    <option value="Low Fat">Low Fat</option>
                                    <option value="High Fat">High Fat</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-2">&nbsp;</div>
                    <div class="col-lg-4">
                        <div class="row form-group">
                            <div class="clearfix">
                                <select id="class_name" name="class_name" class="input-large">
                                  <option value=""> Select Class Name</option>
                                  <option value="Mon @ 3pm">Mon @ 3pm</option>
                                  <option value="Tue @ 3pm">Tue @ 3pm</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row form-group">
                            <div class="clearfix">
                                <input type="text" id="phone" name="phone" class="input-xxlarge" placeholder="Phone">
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-2">&nbsp;</div>
                    <div class="col-lg-4">
                        <div class="row form-group">
                            <div class="clearfix">
                                <input type="text" id="email" name="email" class="input-xxlarge" placeholder="Email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-lg-3"></div> 
                    <div class="col-lg-9">
                        <input type="reset" name="cancel" value="Cancel" class="no_button js-modal-close" style="height:35px;border:none;">
                        <input type="submit" name="submit" value="Add Participant" class="yes-button" style="background-color: #0098DB;border:none;border-radius: 5px;color: #FFF;padding: 3px 15px;font-weight: bold;height:35px;">
                    </div>
                </div>
            </form>
            <div class="row">&nbsp;</div>
        </div>
    </div>
    <div class="row"></div>
</div>

<!--Add participant Popup END-->
<div id="openModal" class="modalDialog">
    <div>
        <!--<a href="#close" title="Close" class="close1">x</a> !-->
        <h4 style="padding-left:15px;padding-top:15px;">Participants Added</h4>
        <hr class="model-hr" style="margin-top:0px;"></hr>
        <p style="padding-left:15px;">You have successfully added more participants.</p>
        <hr style=""/><a href="#close" title="Close" class=""><button class="no_button" style="margin-left: 80%;margin-bottom: 14px;" >Ok</button></a>
    </div>
</div>

<form class="form-horizontal" name="update_profile" id="update_profile" action="" method="post">
    <div class="col-lg-12" style="padding-left:10px;">
        <div class="row">
            <div class="col-lg-12" style="padding-left:5px;">
                <a class="js-open-modal" href="#" data-modal-id="popup"><button class="yes-button" style="background-color: #0098DB;border:none;border-radius: 5px;color: #FFF;padding: 3px 15px;font-weight: bold;height:35px;">Add Participants</button></a>
            </div>
        </div>
        <div class="row">&nbsp;</div>
    </div>
</form>
<div class="row">&nbsp;</div>

<div class="row-fluid">
    <table id="participants_table" class="table table-bordered" style="background-color: #FFF;width:100% !important;">
        <thead>
            <tr>
                <th class="td-background left">Name</th>
                <th class="td-background center">Participant ID</th>
                <th class="td-background center">Diet</th>
                <th class="td-background center">Class</th>
                <th class="td-background center">Email</th>
                <th class="td-background center">Address</th>
                <th class="td-background center">Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($participants)>0){?>
            <?php foreach ($participants as $key => $value) {?>
                <tr>
                    <td class="left"><?php echo $value->first_name;?> <?php echo $value->last_name;?></td>
                    <td class="left"><?php echo $value->participant_id;?></td>
                    <td class="left"><?php echo $value->diet;?></td>
                    <td class="left"><?php echo $value->class_name;?></td>
                    <td class="left"><?php echo $value->email;?></td>
                    <td class="left"><?php echo $value->address;?></td>
                    <td class="left"><?php echo $value->phone;?></td>
                </tr>
            <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>