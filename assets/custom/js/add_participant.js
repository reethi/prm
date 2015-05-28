jQuery(function($) {

  $.mask.definitions['~']='[+-]';
      $('#phone').mask('(999) 999-9999');
      $('#submit_particiant').click(function(){
          $( "#upload_participant" ).submit();
      });       

      $('.transparentbutton,.close').click(function(){
          $("#upload_participant")[0].reset();
          $("#upload_participant").validate().resetForm();
          $("#upload_participant").find('.has-info').removeClass('has-info');
          $("#upload_participant").find('.has-error').removeClass('has-error');
      });      
       
      jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
          phone_number = phone_number.replace(/\s+/g, ""); 
          return this.optional(element) || phone_number.length > 9 &&
              phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
      }, "Please specify a valid phone number");

      //documentation : http://docs.jquery.com/Plugins/Validation/validate
        $('#upload_participant').validate({
          errorElement: 'div',
          errorClass: 'help-block',
          focusInvalid: false,
          rules: {
            participant_name: {
              required: true
            },
            diet: {
              required: true
            },
            participant_id: {
              required: true
            },
            class_name: {
              required: true
            },
             address: {
              required: true
            },
            phone:{
                required:true,
                phoneUS:true
            },
            email: {
              required: true
            },
            
          },
      
          messages: {
            participant_name: {
              required: "Please enter participant name."
            },
            diet: {
              required: "Please select diet."
            },
            participant_id: {
              required: "Please enter participant id."
            },
            class_name:{
              required: "Please enter class name."
            },
            address: {
              required: "Please select address."
            },
            phone: {
              required: "Please enter phone number."
            },
            email:{
              required: "Please enter email."
            }

          },
      
          invalidHandler: function (event, validator) { //display error alert on form submit   
            $('.alert-danger', $('.login-form')).show();
          },
      
          highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
            $(e).closest('.modal-content').addClass('modal_height2');
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
            var submitURL = baseUrl + "/index.php/admin/dashboard/add_participant";

            $.post(submitURL, 
                $('form#upload_participant').serialize() , 
                function(data){
                    if(data.success == 1){
                        $("#upload_participant")[0].reset();
                        $("#upload_participant").validate().resetForm();
                        $('#add_participant_popup').hide();
                        $('#participant_success_message').modal('show');
                    }else{
                      $("#upload_participant")[0].reset();
                      $("#upload_participant").validate().resetForm();
                        $('#add_participant_popup').hide();
                        $('#participant_failure_message').modal('show');
                    }
                }, "json");
          },
          invalidHandler: function (form) {
          }
        });
    });