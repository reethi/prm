jQuery(function($) {
       
      $('.transparentbutton,.close').click(function(){
          $("#create_doc")[0].reset();
          $("#create_doc").validate().resetForm();
          $("#create_doc").find('.has-info').removeClass('has-info');
          $("#create_doc").find('.has-error').removeClass('has-error');
      });  

      //documentation : http://docs.jquery.com/Plugins/Validation/validate
        $('#create_doc').validate({
          errorElement: 'div',
          errorClass: 'help-block',
          focusInvalid: false,
          rules: {
            url: {
              required: true
            },
            file: {
              required: true
            },
            title: {
              required: true
            },
            push_users_date: {
              required: true
            },
            class_name: {
              required: true
            },
            
          },
      
          messages: {
            url: {
              required: "Please enter url."
            },
            file: {
              required: "Please select file."
            },
            title: {
              required: "Please enter title."
            },
            push_users_date: {
              required: "Please select date."
            },
            class_name: {
              required: "Please select class."
            },

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
                $('form#create_doc').serialize() , 
                function(data){
                    if(data.success == 1){
                        $('#create_doc_popup').hide();
                        $('#doc_success_message').modal('show');
                    }else{
                        $('#create_doc_popup').hide();
                        $('#doc_success_message').modal('show');
                    }
                }, "json");
          },
          invalidHandler: function (form) {
          }
        });
      

      
      });