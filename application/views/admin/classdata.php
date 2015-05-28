<script src="<?php echo base_url();?>assets/beyondadmin/js/charts/morris/raphael-2.0.2.min.js"></script>
<script src="<?php echo base_url();?>assets/beyondadmin/js/charts/morris/morris.js"></script>
<script src="<?php echo base_url();?>assets/custom/js/beyondadmin.custom.js"></script>

    
<script type="text/javascript">
    
    $( document ).ready(function() {
        themeprimary = getThemeColorFromCss('themeprimary');
        themesecondary = getThemeColorFromCss('themesecondary');
        themethirdcolor = getThemeColorFromCss('themethirdcolor');
        themefourthcolor = getThemeColorFromCss('themefourthcolor');
        themefifthcolor = getThemeColorFromCss('themefifthcolor');

        InitiateBarChartWeight.init();
        InitiateBarChartAttendance.init();
        
        $('#bar-chart-2').hide();
        
        $('#graphbuttons1').click(function(){
            $('#graphbuttons2').removeClass('graphactive');
            $('#graphbuttons1').addClass('graphactive');
            $('#bar-chart').show();
            $('#bar-chart-2').hide();
            
        });
        
        $('#graphbuttons2').click(function(){
            $('#graphbuttons1').removeClass('graphactive');
            $('#graphbuttons2').addClass('graphactive');
            $('#bar-chart-2').show();
            $('#bar-chart').hide();
        });
        
    });
    
    
</script>
    <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
    <div class="widget">
        <div class="widget-header bg-prm">
            <span class="widget-caption"><strong>Class Data</strong></span>
        </div>
        <div class="widget-body">
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" id="graphbuttons1" class="btn btn-default graphactive">Weight</button>
                <button type="button" id="graphbuttons2" class="btn btn-default">Attendance</button>
            </div>
            <div id="bar-chart" class=" chart chart-lg"></div>
            <div id="bar-chart-2" class="chart chart-lg"></div>
        </div>
    </div><!--Widget-->
</div>