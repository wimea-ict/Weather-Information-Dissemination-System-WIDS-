
        <!-- Main content -->

         <section class="content-header">
                    <h1>
                        Seasonal Forecast
                        <small>Data tables</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Seasonal Forecast</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Data tables</a></li>
                    </ol>
                </section>  

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>SEASONAL FORECAST LIST <?php
                   if($_SESSION['usertype'] == "wimea" || $_SESSION['usertype'] == "forecast"){
				  echo anchor('index.php/season/create/','Create',array('class'=>'btn btn-danger btn-sm'));
				   }else{
					   
				   }?>
		<?php //echo anchor(site_url('index.php/season/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('index.php/season/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('index.php/season/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header --> <!--style=" overflow-y: scroll;"-->
                <div class='box-body'   >
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Region</th>
			<th>SubRegion</th>
            <th>Season</th>
		    <th>Description</th>
		    <th>Impact</th>
            <!--<th>Graphical</th>
            <th>Audio</th>-->
		    <th>Issuetime</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($season_data as $season)
            {
                $graph = str_replace("uploads/","",$season->graph);
                $audio = str_replace("uploads/","",$season->audio);
			$reg = $this->db->get_where('region',array('id'=>$season->region));
            $reg4 = $this->db->get_where('ussdsubregions',array('subregionid'=>$season->subregionid));
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php  foreach ($reg->result() as $p){ echo $p->name ; }?></td>
            <td><?php  foreach ($reg4->result() as $p4){ echo $p4->subregionname ; }?></td>
            <td><?php echo $season->season ?></td>
			<td><?php echo substr($season->description, 0, 20)?><?php echo substr($season->descriptionLuganda, 0, 20)."..." ?></td>
			<td><?php echo substr($season->impact, 0, 20)?><?php echo substr($season->impactLuganda, 0, 20)?></td>
            <!--<td><?php //echo $graph ?></td>
            <td><?php// echo $audio ?></td>-->
			<td><?php echo $season->issuetime ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('index.php/season/read/'.$season->sea_id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  ';
           if($_SESSION['usertype'] == "wimea" || $_SESSION['usertype'] == "forecast"){			
			echo anchor(site_url('index.php/season/update/'.$season->sea_id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('index.php/season/delete/'.$season->sea_id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
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