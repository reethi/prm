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
                        <?php foreach ($class_info as $key => $value) {?>
                        <tr>
                            <td class="blue">
                               <a href="<?php echo base_url(); ?>index.php/admin/cohort?classid=<?php echo $value->classid;?>" class="a-color"> <?php echo $value->class_name;?></a>
                            </td>
                            <td>
                                <?php echo $value->class_time_name;?>
                            </td>
                            <td class="center ">
                                <?php echo $value->particiant_count;?>
                            </td>
                        </tr>
                        <?php } ?>
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