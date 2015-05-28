jQuery(function($) {
        $('#start_date').datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $('#end_date').datepicker({
            dateFormat: 'yy-mm-dd'
        });

        $(".transparentbutton,.close").click(function() {
            $("#create_checklist")[0].reset();
            $("#create_checklist").validate().resetForm();
            $("#create_checklist").find('.has-info').removeClass('has-info');
            $("#create_checklist").find('.has-error').removeClass('has-error');
        });
        //documentation : http://docs.jquery.com/Plugins/Validation/validate
        $('#create_checklist').validate({
          errorElement: 'div',
          errorClass: 'help-block',
          focusInvalid: false,
          rules: {
            title: {
              required: true
            },
            url: {
              required: true,
              url:true
            },
            start_date1: {
              required: true
            },
            end_date1: {
              required: true
            }
          },
      
          messages: {
            title: {
              required: "Please enter a title."
            },
            url: {
              required: "Please provide a valid url.",
              url: "Please provide a valid url"
            },
            start_date1: {
              required: "Please enter a start date."
            },
            end_date1: {
              required: "Please enter a end date."
            }

          },
      
          invalidHandler: function (event, validator) { //display error alert on form submit   
            $('.alert-danger', $('.login-form')).show();
          },
      
          highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
            $(e).closest('.modal-body').addClass('height_modal');
          },
      
          success: function (e) {
            $(e).closest('.form-group').removeClass('has-error').addClass('has-info');
            $(e).closest('.modal-body').removeClass('height_modal');
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
            var submitURL = baseUrl + "/index.php/admin/checklist/create";

            $.post(submitURL, 
                $('form#create_checklist').serialize() , 
                function(data){
                    if(data.success == 1){
                        $('#checklist_popup').hide();
                        $('#checklist_success_message').modal('show');
                    }else{
                        $('#checklist_popup').hide();
                        $('#checklist_failure_message').modal('show');
                    }
                }, "json");
          },
          invalidHandler: function (form) {
          }
        });
      

      
      });