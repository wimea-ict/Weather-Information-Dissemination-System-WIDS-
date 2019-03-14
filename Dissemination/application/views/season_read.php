
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Seasonal Forecast Read</h3>
        <table class="table table-bordered">
		<?php 
		    $reg = $this->db->get_where('region',array('id'=>$region));
             $regg4 = $this->db->get_where('ussdsubregions',array('subregionid'=>$subregion));
		?>
		 <tr><td>Region</td><td><?php foreach ($reg->result() as $p){ echo $p->name ; } ?></td></tr>
	    <tr><td>Sub Region</td><td><?php foreach ($regg4->result() as $pg4){ echo $pg4->subregionname ; } ?></td></tr>
        <tr><td>Season Preiod</td><td><?php echo $season; ?></td></tr>
         <tr><td>Description</td><td><?php echo $description.$descriptionLuganda; ?></td></tr>
         <tr><td>Impact</td><td><?php echo $impact; ?></td></tr>
         <tr><td>Graphical</td><td><img src="<?php echo base_url().$graph?>" class="user-image" alt="<?php echo $graph; ?>"></td></tr>
         <tr><td>Audio</td><td>
                 <audio controls >
                     <source src="<?php echo base_url().$audio; ?>" type="audio/mpeg">
                 </audio>
             </td></tr>
	    <tr><td>Issuetime</td><td><?php echo $issuetime; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('index.php/season/index') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->