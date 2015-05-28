<link href="<?php echo base_url();?>assets/beyondadmin/css/dataTables.bootstrap.css" rel="stylesheet" />
    <div class="col-lg-6 col-md-10 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bg-prm">
                <span class="widget-caption"><strong>Your Classes</strong></span>
            </div>
            <div class="widget-body table-responsive">
                <table class="table table-striped table-bordered table-hover" id="your_class_list">
                    <thead>
                        <tr>
                            <th>
                                Class Name
                            </th>
                            <th>
                                Class Dates
                            </th>

                            <th>
                                Participants
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="blue">
                               <a href="<?php echo base_url(); ?>index.php/admin/cohort" class="a-color"> Cohort 1A</a>
                            </td>
                            <td>
                                Monday @ 3:00pm
                            </td>
                            <td class="center ">
                                33
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/admin/cohort" class="a-color">Cohort 1B</a>
                            </td>
                            <td>
                                Tuesday @ 3:00pm
                            </td>
                            <td class="center ">
                                43
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/admin/cohort" class="a-color">Cohort 1C</a>
                            </td>
                            <td>
                                Wednesday @ 3:00pm
                            </td>
                            <td class="center ">
                                77
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <a href="<?php echo base_url(); ?>index.php/admin/cohort" class="a-color"> Cohort 2A</a>
                            </td>
                            <td>
                                Monday @ 3:00pm
                            </td>
                            <td class="center ">
                                33
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div><!--Widget-->
    </div>
<script>
    InitiateClassListTable.init();
    $('#your_class_list_length').hide();
    $('.DTTTFooter').hide();
</script>