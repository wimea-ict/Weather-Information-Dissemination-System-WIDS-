
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>User Feedback Details</h3>
        <table class="table table-bordered">
		<?php 
		    $reg = $this->db->get_where('region',array('id'=>$region));
		?>
		<tr><td>Name</td><td><?php echo $names; ?></td></tr>
		<tr><td>Advisory</td><td><?php echo $advisory; ?></td></tr>
		 <tr><td>Region</td><td><?php foreach ($reg->result() as $p){ echo $p->name ; } ?></td></tr>
	    
	    <tr><td></td><td><a href="<?php echo site_url('index.php/user_feedback/create1') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->