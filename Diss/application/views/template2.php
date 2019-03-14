<?php 
//error_reporting(0);
    //$this->output->enable_profiler(TRUE);
    
    //$data = $this->data_model->getSumEachData();
    $cur_uri=substr($this->uri->uri_string(),6);
    $cur_uri = $this->uri->segment(1);
    $cur_parent = $this->db->get_where('menu',array('link'=>$cur_uri,'is_active'=>1))->result_array();
    
    if($cur_parent)
        $cur_parent = $cur_parent[0]['is_parent'];
    else
        $cur_parent = 0;
		if($_SESSION['user_logged'] == FALSE){
			$this->session->set_flashdata("error","please log in first to view this page");
		    redirect("index.php/auth/login");
			}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Weather Information Dissemination System</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/adminlte.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/skins/_all-skins.min.css">
       <!-- css for date picker --->
	   <link href="<?php echo base_url(); ?>assets/frameworks/adminlte/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	   
           <link href="<?php echo base_url(); ?>assets/frameworks/adminlte/css/bootstrap-datetimepicker.css" rel="stylesheet">
        
        
        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url() ?>assets/frameworks/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>assets/frameworks/adminlte/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() ?>assets/frameworks/adminlte/js/demo.js"></script>
        <!-- notifying -->
        <script src="<?php echo base_url() ?>assets/plugins/notify/notify.min.js"></script>
   
        
    </head>
    <body class="hold-transition skin-blue sidebar-mini" onLoad="hideDivs()">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>W</b>IDS</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><h4>WEATHER INFORMATION DISSEMINATION SYSTEM</h4></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">



                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url()?>assets/frameworks/adminlte/<?php echo $_SESSION['pic']; ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
									<?php
									//echo date('Y-m-d H:i:s');
									?>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url()?>assets/frameworks/adminlte/<?php echo $_SESSION['pic']; ?>" class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo $_SESSION['username']; ?>
                                           <!-- <small>Member since Nov. 2016</small>-->
                                        </p>
                                    </li>
                                    
                                    <li class="user-footer">
                                       <!-- <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div> -->
                                        <center><div>
                                            <?php
                                            echo anchor('index.php/auth/logout','Log out',array('class'=>'btn btn-default btn-flat'));
                                            ?>
                                            
                                        </div></center>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                           
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url()?>assets/frameworks/adminlte/<?php echo $_SESSION['pic']; ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $_SESSION['username']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <div>
                  <!-- <p><?php 
                               if($_SESSION['first_time_login']==1){?>
                               <a href="<?php// echo base_url(); ?>index.php/Auth/change_pass"><button type="button" class="btn">Change password</button></a><?php
                            
                               }?></p> -->
                    </div>
                   
                    <ul class="sidebar-menu">

                        <li><?php
                            echo anchor('index.php/Landing/index/', '<i class="fa fa-laptop"></i><span>'.strtoupper("DASHBOARD").'</span>');
							?>
                        </li>
                        <?php
                        //$define = ""
                        $menu = $this->db->get_where('menu', array('is_parent' => 0,'is_active'=>1));
                        
                        foreach ($menu->result() as $m) {
                            // check for submenu
                            $submenu = $this->db->get_where('menu',array('is_parent'=>$m->id,'is_active'=>1));
                            if($submenu->num_rows()>0){
                                // make submenu
                                echo "<li class='treeview ".(($cur_parent==$m->id)?'active':"")."' >
                                    
                                    ".anchor('index.php/Landing/index',  "<i class='$m->icon'></i>".strtoupper($m->name).' <i class="fa fa-angle-left pull-right"></i>')."
                                        <ul class='treeview-menu'>";
                                //if($cur_uri==$m->link) $menu_html.= 'active';
                                
                                
                                foreach ($submenu->result() as $s) {
                                    if (($s->descrpition == "one" || $s->descrpition == $_SESSION['usertype']) || $_SESSION['usertype'] == 'wimea') {
                                        echo "<li " . (($cur_uri == $s->link) ? 'class = active' : "") . ">" . anchor($s->link, "<i class='$s->icon" . active_link_controller($m->link) . "'  ></i> <span>" . strtoupper($s->name)) . "</span></li>";
                                    }
                                }
                                   echo"</ul>
                                    </li>";
                            }else{
                                echo "<li>" . anchor($m->link, "<i class='$m->icon'></i> <span>" . strtoupper($m->name)) . "</span></li>";
                            }
                            
                        }
                        ?>
						 <!-- <li><?php
                           // echo anchor('http://196.43.133.125/wimeawids/index.php/', '<i class="ion-android-mail"></i><span>'.strtoupper("SMS COMPONENT").'</span>');
							?>
                        </li> -->

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <!-- <section class="content-header">
                    <h1>
                        Data Tables
                        <small>advanced tables</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>  -->

 
                <?php
				  if($this->session->flashdata('message')){?>
			      <div class = "alert alert-danager"><?php echo $this->session->flashdata('message');?></div>  
                     <?php }  
                    //  var_dump($change);
                    //  exit;  
					 
                //echo $contents;
				//exit;
				// echo $_SESSION['pic']; 
				if($change == 1){
				$this->load->view("daily_forecast_form");


				  }else if($change == 0){

                    $this->load->view("landing_index");

				}else if($change == 3){
				$this->load->view("daily_forecast_list.php");


				}else if($change == 4){
				 $this->load->view("decadal_forecast_list.php");


				}else if($change == 2 || $change == 12){
				 $this->load->view("decadal_forecast_form");

				}
				else if($change == 5){

				 $this->load->view("advisory_list.php");

				}
				else if($change == 6 || $change==7 || $change == 22 || $change== 23){
				 $this->load->view("advisory_form");
				
				}
				else if($change == 8){
				 $this->load->view("admin_advisory_read");
				
				}
				else if($change == 9){
				 $this->load->view("advisory_change");
				}
				else if($change == 10){
				 $this->load->view("daily_forecast_read");
				}
				else if($change == 11){
				 $this->load->view( 'decadal_forecast_read');
				}else if($change == 13){
				 $this->load->view( 'daily_forecast_read');
				}
				else if($change == 14){
				 $this->load->view( 'season_form');
				}
				else if($change == 15){
				 $this->load->view( 'season_list');
				}
				else if($change == 16){
				 $this->load->view( 'season_read');
				}else if($change == 17){
                    $this->load->view( 'feedback');
                }else if($change == 18 || $change == 19){
                    $this->load->view( 'user_feedback_list');
                }else if($change == 20){
                    $this->load->view( 'user_feedback_read');
                }else if($change == 21){
                    $this->load->view( 'graph_show');
                }else if($change ==24){
                    $this->load->view('user_create');
                }else if($change ==26){
                    $this->load->view('user_edit');
                }else if($change ==27){
                    $this->load->view('user_list');
                }else if($change ==24){
                    $this->load->view('user_create');
                }else if($change ==34){
                    
                    $this->load->view('auth/new_password');
                }else if($change==28){
                    $this->load->view('inactive_user_list.php');
                }
                else if($change == 33){
                    $this->load->view('daily_forecast_archive_list');
                }
                else if($change == 36){
                    $this->load->view('daily_forecast_single_form');
                }
                else if($change == 37){
                    $this->load->view('daily_pdfprint');
                }

				
				 
				//$this->load->view("daily_forecast_list.php");
                ?>
                
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 
                    <?php 
                        echo $this->config->item('dissemination_version');
                    ?>
                </div>
                <strong>Copyright &copy; <?php echo date('Y');?>  <a href="http://wimea.mak.ac.ug/" target="_blank">WIMEA-ICT</a>.</strong> All rights reserved.
            </footer>

            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        
		<!-- link for date picker -->
		<!--<script src="<?php echo base_url(); ?>assets/frameworks/adminlte/js/bootstrap-datetimepicker.min.js"></script> -->
       <script src="<?php echo base_url(); ?>assets/frameworks/adminlte/js/bootstrap-datetimepicker.js"></script>
	   <!-- page script -->
	   <script>
	     $(function(){
			 $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayBtn: true,
        startDate: new Date(),
        minuteStep: 60
    });

		 });
		  $("#date_from").change(function() {
			  var selection=$("#date_from").val();
			  //$("#date_to").val(selection);
			  var date1 = new Date(selection);
			  var diffDays = Math.ceil(10 * (1000 * 3600 * 24)); 
			  var newd = Math.abs(date1.getTime() + diffDays);
			  var det = new Date(newd);
			  var month = (det.getMonth() + 1);
			  var dt =  det.getDate();
			      if (dt < 10) {
                  dt = '0' + dt;
                    }
                 if (month < 10) {
                     month = '0' + month;
                   }

			  var fin =   det.getFullYear() + '-' + month + '-' + dt ;
			  $("#date_to").val(fin);
			   $("#date_s").val(fin);
			 
		  });
	   </script>
        <script>
            $("#pic").change(function() {

                var val = $(this).val();

                switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                   // case 'jpeg': case 'jpg': case 'png': case 'PNG':
                    case 'mp3':
                    //alert("an image");
                    break;
                    default:
                        $(this).val('');
                        // error message here
                        alert("Only MP3 files are allowed ");
                        break;
                }
            });
            $("#pic1").change(function() {

                var val = $(this).val();

                switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                      case 'jpeg': case 'jpg': case 'png': case 'PNG':
                        //alert("an image");
                        break;
                    default:
                        $(this).val('');
                        // error message here
                        alert("Only jpeg, jpg and PNG files allowed");
                        break;
                }
            });
        </script>

        <script>
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });
            
            $(".treeview").on("click")({
		 $(".treeview").addClass("active");
            });


        </script>
    </body>
</html>
