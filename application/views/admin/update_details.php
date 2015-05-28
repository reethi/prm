<style>
::-webkit-input-placeholder {
   color: #000;
   font-weight:bold;
   font-size:10px;
}

:-moz-placeholder { /* Firefox 18- */
   color: #000; 
      font-weight:bold;
   font-size:10px;
}

::-moz-placeholder {  /* Firefox 19+ */
   color: #000;  
      font-weight:bold;
   font-size:10px;
}

:-ms-input-placeholder {  
   color: #000;  
      font-weight:bold;
   font-size:10px;
}


</style>

<div class="row table-responsive">
<table class="table table-bordered table-hover" style="background-color: #FFF;">

    <tr>
      <td rowspan="3">
        
           <div class="col-lg-2">
                <img src="<?php echo base_url();?>assets/images/jennifer_profile.png">
            </div>
           <div class="col-lg-2"></div>
            <div class="col-lg-8 "><br>
                <div class="row"><strong><h3>Jennifer Robinson</h3></strong></div>
                <div class="row"><strong>Admin Classes:</strong></div>
                <div class="row"><strong>Cohort 1B:</strong> Monday's @ 2PM</div>
                <div class="row"><strong>Cohort 1C:</strong> tuesday's @ 3.30PM</div>
            </div>
                
            <div class="col-lg-2 " style="float:right;"> 
            <a href="<?php echo base_url(); ?>index.php/admin/dashboard/admin_update_details" class="menu-text" style="color:blue;">
                    <strong style="color:#0098DB;">Edit Profile</strong></a>
            </div>


      </td>
      <td colspan="2" class="text-center">
          <h4 style="padding-top:27px;">Administrator</h4>
      </td>
      
    </tr>
    
    <tr>
  
      <td class="text-center"> 
       <i class="icon-phone" style="color:#000;font-size: 16px;"></i>&nbsp;
      <span class="menu-text" style="color:#000;">1234567890</span></td>
        <td class="text-center"> 
              <i class="icon-envelope" style="color:#000;font-size: 16px;"></i>&nbsp;
      <span class="menu-text" style="color:#000;">email@website.com</span></td>
    </tr>
</table>
</div>
<div class="row">&nbsp;</div>
<div class="row" style="background-color: #FFF; box-shadow: -1px -1px 5px #DDDDDD;">
<form class="form-horizontal" name="update_profile" id="update_profile" action="<?php echo base_url(); ?>index.php/dashboard/result1" method="post">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-12"><h6><strong>Update Profile</strong></h6></div>
      </div>
      <div class="row">&nbsp;</div>
      <div class="row">
        <div class="col-lg-6"><input type="text" name="full_name" placeholder="Name" id="name" class="input-xxlarge"></div>
        <div class="col-lg-6"><input type="text" name="phone" placeholder="Phone" id="phone" class="input-xxlarge"></div>
      </div>
      <div class="row">&nbsp;</div>
      <div class="row">
        <div class="col-lg-3"><input type="password" name="password" placeholder="Password" id="password" class="input-xxlarge"></div>
            <div class="col-lg-3"><input type="password" name="password" placeholder="New Password" id="npassword" class="input-xxlarge"></div>
            <div class="col-lg-6"><input type="text" name="email" placeholder="Email" id="email" class="input-xxlarge"></div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
        <div class="col-lg-12">
                <button type="submit" class="yes_button">Save</button>
            </div>
      </div>
      <div class="row">&nbsp;</div>
    </div>
</form>
</div>