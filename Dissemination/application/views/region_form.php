<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>REGION</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Region Name <?php echo form_error('region_name') ?></td>
            <td><input type="text" class="form-control" name="region_name" id="region_name" placeholder="Region Name" value="<?php echo $region_name; ?>" />
        </td>
        <tr><td>Zone <?php echo form_error('zone') ?></td>
            <td>
                <?php echo combo_function('zone_id', 'zone', 'zone_name', 'id', $zone_id)?>
            </td></tr>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('region') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->