jQuery(function($) {
       
      $('.transparentbutton,.close').click(function(){
          $("#submit_weight")[0].reset();
          $("#submit_weight").validate().resetForm();
          $("#submit_weight").find('.has-info').removeClass('has-info');
          $("#submit_weight").find('.has-error').removeClass('has-error');
      });
      //documentation : http://docs.jquery.com/Plugins/Validation/validate
        $('#submit_weight').validate({
          errorElement: 'div',
          errorClass: 'help-block',
          focusInvalid: false,
          rules: {
            participant_name: {
              required: true
            },
            class_time: {
              required: true
            },
            weight: {
              required: true
            },
            class_date: {
              required: true
            }
          },
      
          messages: {
            participant_name: {
              required: "Please enter name."
            },
            class_time: {
              required: "Please select class."
            },
            weight:{
              required: "Please enter weight."
            }
            ,
            class_date:{
              required: "Please select date."
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
            var submitURL = baseUrl + "/index.php/admin/dashboard/submit_weight";

            $('.se-pre-con').show();
            $.post(submitURL, 
                $('form#submit_weight').serialize() , 
                function(data){
                    if(data.success == 1){
                        $('#submit_weight_pop').hide();
                        $('#weights_success_message').modal('show');
                    }else{
                        $('#submit_weight_pop').hide();
                        $('#weights_success_message').modal('show');
                    }
                }, "json");
          },
          invalidHandler: function (form) {
          }
        });
      

      
      });