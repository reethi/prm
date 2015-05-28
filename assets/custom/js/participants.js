$(function(){
    /* Batch file upload validations - START*/
    
    var files;
    $('input[type=file]').on('change', prepareUpload);
        
    function prepareUpload(event){
        files = event.target.files;
    }
    
    $('#upload_batch').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: false,
        rules: {
            batch_file: {
                required: true,
                extension: "xlsx"
            }
        },
        messages: {
            batch_file: {
                extension: "Please provide files with valid extension (xlsx) only."
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
            $('.se-pre-con').show();
            var postdata = new FormData();
            $.each(files, function(key, value)
            {
                postdata.append(key, value);
            });
                $.ajax({
                    url: '<?php echo base_url();?>index.php/admin/participants/import',
                    type: 'POST',
                    data: postdata,
                    cache: false,
                    dataType: 'json',
                    processData: false, // Don't process the files
                    contentType: false,
                    success: function(data)
                    {
                        window.location = '<?php echo base_url();?>index.php/admin/participants';
                    }
                });
            
        },
        invalidHandler: function (form) {
        }
    });
    
    /* Batch file upload validations - END*/
    
    /* Add Participant Form display and validations - START*/
    $('#file').ace_file_input({
        no_file:'',
        icon_remove:null,
        no_icon:null,
        btn_choose:'Browse',
        btn_change:'Browse',
        droppable:false,
        onchange:null,
        //thumbnail:false //| true | large
        //whitelist:'gif|png|jpg|jpeg'
        //blacklist:'exe|php'
        //onchange:''
        //
    });
    
    $.mask.definitions['~']='[+-]';
    $('#phone').mask('(999) 999-9999');

    jQuery.validator.addMethod("phone", function (value, element) {
        return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
    }, "Enter a valid phone number.");
      
    $('#upload_participant').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusCleanup: true,
        focusInvalid: false,
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            address:{
                required:true
            },
            city: {
                required: true
            },
            state: {
                required: true
            },
            zip: {
                required: true
            },
            participant_id:{
                required: true
            },
            diet:{
                required: true
            },
            class_name:{
                required:true
            },

            phone:{
                required:true
            },
            email: {
                required: true,
                email:true
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
                required: "Please specify a password.",
                minlength: "Please specify a secure password."
            },
            confirm_password: {
                required: "Please specify a password.",
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
            //form.submit();
            $('.se-pre-con').show();
            $.post('<?php echo base_url();?>index.php/admin/participants/add_participant', 
                $('form#upload_participant').serialize() , 
                function(data){
                    //alert(data.success);
                    window.location = '<?php echo base_url();?>index.php/admin/participants';
                }, "json");

        },
        invalidHandler: function (form) {
        }
    });
    
    /* Add Participant Form display and validations - END*/
    
    /* Participants Grid Related JQuery - START*/
    var oTable1 = $('#participants_table').dataTable({"aoColumns": [{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false }]});
    
    $('table th input:checkbox').on('click' , function(){
        var that = this;
        $(this).closest('table').find('tr > td:first-child input:checkbox')
        .each(function(){
            this.checked = that.checked;
            $(this).closest('tr').toggleClass('selected');
        });
    });
    
    $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
    
    function tooltip_placement(context, source) {
        var $source = $(source);
        var $parent = $source.closest('table')
        var off1 = $parent.offset();
        var w1 = $parent.width();
    
        var off2 = $source.offset();
        var w2 = $source.width();
    
        if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
        return 'left';
    }
    /* Participants Grid Related JQuery - END*/
    
    /* Modal related Jquery(POPUP) - START*/
    
    var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");
    
    $('a[data-modal-id]').click(function(e) {
        e.preventDefault();
        $("body").append(appendthis);
        $(".modal-overlay").fadeTo(500, 0.7);
        //$(".js-modalbox").fadeIn(500);
        var modalBox = $(this).attr('data-modal-id');
        $('#'+modalBox).fadeIn($(this).data());
    }); 
   
   
    $(".js-modal-close, .modal-overlay").click(function() {
       
        $('.ace-file-input').find('.file-name').attr('data-title','');
      
        $("#upload_batch")[0].reset();
        $("#upload_batch").validate().resetForm();
        $("#upload_batch").find('.has-info').removeClass('has-info');
        $("#upload_batch").find('.has-error').removeClass('has-error');
        
        
        $("#upload_participant")[0].reset();
        $("#upload_participant").validate().resetForm();
        $("#upload_participant").find('.has-info').removeClass('has-info');
        $("#upload_participant").find('.has-error').removeClass('has-error');
        
        $(".modal-box, .modal-overlay").fadeOut(500, function() {
            $(".modal-overlay").remove();
        });
        
    });
  
    $(window).resize(function() {
        $(".modal-box").css({
          top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
          left: ($(window).width() - $(".modal-box").outerWidth()) / 2
        });
    });
  
    $(window).resize();

    $(".no_button").click(function() {
        //$("#upload_participant")[0].reset();
        $("#upload_participant").validate().resetForm();
        $("#upload_participant").find('.has-info').removeClass('has-info');
        $("#upload_participant").find('.has-error').removeClass('has-error');
        
        
        
    });
    /* Modal related Jquery(POPUP) - END*/
  
});