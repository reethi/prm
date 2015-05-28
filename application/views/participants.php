<style>
.td-border{
border: 1px solid #DDD;
}
.td-background{
    background-color:rgba(136, 137, 136, 1);
    color:#fff;
    font-weight:bold;
}
.modal-box {
  display: none;
  position: absolute;
  z-index: 1000;
  width: 98%;
  background: white;
  border-bottom: 1px solid #aaa;
  border-radius: 4px;
  box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  border: 1px solid rgba(0, 0, 0, 0.1);
  background-clip: padding-box;
}
 
.modal-box header,
.modal-box .modal-header {
  padding: 1.25em 1.5em;
  border-bottom: 1px solid #ddd;
}
 
.modal-box header h3,
.modal-box header h4,
.modal-box .modal-header h3,
.modal-box .modal-header h4 { margin: 0; }
 
.modal-box .modal-body { padding: 2em 1.5em; }
 
.modal-box footer,
.modal-box .modal-footer {
  padding: 1em;
  border-top: 1px solid #ddd;
  background: rgba(0, 0, 0, 0.02);
  text-align: right;
}
 
.modal-overlay {
  opacity: 0;
  filter: alpha(opacity=0);
  position: absolute;
  top: 0;
  left: 0;
  z-index: 900;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.3) !important;
}
 
a.close {
  line-height: 1;
  font-size: 1.5em;
  position: absolute;
  top: 5%;
  right: 2%;
  text-decoration: none;
  color: #bbb;
}
 
a.close:hover {
  color: #222;
  -webkit-transition: color 1s ease;
  -moz-transition: color 1s ease;
  transition: color 1s ease;
}
@media (min-width: 32em) {
  .modal-box { width: 70%; }
}
.btn {
    background-color:blue;
}

</style>

<form class="form-horizontal" name="update_profile" id="update_profile" action="" method="post">
    <div class="col-lg-12" style="padding-left:0px;">
        <div class="row">
            <div class="col-lg-12">
                <a class="js-open-modal" href="#" data-modal-id="popup"><button class="yes-button">Add Participants</button></a>
            </div>
        </div>
        <div class="row">&nbsp;</div>
    </div>
</form>
<div id="popup" class="modal-box" style="margin-top: -190px;margin-left: -100px;position:top !important;width:50%;"> 
  <header style="background-color:rgba(117, 0, 0, 1);padding: 0.25em 1.5em;">
    <a href="#" style="color:#fff;" class="js-modal-close close"><b>×</b></a>
    <h6 style="color:#fff;"><b>Add Participant</b></h6>
  </header>
  <div class="modal-body">
    <div class="col-lg-12">
       
        <div class="row">
        <div class="col-lg-12">
             <h6><b>Upload Batch</b></h6>
             
                <input type="file" id="file" value="" />
        </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
        <h6><b>Add Individual</b></h6>
             <div class="col-lg-6">
              <label for="pass">Name</label>
                  <input type="text" id="name" value=""></div>
                  <div class="col-lg-3">
                  <label for="diet">Diet</label>
                <select value="Low Fat"><option value="Low Fat">Low Fat</option></select>
            </div>
            <div class="col-lg-3"></div>
        </div>
    <div class="row">&nbsp;</div>

           <div class="row">
             <div class="col-lg-6">
              <label for="participantid">Participant ID</label>
                  <input type="text" id="participantid" value=""></div> 
                  <div class="col-lg-3">
                  <label for="class">Class</label>
                <select value="Mon @ 3pm"><option value="Mon @ 3pm">Mon @ 3pm</option></select>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
             <div class="col-lg-2">
              <label for="address">Address</label></div>
             <div class="col-lg-11">
                  <input type="text" id="address" value="" class="input-xxlarge"></div> 
                  
            <div class="col-lg-1"></div>
        </div>
        <div class="row">&nbsp;</div>

           <div class="row">
             <div class="col-lg-6">
              <label for="participantid">Participant ID</label>
                  <input type="text" id="participantid" value=""></div> 
                  <div class="col-lg-3">
                  <label for="class">Class</label>
                <select value="Mon @ 3pm"><option value="Mon @ 3pm">Mon @ 3pm</option></select>
            </div>
            <div class="col-lg-3"></div>
        </div>

    </div>
        <div class="row">&nbsp;</div>
    </div>
  </div>
  <footer>
    <a href="#" class="js-modal-close">Close Button</a>
  </footer>
</div>
<table class="table" style="background-color: #FFF;width:100% !important;">
    <tr>
        <td colspan="4" class="td-background">
        <span><center>Name</center></span>
        </td>
        <td colspan="1" class="td-background">
        <span><center>Participant ID</center></span>
        </td>
        <td colspan="1" class="td-background">
        <span><center>Diet</center></span>
        </td>
        <td colspan="1" class="td-background">
        <span><center>Class</center></span>
        </td>
        <td colspan="1" class="td-background">
        <span><center>Email</center></span>
        </td>
        <td colspan="3" class="td-background">
        <span><center>Address</center></span>
        </td>
        <td colspan="1" class="td-background">
        <span><center>Phone</center></span>
        </td>
    </tr>
    <?php for($i=0;$i<=10;$i++)
    {?>
    <tr>
       <td colspan="4" class="td-border">
        <span style="color:#0098DB;"><center>Dustin Yoder</center></span>
        </td>
       <td colspan="1" class="td-border">
        <span><center>1234567890</center></span>
        </td>
        <td colspan="1" class="td-border">
        <span><center>Low Fat</center></span>
        </td>
        <td colspan="1" class="td-border">
        <span><center>Mon @ 3pm</center></span>
        </td>
        <td colspan="1" class="td-border">
        <span><center>dustin@sureify.com</center></span>
        </td>
        <td colspan="3" class="td-border">
        <span><center>1190 Willow Ave,San Joes,CA</center></span>
        </td>
        <td colspan="1" class="td-border">
        <span><center>408-123-4567</center></span>
        </td>
    </tr>
    <?php } ?>
</table>
</div>
<div class="col-lg-1">&nbsp;</div>
</div>

<!--div class="row">
    <div class="col-lg-3">&nbsp;</div>
    <div class="col-lg-4"  style="background-color:#FFF;">
        <div class="row" style="background-color:#009B76;color:#FFF;">
            <div class="col-lg-10"><h4><strong>Study results</strong></h4></div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-lg-5"></div>
            <div class="col-lg-5 pull-right"><a href="#"><strong>Download</strong></a></div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-lg-5">Glucose Study</div>
            <div class="col-lg-5 pull-right"><i>Coming Soon</i></div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-lg-5">Weight Survey</div>
            <div class="col-lg-5 pull-right"><i></i></div>
        </div>
        <div class="row">&nbsp;</div>
    </div>
    <div class="col-lg-4">&nbsp;</div>
</div-->
<script>
$(function(){
 
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
  
});
</script>