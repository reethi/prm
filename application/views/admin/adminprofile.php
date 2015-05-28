<?php //echo "<pre>";count($values); exit; ?>
<div class="col-lg-7 col-md-10 col-sm-12 col-xs-12 admin_header">
    <div class="row">&nbsp;</div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <?php if($values->profile_pic!=''){ ?>
        <img src="<?php echo base_url();?>assets/images/<?php echo $values->profile_pic;?>" class="admin_padd">
    <?php } else { ?>
        <img src="<?php echo base_url();?>assets/images/profile_image.png" class="admin_padd">
        <?php } ?>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
        <div class="row">&nbsp;</div>

        <div class="row"><h3><strong><?php echo $values->full_name;?></strong></h3></div>
        <div class="row">&nbsp;</div>
        <div class="row"><strong>Admin Classes:</strong></div>
        <?php if(isset($classes) && isset($values->class_name)) { 
        foreach ($classes as $key => $value) { ?>
                <div class="row"><?php if(isset($values->class_name) && $values->class_name!=''){ echo $values->class_name.':'; } ?> <?php if(isset($values->class_time_name) && $values->class_time_name!='') { echo $values->class_time_name; } ?></div>
            <?php
            }
        } else{ echo "No Data Available"; } ?>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 details-edit text-right editprofile_admin">
        <?php if($editlink == 1){ ?>
        <a href="<?php echo base_url(); ?>index.php/admin/dashboard/admin_update" class="menu-text" style="color:blue;">
            <strong style="color:#0098DB;">Edit Profile</strong>
        </a>
        <?php } ?>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center" style="background-color: white;height:150px; border-width:1px 1px 0px 1px; border-style: solid; border-color: #DDD;padding-top: 60px;">
    <h4><strong>Administrator</strong></h4>
</div>
<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12  text-center" style="background-color: white;height:75px; border-width:1px 1px 1px 1px; border-style: solid; border-color: #DDD;padding-top: 27px;">
    <i class="glyphicon glyphicon-earphone" style="color:#000;font-size: 16px;top:3px;"></i>
    <span class="menu-text" style="color:#000;"><?php if($values->work_phone!='') echo $values->work_phone;?></span>
</div>
<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 text-center" style="background-color: white;height:75px; border-width:1px 1px 1px 1px; border-style: solid; border-color: #DDD;padding-top: 27px;">
    <i class="glyphicon glyphicon-envelope" style="color:#000;font-size: 13px;top:3px;padding-right:2px;"></i> 
    <span class="menu-text" style="color:#000;"> <?php echo $values->email;?></span>
</div>