<style>
    .DTTT.btn-group {
    position: relative;
    top: 0px;
    float:right;
    right: 0px !important;
    }
</style>
    <div class="col-lg-6 col-md-10 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bg-prm">
                <span class="widget-caption"><strong>Your Participants</strong></span>
            </div>
            <div class="widget-body table-responsive">
                <table class="table table-striped table-bordered table-hover" id="your_participants_list">
                    <thead>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Class
                            </th>

                            <th>
                                Diet
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($participant_info as $key => $value) { ?>
                        <tr>
                            <td>
                                 <a href="<?php echo base_url(); ?>index.php/admin/cohort/participant?id=<?php echo $value->userid;?>" class="a-color"><?php echo $value->username;?></a>
                            </td>
                            <td>
                                <?php echo $value->class_name;?>
                            </td>
                            <td class="center ">
                               <?php echo $value->diet_name;?>
                            </td>
                        </tr>

                        <?php } ?>
                        
                    </tbody> 
                </table>
            </div>
        </div><!--Widget-->
    </div>

<script>
    InitiateParticipntaListTable.init();
</script>