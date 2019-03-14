<!-- Main content -->

<section class="content-header">
                    <h1>
                        Daily
                        <small>Forecast form</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Daily Forecast</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Forecast form</a></li>
                    </ol>
                </section>

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>


                  <h3 class='box-title'>DAILY FORECAST</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>

 <!-- get the regions for the dailyforecast_region table-->
         <tr><td>Region <?php echo form_error('Region') ?></td>
                <td colspan="4"> <select name="region" class="form-control"><?php
                      $mysql = "SELECT * FROM dailyforecast_region";
                      $mysql2 = $this->db->query($mysql);
                      foreach ($mysql2->result_array() as $rows) { ?>
                        <option value="<?php echo $rows['DRid']; ?>"><?php echo $rows['regionname'] ?></option>
                    <?php } ?>

               </select> </td>
            </tr>

       <tr>
       <td>Mean Temp <?php echo form_error('mean_temp') ?></td>

            <td><input type="number" class="form-control" name="mean_temp1" id="mean_temp1" placeholder="Mean Temp(Late Evening)" value="<?php echo $mean_temp1; ?>" />
            </td>

            <td><input type="number" class="form-control" name="mean_temp2" id="mean_temp2" placeholder="Mean Temp(Early Morning)" value="<?php echo $mean_temp2; ?>" />
            </td>

           <td><input type="number" class="form-control" name="mean_temp3" id="mean_temp3" placeholder="Mean Temp(Late Morning)" value="<?php echo $mean_temp3; ?>" />
           </td>

            <td><input type="number" class="form-control" name="mean_temp4" id="mean_temp4" placeholder="Mean Temp(Aternoon)" value="<?php echo $mean_temp4; ?>" />
             </td>

         </tr>
	    <!-- <tr><td>Max Temp <?php //echo form_error('max_temp') ?></td>
            <td><input type="number" class="form-control" name="max_temp" id="max_temp" placeholder="Max Temp" value="<?php echo $max_temp; ?>" />
        </td>

      </tr> -->
	    <!-- <tr><td>Min Temp <?php echo form_error('min_temp') ?></td>
            <td><input type="number" class="form-control" name="min_temp" id="min_temp" placeholder="Min Temp" value="<?php echo $min_temp; ?>" />
        </td>
	    <tr><td>Sunrise <?php echo form_error('sunrise') ?></td>
            <td><input type="text" class="form-control" name="sunrise" id="sunrise" placeholder="Sunrise" value="<?php echo $sunrise; ?>" />
        </td>
	    <tr><td>Sunset <?php echo form_error('sunset') ?></td>
            <td><input type="text" class="form-control" name="sunset" id="sunset" placeholder="Sunset" value="<?php echo $sunset; ?>" />
        </td>
	    <tr><td>Wind speed <?php echo form_error('wind') ?></td>
            <td><input type="text" class="form-control" name="wind" id="wind" placeholder="Wind" value="<?php echo $wind; ?>" />
        </td> -->
        <tr><td>Wind direction <?php echo form_error('wind_direction') ?></td>

            <td><input type="text" class="form-control" name="wind_direction1" id="wind_direction1" placeholder="wind direction(Late Evening)" value="<?php echo $wind_direction1; ?>" />
            </td>

            <td><input type="text" class="form-control" name="wind_direction2" id="wind_direction2" placeholder="wind direction(Earl Morning)" value="<?php echo $wind_direction2; ?>" />
            </td>

            <td><input type="text" class="form-control" name="wind_direction3" id="wind_direction3" placeholder="wind direction(Late Morning)" value="<?php echo $wind_direction3; ?>" />
            </td>

            <td><input type="text" class="form-control" name="wind_direction4" id="wind_direction4" placeholder="wind direction(Afternoon)" value="<?php echo $wind_direction4; ?>" />
            </td>

      </tr>
        <tr><td>Wind strength <?php echo form_error('wind_strength') ?></td>

            <td><input type="text" class="form-control" name="wind_strength1" id="wind_strength1" placeholder="wind strength(Late Evening)" value="<?php echo $wind_strength1; ?>" />
            </td>

            <td><input type="text" class="form-control" name="wind_strength2" id="wind_strength2" placeholder="wind strength(Earl Morning)" value="<?php echo $wind_strength2; ?>" />
            </td>

            <td><input type="text" class="form-control" name="wind_strength3" id="wind_strength3" placeholder="wind strength(Late Morning)" value="<?php echo $wind_strength3; ?>" />
            </td>

            <td><input type="text" class="form-control" name="wind_strength4" id="wind_strength4" placeholder="wind strength(Afternoon)" value="<?php echo $wind_strength4; ?>" />
            </td></tr>
        <!-- <tr>
        <td>Select Time</td>
        <td>
        <select name="time" class="form-control">
          <option value="Late Evening(6:00pm-12:00am)">Late Evening(6:00pm-12:00am)</option>
          <option value="Early Morning(12:00am- 6:00am)">Early Morning(12:00am- 6:00am)</option>
          <option value="Late Morning(6:00am -12:00pm)">Late Morning(6:00am -12:00pm)</option>
          <option value="Afternoon(12:00pm–6:00pm)">Afternoon(12:00pm–6:00pm)</option>
        </select>
        </td>
      </tr> -->
        <tr>

          <td>Select Language</td>

          <td colspan="4">

          <select name="lang" class="form-control">

              <option value="English">English</option>

              <option value="Luganda">Luganda</option>

          </select>

          </td>
      </tr>

	    <tr><td>Weather Description <?php echo form_error('weather') ?></td>

            <td><textarea class="form-control" rows="3" name="weather1" id="weather1" placeholder="Weather(Late Evening)"><?php echo $weather1; ?></textarea>
            </td>

            <td><textarea class="form-control" rows="3" name="weather2" id="weather2" placeholder="Weather(Early Morning)"><?php echo $weather2; ?></textarea>
            </td>

            <td><textarea class="form-control" rows="3" name="weather3" id="weather3" placeholder="Weather(Late Morning)"><?php echo $weather3; ?></textarea>
            </td>

            <td><textarea class="form-control" rows="3" name="weather4" id="weather4" placeholder="Weather(Afternoon)"><?php echo $weather4; ?></textarea>
            </td>

      </tr>
	    <!-- <tr><td>Advisory <?php echo form_error('advisory') ?></td>
            <td><input type="text" class="form-control" name="advisory" id="advisory" placeholder="Advisory" value="<?php echo $advisory; ?>" />
        </td></tr> -->
	    <tr><td>Datetime <?php echo form_error('date') ?></td>

            <td>

              <input type="text"  name="date1" class="form-control form_datetime" readonly data-inputmask="'alias': 'yyyy-mm-dd'" value="<?php echo $date1;?>" data-mask="" placeholder ="yyyy-mm-dd">

            </td>

          <td colspan="3">

               <input type="text" name="date2" class="form-control form_datetime" readonly data-inputmask="'alias': 'yyyy-mm-dd'" value="<?php echo $date2;?>" data-mask="" placeholder ="yyyy-mm-dd">
          </td>

	<tr><td>Outlook <?php echo form_error('cat_id') ?></td>

            <td> <?php echo combo_function('cat_id','category','cat_name','id','cat_id')?>
            </td>

            <td> <?php echo combo_function('cat_id','category','cat_name','id','cat_id')?>
            </td>

            <td> <?php echo combo_function('cat_id','category','cat_name','id','cat_id')?>
            </td>

            <td> <?php echo combo_function('cat_id','category','cat_name','id','cat_id')?>
            </td>

	    <tr><td>Season Name <?php echo form_error('season_name') ?></td>
            <td colspan="4">
              <?php echo combo_function('season_id','season','season_name','id','season_id')?>
	   </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" />
      <input type="hidden" name="time1" value="Late Evening(6:00pm-12:00am)" />
      <input type="hidden" name="time2" value="Early Morning(12:00am- 6:00am)" />
      <input type="hidden" name="time3" value="Late Morning(12:00am- 6:00am)" />
      <input type="hidden" name="time4" value="Afternoon(12:00pm–6:00pm)" />
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('index.php/daily_forecast/create'); ?>" class="btn btn-default">Cancel</a></td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
