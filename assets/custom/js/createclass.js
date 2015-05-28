jQuery(function($) {
        $('[id^=end_date]').datepicker({
            dateFormat: 'yy-mm-dd'
        });

        $(".transparentbutton,.close").click(function() {
            $("#create_class")[0].reset();
            $("#create_class").validate().resetForm();
            $("#create_class").find('.has-info').removeClass('has-info');
            $("#create_class").find('.has-error').removeClass('has-error');
        });
      //documentation : http://docs.jquery.com/Plugins/Validation/validate
        $('#create_class').validate({
          errorElement: 'div',
          errorClass: 'help-block',
          focusInvalid: false,
          rules: {
            create_class_name: {
              required: true
            },
            class_health_educator: {
              required: true
            },
            location: {
              required: true
            },
            diet: {
              required: true
            },
            class_time:{
              required: true
            },
            color: {
              required: true
            },
            date: {
              required: true
            }
          },
      
          messages: {
            create_class_name: {
              required: "Please enter class."
            },
            class_health_educator: {
              required: "Please select health educator."
            },
            location:{
              required: "Please select location."
            },
            diet: {
              required: "Please select diet."
            },
            class_time: {
              required: "Please select time."
            },
            color: {
              required: "Please select color."
            },
            date: {
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
            var submitURL = baseUrl + "/index.php/admin/dashboard/create_class";

            
            $.post(submitURL, 
                $('form#create_class').serialize() , 
                function(data){
                    if(data.success == 1){
                        $('#create_class_popup').hide();
                        $('#class_success_message').modal('show');
                    }else if(data.success == 2){
                        $('#create_class_popup').hide();
                        $('#class_success_message').modal('show');
                    }else{
                        $('#create_class_popup').hide();
                        $('#class_success_message').modal('show');
                    }
                }, "json");
          },
          invalidHandler: function (form) {
          }
        });
      

      
      });