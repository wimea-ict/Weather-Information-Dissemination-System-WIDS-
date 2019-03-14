
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Decadal_forecast Read</h3>
        <table class="table table-bordered">
		<?php 
		    $reg = $this->db->get_where('region',array('id'=>$region));
        $reg2 = $this->db->get_where('ussdsubregions',array('subregionid'=>$subregion));
		?>
		 <tr><td>Region</td><td><?php foreach ($reg->result() as $p){ echo $p->name ; } ?></td></tr>
     <tr><td>Sub Region</td><td><?php foreach ($reg2->result() as $p2){ echo $p2->subregionname ; } ?></td></tr>
	    <tr><td>Advisory</td><td><?php echo $advisory.$advisoryLuganda; ?></td></tr>
	    <tr><td>Date From</td><td><?php echo $date_from; ?></td></tr>
	    <tr><td>Date To</td><td><?php echo $date_to; ?></td></tr> 
        <tr><td>Graphical</td><td><img src="<?php echo base_url().$graph?>" class="user-image" alt="<?php echo $graph; ?>"></td></tr>
         <tr><td>Audio</td><td>
                    <audio controls >
                        <source src="<?php echo base_url().$audio; ?>" type="audio/mpeg">
                    </audio>
                </td></tr>
	    <tr><td>Issuetime</td><td><?php echo $issuetime; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('index.php/decadal_forecast/create1') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->