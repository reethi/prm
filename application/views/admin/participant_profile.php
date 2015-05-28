<div class="col-lg-7 col-md-10 col-sm-12 col-xs-12 participant_profile">
    <div class="row">&nbsp;</div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <img src="<?php echo base_url();?>assets/images/dustin_profile_image.png" class="admin_padd">
    </div>

    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
        <div class="row"><h3><strong>Dustin Yoder</strong></h3></div>
        <div class="row">&nbsp;</div>
        <div class="row"><strong>Diet:</strong> Low Fat</div>
        <div class="row"><strong>Class:</strong> Monday's @ 2PM</div>
        <div class="row"><strong>Health Educator:</strong> Jane Doe[<a href="#">email</a>]</div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 details-edit text-right">
        <a id="open_notes_list"><i class="menu-icon fa fa-pencil-square-o"></i></a>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center" style="background-color: white;height:75px; border-width:1px 1px 0px 1px; border-style: solid; border-color: #DDD;padding-top: 20px;">
    <h4><strong>Participant ID: 24143252</strong></h4>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center" style="background-color: white;height:75px; border-width:1px 1px 0px 1px; border-style: solid; border-color: #DDD;padding-top: 22px;">
    <i class="glyphicon glyphicon-map-marker"></i> 123, Street Name, City, State
</div>
<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12  text-center" style="background-color: white;height:75px; border-width:1px 1px 1px 1px; border-style: solid; border-color: #DDD;padding-top: 10px;">
    <i class="glyphicon glyphicon-earphone" style="color:#000;font-size: 16px;padding-top:3px;"></i>&nbsp;
    <span class="menu-text" style="color:#000;">
        <b>Home</b>123.456.789
        <b>Work</b>123.456.789
        <b>Cell</b>123.456.789
    </span>
</div>
<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 text-center" style="background-color: white;height:75px; border-width:1px 1px 1px 1px; border-style: solid; border-color: #DDD;padding-top: 15px;">
    <i class="glyphicon glyphicon-envelope" style="color:#000;font-size: 13px;padding-top:13px;"></i>&nbsp;
    <span class="menu-text" style="color:#000;">email@website.com</span>
</div>
<script type="text/javascript">
    $("#open_notes_list").on('click', function () {
            bootbox.dialog({
                message: $("#notes_list").html(),
                
            });
        });
</script>