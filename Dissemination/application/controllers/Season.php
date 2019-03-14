<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Season extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Season_model');
        $this->load->library('form_validation');
    }

    public function index()
    { 
$season = $this->Season_model->get_all();
	$data = array(
            'season_data' => $season,
			'change' => 15
        );

        $this->load->view('template', $data);
    }

    public function read($id) 
    {
	$row = $this->Season_model->get_by_id($id);
	
	if ($row) {
            $data = array(
		'id' => $row->sea_id,
		'region' => $row->region,
        'subregion' => $row->subregionid,
        'season' => $row->season,
        'description' => $row->description,
        'descriptionLuganda'=>$row->descriptionLuganda,
		'impact' => $row->impact,
		'graph' => $row->graph,
		'audio' => $row->audio,
		'issuetime' => $row->issuetime,
	    'change' => 16,
		//'forecast_id' => $row->forecast_id,
	    );
            $this->load->view('template', $data);
        } else {
		  $data = array(
		      'change' => 0,
		//'forecast_id' => $row->forecast_id,
	    );
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
           $this->load->view('template', $data);
        }
    }

    public function create() 
    {
	     
       $data = array(
            'button' => 'Create',
            'error' => ' ',
            'error1'=> ' ',
           'ed' => '1',
            'action' => site_url('index.php/season/create_action'),
	    'id' => set_value('id'),
        'descrip' => set_value('descrip'),
        'impact' => set_value('impact'),
		'audio' => set_value('audio'),
		'graph' => set_value('graph'),
		'change' => 14,
	);
        $this->load->view('template', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if (!empty($_FILES['userfile']['name'])) {
                $this->do_upload();
                if (!$this->upload->do_upload('userfile')) {

                    $data = array(
                        'error' => $this->upload->display_errors(),
                        'error1' => '',
                        'ed' => '1',
                        'button' => 'Create',
                        'action' => site_url('index.php/season/create_action'),
                        'id' => set_value('id'),
                        'descrip' => set_value('descrip'),
                        'impact' => set_value('impact'),
                        'audio' => set_value('audio'),
                        'graph' => set_value('graph'),
                        'change' => 14,

                    );

                    $det = "3";
                    $upload = "not_ok";
                    $this->load->view('template', $data);

                } else {
                     $this->upload->set_max_filesize(10240);
                    $temp = $this->upload->data();
                    $image = $temp['file_name'];
                    $upload = "ok";
                    $det = "2";
                }
            }else{
                $image = "no image upload";
                $upload = "ok";
                $det = "1";
            }
            if (!empty($_FILES['userfile1']['name'])) {
                $this->do_upload();
                if (!$this->upload->do_upload('userfile1')) {
                    $data = array(
                        'error1' => $this->upload->display_errors(),
                        'error' => '',
                        'ed' => '1',
                        'button' => 'Create',
                        'action' => site_url('index.php/season/create_action'),
                        'id' => set_value('id'),
                        'descrip' => set_value('descrip'),
                        'impact' => set_value('impact'),
                        'audio' => set_value('audio'),
                        'graph' => set_value('graph'),
                        'change' => 14,

                    );
                    $upload1 = "not_ok";
                    $det1 = "2";

                    $this->load->view('template', $data);

                } else {
                    $dat = $this->upload->data();
                    $image1 = $dat['file_name'];
                    $upload1 = "ok";
                    $det1 = "1";

                }
            }else{
                $upload1 = "ok";
                $det1 = "1";
                $image1 = "no audio uploaded";


            }
            if ($det == "2" && $det1 == "2") {
               // echo "am here";
                //echo $det1;
                //exit;

                $path1 = $_SERVER['DOCUMENT_ROOT'] . 'Dissemination/uploads/' . $image;
                //$path = $_SERVER['DOCUMENT_ROOT'].'Dissemination_tz/'.$row->audio;

                $this->remove_file($path1);
                //$this->remove_file($path);
            }
            if ($det == "3" && $det1 == "1") {

                $path1 = $_SERVER['DOCUMENT_ROOT'] . 'Dissemination/uploads_decadal/' . $image1;
                //$path = $_SERVER['DOCUMENT_ROOT'].'Dissemination_tz/'.$row->audio;

                $this->remove_file($path1);
                //$this->remove_file($path);
            }
            if ($upload == "ok" && $upload1 == "ok") {

                $all = $this->input->post('impact', TRUE);
                $all .= "<br/>";
                if (!empty($_POST['check_list'])) {

                    // Loop to store and display values of individual checked checkbox.
                    foreach ($_POST['check_list'] as $selected) {
                        $all .= $selected;
                    }

                }

                $data = array(
                    'region' => $this->input->post('region_id', TRUE),
                    'sub' => $this->input->post('sub_region', TRUE),
                    'seas' => $this->input->post('seas', TRUE),
                    'lang' => $this->input->post('lang',TRUE),
                    'descrip' => $this->input->post('descrip', TRUE),
                    'impact' => $all,
                    'file1' => 'uploads/' . $image,
                    'file2' => 'uploads/' . $image1,
                    'region2' => $this->input->post('region_id', TRUE),

                );

                $hh = $this->Season_model->insert($data);
                if ($hh) {
                    $this->session->set_flashdata('message', '<font color="green" size="5">Create Record Success</font>'); 
                } else {
                    $this->session->set_flashdata('message', '<font color="red" size="5">Create not Record Successful</font>');
                }
                $season = $this->Season_model->get_all();
                $data = array(
                    'season_data' => $season,
                    'change' => 15,
                );

                $this->load->view('template', $data);

               }

            }

    }
    
    public function update($id) 
    {
        $row = $this->Season_model->get_by_id($id);
        $luganda = $row->descriptionLuganda;
        $lugandaImpact=$row->impactLuganda;
        $english = $row->advisory;
        $impact=$row->impact;
        if($luganda!=NULL)
        {
        if ($row) {
            $impact =str_replace("<br/>", ".", "$row->impactLuganda");
            $data = array(
                'error1' => '',
                'error' => '',
                'ed' => '2',
                'button' => 'Update',
                'action' => site_url('index.php/season/update_action'),
		'id' => set_value('id', $row->sea_id),
        'descrip' => set_value('descrip',$row->descriptionLuganda),
        'impact' => set_value('impact',$impactLuganda),
         'audio' => set_value('audio',$row->audio),
         'graph' => set_value('graph',$row->graph),
		'change'   => 14,
	    );
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
            $this->load->view('template', $data);
        }
    }elseif ($english!=NULL) {
        if ($row) {
            $impact =str_replace("<br/>", ".", "$row->impact");
            $data = array(
                'error1' => '',
                'error' => '',
                'ed' => '2',
                'button' => 'Update',
                'action' => site_url('index.php/season/update_action'),
		'id' => set_value('id', $row->sea_id),
        'descrip' => set_value('descrip',$row->description),
        'impact' => set_value('impact',$impact),
         'audio' => set_value('audio',$row->audio),
         'graph' => set_value('graph',$row->graph),
		'change'   => 14,
	    );
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
            $this->load->view('template', $data);
        }
    }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if (!empty($_FILES['userfile']['name'])) {
                $this->do_upload();
                if (!$this->upload->do_upload('userfile')) {
                    $lang=$this->input->post('lang', TRUE);
                    $row = $this->Season_model->get_by_id($this->input->post('id', TRUE));
                    if($lang=='English'){
                        if ($row) {
                            $impact = str_replace("<br/>", ".", "$row->impact");
                            $data = array(
                                'error1' => '',
                                'error' => $this->upload->display_errors(),
                                'ed' => '2',
                                'button' => 'Update',
                                'action' => site_url('index.php/season/update_action'),
                                'id' => set_value('id', $row->sea_id),
                                'descrip' => set_value('descrip', $row->description),
                                'impact' => set_value('impact', $impact),
                                'audio' => set_value('audio', $row->audio),
                                'graph' => set_value('graph', $row->graph),
                                'lang' =>$lang,
                                'change' => 14,
                            );
                            $det = "1";
                            $upload = "not_ok";
                            $this->load->view('template', $data);
                        } else {
                            $det = "1";
                            $upload = "not_ok";
                            $data = array(
                                'change' => 4,
                            );
                            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
                            $this->load->view('template', $data);
                        }
                   }
                   if($lang=='Luganda'){
                    if ($row) {
                        $impact = str_replace("<br/>", ".", "$row->impactLuganda");
                        $data = array(
                            'error1' => '',
                            'error' => $this->upload->display_errors(),
                            'ed' => '2',
                            'button' => 'Update',
                            'action' => site_url('index.php/season/update_action'),
                            'id' => set_value('id', $row->sea_id),
                            'descrip' => set_value('descrip', $row->descriptionLuganda),
                            'impact' => set_value('impact', $impactLuganda),
                            'audio' => set_value('audio', $row->audio),
                            'graph' => set_value('graph', $row->graph),
                            'lang' =>$lang,
                            'change' => 14,
                        );
                        $det = "1";
                        $upload = "not_ok";
                        $this->load->view('template', $data);
                    } else {
                        $det = "1";
                        $upload = "not_ok";
                        $data = array(
                            'change' => 4,
                        );
                        $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
                        $this->load->view('template', $data);
                    }
               }

                } else {
                    $det = "2";
                    $upload = "ok";
                    $temp = $this->upload->data();
                    $image = $temp['file_name'];
                }
            }else{
                $image = $this->input->post('graph', TRUE);
                $upload = "ok";
                $det = "3";

            }

            if (!empty($_FILES['userfile1']['name'])) {
                    $this->do_upload();
                    if (!$this->upload->do_upload('userfile1')) {
                        $row = $this->Decadal_forecast_model->get_by_id($this->input->post('id',TRUE));

                        if ($row) {
                            $data = array(
                                'error1' => $this->upload->display_errors(),
                                'error' => '',
                                'ed' => '2',
                                'button' => 'Update',
                                'action' => site_url('index.php/decadal_forecast/update_action'),
                                'id' => set_value('id', $row->decadal_id),
                                'region' => set_value('region', $row->region),
                                'subregionid' => set_value('subregion', $row->subregionid),
                                'advisory' => set_value('advisory', $row->advisory),
                                'date_from' => set_value('date_from', $row->date_from),
                                'date_to' => set_value('date_to', $row->date_to),
                                'graph' => set_value('graph', $row->graph),
                                'audio' => set_value('audio', $row->audio),
                                'issuetime' => set_value('issuetime', $row->issuetime),
                                'change'   => 12,
                            );
                            $det1 = "2";
                            $upload1 = "not_ok";
                            $this->load->view('template', $data);
                        } else {
                            $det1 = "2";
                            $upload1 = "not_ok";
                            $data = array(
                                'change'   => 4,
                            );
                            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
                            $this->load->view('template', $data);
                        }
                    } else {
                        $dat = $this->upload->data();
                        $image1 = $dat['file_name'];
                        //$image1 = 'uploads_decadal/' . $image1;
                        $upload1 = "ok";
                        $det1 = "1";
                    }
            }else{
                $image1 = $this->input->post('audio', TRUE);
                $upload1 = "ok";
                $det1 = "3";
            }
            if($det == "2" && $upload1 == "not_ok"){

                $path1 = $_SERVER['DOCUMENT_ROOT'] . 'Dissemination/uploads_decadal/' . $image;
                //$path = $_SERVER['DOCUMENT_ROOT'].'Dissemination_tz/'.$row->audio;

                $this->remove_file($path1);
                //$this->remove_file($path);
            }
            if($det == "1" && $upload == "not_ok"){

                $path1 = $_SERVER['DOCUMENT_ROOT'] . 'Dissemination/uploads_decadal/' . $image1;
                //$path = $_SERVER['DOCUMENT_ROOT'].'Dissemination_tz/'.$row->audio;

                $this->remove_file($path1);
                //$this->remove_file($path);
            }
            if($det == "2" && $det1 == "1" ){

                $odd = $this->input->post('audio', TRUE);

                $odd1 = $this->input->post('graph', TRUE);
                if(!(strpos($odd,'no image'))) {
                    $path1 = $_SERVER['DOCUMENT_ROOT'] . 'Dissemination/' . $odd1;
                    $this->remove_file($path1);
                }
                if(!(strpos($odd,'no audio'))) {
                    $path = $_SERVER['DOCUMENT_ROOT'] . 'Dissemination/' . $odd;
                    $this->remove_file($path);
                }
                $image = 'uploads/' . $image;
                $image1 = 'uploads/' . $image1;
            }
            if(($det == "2" && $det1 == "2" ) || ($det == "2" && $det1 == "3" )){

                $image = 'uploads/' . $image;

            }
            if(($det == "3" && $det1 == "1" ) || ($det == "1" && $det1 == "1" )){

                $image1 = 'uploads/' . $image1;
            }
            if($upload == "ok" && $upload1 == "ok") {

                            $all = $this->input->post('impact', TRUE);
                            $all = str_replace(".", ".<br/>", $all);
                            $all .= "<br/>";
                            if (!empty($_POST['check_list'])) {

                                // Loop to store and display values of individual checked checkbox.
                                foreach ($_POST['check_list'] as $selected) {
                                    $all .= $selected;
                                }

                            }

                            /*$odd = $this->input->post('graph',TRUE);
                            $odd1 = $this->input->post('audio',TRUE);
                            $path1 = $_SERVER['DOCUMENT_ROOT'].'Dissemination/'.$odd;
                            $path = $_SERVER['DOCUMENT_ROOT'].'Dissemination/'.$odd1;

                            $this->remove_file($path1);
                            $this->remove_file($path);*/


                            $data = array(
                                'region' => $this->input->post('region_id', TRUE),
                                'subregion' => $this->input->post('sub_region', TRUE),
                                'seas' => $this->input->post('seas', TRUE),
                                'descrip' => $this->input->post('descrip', TRUE),
                                'impact' => $all,
                                'file1' =>  $image,
                                'lang' =>$this->input->post('lang'),
                                'file2' =>  $image1,
                            );

                            $this->Season_model->update($this->input->post('id', TRUE), $data);
                            $season = $this->Season_model->get_all();
                            $data = array(
                                'season_data' => $season,
                                'change' => 15,
                            );
                            $this->session->set_flashdata('message', '<font color="green" size="5">Update Record Success</font>');
                            $this->load->view('template', $data);
                        }


        }
    }
    
 
    public function delete($id) 
    {
        $row = $this->Season_model->get_by_id($id);

        if ($row) {

            if(!(strpos($row->graph,'no image'))) {
                $path1 = $_SERVER['DOCUMENT_ROOT'].'Dissemination/'.$row->graph;
                $this->remove_file($path1);
            }

            if(!(strpos($row->audio,'no audio'))) {
                $path = $_SERVER['DOCUMENT_ROOT'].'Dissemination/'.$row->audio;
                $this->remove_file($path);
            }


            $this->Season_model->delete($id);
			$season = $this->Season_model->get_all();
			$data = array(
			'season_data' => $season,
		   'change'   => 15,
	    );
            $this->session->set_flashdata('message', '<font color="green" size="5">Delete Record Success</font>');
             $this->load->view('template', $data);
        } else {
		$season = $this->Season_model->get_all();
			$data = array(
			'season_data' => $season,
		   'change'   => 15,
	    );
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
             $this->load->view('template', $data);
        }
    }
    public function remove_file($pp)
    {
        if (file_exists($pp)) {
            unlink($pp);
                   }
                   //else{
           // echo "path not found";
        //}
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('descrip', 'Description', 'trim|required');
    $this->form_validation->set_rules('impact', 'Impact', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "season.xls";
        $judul = "season";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Season Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Season Code");

	foreach ($this->Season_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->season_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->season_code);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=season.doc");

        $data = array(
            'season_data' => $this->Season_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('season_doc',$data);
    }

    public function pdf()
    {
        $data = array(
            'season_data' => $this->Season_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '10G');
        $html = $this->load->view('season_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('season.pdf', 'D'); 
    }

    public function do_upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|mp3|mp4|mpeg';
        $config['max_size']             = 5000000;
        $config['max_width']            = 5000000;
        $config['max_height']           = 5000000;

        $this->load->library('upload', $config);

       /* if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
        }*/
    }


    
    //TODO: change the table primary key to autoincrement
}

/* End of file Season.php */