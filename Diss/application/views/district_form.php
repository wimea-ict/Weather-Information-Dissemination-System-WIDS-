<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>DISTRICT</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>District Name <?php echo form_error('district_name') ?></td>
            <td><input type="text" class="form-control" name="district_name" id="district_name" placeholder="District Name" value="<?php echo $district_name; ?>" />
        </td>
	    <tr><td>Region Name <?php echo form_error('region_name') ?></td>
            <td>
              <?php echo combo_function('region_id','region','region_name','id','region_id')?>
	   </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('district') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->