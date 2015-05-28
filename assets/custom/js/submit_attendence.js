jQuery(function($) {
        $('#start_date').datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $('#date').datepicker({
            dateFormat: 'yy-mm-dd'
        });

        $(".transparentbutton,.close").click(function() {
            $("#add_attendance")[0].reset();
            $("#add_attendance").validate().resetForm();
            $("#add_attendance").find('.has-info').removeClass('has-info');
            $("#add_attendance").find('.has-error').removeClass('has-error');
        });
        //documentation : http://docs.jquery.com/Plugins/Validation/validate
        $('#add_attendance').validate({
          errorElement: 'div',
          errorClass: 'help-block',
          focusInvalid: false,
          rules: {
            class_val: {
              required: true
            },
            date: {
              required: true
            },
            weight: {
              required: true
            }
          },
      
          messages: {
            class_val: {
              required: "Please enter class."
            },
            date: {
              required: "Please select date."
            },
            weight:{
              required: "Please enter weight."
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
            var submitURL = baseUrl + "/index.php/admin/dashboard/create_attendance";

            $('.se-pre-con').show();
            $.post(submitURL, 
                $('form#add_attendance').serialize() , 
                function(data){
                    if(data.success == 1){
                        $('#add_attendance_pop').hide();
                        $('#attendance_success_message').modal('show');
                    }else{
                        $('#add_attendance_pop').hide();
                        $('#attendance_failure_message').modal('show');
                    }
                }, "json");
          },
          invalidHandler: function (form) {
          }
        });
      

      
      });