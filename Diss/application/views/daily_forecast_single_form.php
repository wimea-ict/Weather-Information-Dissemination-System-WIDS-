<!-- Main content -->

<section class="content-header">
                    <h1>
                        Daily
                        <small>Single Forecast form</small>
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


                  <h3 class='box-title'>DAILY FORECAST SINGLE FORM</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
          
 <!-- get the regions for the dailyforecast_region table-->
         <tr><td>Region <?php echo form_error('Region') ?></td>
                <td> <select name="region" class="form-control"><?php
                      $mysql = "SELECT * FROM dailyforecast_region";
                      $mysql2 = $this->db->query($mysql);
                      foreach ($mysql2->result_array() as $rows) { ?>
                        <option value="<?php echo $rows['DRid']; ?>"><?php echo $rows['regionname'] ?></option>
                    <?php } ?>

               </select> </td>
            </tr>

       <tr><td>Mean Temp <?php echo form_error('mean_temp') ?></td>
            <td><input type="number" class="form-control" name="mean_temp" id="mean_temp" placeholder="Mean Temp" value="<?php echo $mean_temp; ?>" />
        </td>
	    <!-- <tr><td>Max Temp <?php echo form_error('max_temp') ?></td>
            <td><input type="number" class="form-control" name="max_temp" id="max_temp" placeholder="Max Temp" value="<?php echo $max_temp; ?>" />
        </td>
	    <tr><td>Min Temp <?php echo form_error('min_temp') ?></td>
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
            <td><select name="wind_direction" class="form-control">
                 <option value="Easterly">Easterly</option>
                 <option value="Northerly">Northerly</option>
                 <option value="Northeasterly">Northeasterly</option>
                 <option value="Northwesterly">Northwesterly</option>
                 <option value="Southerly">Southerly</option>
                 <option value="Southeasterly">Southeasterly</option>
                 <option value="Southwesterly">Southwesterly</option>
                 <option value="Westerly">Westerly</option>
                 <option value="Variable">Variable</option>

                 </select>
        </td>
        <tr><td>Wind strength <?php echo form_error('wind_strength') ?></td>
           
            <td><select name="wind_strength" class="form-control">
                 <option value="Light">Light</option>
                 <option value="Moderate">Moderate</option>

                 </select>
        </td>
        <tr>
        <td>Select Time</td>
        <td>
        <select name="time" class="form-control">
          <option value="Late Evening">Late Evening(6:00pm-12:00am)</option>
          <option value="Early Morning">Early Morning(12:00am- 6:00am)</option>
          <option value="Late Morning">Late Morning(6:00am -12:00pm)</option>
          <option value="Afternoon">Afternoon(12:00pm–6:00pm)</option>
        </select>
        </td>
      </tr>
        <tr>
        <td>Select Language</td>
        <td>
        <select name="lang" class="form-control">
          <option value="English">English</option>
          <option value="Luganda">Luganda</option>
        </select>
        </td>
      </tr>

	    <tr><td>Weather Description <?php echo form_error('weather') ?></td>
            <td><textarea class="form-control" rows="3" name="weather" id="weather" placeholder="Weather"><?php echo $weather; ?></textarea>
        </td></tr>
	    <!-- <tr><td>Advisory <?php echo form_error('advisory') ?></td>
            <td><input type="text" class="form-control" name="advisory" id="advisory" placeholder="Advisory" value="<?php echo $advisory; ?>" />
        </td> -->
	    <tr><td>Datetime <?php echo form_error('date') ?></td>
            <td> <!--<input type="date" class="form-control" name="date" id="datetime" placeholder="yyyy-mm-dd" value="<?php //echo $date; ?>" /> -->
			    <!--<input type="text"  name="date" class="form-control form_datetime" readonly data-inputmask="'alias': 'yyyy-mm-dd'" value="<?php echo $date;?>" data-mask="" placeholder ="yyyy-mm-dd"> -->
                <select name="date" class="form-control">
                 <option value="Today">Today</option>
                 <option value="Tomorrow">Tomorrow</option>
     </td>

	<tr><td>Outlook <?php echo form_error('cat_id') ?></td>
            <td> <?php echo combo_function('cat_id','category','cat_name','id','cat_id')?>
        </td>

	    <tr><td>Season Name <?php echo form_error('season_name') ?></td>
            <td>
              <?php echo combo_function('season_id','season','season_name','id','season_id')?>
	   </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" />
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('index.php/daily_forecast/create_single'); ?>" class="btn btn-default">Cancel</a></td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
