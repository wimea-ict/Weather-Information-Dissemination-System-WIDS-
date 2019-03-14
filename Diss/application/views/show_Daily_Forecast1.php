<?php
/**
 * Created by PhpStorm.
 * User: Aida
 * Date: 7/20/2017
 * Time: 2:56 PM
 */

//echo $region, $category2, $response;
//exit;
if($category2 == "Today"){
?>

<div class="col-lg-12  col-center-style" style="background-color:#e4ecf3; background-size: cover; margin-top:-1px; ">

<div class="row col-padding"><?php
                          $Today = date('y:m:d');
                            $new = date('l, F d, Y', strtotime($Today));
                         $reg = $this->db->get_where('dailyforecast_region',array('DRid'=>$DRid));
                         echo "<h2> Daily forecast for  ".$district."  as on<br />";
echo "<h2>".$new."   ";foreach ($reg->result() as $p){ /*echo $p->regionname ; */}echo "</h2>";
                       

                ?>
</div>

<div class="row col-padding">
    <div class="col-lg-4 ">
        <div class="col-padding margin-style">
            <?php
            $comp =  date('Y-m-d');
            //foreach ($sql->result_array() as $row)
            // {
            //if()
            ?>
            <!--<div class="col-lg-4">-->
                <?php

                if($lang=='English'){
                    $sql2 = $this->db->get_where(' daily_forecast',array('date' => $comp , 'region' => $DRid,'weather IS NOT NULL'=>NULL), 1);
                    foreach ($sql2->result_array() as $row1){
                        $time=$row1['time'];
                        $cat_id=$row1['cat_id'];
                        $cat_name=$row1['cat_name'];

                        $sea1 = $this->db->get_where('category',array('id'=>$row1['cat_id']));
                        foreach($sea1->result() as $p){
                            $img=$p->img;
                            $cat_name=$p->cat_name;
                        }

                    }
                }else{
                    $sql2 = $this->db->get_where(' daily_forecast',array('date' => $comp , 'region' => $DRid,'weatherLuganda IS NOT NULL'=>NULL), 1);
                    foreach ($sql2->result_array() as $row1){
                        $time=$row1['time'];
                        $cat_id=$row1['cat_id'];
                        $cat_name=$row1['cat_name'];

                        $sea1 = $this->db->get_where('category',array('id'=>$row1['cat_id']));
                        foreach($sea1->result() as $p){
                            $img=$p->img;
                            $cat_name=$p->cat_name;
                        }

                    }
                }

                ?>
                
            <!--</div>-->
        </div>
    </div>

<!-- quering the daily weather information -->
                    <?php
                    if($lang=='English'){
                        $sql1 = $this->db->get_where(' daily_forecast',array('date' => $comp , 'region' => $DRid,'weather IS NOT NULL'=>NULL), 1);
                        foreach ($sql1->result_array() as $row2){
                            $mean_temp = $row2['mean_temp'];
                            $wind_direction = $row2['wind_direction'];
                            $wind_strength = $row2['wind_strength'];
                            $time = $row2['time'];
                           // $wind=$row2['wind'];
                        }
                    }else{
                        $sql1 = $this->db->get_where(' daily_forecast',array('date' => $comp , 'region' => $DRid,'weatherLuganda IS NOT NULL'=>NULL), 1);
                        foreach ($sql1->result_array() as $row2){
                            $mean_temp = $row2['mean_temp'];
                            $wind_direction = $row2['wind_direction'];
                            $wind_strength = $row2['wind_strength'];
                            $time = $row2['time'];
                            //$wind=$row2['wind'];
                        }
                    }
                    ?>
        
     
</div>
<!--</div>-->
   <!-- <h3 style="text-align: center">Today</h3> -->
 <?php if($response == "Graphical"){?>
<div class="row col-padding weather-icon-container">
    <?php
    if($lang=='English'){
        $sql2 = $this->db->get_where(' daily_forecast',array('date' => $comp , 'region' => $DRid,'weather IS NOT NULL'=>NULL), 1);
        $time=$row1['time'];
        $cat_id=$row1['cat_id'];
        $advisory=$row1['advisory'];
        foreach($sql2 as $row1){
            $sea1 = $this->db->get_where('category',array('id'=>$row1['cat_id']));
            foreach($sea1 as $p){
                $img=$p->img;
                $cat_name=$p->cat_name;
            }
        }
    }else{
        $sql2 = $this->db->get_where(' daily_forecast',array('date' => $comp , 'region' => $DRid,'weatherLuganda IS NOT NULL'=>NULL), 1);
        $time=$row1['time'];
        $cat_id=$row1['cat_id'];
        $advisory=$row1['advisory'];
        foreach($sql2 as $row1){
            $sea1 = $this->db->get_where('category',array('id'=>$row1['cat_id']));
            foreach($sea1 as $p){
                $img=$p->img;
                $cat_name=$p->cat_name;
            }
        }

    }
     ?>
        <div class="col-lg-2">

            <div class=" col-padding margin-style">
                <h4><?php echo $time; ?></h4>
                <div class="card">
                        <img src="<?php echo base_url()?>assets/frameworks/adminlte/<?php   echo $img; ?>" alt="Avatar<?php echo $cat_id; ?>" style="width:100%">
                        <p><?php echo  $cat_name; ?></p>

                </div>
            </div>
        </div>

    <div class="col-lg-8">
        <h4 style="text-align: center">Advisory</h4>
            <div class=" col-padding margin-style"  style=" overflow-y: scroll; background-color: #ffffff; height: 100%; min-height: 200px;" >
                <table class="table" style="width: 100%; min-height: 200px;">
            <?php
             echo "<tr><td>".$time."</td><td> ".$advisory."</td></tr>";
            ?>
                    </table>
        </div>
    </div>

</div>
    <?php } else {?>

    <div class="row col-padding weather-icon-container">
    <?php
    //Querying the weather description, advisory and time
    $time="";
    $weather_desc="";
    $advisory="";
    if($lang=='English'){
        $sql2 = $this->db->get_where(' daily_forecast',array('date' => $comp , 'region' => $DRid,'weather IS NOT NULL'=>NULL),1);
        foreach($sql2->result_array() as $rows){
            $time=$rows['time'];
            $weather_desc=$rows['weather'];
            $advisory=$rows['advisory'];
        }
    }else if($lang=='Luganda'){
        $sql2 = $this->db->get_where(' daily_forecast',array('date' => $comp , 'region' => $DRid,'weatherLuganda IS NOT NULL'=>NULL),1);
        foreach($sql2->result_array() as $rows){
            $time=$rows['time'];
            $weather_desc=$rows['weatherLuganda'];
            $advisory=$rows['advisory'];
        }
    }

    ?>

<!-- querying early morning forecast for the specific district -->
<?php
             $earlymorning  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength,  daily_forecast.time, daily_forecast.cat_id, category.cat_name, category.widget FROM daily_forecast join category on daily_forecast.cat_id = category.id WHERE daily_forecast.region = '$DRid' AND daily_forecast.date = '$comp' AND daily_forecast.time LIKE 'Early Morning%' ";
            $EM_values = $this->db->query($earlymorning);
            foreach ($EM_values->result_array() as $values);
            {
            $EM_mean_temp = $values['mean_temp'];
            $EM_wind_direction = $values['wind_direction'];
            $EM_wind_strength = $values['wind_strength'];
            $EM_time_duration = $values['time'];
            $EM_cat_name = $values['cat_name'];
            $EM_cat_id = $values['cat_id'];
            $EM_widget = $values['widget'];
            }
             ?>

<!-- early morning column -->
<div class="col-lg-3">
        <h4 style="text-align: center"><h4><?php echo $EM_time_duration; ?></h4></h4>
      
        <div class=" col-padding margin-style"  style=" background: #A9A9A9; height: 100%; min-height: 200px;" >  
        
        <div class="widget">
        <div class="<?php echo $EM_widget ?>"></div>
        </div>
       
        <div class="weather-desc">
            <span><?php echo $EM_cat_name; ?></span>
        </div>
        <p class="daily_temp"><?php echo $EM_mean_temp; ?>&deg;C</p>
        
        <div class="daily_description">
            <p>Wind Direction: <?php echo $EM_wind_direction; ?></p>
            <p>Wind Strength: <?php echo $EM_wind_strength; ?></p>
        </div>

        </div>
    </div>

<!-- querying late morning forecast for the specific district -->
<?php
             $late_morning  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength,  daily_forecast.time, daily_forecast.cat_id, category.cat_name, category.widget FROM daily_forecast join category on daily_forecast.cat_id = category.id WHERE (daily_forecast.region = '$DRid') AND (daily_forecast.date = '$comp') AND (daily_forecast.time LIKE 'Late Morning%') ";
            $LM_avalues = $this->db->query($late_morning);
            foreach ($LM_avalues->result_array() as $values);
            {
            $LM_mean_temp = $values['mean_temp'];
            $LM_wind_direction = $values['wind_direction'];
            $LM_wind_strength = $values['wind_strength'];
            $LM_time_duration = $values['time'];
            $LM_cat_name = $values['cat_name'];
            $LM_cat_id = $values['cat_id'];
            $LM_widget = $values['widget'];
            }
             ?>
<!-- late morning column -->
    <div class="col-lg-3">
        <h4 style="text-align: center"><h4><?php echo $LM_time_duration; ?></h4></h4>
        <div class=" col-padding margin-style"  style=" background-color: #A9A9A9; height: 100%; min-height: 200px;" >
            <table class="table" style="width: 100%; min-height: 200px;">
            <div>

    <div class="widget">
        <div class="<?php echo $LM_widget ?>"></div>
        </div>
        <div class="weather-desc">
            <span><?php echo $LM_cat_name; ?></span>
        </div>
        <p class="daily_temp"><?php echo $LM_mean_temp; ?>&deg;C</p>
        
        <div class="daily_description">
            <p>Wind Direction: <?php echo $LM_wind_direction; ?></p>
            <p>Wind Strength: <?php echo $LM_wind_strength; ?></p>
        </div>
       
<!--</div>-->
</div>
            </table>
        </div>
    </div>

<!-- querying afternoon forecast for the specific district -->
<?php
             $afternoon  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength,  daily_forecast.time, daily_forecast.cat_id, category.cat_name, category.widget FROM daily_forecast join category on daily_forecast.cat_id = category.id WHERE daily_forecast.region = '$DRid' AND daily_forecast.date = '$comp' AND daily_forecast.time LIKE 'Afternoon%' order by daily_forecast.id DESC limit 1";
            $afternoon_values = $this->db->query($afternoon);
            foreach ($afternoon_values->result_array() as $values);
            {
            $A_mean_temp = $values['mean_temp'];
            $A_wind_direction = $values['wind_direction'];
            $A_wind_strength = $values['wind_strength'];
            $A_time_duration = $values['time'];
            $A_cat_name = $values['cat_name'];
            $A_cat_id = $values['cat_id'];
            $A_widget = $values['widget'];
            }
             ?>
<!-- Afternoon column -->
<div class="col-lg-3">
        <h4 style="text-align: center"><h4><?php echo $A_time_duration; ?></h4></h4>
        <div class=" col-padding margin-style"  style=" background-color: #A9A9A9; height: 100%; min-height: 200px;" >
            <table class="table" style="width: 100%; min-height: 200px;">
            <div>

            <div class="widget">
                <div class="<?php echo $A_widget ?>"></div>
                </div>
                <div class="weather-desc">
                    <span><?php echo $A_cat_name; ?></span>
                </div>
                <p class="daily_temp"><?php echo $A_mean_temp; ?>&deg;C</p>
                
                <div class="daily_description">
                    <p>Wind Direction: <?php echo $A_wind_direction; ?></p>
                    <p>Wind Strength: <?php echo $A_wind_strength; ?></p>
                </div>
            
            <!--</div>-->
            </div>
            </table>
        </div>
    </div>

<!-- querying late evening forecast for the specific district -->
<?php
             $late_evening  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength,  daily_forecast.time, daily_forecast.cat_id, category.cat_name, category.widget FROM daily_forecast join category on daily_forecast.cat_id = category.id WHERE daily_forecast.region = '$DRid' AND daily_forecast.date = '$comp' AND daily_forecast.time LIKE 'Late Evening%' order by daily_forecast.id DESC limit 1";
            $lateEvening_avalues = $this->db->query($late_evening);
            foreach ($lateEvening_avalues->result_array() as $values);
            {
            $LE_mean_temp = $values['mean_temp'];
            $LE_wind_direction = $values['wind_direction'];
            $LE_wind_strength = $values['wind_strength'];
            $LE_time_duration = $values['time'];
            $LE_cat_name = $values['cat_name'];
            $LE_cat_id = $values['cat_id'];
            $LE_widget = $values['widget'];
            }
             ?>
<!-- Late evening column -->
<div class="col-lg-3">
        <h4 style="text-align: center"><h4><?php echo $LE_time_duration; ?></h4></h4>
        <div class=" col-padding margin-style"  style=" background-color: #A9A9A9; height: 100%; min-height: 200px;" >
        
       
            <table class="table" style="width: 100%; min-height: 200px;">
            <div>

            <div class="widget">
                <div class="<?php echo $LE_widget ?>"></div>
                </div>
                <div class="weather-desc">
                    <span><?php echo $LE_cat_name; ?></span>
                </div>
                <p class="daily_temp"><?php echo $LE_mean_temp; ?>&deg;C</p>
                
                <div class="daily_description">
                    <p>Wind Direction: <?php echo $LE_wind_direction; ?></p>
                    <p>Wind Strength: <?php echo $LE_wind_strength; ?></p>
                </div>
            
            <!--</div>-->
            </div>
            </table>
        </div>
    </div>

</div>
    <?php }?>
</div>
<?php
} else if($category2 == "Dekadal"){
   // $sql4 = $this->db->get_where(' daily_forecast',array('region' => $region))->row();
    $dataz['region'] = $region;
    //$dataz['region'] = $response;
    //$dataz['region'] = $response;
    $advisory="";
    $reg1="";
    $regg1="";
    if($lang=='English'){
       $sqlx = "SELECT advisory,region,date_from,date_to,graph,audio, issuetime FROM  decadal
        WHERE region = '$region' AND advisory IS NOT NULL order by issuetime DESC limit 1 ";
       $pick = $this->db->query($sqlx, $dataz);
       $reg1 = $this->db->get_where('region',array('id'=>$region));
       $regg1 = $this->db->get_where('ussdsubregions',array('subregionid'=>$subregion));

       foreach ($pick->result() as $p2) {$advisory=$p2->advisory; }
    }else{
        $sqlx = "SELECT advisoryLuganda,region,date_from,date_to,graph,audio, issuetime FROM  decadal
        WHERE region = '$region' AND advisoryLuganda IS NOT NULL order by issuetime DESC limit 1 ";
       $pick = $this->db->query($sqlx, $dataz);
       $reg1 = $this->db->get_where('region',array('id'=>$region));
       $regg1 = $this->db->get_where('ussdsubregions',array('subregionid'=>$subregion));

       foreach ($pick->result() as $p2) {$advisory=$p2->advisoryLuganda; }
    }

?>
    <div class="col-lg-12  col-center-style" style="background-color:#e4ecf3; background-size: cover; margin-top:-1px; ">
       <!--<div class="col-lg-12  " >-->
		   <div class="row">
		       <div class="col-lg-12 ">
                   <p><strong><div ><h2>DEKADAL (10 DAY) FORECAST</h2></div></strong></p>
                  <!-- <P>
                      <div class="col-lg-4">
                       <strong style="float:left;"><h4><?php foreach ($reg1->result() as $p){ echo  $p->name ; }?></h4></strong>
                      </div>
                      <div class="col-lg-4">
                            <?php foreach ($pick->result() as $p1){
                            $timestamp = strtotime($p1->date_from);
                            $timestamp1 = strtotime($p1->date_to);
                                ?>
                          <strong style="float:center;"><h4>FROM <?php  echo date('d/m/Y', $timestamp);  ?></h4></strong>
                      </div>
                      <div class="col-lg-4">
                          <strong style="float:right;"><h4>TO <?php  echo date('d/m/Y', $timestamp1);  ?></h4></strong>
                          <?php }?>
                      </div>
                   </p> -->
		    </div>
		</div>
        <div class="tabdiv"  style="height: auto;">
            <div class="tabbed">
                <input name="tabbed" id="tabbed1" type="radio" checked>
                <section>
                    <h1>
                        <label class = "my_label btn btn-default" for="tabbed1">Text</label>
                    </h1>
                    <div>

                        <table class="table table-bordered">
        <tr><td align="left" width="100px">Region</td><td align="left"><?php foreach ($reg1->result() as $p){ echo $p->name ; } ?></td></tr>
        <tr><td align="left" width="100px">Sub Region</td><td align="left"><?php foreach ($regg1->result() as $pg){ echo $pg->subregionname ; } ?></td></tr>
         <tr><td align="left">Date From</td>
                            <?php foreach ($pick->result() as $p1){
                            $timestamp = strtotime($p1->date_from);
                            $timestamp1 = strtotime($p1->date_to);
                                ?>
           <td align="left">  <?php  echo date('d/m/Y', $timestamp);  ?>
        </td></tr>
        <tr><td align="left">Date To</td>
           <td align="left"><?php  echo date('d/m/Y', $timestamp1);  ?>
            <?php } ?>
        </td></tr>
        <tr><td align="left">Description / Advisory</td><td align="left"><?php if($pick->result()){
                            echo $advisory; } else {echo "Ten day Forecast not yet available";} ?></td></tr>
                            <tr>
                                <td></td>
                                <td align="left">
                                <?php echo "<a href="; echo site_url('index.php/auth/index/'); echo " class='btn btn-default'>Cancel</a>"; ?>

                                </td>

                            </tr>

      </table>



                       <?php /*
                       echo "<div class='row'>
					          <div class='box-header'>

		                     <div style=' background-color: #ffffff; width:100%;min-width:100%; height:300px; min-height: 100%; line-height: 50px;'><table class='table table-bordered'><tr><td align='left'>Description / Advisory</td> "; foreach ($pick->result() as $p2){ echo"<td align='left' width='75%'>". $p2->advisory."</td>"; } echo "</tr></table></div>
                              </div></div>";

                      */ ?>

                    </div>
                </section>
                <input name="tabbed" id="tabbed2" type="radio">
                <section>
                    <h1>
                        <label class = "my_label btn btn-default" for="tabbed2"  class ="bl">Graphical </label>
                    </h1>
                    <div>

                        <?php
                        //}else if($response == "Graphical") {
                        //foreach ($pick->result() as $pt){ echo $pt->graph; }
						if($pick->result()){
                        foreach ($pick->result() as $ps){ $sh = $ps->graph;   }
						if(!(strpos($sh,'no image'))) {
                        echo "<div class='row'>
						     <div class='box-header'>
							<strong> <h3 class='box-title'>Graphical  </h3></strong>
                              <div style=' background-color: #ffffff; width:100%;min-width:100%; height:300px; min-height: 100%;'><table class='table table-bordered' height='auto'  ><tr><td> <img src='" ; echo base_url().$sh; echo "' class='user-image' alt='"; echo $sh. "' height='auto' /></td></tr></table> </div>
                              </div></div>";

						}else{
							echo "<div class='row'>
							<div class='box-header'>
							<strong> <h3 class='box-title'>Advisory </h3></strong>
                              <div style=' background-color: #ffffff; width:100%;min-width:100%; height:300px; min-height: 100%;'> Requested for information is not yet available </div>
                              </div></div>";
						}
						}else{
							echo "<div class='row'>
							<div class='box-header'>
							<strong> <h3 class='box-title'>Advisory </h3></strong>
                              <div style=' background-color: #ffffff; width:100%;min-width:100%; height:300px; min-height: 100%;'> Requested for information is not yet available </div>
                              </div></div>";
						}
                        ?>

                    </div>
                </section>
                <input name="tabbed" id="tabbed3" type="radio">
                <section>
                    <h1>
                        <label class = "my_label btn btn-default" for="tabbed3">Audio </label>
                    </h1>
                    <div>
                        <?php
                        foreach ($pick->result() as $ps){ $audio = $ps->audio;   }
                        echo "<div class='row'>
						 <div class='box-header'>
							<strong> <h3 class='box-title'>Audio response  </h3></strong>
                              <div style=' background-color: #ffffff; width:100%;min-width:100%; height:300px; min-height: 100%;'>"; echo " <audio controls >";
                        echo " <source src= '"; echo base_url().$audio; echo " ' type='audio/mpeg'>";
                        echo "  </audio>  </div>
                               </div></div>";

                        ?>

                    </div>
                </section>


            </div>
        </div>

    <?php //if($response == "Text"){


       // }else {
        //foreach ($pick->result() as $pt){ echo $pt->graph; }

    //}  ?>

		<!--</div>-->
    </div>

 <?php   }else{
    $dataz['region'] = $region;
   // $dataz['sub'] = $sub;
    //echo "$region, $sub";
    //exit;
    //$dataz['region'] = $response;

    $sqlz="";
    $pick1="";
    $reg2="";
    $reg3="";
    $description="";

    if($lang=='English'){

        $sqlz = "SELECT season,description,impact,graph,audio,issuetime FROM  seasonal_forecast WHERE region = '$region' AND description IS NOT NULL order by issuetime DESC limit 1 ";
        $pick1 = $this->db->query($sqlz, $dataz);
        $reg2 = $this->db->get_where('region',array('id'=>$region));
        $reg3 = $this->db->get_where('ussdsubregions',array('subregionid'=>$subregion));

        foreach ($pick1->result() as $p2) { $description = $p2->description; }

    }else{
        $sqlz = "SELECT season,descriptionLuganda,impactLuganda,graph,audio,issuetime FROM  seasonal_forecast WHERE region = '$region' AND descriptionLuganda IS NOT NULL order by issuetime DESC limit 1 ";
        $pick1 = $this->db->query($sqlz, $dataz);
        $reg2 = $this->db->get_where('region',array('id'=>$region));
        $reg3 = $this->db->get_where('ussdsubregions',array('subregionid'=>$subregion));

        foreach ($pick1->result() as $p2) { $description = $p2->descriptionLuganda; }
    }
    //echo $sub;
    ?>





    <div class="col-lg-12  col-center-style" style="background-color:#e4ecf3; background-size: cover; margin-top:-1px; ">
        <!--<div class="col-lg-12  " >-->
        <div class="row">
            <div class="col-lg-12 ">
                <p><strong><div ><h2>SEASONAL FORECAST</h2></div></strong></p>
                <P>
          <!--      <div class="col-lg-4">
                    <strong style="float:left;"><h4><?php// foreach ($reg2->result() as $p){ echo $p->name ; }?></h4></strong>
                </div>
                <div class="col-lg-4">

                    <strong style="float:center;"><h4>Sub Region <?php  //echo $sub;  ?></h4></strong>
                </div>
                <div class="col-lg-4">

                    <strong style="float:right;"><h4>Season Period <?php //if($pick1){ foreach ($pick1->result() as $p1){?>  <?php  //echo $p1->season ; } }else { echo "no results found";}?></h4></strong>
                </div>
                <?php //}

                ?>
                </p>
            </div> -->
        </div>

        <div class="tabdiv"  style="height: 200px;">
            <div class="tabbed">
               <input name="tabbed" id="tabbed1" type="radio" checked>
                <section>


                    <h1>
                        <label class = "my_label btn btn-default" for="tabbed1">Text</label>
                    </h1>



                    <div>

                          <table class="table table-bordered">
                            <tr><td align="left">District <?php echo form_error('district') ?></td>
           <td align="left"> <?php
         //     if($change == 2){
       //echo combo_function('region_id','region','name','id','region_id');
               //}else{
                $sub2 = $this->input->post('district', TRUE);
                $ss = "SELECT * FROM ussddistricts WHERE districtid = '$sub2' ";
                $ss2 = $this->db->query($ss);

          // $regg = $this->db->get_where('district',array('id'=>$sub2));

           //$reg =  $this->db->get()->row();
               foreach($ss2->result_array() as $ppp){
         echo $ppp['districtname'];
         }
          // }
       ?>
        </td></tr>
        <tr><td align="left" width="100px">Region </td><td align="left"><?php foreach ($reg2->result() as $p){ echo $p->name ; } ?></td></tr>
         <tr><td align="left" width="100px">Sub Region</td><td align="left"><?php foreach ($reg3->result() as $pp){ echo $pp->subregionname ; } ?></td></tr>


          <tr><td align="left">Season</td><td align="left"><?php if($pick1){ foreach ($pick1->result() as $p1){?>  <?php  echo $p1->season ; } }else { echo "no results found";}?></td></tr>
        <tr><td align="left">Description</td><td align="left"><?php if($pick1->result()){echo $description;  }
                        else {echo "Seasonal Forecast not yet available";} ?></td></tr>
        <tr><td align="left">Impact</td><td align="left"><?php if($pick1->result()){
                            foreach ($pick1->result() as $p2) {echo $p2->impact.$p2->impactLuganda; } } else {echo "Seasonal Forecast not yet available";} ?></td></tr>
                            <tr>
                                <td></td>
                                <td align="left">
                                <?php echo "<a href="; echo site_url('index.php/auth/index/'); echo " class='btn btn-default'>Cancel</a>"; ?>

                                </td>

                            </tr>

      </table>

                        <?php /*
                        if($pick1->result()){
                            foreach ($pick1->result() as $p2) {
                       echo "<div class='box-header'>
							<div class='col-lg-12' ><strong> <h3 class='box-title'>Text response  </h3></strong></div>";
                        echo " <div class='col-lg-6'>
                            <p style='float:center'><strong><h4>Description</h4></strong></p>
                            <div style=' background-color: #ffffff; width:100%;min-width:100%; overflow-y: scroll; height:auto; min-height: 100%;'> <table class='table table-bordered'><tr>";
                                        echo  "<td align='left'>".$p2->description."</td>";
                                        echo "</tr></table></div>
                        </div>";

                        echo " <div class='col-lg-6'>
                            <p style='float:center'><strong><h4>Impact</h4></strong></p>
                            <div style=' background-color: #ffffff; width:100%;min-width:100%; overflow-y: scroll;  height:auto; min-height: 100%;'><table class='table table-bordered'><tr>";
                                        echo  "<td align='left'>".$p2->impact."</td>";
                                        echo "</tr></table></div>
                        </div></div>";
                        }
                        }else{
                            echo "<div class='row'>
							<div class='box-header'>
							  <!--<strong> <h3 class='box-title'>Text response  </h3></strong>-->
                             <div style=' background-color: #ffffff; width:100%;min-width:100%; overflow-y: scroll; height:auto; min-height: 100%;'><h3>Text response<h3>";
                            echo "<h1>Response not yet available</h1>";
                            echo "  </div>
                                  </div></div>";

                        }   */?>
                    </div>
                </section>
                 <input name="tabbed" id="tabbed2" type="radio">
                <section>
                    <h1>
                        <label class = "my_label btn btn-default" for="tabbed2"  class ="bl">Graphical</label>
                    </h1>
                    <div>
                        <?php
                        if($pick1->result()) {
                        //echo "fkgjfgjf";
                        //exit;
                        foreach ($pick1->result() as $p2) {
                        $sh1 = $p2->graph;
                        if(!(strpos($sh1,'no image'))) {
                        echo "<div class='row'>
						<div class='box-header'>
							 <!-- <strong> <h3 class='box-title'>Graphical response </h3></strong> -->
                            <div style='  width:100%; min-width:100%; height:auto; min-height: 100%;'><img src='";
                    echo base_url() . $sh1;
                    echo "' class='user-image' alt='";
                    echo $sh1 . "' style=' width:500px; height:400px;'/> </div>
                        </div></div>"; }else{

							 echo "<div class='row'>";
							 echo "<div class='box-header'>
							  <!--<strong> <h3 class='box-title'>Graphical response</strong>-->";
                          echo"  <div style='  width:100%; min-width:100%; height:auto; min-height: 100%;'>";
                   echo "Images will be available shortly </div>";
                     echo " </div></div>";

						}
						}
                        }else{
                            echo "<div class='row'>
							  <div class='box-header'>
							  <!--<strong> <h3 class='box-title'>Graphical response </h3></strong>-->
                             <div style=' background-color: #ffffff; width:100%;min-width:100%; height:300px; min-height: 100%;'>";
                            echo "<h1>Response not yet available</h1>";
                            echo "  </div>
                                  </div></div>";

                        }

                       ?>

                    </div>
                </section>
                 <input name="tabbed" id="tabbed3" type="radio">
                <section>
                    <h1>
                        <label class = "my_label btn btn-default" for="tabbed3">Audio</label>
                    </h1>
                    <div>
                        <?php
                         if($pick1->result()) {

                             foreach ($pick1->result() as $ps) {
                                 $audio = $ps->audio;

                             }
                             echo "<div class='row'>
							 <div class='box-header'>
							  <strong> <h3 class='box-title'>Audio response </h3></strong>
                            <div style=' background-color: #ffffff; width:100%;min-width:100%; height:300px; min-height: 100%;'>";
                             echo "  <audio controls >";
                             echo " <source src= '";
                             echo base_url() . $audio;
                             echo " ' type='audio/mpeg'>";
                             echo "  </audio>  </div>
                        </div></div>";
                         }else {
                             echo "<div class='row'>
							   <div class='box-header'>
							  <!--<strong> <h3 class='box-title'>Audio response </h3></strong>-->
                             <div style=' background-color: #ffffff; width:100%;min-width:100%; height:300px; min-height: 100%;'>";
                             echo "<h1>Response not yet available</h1>";
                             echo "  </div>
                                  </div></div>";

                         }?>

                    </div>
                </section>


            </div>
        </div>
            <?php //if($response == "Text"){


            //}else if($response == "Graphical"){

             //}else {
                //foreach ($pick->result() as $pt){ echo $pt->graph; }

           // }   ?>

        <!--</div>-->
    </div>
      <?php }?>
