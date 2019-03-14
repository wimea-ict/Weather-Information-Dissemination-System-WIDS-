
        <!-- Main content -->

         <section class="content-header">
                    <h1>
                        Dekadal
                        <small>Data tables</small>
                    </h1>
                    <ol class="breadcrumb">
                        <?php $this->session->set_flashdata('message', ''); ?>
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo base_url() ?>index.php/decadal_forecast/create"><i class="fa fa-dashboard"></i> Dekadal Forecast</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Data tables</a></li>
                    </ol>
                </section>  

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DEKADAL FORECAST LIST <?php 
				   if($_SESSION['usertype'] == "wimea" || $_SESSION['usertype'] == "forecast"){
				       echo anchor('index.php/decadal_forecast/create/','Create',array('class'=>'btn btn-danger btn-sm'));
				   }else {
					   
				   }
				  ?>
		<?php //echo anchor(site_url('index.php/decadal_forecast/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php  $this->session->set_flashdata('message', '');

        echo anchor(site_url('index.php/decadal_forecast/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('index.php/decadal_forecast/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Advisory</th>
			<th>Region</th>
		    <th>Date From</th>
		    <th>Date To</th>
            <th>Graph</th>
            <th>Audio</th>
		    <th>Issuetime</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($this->Decadal_forecast_model->get_all() as $decadal_forecast)
            {
			$reg = $this->db->get_where('region',array('id'=>$decadal_forecast->region));
              $audio = "<span class='glyphicon glyphicon-music'></span>";
              $graph = "<span class='glyphicon glyphicon-picture'></span>";
                $graph2 = str_replace("uploads_decadal/","",$decadal_forecast->graph);
                $audio2 = str_replace("uploads_decadal/","",$decadal_forecast->audio);
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php echo substr(($decadal_forecast->advisory).($decadal_forecast->advisoryLuganda), 0, 20)."..." ?></td>
			<td><?php  foreach ($reg->result() as $p){ echo $p->name ; }?></td>
			<td><?php echo $decadal_forecast->date_from ?></td>
			<td><?php echo $decadal_forecast->date_to ?></td>
             <td><?php echo $graph ?></td>
              <td><?php echo $audio ?></td>
			<td><?php echo $decadal_forecast->issuetime ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('index.php/decadal_forecast/read/'.$decadal_forecast->decadal_id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			 if($_SESSION['usertype'] == "wimea" || $_SESSION['usertype'] == "forecast"){
			     echo anchor(site_url('index.php/decadal_forecast/update/'.$decadal_forecast->decadal_id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			     echo '  '; 
			     echo anchor(site_url('index.php/decadal_forecast/delete/'.$decadal_forecast->decadal_id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
			
			 }
			 ?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/frameworks/jquery/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->