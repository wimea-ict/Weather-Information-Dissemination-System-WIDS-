<!-- Main content -->
<script type="text/javascript">
    function HandleOption(){

      var SelectBox = document.getElementById('lang');
      var UserOption = SelectBox.options[SelectBox.selectedIndex].value;
      if(UserOption == 'English'){
        document.getElementById('DisplayOption').style.visibility = 'visible';
      }
      else{
        document.getElementById('DisplayOption').style.visibility = 'collapse';
      }
      return false;
    }

</script>


<section class="content-header">
                    <h1>
                        <?php  if($change == 6){
                                                   $use = "agric";
                                                    echo "Disaster";
                                                }else if($change == 7){
                                                    $use = "agric";
                                                    echo "Agriculture";
                                               } else if($change == 22){
                                                     $use = "health";
                                                    echo "Health";
                                               } else if($change == 23){
                                                    $use = "water";
                                                    echo "Water";
                                              } ?>
                        <small>Advisory form</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Advisory</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i>

                            <?php  if($change == 6){
                                                   $use = "agric";
                                                    echo "Disaster Advisory";
                                                }else if($change == 7){
                                                    $use = "agric";
                                                    echo "Agriculture Advisory";
                                               } else if($change == 22){
                                                     $use = "health";
                                                    echo "Health Advisory";
                                               } else if($change == 23){
                                                    $use = "water";
                                                    echo "Water Advisory";
                                              } ?>


                        </a></li>
                    </ol>
                </section>
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'><?php  if($change == 6){
                                                   $use = "agric";
                                                    echo "DISASTER";
                                                }else if($change == 7){
                                                    $use = "agric";
                                                    echo "AGRICULTURE";
                                               } else if($change == 22){
                                                     $use = "health";
                                                    echo "HEALTH";
                                               } else if($change == 23){
                                                    $use = "water";
                                                    echo "WATER";
                                              } ?>  ADVISORY</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data" ><table class='table table-bordered'>
	    <tr><td>Region <?php echo form_error('Region') ;?></td>
             <td>
              <select name="region" class="form-control" id="region">
                <option value="1">WESTERN</option>
                <option value="2">CENTRAL REGION AND LAKE VICTORIA BASIN</option>
                <option value="4">EASTERN</option>
                <option value="5">NORTERN</option>
	   </td>

	   </tr>

         <tr><td>Sub Region<?php echo form_error('sub_region') ?></td>
                <td> <select name="sub_region" id="subregion" class="form-control">
                options="<option value = 1 >SOUTH WESTERN</option>
                        <option value = 2 >WESTERN CENTRALe</option>
                        
               </select> </td>
            </tr>

	    <tr><td>Advice Category <?php echo form_error('advise') ?></td>
            <td>   <select name = "cat" class = "form-control" >
			 <?php if($change == 6){
                 echo "
                 <option value = 1 >Disaster advice</option>";

				  }else if($change == 7){
                 echo "
			          <option value = 5 >Planting Advice</option>
				        <option value = 6 >Harvesting Advice</option>
				      <option value = 7 >Pests and Diseases</option>
              <option value = 10 >Food advisory</option>";

				  }else if($change == 22){

                 echo "<option value = 8 >health Advice</option>";

             }else if($change == 23){
                 echo "<option value = 9 >water Advice</option>";
             }
				?>
				</select>
        </td>
        <tr>
            <td>Select Language</td>
            <td>
            <select name="lang" id = "lang" class="form-control" onchange = "return HandleOption();">
              <option value="English">English</option>
              <option value="Luganda">Luganda</option>
            </select>
            </td>
        </tr>
        <tr id = "DisplayOption"><td>Possible Advisories <?php echo form_error('gen_advise') ?></td>
                       <td>
                        <div style="overflow-y: scroll; background-color: #ffffff; width: 900px; height: 200px; min-height: 200px;">
                            <h3>Areas expected to receive near normal to BELOW NORMAL rainfall:</h3>
                           <?php

                           //$sql2 = $this->db->get_where('possible_advisories',array('cat' => 'agric'));
                           $sqlx = "SELECT * FROM  possible_advisories WHERE cat = '$use' && state = 'normal'";
                           $sql2= $this->db->query($sqlx);
                           foreach ($sql2->result_array() as $row1) { ?>

                               <div class="checkbox" >
                            <label ><input type = "checkbox" name = "check_list[]" value = "<?php echo $row1['advise'].'<br/>'; ?>" > <?php echo $row1['advise']; ?> </label >
                        </div >
                           <?php }?>

                            <h3>Areas expected to receive near normal to ABOVE NORMAL rainfall:</h3>
                            <?php

                            //$sql2 = $this->db->get_where('possible_advisories',array('cat' => 'agric'));
                            $sqlx = "SELECT * FROM  possible_advisories WHERE cat = '$use' && state = 'above'";
                            $sql2= $this->db->query($sqlx);
                            foreach ($sql2->result_array() as $row1) { ?>

                                <div class="checkbox" >
                                    <label ><input type = "checkbox" name = "check_list[]" value = "<?php echo $row1['advise'].'<br/>'; ?>" > <?php echo $row1['advise']; ?> </label >
                                </div >
                            <?php }?>
                    </div>
                    </td></tr>
	    <tr><td>Message <?php echo form_error('msg') ?></td>
            <td><textarea class="form-control" rows="3" name="msg" id="msg" placeholder="Advisory Message"><?php echo $msg; ?></textarea>
        </td></tr>
          <tr>
                <td>Audio Advisory<?php echo "<p class='text-warning'>".$error."</p>"; ?></td>
               <td>
                 <input type="file" name="userfile" id ="pic" size="20" class="form-control" accept="audio/*" />
               </td>
         </tr>
	    <!--<tr><td>Season Name <?php //echo form_error('season_name') ?></td>
            <td>
              <?php// echo combo_function('season_id','season','season_name','id','season_id')?>
	   </td>-->
	    <input type="hidden" name="id" value="<?php echo $id; ?>" />
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('index.php/Landing/index/') ?>" class="btn btn-default">Cancel</a></td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
