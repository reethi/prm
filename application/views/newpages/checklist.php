
<div class=" col-md-12" style="margin-top:17px;">
<div class="col-md-7 col-sm-6" style="background:white;margin-right:0px;min-height:204px;">
    <div class="row">&nbsp;</div>
    <div class="col-md-4 col-sm-6 ">
        <img src="<?php echo base_url();?>assets/images/dustin_profile_image.png">
    </div>
    <div class="col-md-5 col-sm-6 details-res">
        <strong><h3>Dustin Yoder<?php //echo $values->first_name;?> <?php //echo $values->last_name;?></h3></strong>
        <strong>Diet:</strong>Low Fat<?php //echo $profile->diet;?><br>
        <strong>Class:</strong>Monday's @2pm <?php //echo $profile->class_name;?><br>
        <strong>Health Educator:</strong> Jane Doe[<a href="" style="color:#0098DB;">email</a>]
    </div>
    <!--<div class="col-md-3 col-sm-7 details-edit text-right" style="padding-top:160px;padding-bottom: 10px;">
        <a href="<?php echo base_url(); ?>index.php/dashboard/update_details" class="menu-text" style="color:blue;">
            <strong style="color:#0098DB;">Edit Profile</strong>
        </a>
    </div> -->
</div>
<div class="col-md-5 col-sm-6 text-center" style="background-color: white;height:75px; border-width:1px 1px 0px 1px; border-style: solid; border-color: #DDD;padding-top: 20px;">
    <h4><b>Participant ID: 24143252<?php //echo $values->participant_id;?></b></h4>
</div>
<div class="col-md-5 col-sm-6 text-center" style="background-color: white;height:55px; border-width:1px 1px 0px 1px; border-style: solid; border-color: #DDD;padding-top:20px;">
    <i class="glyphicon glyphicon-map-marker" style="vertical-align:middle; top:0px;font-size:15px;"></i>&nbsp;
    123,Street Name,City,State
    <?php /*if($values->address!=''){
        echo $values->address;
    }
    if($values->city!=''){
        echo ",".$values->city;
    }
    if($values->state!=''){
        echo ",".$values->state;
    }
    if($values->zip!='0'){
        echo ",".$values->zip;
    }*/
    ?>
</div>

<div class="col-md-2 col-sm-3 text-center" style="background-color: white;height:75px; border-width:1px 1px 1px 1px; border-style: solid; border-color: #DDD;padding-top: 20px;">
    <i class="glyphicon glyphicon-earphone" style="color:#000;font-size: 16px;margin-top: 10px;"></i>&nbsp;
    <span style="float: right;margin-top: -11px;"><b>Home</b>:123.456.789<br>
    <b style="margin-left: -3px;">Work</b>:123.456.789<br>
    <b style="margin-left: -8px;">Cell</b>:123.456.789</span>
</div>
<div class="col-md-3 col-sm-3 text-center" style="background-color: white;height:75px; border-width:1px 1px 1px 1px; border-style: solid; border-color: #DDD;padding-top: 20px;">
    <i class="glyphicon glyphicon-envelope" style="color:#000;font-size: 16px;margin-top: 10px;"></i>&nbsp;
    <a href="" style="color:#0098DB;margin-t0p:10px;">email@website.com</a>
</div>
</div>

                    <div class="row" style="margin-right:0px;overflow-y:hidden;">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="widget flat radius-bordered" style="margin-top: 17px;margin-left: 17px;">
                                <div class="widget-header bg-themeprimary">
                                    <span class="widget-caption">Checklist</span>
                                    
                                </div>
                                <div class="widget-body" style="padding: 25px;overflow-y:hidden;">
                                    <div id="simplewizardinwidget" class="wizard" data-target="#simplewizardinwidget-steps" style="box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.3);">
                                        <ul class="steps">
                                            <li data-target="#simplewizardinwidgetstep1" class="active"><span class="step">1</span><span class="red_active">Get Started </span><span class="chevron"></span></li>
                                            <li data-target="#simplewizardinwidgetstep2"><span class="step">2</span><span class="red_active">3 Months</span><span class="chevron"></span></li>
                                            <li data-target="#simplewizardinwidgetstep3"><span class="step">3</span><span class="red_active">6 Months</span><span class="chevron"></span></li>
                                            <li data-target="#simplewizardinwidgetstep4"><span class="step">4</span><span class="red_active">12 Months</span><span class="chevron"></span></li>
                                        </ul>
                                        
                                    </div>
                                    <div class="step-content" id="simplewizardinwidget-steps" style="box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.3);">
                                        <div class="step-pane active" id="simplewizardinwidgetstep1">
                                            
                                            <div class="row" style="width:56%;margin-left: -10px;background-color: rgba(220, 220, 220, 0.23);">
                                               <div class="col-lg-2 col-sm-4 col-xs-4" style="border-right: 1px solid rgba(206, 197, 197, 1) !important;margin-top: 10px;">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input class="colored-blue" style="border:#000;" checked="checked" type="checkbox">
                                                            <span class="text" sstyle="color:black;">Blue</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-sm-4 col-xs-4">
                                                    <div class="checkbox">
                                                        <p style="color:#0098DB;font-size:10px;line-height: 15px;margin: 0px 0px 0px;">
                                                           Clinic Visit
                                                        </p>
                                                        <p style="font-size:10px;line-height: 15px;margin: 0px 0px 0px;">Schedule a clinic visit, Take a few mesurements, and a fasting blood draw</p>
                                                        <p style="color: rgba(3, 1, 1, 0.34);font-size:10px;line-height: 15px;margin: 0px 0px 0px;">Completeby Nov 19th - Dec 12th </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="step-pane" id="simplewizardinwidgetstep2">This is step 2</div>
                                        <div class="step-pane" id="simplewizardinwidgetstep3">This is step 3</div>
                                        <div class="step-pane" id="simplewizardinwidgetstep4">This is step 4</div>
                                        <div class="step-pane" id="simplewizardinwidgetstep5">This is step 5</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
