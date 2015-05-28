
<div class="col-md-8 col-sm-7" style="background:white;margin-right:0px;min-height:225px;border-width:1px 1px 1px 1px; border-style: solid; border-color: #DDD;">
    <div class="row">&nbsp;</div>
    <div class="col-md-4 col-sm-5 ">
        <img src="<?php echo base_url();?>assets/images/jennifer_profile.png">
    </div>
    <div class="col-md-4 col-sm-7 details-res">
        <div class="row"><strong><h3><?php echo $values->first_name;?> <?php echo $values->last_name;?></h3></strong></div>
        <div class="row"><strong>Admin Classes:</strong></div>
        <div class="row"><strong>Cohort 1B:</strong> Monday's @ 2PM</div>
        <div class="row"><strong>Cohort 1C:</strong> Tuesday's @ 3.30PM</div>
    </div>
    <div class="col-md-4 col-sm-7 details-edit text-right" style="padding-top:160px;padding-bottom: 10px;">
        <a href="<?php echo base_url(); ?>index.php/admin/dashboard/admin_update_details" class="menu-text" style="color:blue;">
            <strong style="color:#0098DB;">Edit Profile</strong>
        </a>
    </div>
</div>
<div class="col-md-4 col-sm-4 text-center" style="background-color: white;height:150px; border-width:1px 1px 0px 1px; border-style: solid; border-color: #DDD;padding-top: 60px;">
    <h4><strong>Administrator</strong></h4>
</div>
<div class="col-md-2 col-sm-2 text-center" style="background-color: white;height:75px; border-width:1px 1px 1px 1px; border-style: solid; border-color: #DDD;padding-top: 25px;">
    <i class="icon-phone" style="color:#000;font-size: 16px;"></i>&nbsp;
    <span class="menu-text" style="color:#000;"><?php echo $values->phone;?></span>
</div>
<div class="col-md-2 col-sm-2 text-center" style="background-color: white;height:75px; border-width:1px 1px 1px 1px; border-style: solid; border-color: #DDD;padding-top: 25px;">
    <i class="icon-envelope mapicon_result"></i>&nbsp;<?php echo $values->email;?>
</div>
<div class="col-md-12">&nbsp;</div>


<div class="col-md-12 col-sm-12 col-xs-12" style="border:1px solid #DDD;background:white;">
    <form class="form-horizontal" name="update_profile" id="update_profile" action="<?php echo base_url(); ?>index.php/admin/dashboard/update_info" method="post">
        <div class="col-lg-10">
            <div class="form-group">
                <h6><b>Update Profile</b></h6>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <div class="clearfix">
                    <input type="text" name="first_name" placeholder="First Name" id="first_name" class="input-xxlarge fontcolor" value="<?php echo $values->first_name;?>">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <div class="clearfix">
                    <input type="text" name="last_name" placeholder="Last Name" id="last_name" class="input-xxlarge fontcolor" value="<?php echo $values->last_name;?>">
                </div>
            </div>
        </div>
        
        
            <div class="col-lg-6">
                <div class="row form-group">
                    <div class="clearfix">
                        <input type="text" name="address" placeholder="Address" id="address" class="input-xxlarge fontcolor" value="<?php echo $values->address;?>">
                    </div>
                </div>
            </div> 
            <div class="col-lg-6">
                <div class="row form-group">
                    <div class="clearfix">
                        <input type="text" name="city" placeholder="City" id="city" class="input-xxlarge fontcolor" value="<?php echo $values->city;?>">
                    </div>
                </div>
            </div>
        
        
            <div class="col-lg-6">
                <div class="row form-group">
                    <div class="clearfix">
                      <input type="text" name="state" placeholder="State" id="state" class="input-xxlarge fontcolor" value="<?php echo $values->state;?>">    
                    </div>
                </div>
            </div> 
            <div class="col-lg-6">
                <div class="row form-group">
                    <div class="clearfix">
                        <input type="text" name="zip" placeholder="ZIP" id="zip" class="input-xxlarge fontcolor" value="<?php echo $values->zip;?>">
                    </div>
                </div>
            </div>
        
        
            <div class="col-lg-6">
                <div class="row form-group">
                    <div class="clearfix">
                      <input type="tel" id="phone" name="phone" placeholder="Phone" class="input-xxlarge fontcolor" value="<?php echo $values->phone;?>"/>    
                    </div>
                </div>
            </div> 
            <div class="col-lg-6">
                <div class="row form-group">
                    <div class="clearfix">
                        <input type="text" name="email" placeholder="Email" id="email" class="input-xxlarge fontcolor" value="<?php echo $values->email;?>">
                    </div>
                </div>
            </div>
        
        
            <div class="col-lg-6">
                <div class="row form-group">
                    <div class="clearfix">
                        <input type="password" name="new_password" placeholder="New Password" id="new_password" class="input-xxlarge fontcolor">
                    </div>
                </div>
            </div> 
            <div class="col-lg-6">
                <div class="row form-group">
                    <div class="clearfix">
                        <input type="password" name="verify_password" placeholder="Verify password" id="verify_password" class="input-xxlarge fontcolor">
                    </div>
                </div>
            </div>
        
        
            <div class="col-lg-6">
                <div class="row form-group">
                    <div class="clearfix">
                        <button type="submit" class="yes_button">Save</button>
                    </div>
                </div>
            </div> 
        
    </form>
</div>

 
<script src="<?php echo base_url();?>assets/aceadmin/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/aceadmin/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
      jQuery(function($) {
      
        //documentation : http://docs.jquery.com/Plugins/Validation/validate
        $.mask.definitions['~']='[+-]';
        $('#phone').mask('(999) 999-9999');
        
        
        jQuery.validator.addMethod("phone", function (value, element) {
          return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
        }, "Please provide a valid phone.");

        $('#update_profile').validate({
          errorElement: 'div',
          errorClass: 'help-block',
          focusInvalid: false,
          rules: {
            first_name: {
              required: true
            },
            last_name: {
              required: true
            },
            address:{
              required: true,
            },
            city:{
              required: true,
            },
            state:{
              required: true,
            },
            zip:{
              required: true
            },
            phone: {
              required: true,
              phone: 'required'
            },
            email: {
              required: true,
              email:true
            },
            new_password: {
              minlength: 5
            },
            verify_password: {
              equalTo: '#new_password'
            }
          },
      
          messages: {
            phone: {
              required: "Please provide a valid phone.",
              phone: "Please provide a valid phone."
            },
            email: {
              required: "Please provide a valid email.",
              email: "Please provide a valid email."
            },
            new_password: {
              minlength: "Please specify a secure password."
            },
            verify_password: {
              equalTo: "Passwords Mismatch"
            }

          },
      
          invalidHandler: function (event, validator) { //display error alert on form submit   
            $('.alert-danger', $('.login-form')).show();
          },
      
          highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
          },
      
          success: function (e) {
            $(e).closest('.form-group').removeClass('has-error').addClass('has-info');
            $(e).remove();
          },
      
          errorPlacement: function (error, element) {
            if(element.is(':checkbox') || element.is(':radio')) {
              var controls = element.closest('div[class*="col-"]');
              if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
              else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
            }
            else if(element.is('.select2')) {
              error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
            }
            else if(element.is('.chosen-select')) {
              error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
            }
            else error.insertAfter(element.parent());
          },
      
          submitHandler: function (form) {
            form.submit();
          },
          invalidHandler: function (form) {
          }
        });
      

      
      });
    </script>