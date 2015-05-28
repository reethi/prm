jQuery(function($) {
       $(".transparentbutton,.close").click(function() {
            $("#push_participant")[0].reset();
            $("#push_participant").validate().resetForm();
            $("#push_participant").find('.has-info').removeClass('has-info');
            $("#push_participant").find('.has-error').removeClass('has-error');
        });
      //documentation : http://docs.jquery.com/Plugins/Validation/validate
        $('#push_participant').validate({
          errorElement: 'div',
          errorClass: 'help-block',
          focusInvalid: false,
          rules: {
            video_type: {
              required: true
            },
            doc_file: {
              required: true
            },
            time_to_push: {
              required: true
            },
            class_to_push: {
              required: true
            }
            
          },
      
          messages: {
            video_type: {
              required: "Please enter media type."
            },
            doc_file: {
              required: "Please select file."
            },
            time_to_push: {
              required: "Please enter time to push."
            },
            class_to_push: {
              required: "Please enter time to push."
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
            var submitURL = baseUrl + "/index.php/admin/dashboard/create_class";

            $('.se-pre-con').show();
            $.post(submitURL, 
                $('form#push_participant').serialize() , 
                function(data){
                    if(data.success == 1){
                        $('#push_participant_popup').hide();
                        $('#push_participant_success').modal('show');
                    }else{
                        $('#push_participant_popup').hide();
                        $('#push_participant_success').modal('show');
                    }
                }, "json");
          },
          invalidHandler: function (form) {
          }
        });
      

      
      });