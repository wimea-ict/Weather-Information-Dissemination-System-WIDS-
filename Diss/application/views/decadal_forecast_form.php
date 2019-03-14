<!-- Main content -->
 <section class="content-header">
                    <h1>
                        Dekadal
                        <small>Forecast form</small>
                    </h1>
                    <ol class="breadcrumb">
                      <?php $this->session->set_flashdata('message', ''); ?>
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dekadal Forecast</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Forecast form</a></li>
                    </ol>
                </section>

<section class="content" id="dashboard-content">


        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>DEKADAL FORECAST</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"><table class='table table-bordered'>
            <tr><td>Region <?php echo form_error('region') ?></td>
           <td> 
           <select name="region" id="region" class="form-control" id="region">
                <option value="1">WESTERN</option>
                <option value="2">CENTRAL REGION AND LAKE VICTORIA BASIN</option>
                <option value="4">EASTERN</option>
                <option value="5">NORTERN</option>
        </td>
        </tr>
        <tr><td>Sub Region <?php echo form_error('sub_region') ?></td>
                <td> <select name="sub_region" id="subregion" class="form-control">
                options="<option value = 1 >SOUTH WESTERN</option>
                        <option value = 2 >WESTERN CENTRALe</option>
               </select> </td>
            </tr>

          <tr><td>Date From <?php echo form_error('date_from') ?></td>
            <td><!--<input type="date" class="form-control" name="date_from" id="date_from" placeholder="Date From in format yyyy-mm-dd" value="<?php// echo $date_from; ?>" />-->
                <input type="text"  name="date_from" class="form-control form_datetime" id = "date_from" readonly data-inputmask="'alias': 'yyyy-mm-dd'" value="<?php echo $date_from;?>" data-mask="" placeholder ="yyyy-mm-dd">
        </td>
        <tr><td>Date To <?php echo form_error('date_to') ?></td>
            <td><input type="hidden" class="form-control" name="date_to" id="date_to" placeholder="Date To in format yyyy-mm-dd" value="<?php echo $date_to; ?>"  />
                <input type="text"  name="date_to1" class="form-control form_datetime"  id = "date_s"  value="<?php echo $date_to;?>"  placeholder ="yyyy-mm-dd" disabled />
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

	    <tr><td>Advisory <?php echo form_error('advisory') ?></td>
            <td><textarea class="form-control" rows = "3" name="advisory" id="advisory" placeholder="Advisory" /> <?php echo $advisory; ?></textarea>
        </td></tr>


                <tr>
                    <td>Graph / Image<?php echo "<p class='text-warning'>".$error."</p>"; ?></td>
                    <td>
                        <input type="file" name="userfile" id="pic1" size="20" class="form-control" accept="image/*" />
                        <input type="hidden" class="form-control" name="graph" id="date_to"  value="<?php echo $graph; ?>" />
                        <?php
                        if($ed == "2"){
                            echo  "<input type='text' class='form-control' name='graph1' id='graph'  value='"; if(strpos($graph,'no image')){ echo "no file uploaded yet"; }else{ echo $graph; } echo "' disabled/>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Audio message / Advisory<?php echo "<p class='text-warning'>".$error1."</p>"; ?></td>
                    <td>
                        <input type="file" name="userfile1" id="pic" size="20" class="form-control" accept="audio/*"/>
                        <input type="hidden" class="form-control" name="audio" id="date_to"  value="<?php echo $audio ?>" />
                        <?php
                        if($ed == "2"){
                            echo  "<input type='text' class='form-control' name='grap1' id='graph'  value='"; if(strpos($audio,'no audio')){ echo "no file uploaded yet"; }else{ echo $audio; } echo "' disabled/>";
                        }
                        ?>
                    </td>
                </tr>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" />
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('index.php/Decadal_forecast/create') ?>" class="btn btn-default">Cancel</a></td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
