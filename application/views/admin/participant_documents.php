<?php //echo "<pre>";print_r($docs);exit;?>
<script type="text/javascript">

function myfunction(clicked_id)
{
    //alert(clicked_id);
    
    document.getElementById("rea"+clicked_id).innerHTML="READ";
    document.getElementById("rea"+clicked_id).style.color="#B4B4B4";
}

</script>
<style type="text/css">
    .blue_color{
        color:#5db2ff;
        font-weight: bold;
    }
</style>
<div class="col-lg-6 col-md-10 col-sm-12 col-xs-12">
    <div class="widget">
        <div class="widget-header bg-prm">
            <span class="widget-caption"><strong>Documents</strong></span>
            <span class="widget-subcaption">
                <strong>Push | 
                    <a href=""style="color:#fff"  data-toggle="modal" data-target="#create_doc_popup">Add Doc</a>
                </strong>
            </span>
        </div>
         <div class="widget-body" style="min-height: 300px;">
            <div class="widget-main video_widget_main">
            
                <div class="form-group">
                    <span class="input-icon">
                        <input type="text" class="input-sm col-md-6">
                        <i class="glyphicon glyphicon-search blue"></i>
                    </span>
                <?php if(isset($docs) && count($docs)>0){ $j=1;for($i = 0;$i < count($docs); $i++){ $j++; ?>
                    <div class="col-md-12 col-sm-12 video_div_pad" >
                        <div class="col-md-1 col-sm-1">
                           <img src="<?php echo base_url(); ?>assets/images/icon_pdf.png" class="video_pdf">
                        </div>
                        <div class="col-md-6 col-sm-8">
                            <span><?php echo $docs[$i]->file_title?></span>
                        </div>
                        <div class="col-md-2 col-sm-1 unread example">
                            <span class="blue_color"id="rea<?php echo $j?>">
                                <strong>UNREAD</strong>
                            </span>
                           
                        </div>
                        <div class="col-md-3 col-sm-2 col-xs-6 icon_padd">
                            <a target="_blank" id="<?php echo $j;?>"onclick="return myfunction(this.id);" href="<?php echo base_url()?>uploads/docs/<?php echo $docs[$i]->file_name?>">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                            <a download href="<?php echo base_url()?>uploads/docs/<?php echo $docs[$i]->file_name?>">
                                <span class="glyphicon glyphicon-download-alt pull-right"></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-0"></div>
                <hr class="col-md-11 col-sm-12 hr_pad">
                <div class="col-md-0 col-sm-0"></div>
                <?php } } else{ ?>
               <center>  <br><br>No Documents Available  <hr class="col-md-11 col-sm-12 hr_pad">
                <div class="col-md-0 col-sm-0"></div></center>
                <?php } ?>
                </div>
              
                
            </div>
        </div>
    </div>
</div>