<style>
@media (min-width: 768px){
.DTTT.btn-group {
    position: absolute;
    right: 76px !important;
    top: 0px;
}
}
@media (min-width: 320px) and (max-width: 767px){
.DTTT.btn-group {
    position: inherit !important;
    margin-top: 41px;
}
}
</style>
<?php //echo "hi";echo"<pre>";print_r($myparticipants_details);exit; ?>
<!-- Data Grid -->
<script src="<?php echo base_url();?>assets/custom/js/beyondadmin.custom.js"></script>
<link href="<?php echo base_url();?>assets/beyondadmin/css/dataTables.bootstrap.css" rel="stylesheet" />
    <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bg-prm">
                <span class="widget-caption"><strong>My Participants</strong></span>
            </div>
        <div class="widget-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="your_class_participants_list">
                    <thead>
                        <tr>
                            <th>
                               Name 
                            </th>
                            <th>
                                Nickname
                            </th>
                            <th>
                                Class
                            </th>
                            <th>
                                Date of Birth
                            </th>
                            <th>
                                Gender
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Home Phone
                            </th>
                            <th>
                                Work Phone
                            </th>
                            <th>
                                Cell Phone
                            </th>
                        </tr>
                    </thead>
                 <!--   <tbody>
                    <?php foreach ($users_list as $key => $value) { ?>
                        <tr>
                            <td class="blue">
                                <a href="<?php echo base_url();?>index.php/admin/cohort/checklist"><?php echo $value->scr_firstname;?></a>
                            </td>
                            <td>
                                <?php echo $value->scr_nickname;?>
                            </td>
                            <td>
                                <?php if($value->random_cohort!=''){ ?>
                                    Cohort <?php echo $value->random_cohort;?>
                                    <?php } ?>
                            </td>
                            <td>
                                <?php if($value->scr_dob) echo date("D M, Y",strtotime($value->scr_dob));?>
                            </td>
                            <td>
                                <?php echo ($value->scr_gender=='m')?"Male":($value->scr_gender=='f')?"Female":"";?>
                            </td>
                            <td>
                               <?php echo $value->scr_email;?>
                            </td>
                            <td>
                               <?php echo $value->scr_work;?>
                            </td>
                            <td>
                               <?php echo $value->scr_home;?>
                            </td>
                            <td>
                               <?php echo $value->scr_cell;?>
                            </td>
                        </tr>
                    <?php }  ?>
                    
                    </tbody> -->
                    <tbody>
                    <?php if(isset($myparticipants_details)){ for($i=0;$i<count($myparticipants_details);$i++) { ?>
                      <tr >
                            <td class="blue col-md-2">
                            <form action="<?php echo base_url();?>index.php/admin/cohort/checklist" method="post">
                                <input type="submit" class="a-color"style="background: none;border: none;" value="<?php echo ucfirst($myparticipants_details[$i]->username); ?>">
                                <input type="hidden" name="user_name" value="<?php echo $myparticipants_details[$i]->username;?>">
                            </form>
                            </td>
                            <td class="col-md-1">
                                <?php echo ucfirst($myparticipants_details[$i]->nickname); ?>
                            </td>
                            <td class="col-md-1">
                                <?php if($myparticipants_details[$i]->class!=0){ ?>
                                     <?php echo $myparticipants_details[$i]->class_name; ?>
                                    <?php } ?>
                            </td>
                            <td class="col-md-2">
                                <?php if($myparticipants_details[$i]->date_of_birth) echo date("d M, Y",strtotime($myparticipants_details[$i]->date_of_birth));?>
                            </td>
                            <td class="col-md-1">
                                <?php if($myparticipants_details[$i]->gender == 'm') echo "Male"; elseif($myparticipants_details[$i]->gender=='f') echo "Female"; ?>
                            </td>
                            <td class="col-md-2">
                               <?php echo $myparticipants_details[$i]->email; ?>
                            </td>
                            <td class="col-md-2">
                               <?php echo $myparticipants_details[$i]->home_phone; ?>
                            </td>
                            <td class="col-md-2">
                               <?php echo $myparticipants_details[$i]->work_phone; ?>
                            </td>
                            <td class="col-md-2">
                               <?php echo $myparticipants_details[$i]->cell_phone; ?>
                            </td>
                        </tr>
                    <?php }  } ?>
                    
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
    
</script>
