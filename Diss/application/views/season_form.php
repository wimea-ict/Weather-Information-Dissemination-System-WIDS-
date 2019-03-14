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
                        Season
                        <small>Forecast form</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Season Forecast</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Forecast form</a></li>
                    </ol>
                </section>
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>SEASONAL FORECAST</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" ><table class='table table-bordered'>
      <tr><td>Region <?php echo form_error('region') ?></td>
           <td> 
           <select name="region" id="region" class="form-control" id="region">
                <option value=1>WESTERN</option>
                <option value=2>CENTRAL REGION AND LAKE VICTORIA BASIN</option>
                <option value=4>EASTERN</option>
                <option value=5>NORTERN</option>
             </td></tr>
        <tr><td>Sub Region <?php echo form_error('sub_region') ?></td>
                <td> <select name="sub_region" id="subregion" class="form-control">
                options="<option value = 1 >SOUTH WESTERN</option>
                        <option value = 2 >WESTERN CENTRALe</option>

               </select> </td>
            </tr>

           <tr><td>Season Name <?php echo form_error('seas') ?></td>
                    <td> <select name = "seas" class = "form-control" >
                            <option>MARCH TO MAY </option>
                            <option>JUNE TO AUGUST</option>
                            <option>SEPTEMBER TO NOVEMBER</option>
                            <option>DECEMBER TO FEBRUARY</option>

                        </select>
                    </td></tr>
      <tr>
          <td>Select Language <?php echo form_error('lang') ?></td>
          <td>
          <select name="lang" id = "lang" class="form-control" onchange="return HandleOption();">
            <option value="English">English</option>
            <option value="Luganda">Luganda</option>
          </select>
          </td>
      </tr>
	    <tr><td>Description <?php echo form_error('descrip') ?></td>
            <td><textarea class="form-control" rows = "3" name="descrip" id="advisory" placeholder="Advisory" /> <?php echo $descrip; ?></textarea>
        </td></tr>
                <tr id = "DisplayOption"><td>Possible Impacts <?php echo form_error('gen_advise') ?></td>
                    <td>
                        <div style="overflow-y: scroll; background-color: #ffffff; width: 900px; height: 200px; min-height: 200px;">
                            <h3>Areas expected to receive near normal to BELOW NORMAL rainfall:</h3>
                            <?php

                            //$sql2 = $this->db->get_where('possible_advisories',array('cat' => 'agric'));
                            $sqlx = "SELECT * FROM  possible_impacts WHERE  state = 'normal'";
                            $sql2= $this->db->query($sqlx);
                            foreach ($sql2->result_array() as $row1) { ?>

                                <div class="checkbox" >
                                    <label ><input type = "checkbox" name = "check_list[]" value = "<?php echo $row1['impact'].'<br/>'; ?>" > <?php echo $row1['impact']; ?> </label >
                                </div >
                            <?php }?>

                            <h3>Areas expected to receive near normal to ABOVE NORMAL rainfall:</h3>
                            <?php

                            //$sql2 = $this->db->get_where('possible_advisories',array('cat' => 'agric'));
                            $sqlx = "SELECT * FROM  possible_impacts WHERE  state = 'above'";
                            $sql2= $this->db->query($sqlx);
                            foreach ($sql2->result_array() as $row1) { ?>

                                <div class="checkbox" >
                                    <label ><input type = "checkbox" name = "check_list[]" value = "<?php echo $row1['impact'].'<br/>'; ?>" > <?php echo $row1['impact']; ?> </label >
                                </div >
                            <?php }?>
                        </div>
                    </td></tr>
        <tr><td>Impacts / Advisory <?php echo form_error('impact') ?></td>
               <td><textarea class="form-control" rows = "3" name="impact" id="advisory" placeholder="Advisory" /> <?php echo $impact; ?></textarea>
        </td></tr>

              <tr>
                  <td>Graph / Image<?php echo "<p class='text-warning'>".$error."</p>"; ?></td>
                  <td>
                <input type="file" name="userfile" size="20" id = "pic1" class="form-control" accept="image/*" />
                      <input type="hidden" class="form-control" name="graph" id="date_to"  value="<?php echo $graph; ?>" />
                      <?php
                      if($ed == "2"){
                          echo  "<input type='text' class='form-control' name='graph1' id='graph'  value='"; if(strpos($graph,'no image')){ echo "no file uploaded yet"; }else{ echo $graph; } echo "' disabled/>";
                      }
                      ?>
                  </td>
              </tr>
                <tr>
                    <td>Audio message<?php echo "<p class='text-warning'>".$error1."</p>"; ?></td>
                    <td>
                        <input type="file" name="userfile1" size="5120" id = "pic" class="form-control" accept="audio/*" />
                        <input type="hidden" class="form-control" name="audio" id="date_to"  value="<?php echo $audio; ?>" />
                        <?php
                        if($ed == "2"){
                            echo  "<input type='text' class='form-control' name='grap1' id='graph'  value='"; if(strpos($audio,'no audio')){ echo "no file uploaded yet"; }else{ echo $audio; } echo "' disabled/>";
                        }
                        ?>
                    </td>
                </tr>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" />

	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('index.php/season/index') ?>" class="btn btn-default">Cancel</a></td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
