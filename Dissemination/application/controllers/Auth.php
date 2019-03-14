<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
		$this->load->model('Advisory_model');
		$this->load->model('Season_model');
		$this->load->model('Decadal_forecast_model');
        $this->load->model('Daily_forecast_model');
        $this->load->model('Landing_model');
		//,'Season_model','Decadal_forecast_model','Daily_forecast_model');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
		//error_reporting(0);
    }

    // redirect if needed, otherwise display the user list
	 public function index($page = 'request_service') {


	    $data['msg'] = "";
		$data['response'] = "";
         $data['category1'] = "";

		if(isset($_POST['request_s'])){

                   $d = $this->input->post('district');
                   $data['lang']=$this->input->post('lang');

               $ssd = "SELECT * FROM ussddistricts WHERE districtid = '$d'";
               $ssd2 = $this->db->query($ssd);

               foreach ($ssd2->result_array() as $wwe) {
                $da = $wwe['regionid'];
                 $da2 = $wwe['subregionid'];
                 $DRid = $wwe['DRid'];
               }
                   //$data['region'] = $this->input->post('region');
		           $data['region'] = $da;
                   $data['subregion'] = $da2;
                   $data['DRid'] = $DRid;
               $data['category1'] = $this->input->post('category1');
               $data['category2'] = $this->input->post('category2');
				  // $data['response'] = $this->input->post('response');

				   //if($data['response'] == "Text"){
					 if($data['category1'] == "Weather Forecast"){

                         $data['region'];
                         $data['DRid'];


					 }else if ($data['category1'] == "Food advisory" || $data['category1'] == "Agriculture advisory" || $data['category1'] == "water advisory" || $data['category1'] == "health advisory"  ) {

                            $data['tip'] = "text";
				            $requested = $this->Advisory_model->get_all_where($data);

                           // $requested1 = $this->Advisory_model->get_all_where($data);


							   $data['type'] = 'audio';
                               $data['type1'] = 'text';
                                $data['type2'] = 'Graphical';
		                      $data['advice'] = $data['category2'];


                              if($requested){

                                $data['record_id'] = $requested->record_id;
                                $data['audio'] = $requested->audio;

                                if($data['lang']=='English'){
                                    $data['message']=$requested->message;
                                }else{
                                    $data['message']=$requested->messageLuganda;
                                }

                                $data['cont'] = " ";
                                $data['rem'] = "remove";

                        }else{

                                if($data['lang']=='English'){
                                    $data['message'] = 'Request advisory message is not yet available';
                                    $data['audio'] = 'Request advisory audio is not yet available';
                                    $data['cont'] = "no audio";
                                    $data['rem'] = "remove";
                                }else{
                                    $data['message'] = 'Kyosabye tetusobola kukifuna mukaseera kano. Gezaako eddako';
                                    $data['audio'] = 'Kyosabye tetusobola kukifuna mukaseera kano. Gezaako eddako';
                                    $data['cont'] = "tewali message mu audio kati";
                                    $data['rem'] = "remove";
                                }
                        }


					 }


		}
		 if(isset($_POST['send'])) {
             $this->form_validation->set_rules('advisory', 'Advisory', 'required');
             $this->form_validation->set_rules('names', 'Organisation or Name ', 'required');

             if ($this->form_validation->run() == FALSE) {
                 $data['category1'] = "offer feedback";
                 $data['region'] = $this->input->post('region');

             }else{
                 $a = $this->input->post('names', TRUE);
                 $b = $this->input->post('advisory', TRUE);
                 $c = $this->input->post('reg', TRUE);
                 $d = $this->input->post('district', TRUE);

                 $sql = "INSERT INTO feedback(record_id, names, advisory, region, district) VALUES (null, '$a', '$b', '$c', '$d')";
                 $ww = $this->db->query($sql, $data);
                 if ($ww) {
                     $data['msg'] = "<div class='alert alert-success'>Feedback submitted, thank you..</div>";
                     $data['category1'] = "offer feedback";
                     $data['region'] = $this->input->post('region');

                 } else {
                     $data['msg'] = "<div class='alert alert-danger'>Feedback not submitted there was an issue please try again...</div>";
                     $data['category1'] = "offer feedback";
                     $data['region'] = $this->input->post('region');
                 }

             }
         }

		$this->load->view($page, $data);


    }
    public function load_login() {
	 $data = array(
	    'message' => set_value('message'),
	    'identity' => set_value('identity'),
	    'password' => set_value('password'),
	    'forgot_password' => set_value('forgot_password'),
	    );

            $this->load->view('auth/login', $data);
    }

    // log the user in
    public function login() {
	        $this->form_validation->set_rules('identity', 'Email', 'required');
	        $this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');


        if ($this->form_validation->run() == FALSE) {
            $this->load_login();
        } else {
		            $dat[1] = $_POST['identity'];
					$dat[2] = md5($_POST['password']);

                    $sql = $this->ion_auth->login1($dat);


                   $data="";
				    foreach ($sql->result_array() as $row)
                      {
                        $data=array(
                            $username = $row['username'],
                            $active = $row['active'],
                        //if first time login
                          $status = $row['first_time_login'],
                          $id = $row['id']
                        );


                      }

                                  if ($row['username'] && $active == 1) {

                                        $_SESSION['user_logged']=TRUE;
                                        $_SESSION['username']= $row['username'];
                                        $_SESSION['usertype']= $row['usertype'];
                                        $_SESSION['first_time_login']=  $row['first_time_login'];

                                        $_SESSION['pic']= $row['pic'];

                                //$this->session->set_flashdata("message","<div class = 'alert alert-success'>successfully logged in</div>");
                                $data['change'] = 0;
                                //$this->load->view('template', $data);
                                    redirect('index.php/landing/index');
                                }elseif(!$row['username']){
                                        $this->session->set_flashdata("error","<div class = 'alert alert-danager'> Incorrect login  in ... consider checking your Email or password</div>");
                                        $this->load_login();

                                    } elseif($row['username'] && !$active == 1){
                                        $this->session->set_flashdata("error","<div class = 'alert alert-danager'> You can not login in ... this account is not active</div>");
                                        $this->load_login();



			  }
        }


    }

    // log the user out
    public function logout() {
        $this->data['title'] = "Logout";

        // log the user out
        $logout = $this->ion_auth->logout();

        // redirect them to the login page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('index.php/auth/login', 'refresh');
    }
    //new password for first login
    // public function new_password() {

    //     $this->form_validation->set_rules('old_password', 'Old password', 'required');
    //     $this->form_validation->set_rules('new_password', 'new Password', 'required|min_length[8]');
    //     $this->form_validation->set_rules('new_password_conf', 'Password Confirmation', 'required|matches[new_password]');
    //         if (!$this->ion_auth->logged_in()) {

    //             redirect('index.php/auth/login', 'refresh');
    //         }

    //     $user = $this->ion_auth->user()->row();
    //     // echo 'user if';
    //     // exit;

    //     if ($this->form_validation->run() == false) {
    //         // echo 'wrong val';
    //         // exit;
    //         // display the form
    //         // set the flash data error message if there is one
    //         $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

    //         $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
    //         $this->data['old_password'] = array(
    //             'name' => 'old',
    //             'id' => 'old',
    //             'type' => 'password',
    //         );
    //         $this->data['new_password'] = array(
    //             'name' => 'new',
    //             'id' => 'new',
    //             'type' => 'password',
    //             'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
    //         );
    //         $this->data['new_password_confirm'] = array(
    //             'name' => 'new_confirm',
    //             'id' => 'new_confirm',
    //             'type' => 'password',
    //             'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
    //         );
    //         $this->data['user_id'] = array(
    //             'name' => 'user_id',
    //             'id' => 'user_id',
    //             'type' => 'hidden',
    //             'value' => $user->id,
    //         );

    //         // render
    //         //$this->template->load_auth('index.php/auth/new_password', $this->data);
    //         $this->load->view('auth/new_password',$data);
    //     } else {

    //         $identity = $this->session->userdata('identity');
    //         var_dump($identity);
    //         exit;

    //         $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

    //         if ($change) {
    //             echo 'if changed password';
    //         exit;
    //             //if the password was successfully changed
    //             $this->session->set_flashdata('message', $this->ion_auth->messages());
    //             $this->logout();
    //         } else {
    //             $this->session->set_flashdata('message', $this->ion_auth->errors());
    //             redirect('index.php/auth/new_password', 'refresh');
    //         }
    //     }
    // }
    public function _rules()
    {

    $this->form_validation->set_rules('old_password', 'Old Password', 'required');
    $this->form_validation->set_rules('new_password', 'New Password', 'required');
    $this->form_validation->set_rules('new_password_conf', 'Password Confirmation', 'required|matches[new_password]');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function minano(){

        $this->_rules();
        $username = '';

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('auth/new_password');

        }else{
            $data = array(
               'username' => $_SESSION['username'],
               'usertype' =>  $_SESSION['usertype'],
               'pic'      => $_SESSION['pic'],
               'change'   => 0,
            );
           $username =  $_SESSION['username'];

            $password=$this->Landing_model->get_old_password($username);
            $entered_old_password=md5($this->input->post('old_password'));
            $new_password=md5($this->input->post('new_password'));


            if($password->password==$entered_old_password){
                // var_dump($password->password==$entered_old_password);
                // exit;
                $this->Landing_model->update_old_password($username,$new_password);
                redirect('index.php/auth/login', 'refresh');
            }
        }

        //$this->load->view('auth/new_password');
    }

    //directing to the change password form

    public function change_pass(){


        $data = array(
            'change' => 34,
        );
        $this->load->view('template',$data);
    }

    // change password
    public function change_password() {
        $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
        $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

        if (!$this->ion_auth->logged_in()) {
            redirect('index.php/auth/login', 'refresh');
        }

        $user = $this->ion_auth->user()->row();

        if ($this->form_validation->run() == false) {
            // display the form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
            $this->data['old_password'] = array(
                'name' => 'old',
                'id' => 'old',
                'type' => 'password',
            );
            $this->data['new_password'] = array(
                'name' => 'new',
                'id' => 'new',
                'type' => 'password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['new_password_confirm'] = array(
                'name' => 'new_confirm',
                'id' => 'new_confirm',
                'type' => 'password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['user_id'] = array(
                'name' => 'user_id',
                'id' => 'user_id',
                'type' => 'hidden',
                'value' => $user->id,
            );

            // render
            $this->template->load_auth('auth/change_password', $this->data);
        } else {
            $identity = $this->session->userdata('identity');

            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change) {
                //if the password was successfully changed
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->logout();
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('auth/change_password', 'refresh');
            }
        }
    }

    // forgot password
    public function forgot_password() {
        // setting validation rules by checking whether identity is username or email
        if ($this->config->item('identity', 'ion_auth') != 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
        } else {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
        }


        if ($this->form_validation->run() == false) {
            $this->data['type'] = $this->config->item('identity', 'ion_auth');
            // setup the input
            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
            );

            if ($this->config->item('identity', 'ion_auth') != 'email') {
                $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
            } else {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }

            // set any errors and display the form
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->template->load_auth('auth/forgot_password', $this->data);
        } else {
            $identity_column = $this->config->item('identity', 'ion_auth');
            $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

            if (empty($identity)) {

                if ($this->config->item('identity', 'ion_auth') != 'email') {
                    $this->ion_auth->set_error('forgot_password_identity_not_found');
                } else {
                    $this->ion_auth->set_error('forgot_password_email_not_found');
                }

                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("auth/forgot_password", 'refresh');
            }

            // run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            if ($forgotten) {
                // if there were no errors
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("auth/forgot_password", 'refresh');
            }
        }
    }

    // reset password - final step for forgotten password
    public function reset_password($code = NULL) {
        if (!$code) {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user) {
            // if the code is valid then display the password reset form

            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == false) {
                // display the form
                // set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;

                // render
                $this->template->load_auth('auth/reset_password', $this->data);
            } else {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {

                    // something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);

                    show_error($this->lang->line('error_csrf'));
                } else {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change) {
                        // if the password was successfully changed
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect("auth/login", 'refresh');
                    } else {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect('auth/reset_password/' . $code, 'refresh');
                    }
                }
            }
        } else {
            // if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }

    // activate the user
    public function activate($id, $code = false) {
        if ($code !== false) {
            $activation = $this->ion_auth->activate($id, $code);
        } else if ($this->ion_auth->is_admin()) {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation) {
            // redirect them to the auth page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        } else {
            // redirect them to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }

    // deactivate the user
    public function deactivate($id = NULL) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }

        $id = (int) $id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
        $this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

        if ($this->form_validation->run() == FALSE) {
            // insert csrf check
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['user'] = $this->ion_auth->user($id)->row();

            $this->template->load_auth('auth/deactivate_user', $this->data);
        } else {
            // do we really want to deactivate?
            if ($this->input->post('confirm') == 'yes') {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                    show_error($this->lang->line('error_csrf'));
                }

                // do we have the right userlevel?
                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                    $this->ion_auth->deactivate($id);
                }
            }

            // redirect them back to the auth page
            redirect('auth', 'refresh');
        }
    }

    // create a new user
    public function create_user() {
        $this->data['title'] = $this->lang->line('create_user_heading');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
        if ($identity_column !== 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        } else {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true) {
            $email = strtolower($this->input->post('email'));
            $identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data)) {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        } else {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['identity'] = array(
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['company'] = array(
                'name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'value' => $this->form_validation->set_value('company'),
            );
            $this->data['phone'] = array(
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'text',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->template->load_auth('auth/create_user', $this->data);
        }
    }

    // edit a user
    public function edit_user($id) {
        $this->data['title'] = $this->lang->line('edit_user_heading');

        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id))) {
            redirect('auth', 'refresh');
        }

        $user = $this->ion_auth->user($id)->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
        $this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
        $this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required');

        if (isset($_POST) && !empty($_POST)) {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                show_error($this->lang->line('error_csrf'));
            }

            // update the password if it was posted
            if ($this->input->post('password')) {
                $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
            }

            if ($this->form_validation->run() === TRUE) {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'company' => $this->input->post('company'),
                    'phone' => $this->input->post('phone'),
                );

                // update the password if it was posted
                if ($this->input->post('password')) {
                    $data['password'] = $this->input->post('password');
                }



                // Only allow updating groups if user is admin
                if ($this->ion_auth->is_admin()) {
                    //Update the groups user belongs to
                    $groupData = $this->input->post('groups');

                    if (isset($groupData) && !empty($groupData)) {

                        $this->ion_auth->remove_from_group('', $id);

                        foreach ($groupData as $grp) {
                            $this->ion_auth->add_to_group($grp, $id);
                        }
                    }
                }

                // check to see if we are updating the user
                if ($this->ion_auth->update($user->id, $data)) {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    if ($this->ion_auth->is_admin()) {
                        redirect('auth', 'refresh');
                    } else {
                        ////redirect('/', 'refresh');
                    }
                } else {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    if ($this->ion_auth->is_admin()) {
                        redirect('auth', 'refresh');
                    } else {
                        ////redirect('/', 'refresh');
                    }
                }
            }
        }

        // display the edit user form
        $this->data['csrf'] = $this->_get_csrf_nonce();

        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        // pass the user to the view
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        $this->data['currentGroups'] = $currentGroups;

        $this->data['first_name'] = array(
            'name' => 'first_name',
            'id' => 'first_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('first_name', $user->first_name),
        );
        $this->data['last_name'] = array(
            'name' => 'last_name',
            'id' => 'last_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('last_name', $user->last_name),
        );
        $this->data['company'] = array(
            'name' => 'company',
            'id' => 'company',
            'type' => 'text',
            'value' => $this->form_validation->set_value('company', $user->company),
        );
        $this->data['phone'] = array(
            'name' => 'phone',
            'id' => 'phone',
            'type' => 'text',
            'value' => $this->form_validation->set_value('phone', $user->phone),
        );
        $this->data['password'] = array(
            'name' => 'password',
            'id' => 'password',
            'type' => 'password'
        );
        $this->data['password_confirm'] = array(
            'name' => 'password_confirm',
            'id' => 'password_confirm',
            'type' => 'password'
        );

        $this->template->load_auth('auth/edit_user', $this->data);
    }

    // create a new group
    public function create_group() {
        $this->data['title'] = $this->lang->line('create_group_title');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash');

        if ($this->form_validation->run() == TRUE) {
            $new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
            if ($new_group_id) {
                // check to see if we are creating the group
                // redirect them back to the admin page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth", 'refresh');
            }
        } else {
            // display the create group form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['group_name'] = array(
                'name' => 'group_name',
                'id' => 'group_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('group_name'),
            );
            $this->data['description'] = array(
                'name' => 'description',
                'id' => 'description',
                'type' => 'text',
                'value' => $this->form_validation->set_value('description'),
            );

            $this->template->load_auth('auth/create_group', $this->data);
        }
    }

    // edit a group
    public function edit_group($id) {
        // bail if no group id given
        if (!$id || empty($id)) {
            redirect('auth', 'refresh');
        }

        $this->data['title'] = $this->lang->line('edit_group_title');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        $group = $this->ion_auth->group($id)->row();

        // validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === TRUE) {
                $group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

                if ($group_update) {
                    $this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                }
                redirect("auth", 'refresh');
            }
        }

        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        // pass the user to the view
        $this->data['group'] = $group;

        $readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

        $this->data['group_name'] = array(
            'name' => 'group_name',
            'id' => 'group_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('group_name', $group->name),
            $readonly => $readonly,
        );
        $this->data['group_description'] = array(
            'name' => 'group_description',
            'id' => 'group_description',
            'type' => 'text',
            'value' => $this->form_validation->set_value('group_description', $group->description),
        );

        $this->template->load_auth('auth/edit_group', $this->data);
    }

    public function _get_csrf_nonce() {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    public function _valid_csrf_nonce() {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
                $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
      {

      $this->viewdata = (empty($data)) ? $this->data: $data;

      $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

      if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
      } */
}
