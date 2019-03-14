<?php 
if($_SESSION['usertype'] == "wimea"){
				$use = "1";
				$use1 = "3";
				$use2 = "5";
				$use3 = "6";
				$use4 = "7";
				$use5 = "8";
				$use6 = "9";
				$use7 = "4";
			}else if($_SESSION['usertype'] == "agriculture"){
				
				$use = " ";
				$use1 = " ";
				$use2 = "5";
				$use3 = "6";
				$use4 = "7";
				$use5 = " ";
				$use6 = " ";
				$use7 = " ";
				
			}else if($_SESSION['usertype'] == "food"){
				
				$use = "1";
				$use1 = "2";
				$use2 = " ";
				$use3 = " ";
				$use4 = " ";
				$use5 = " ";
				$use6 = " ";
				$use7 = "3";
				
				
			}else if($_SESSION['usertype'] == "water"){
				$use = " ";
				$use1 = " ";
				$use2 = " ";
				$use3 = " ";
				$use4 = " ";
				$use5 = " ";
				$use6 = "9";
				$use7 = " ";
				
				
			}else if($_SESSION['usertype'] == "health"){
				
				$use = " ";
				$use1 = " ";
				$use2 = " ";
				$use3 = " ";
				$use4 = " ";
				$use5 = "8";
				$use6 = " ";
				$use7 = " ";
			}else if($_SESSION['usertype'] == "forecast"){
				$use = " ";
				$use1 = " ";
				$use2 = " ";
				$use3 = " ";
				$use4 = " ";
				$use5 = " ";
				$use6 = " ";
				$use7 = " ";
			}

?>
        <!-- Main content -->

        <section class="content-header">
                    <h1>
                        Advisory
                        <small>Data tables</small>
                    </h1>
                    <ol class="breadcrumb">
                    	<?php $this->session->set_flashdata('message', ''); ?>
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Advisory</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Data tables</a></li>
                    </ol>
                </section>  

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>ADVISORY LIST <?php 
				  if($_SESSION['usertype'] == "wimea"){
				  //echo anchor('index.php/Advisory/create/','Create',array('class'=>'btn btn-danger btn-sm'));
				  }else if($_SESSION['usertype'] == "agriculture"){
					echo anchor('index.php/Advisory/create1/','Create',array('class'=>'btn btn-danger btn-sm'));  
				  }else if($_SESSION['usertype'] == "food"){
					echo anchor('index.php/Advisory/create/','Create',array('class'=>'btn btn-danger btn-sm'));  
				  }else if($_SESSION['usertype'] == "water"){
					echo anchor('index.php/Advisory/create3/','Create',array('class'=>'btn btn-danger btn-sm'));  
				  }else if($_SESSION['usertype'] == "health"){
					  echo anchor('index.php/Advisory/create2/','Create',array('class'=>'btn btn-danger btn-sm'));
				  }else{
					  
				  }
				  ?>
		<?php //echo anchor(site_url('index.php/Advisory/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php $this->session->set_flashdata('message', ''); 
		echo anchor(site_url('index.php/Advisory/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('index.php/Advisory/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Region</th>
            <th>Sub Region</th>
		    <th>Type</th>
		    <th>Category</th>
			 <th>Message</th>
			 <th>Audio</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
			
			
            $start = 0;
            foreach ($this->Advisory_model->get_all() as $advise)
            {
            	$audio = "<span class='glyphicon glyphicon-music'></span>";
                $audio2 = str_replace("uploads/","",$advise->audio);
                
			    $reg = $this->db->get_where('region',array('id'=>$advise->region));
			    $reg2 = $this->db->get_where('ussdsubregions',array('subregionid'=>$advise->subregionid));
				$reg1 = $this->db->get_where('advice',array('id_advice'=>$advise->advice));
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php foreach ($reg->result() as $s){ echo $s->name ; } ?></td>
            <td><?php foreach ($reg2->result() as $ssp){ echo $ssp->subregionname ; } ?></td>
			<td><?php echo $advise->type ?></td>
			<td><?php  foreach ($reg1->result() as $sp){ echo $sp->advice_name ; } ?></td>
			<td>
				<?php echo substr($advise->messageLuganda,0,100); ?>
				<?php echo substr($advise->message,0,100); ?></td>
            <td><?php echo $audio; ?></td>
			
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('index.php/Advisory/read/'.$advise->record_id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  ';
			//echo $use5;
			//echo $advise->advice;
			if($advise->advice == $use || $advise->advice == $use1 || $advise->advice == $use2 || $advise->advice == $use3 || $advise->advice == $use4 || $advise->advice == $use5 || $advise->advice == $use6 || $advise->advice == $use7 ){
			 
			    echo anchor(site_url('index.php/Advisory/update/'.$advise->record_id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			    echo '  '; 
			    echo anchor(site_url('index.php/Advisory/delete/'.$advise->record_id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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