<?php //echo "<pre>";print_r($videos);exit;

include_once "getid3.php";
function getDuration($file){
   //echo "hi"; echo file_exists('http://localhost/prmredcap/uploads/videos/2.mp4');exit;

if (file_exists($file)){
$getID3 = new getID3;
$file = $getID3->analyze($file);
$duration = $file['playtime_string'];
#This outputs the duration as HH:MM:SS
//echo "Duration: $duration";
return $duration;
}
else {
    //echo 'else';
return false;
}
}
?>
<style>
    .gray_icon1 {
    color: #CCC !important;
}
</style>
<script type="text/javascript">
    function rating(rating_id) {
        var overlay = document.getElementById(rating_id);
if (overlay.className.match("blue")) 
{
    //alert('exist');
    var j_value = rating_id.substring(4, 5);
        var i_value = rating_id.substring(6, 7);
        for(var k=j_value; k>=0; k--)
        {
            rating_id='one_'+k+'_'+i_value;
            //alert(rating_id);
            var d = document.getElementById(rating_id);
            d.className = d.className + " gray_icon1";
            //d.className = d.className + " gray_icon";
        }
}
else{
    //alert('not exist');
    //alert(rating_id);
    var j_value = rating_id.substring(4, 5);
        var i_value = rating_id.substring(6, 7);
        for(var k=j_value; k>=0; k--)
        {
            rating_id='one_'+k+'_'+i_value;
            //alert(rating_id);
            var d = document.getElementById(rating_id);
            d.className = d.className + " blue";
        }
}
        
}
</script>
<?php //print_r($videos); exit; ?> 

<div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">&nbsp;</div>
<div class="col-lg-1 col-md-10 col-sm-12 col-xs-12">&nbsp;</div>
<div class="col-lg-5 col-md-10 col-sm-12 col-xs-12">
    <div class="widget">
        <div class="widget-header bg-prm">
            <span class="widget-caption"><strong>Videos</strong></span>
            <span class="widget-subcaption">
                <strong>
                    <a href=""style="color:#fff"  data-toggle="modal" data-target="#create_video_popup">+ Add Video</a>
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
                    <?php if(isset($videos) && $videos!=0){ $j=1;for($i = 0;$i < count($videos); $i++){ $j++; ?>
                     <?php $video_file='uploads/videos/'. $videos[$i]->file_name;
                      $duration=getDuration($video_file); ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 video_div_pad">
                        <div class="col-md-2 col-sm-2 col-xs-2">
                            <img src="<?php echo base_url(); ?>assets/images/video_cooking_<?php echo $i?>.png" class="video_image">
                        </div>
                        <div class="col-md-7 col-sm-8 col-xs-10">
                            <span><?php echo $videos[$i]->file_title; ?></span><br>
                            <?php for($j=0;$j < 5;$j++)
                            { ?>
                            <span class="glyphicon glyphicon-star gray_icon" id="one_<?php echo $j."_".$i;?>"onclick="rating(this.id)"></span>
                            <?php } ?>
                            <span class="pull-right video_time"><?php echo $duration; ?></span>
                        </div>
                        <div class="col-md-3 col-sm-2 col-xs-6 icon_padd">
                            <a class="videolink" href="#" data-toggle="modal" data-target="#videoModal1" data-theVideo="<?php echo base_url()?>uploads/videos/<?php echo $videos[$i]->file_name?>">
                                <span class="glyphicon glyphicon-play"></span>
                            </a>
                            <a download href="<?php echo base_url()?>uploads/videos/<?php echo $videos[$i]->file_name?>">
                                <span class="glyphicon glyphicon-download-alt pull-right"></span>
                            </a>
                        </div>
                    </div>
             
                <div class="col-md-1 col-sm-0"></div> 
                <hr class="col-md-11 col-sm-12 hr_pad">
                <div class="col-md-0"></div>
                   <?php } } else{ ?>
               <center>  <br><br>No Documents Available  <hr class="col-md-11 col-sm-12 hr_pad">
                <div class="col-md-0 col-sm-0"></div></center>
                <?php } ?>
                      </div>
            </div>
        </div>
    </div>
</div>

<!--- video popup -->
<!--div id="video" style="display:none;" class="modal fade modal-prm notes_list" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
        <div class="widget widget_custom">
            <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12 video" style="padding:0px !important;">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/0oaU2GE3Gjs" frameborder="0" allowfullscreen></iframe>
            </div>
            </div>
        </div>
    </div>
</div>
<!--- end popup -->
<!--script src="<?php echo base_url();?>assets/beyondadmin/js/bootbox/bootbox.js"></script>
<script type="text/javascript">
    $(".glyphicon-play").on('click', function () {
        bootbox.dialog({
            message: $("#video").html(),
        });
   });
</script-->


<div class="modal fade bs-example-modal-lg videoModal" id="videoModal1" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div style="padding:10px;">
                    <span>LF Meal Planning</span>&nbsp;
                    <span class="glyphicon glyphicon-star blue"></span>
                    <span class="glyphicon glyphicon-star blue"></span>
                    <span class="glyphicon glyphicon-star blue"></span>
                    <span class="glyphicon glyphicon-star gray_icon"></span>
                    <span class="glyphicon glyphicon-star gray_icon"></span>
                </div>
                
                <div>
                    <iframe width="100%" height="500" src=""></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg videoModal" id="videoModal2" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div style="padding:10px;">
                    <span>Emotion and Food</span>&nbsp;
                    <span class="glyphicon glyphicon-star blue"></span>
                    <span class="glyphicon glyphicon-star blue"></span>
                    <span class="glyphicon glyphicon-star blue"></span>
                    <span class="glyphicon glyphicon-star gray_icon"></span>
                    <span class="glyphicon glyphicon-star gray_icon"></span>
                </div>
                
                <div>
                    <iframe width="100%" height="500" src=""></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg videoModal" id="videoModal3" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div style="padding:10px;">
                    <span>LC Meal Planning</span>&nbsp;
                    <span class="glyphicon glyphicon-star blue"></span>
                    <span class="glyphicon glyphicon-star blue"></span>
                    <span class="glyphicon glyphicon-star blue"></span>
                    <span class="glyphicon glyphicon-star gray_icon"></span>
                    <span class="glyphicon glyphicon-star gray_icon"></span>
                </div>
                
                <div>
                    <iframe width="100%" height="500" src=""></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg videoModal" id="videoModal4" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div style="padding:10px;">
                    <span>Cooking in Bulk</span>&nbsp;
                    <span class="glyphicon glyphicon-star blue"></span>
                    <span class="glyphicon glyphicon-star blue"></span>
                    <span class="glyphicon glyphicon-star blue"></span>
                    <span class="glyphicon glyphicon-star gray_icon"></span>
                    <span class="glyphicon glyphicon-star gray_icon"></span>
                </div>
                
                <div>
                    <iframe width="100%" height="500" src=""></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

  autoPlayYouTubeModal();

  //FUNCTION TO GET AND AUTO PLAY YOUTUBE VIDEO FROM DATATAG
  function autoPlayYouTubeModal() {
      var trigger = $("body").find('[data-toggle="modal"]');
      trigger.click(function () {
          var theModal = $(this).data("target"),
              videoSRC = $(this).attr("data-theVideo"),
              videoSRCauto = videoSRC + "?autoplay=0";
          $(theModal + ' iframe').attr('src', videoSRCauto);
          $(theModal + ' button.close').click(function () {
              $(theModal + ' iframe').attr('src', videoSRC);
          });
      });
  }
</script>