<!-- Main content -->

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>Offer Forecast Advice</h3>
                      <div class='box box-primary'>
                          <?php echo $msg; ?>
			<?php echo form_open('index.php/auth/index/request_service'); ?>
      <!-- <form method="post" action="index.php/auth/submit_feedback">-->
			<table class='table table-bordered'>
		<tr><td>Name/Organisation  <?php echo form_error('names') ?> </td>
			<td><input type="text" name="names" placeholder="Individual/Organisation" class="form-control" required /></td>
		</tr>
		<tr><td>Region <?php echo form_error('region') ?></td>
           <td> <?php 

		     //     if($change == 2){
		   //echo combo_function('region_id','region','name','id','region_id');
		           //}else{
				   $reg = $this->db->get_where('region',array('id'=>$region));
				   //echo $region;
                   //exit();
				   //$reg =  $this->db->get()->row();
				       foreach($reg->result_array() as $p){
				 echo "<input type='text' class='form-control' name='regi' value= ' ".$p['name']."' disabled />
				 		<input type='hidden' class='form-control' name='regi' value= ' ".$p['id']."' disabled />
						<input type='hidden' class='form-control' name='reg' value='".$region."'/>
				 ";
				 }
				  // }
		   ?>
        </td></tr>
		<tr><td>District <?php echo form_error('district') ?></td>
           <td> 
					 <select name = "district" id="sub" class = "form-control" >
                              <?php

                                $dd = "SELECT * FROM ussddistricts order by districtname ASC";
                                $ddd = $this->db->query($dd);
                                foreach ($ddd->result_array() as $rowss) { ?>
                                    <option value="<?php echo $rowss['districtid']; ?>"><?php echo $rowss['districtname']; ?></option>
                    <?php } ?>

           </select>
        </td>
			</tr>
	    <tr><td>Forecast Advisory Basing <br/>On Your Local Knowledge. <?php echo form_error('advisory') ?></td>
            <td><textarea class="form-control" rows = "3" name="advisory" placeholder="Advisory" required/> <?php //echo $advisory; ?></textarea>
        </td>
			</tr>
		
	   <!-- <input type="hidden" name="id" value="<?php// echo $id; ?>" />  -->
	    <tr><td colspan='2'> 
			<?php echo form_submit('send','Submit','class="btn btn-info"'); ?>
		<!--<button type="submit"  name = "send" class="btn btn-primary">Submit</button>--> 
	    <a href="<?php echo site_url('index.php') ?>" class="btn btn-default">Cancel</a></td>
			</tr>
	
    </table>
	<?php echo form_close(); ?>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
