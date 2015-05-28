$(function(){
    var files;
    $('#study_file').on('change', prepareUpload);
    // Grab the files and set them to our variable
    function prepareUpload(event)
    {
            files = event.target.files;
    }
    
    
    var batchfile;    
    $('#study_batch').on('change', prepareUpload1);
    
    // Grab the files and set them to our variable
    function prepareUpload1(event)
    {
            batchfile = event.target.batchfile;
    }
    
    var oTable1 = $('#study_results-table').dataTable( {"aoColumns": [{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false }] } );
    
    $('table th input:checkbox').on('click' , function(){
        var that = this;
        $(this).closest('table').find('tr > td:first-child input:checkbox')
        .each(function(){
          this.checked = that.checked;
          $(this).closest('tr').toggleClass('selected');
        });
          
    });

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
        
        $("#upload_study_batch")[0].reset();
        $("#upload_study_batch").validate().resetForm();
        $("#upload_study_batch").find('.has-info').removeClass('has-info');
        $("#upload_study_batch").find('.has-error').removeClass('has-error');
        
        $("#upload_study_result")[0].reset();
        $("#upload_study_result").validate().resetForm();
        $("#upload_study_result").find('.has-info').removeClass('has-info');
        $("#upload_study_result").find('.has-error').removeClass('has-error');
        
        $(".modal-box, .modal-overlay").fadeOut(500, function() {
            $(".modal-overlay").remove();
        });
        $('#myModal').modal('hide');
    });
  
    $(window).resize(function() {
        $(".modal-box").css({
            top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
            left: ($(window).width() - $(".modal-box").outerWidth()) / 2
        });
    });
  
    $(window).resize();
        
    $('#study_batch,#study_file').ace_file_input({
        no_file:'',
        btn_choose:'Browse',
        btn_change:'Browse',
        droppable:true,
        onchange:null,
        icon_remove:null,
        no_icon:null,
        //thumbnail:false //| true | large
        //whitelist:'gif|png|jpg|jpeg'
        //blacklist:'exe|php'
        //onchange:''
        //
    });

    $(".no_button").click(function() {
        $("#upload_study_result").validate().resetForm();
        $("#upload_study_result").find('.has-info').removeClass('has-info');
        $("#upload_study_result").find('.has-error').removeClass('has-error');
    });
  

    $('#upload_study_result').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: false,
        rules: {
            study_name: {
                required: true
            },
            participant_id:{
                required: true
            },
            study_file: {
                required: true,
                extension: "pdf"
            }
        },
        messages: {
            study_file: {
              extension: "Please provide files with valid extension(pdf) only."
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
            var postdata = new FormData(form);
            // var postdata1 = $('form#upload_participant').serialize();
            // postdata = postdata + postdata1;
            var participant_id = $('#participant_id').val();
            var study_name = $('#study_name').val();
            //postdata = postdata + "&participant_id="+participant_id+"&study_name="+study_name;
            $.ajax({
                url: '<?php echo base_url();?>index.php/admin/studyresult/add_study_result',
                type: 'POST',
                data: postdata,
                cache: false,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false,
                success: function(data)
                {
                    //alert(data);
                 window.location = '<?php echo base_url();?>index.php/admin/studyresult';
                }
            });
        },
        invalidHandler: function (form) {
        }
    });

    $('#upload_study_batch').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: false,
        rules: {
            study_batch: {
                required: true,
                extension: "zip"
            }
        },
        messages: {
            study_batch: {
                extension: "Please provide files with valid extension(zip) only."
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
            var postdata = new FormData();
            $.each(files, function(key, value)
            {
                postdata.append(key, value);
            });
            $.ajax({
                url: '<?php echo base_url();?>index.php/admin/studyresult/import',
                type: 'POST',
                data: postdata,
                cache: false,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false,
                success: function(data)
                {
                    window.location = '<?php echo base_url();?>index.php/admin/studyresult';
                }
            });
        },
        invalidHandler: function (form) {
         }
    });
});