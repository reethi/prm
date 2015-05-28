//alert(baseUrl);
jQuery(function($) {
  $.mask.definitions['~']='[+-]';
  $('#admin_phone').mask('(999) 999-9999');

   jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, ""); 
            return this.optional(element) || phone_number.length > 9 &&
                phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
        }, "Please specify a valid phone number");

      //documentation : http://docs.jquery.com/Plugins/Validation/validate
        $('#admin_update_profile').validate({
          errorElement: 'div',
          errorClass: 'help-block',
          focusInvalid: false,
          rules: {
            admin_name: {
              required: true
            },
            admin_phone: {
              required: true,
              phoneUS: true
            },
            admin_email: {
              required: true,
              email:true
            },
            admin_new_password: {
              minlength: 5
            },
          },
      
          messages: {
            admin_phone: {
              required: "Please provide a valid phone.",
              phoneUS: "Please provide a valid phone."
            },
            admin_email: {
              required: "Please provide a valid email.",
              email: "Please provide a valid email."
            },
            admin_new_password: {
              minlength: "Please specify a secure password."
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
            var baseUrl = window.location.origin;
            var submitURL = baseUrl + "/index.php/admin/dashboard/admin_update_details";

            $.post(submitURL, 
                $('form#admin_update_profile').serialize() , 
                function(data){
                    if(data.success == 1){
                        var redirURL =   baseUrl + "/index.php/admin/dashboard";
                        window.location = redirURL;
                    }else{
                        $('#failure_message').show();
                    }
                }, "json");
          },
          invalidHandler: function (form) {
          }
        });
      

      
      });