<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_feedback extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_feedback_model');
        $this->load->library('form_validation');
    }

    public function index()
    { 
  $user_feedback = $this->user_feedback_model->get_all();
	$data = array(
			'change' => 18,
            'user_feedback_data' => $user_feedback,
        );

        $this->load->view('template', $data);
    }

    public function read($id) 
    {
	$row = $this->user_feedback_model->get_by_id($id);
	
	if ($row) {
            $data = array(
		//'id' => $row->record_id,
		'names' => $row->names,
		'advisory' => $row->advisory,
		'region' => $row->region,
	    'change' => 20,
		//'forecast_id' => $row->forecast_id,
	    );
            $this->load->view('template', $data);
        } else {
		  $data = array(
	    'change' => 4,
	);
            $this->session->set_flashdata('message', 'Record Not Found');
           $this->load->view('template', $data);
        }
    }
public function create2(){
$data = array(
	'change' => 0
);
$this->load->view('template', $data);
}
public function create1(){
 $data = array(
            'user_feedback_data' => $this->user_feedback_model->get_all(),
            'start' => 0,
			'change' => 18,
        );
$this->load->view('template', $data);
//$this->load->view('decadal_forecast_list', $data);
}

public function create3(){
$data = array(
    'change' => 2,
);
$this->load->view('template', $data);
}
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/user_feedback/create_action'),
		'names' => set_value('names'),
	    'advisory' => set_value('advisory'),
		'region' => set_value('region'),
		'change' => 17,
	);
        $this->load->view('template', $data);
    }
    
    public function create_action() 
    {
	//echo ($this->input->post('names', TRUE));
	//exit;
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'names' => $this->input->post('names',TRUE),
		'advisory' => $this->input->post('advisory',TRUE),
		'region' => $this->input->post('regs',TRUE),
		
	    );

            $hh = $this->user_feedback_model->insert($data);
			if($hh){
			    $this->session->set_flashdata('message', 'Create Record Success');
			  }else{
			      $this->session->set_flashdata('message', 'Create not Record Successful');
			  }
			 $data = array(
			 'change' => 17,
	           );
           
            $this->load->view('template',$data);
        }
    }
    
    public function update($id) 
    {
        $row = $this->Decadal_forecast_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/decadal_forecast/update_action'),
		'id' => set_value('id', $row->decadal_id),
		'region' => set_value('region', $row->region),
		'advisory' => set_value('advisory', $row->advisory),
		'date_from' => set_value('date_from', $row->date_from),
		'date_to' => set_value('date_to', $row->date_to),
		'issuetime' => set_value('issuetime', $row->issuetime),
		'change'   => 12,
	    );
            $this->load->view('template', $data);
        } else {
		$data = array(
		   'change'   => 4,
	    );
            $this->session->set_flashdata('message', 'Record Not Found');
            $this->load->view('template', $data);
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'advisory' => $this->input->post('advisory',TRUE),
		'date_from' => $this->input->post('date_from',TRUE),
		'date_to' => $this->input->post('date_to',TRUE),
		//'issuetime' => $this->input->post('issuetime',TRUE),
	    );

            $this->Decadal_forecast_model->update($this->input->post('id', TRUE), $data);
			$data = array(
		   'change'   => 4,
	    );
            $this->session->set_flashdata('message', 'Update Record Success');
            $this->load->view('template',$data);
        }
    }
    
    public function delete($id) 
    {
        $row = $this->user_feedback_model->get_by_id($id);
        $data = array(
		   'change'   => 19,
	    );
        if ($row) {
            $this->user_feedback_model->delete($id);
			
            $this->session->set_flashdata('message', '<font color="green" size="5">Delete Record Success</font>');
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>'); 
           $this->load->view('template', $data);
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('names', 'names', 'trim|required');
	$this->form_validation->set_rules('advisory', 'advisory', 'trim|required');
	$this->form_validation->set_rules('region', 'region', 'trim|required');
	//$this->form_validation->set_rules('issuetime', 'issuetime', 'trim|required');

	//$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "decadal_forecast.xls";
        $judul = "decadal_forecast";
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
		 xlsWriteLabel($tablehead, $kolomhead++, "Region");
	xlsWriteLabel($tablehead, $kolomhead++, "Advisory");
	xlsWriteLabel($tablehead, $kolomhead++, "Date From");
	xlsWriteLabel($tablehead, $kolomhead++, "Date To");
	xlsWriteLabel($tablehead, $kolomhead++, "Issuetime");

	foreach ($this->Decadal_forecast_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			 xlsWriteLabel($tablebody, $kolombody++, $data->region);
	    xlsWriteLabel($tablebody, $kolombody++, $data->advisory);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date_from);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date_to);
	    xlsWriteLabel($tablebody, $kolombody++, $data->issuetime);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=user_feedback.doc");

        $data = array(
            'user_feedback_data' => $this->user_feedback_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('user_feedback_doc',$data);
    }

    public function pdf()
    {
        $data = array(
            'user_feedback_data' => $this->user_feedback_model->get_all(),
            'start' => 0,
        );
        
        ini_set('memory_limit', '10G');
        $html = $this->load->view('user_feedback_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('user_feedback.pdf', 'D'); 
    }

}

/* End of file Decadal_forecast.php */