<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Daily_forecast extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Daily_forecast_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
    $daily_forecast = $this->Daily_forecast_model->get_all_replaced();
      //echo "jfgnjfgjj";
	  //exit;
	$data = array(
            'daily_forecast_data' => $daily_forecast
        );

        $this->template->load('template','daily_forecast_list', $data);
    }

    public function read($id)
    {

	$row = $this->Daily_forecast_model->get_by_id_replaced($id);
	if ($row) {
            $data = array(
        'id' => $row->id,
        'mean_temp' => $row->mean_temp,
		'max_temp' => $row->max_temp,
		'min_temp' => $row->min_temp,
		'sunrise' => $row->sunrise,
		'sunset' => $row->sunset,
        'wind' => $row->wind,
        'wind_direction' => $row->wind_direction,
        'wind_strength' => $row->wind_strength,
        'weather' => $row->weather,
        'weatherLuganda'=>$row->weatherLuganda,
		'advisory' => $row->advisory,
		'date' => $row->date,
		'time' => $row->time,
		'season_name' => $row->season_id,
		'region' => $row->region,
        //'subregionid' => $row->subregionid,
		'cat' => $row->cat_id,
		'change' => 13,
	    );
            $this->load->view('template', $data);
        } else {
		  $data = array(
		    'change' => 3,
			);
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
            $this->load->view('template', $data);
        }
    }
public function create1(){
$data = array(
    'change' => 0,
);

$this->load->view('template', $data);
}

// public function create_pdf(){
//     $data = array(
//         'change' => 37,
//         'action' => site_url('index.php/daily_forecast/create_pdf_action'),
//         'button' => 'Create'
//     );
    
//     $this->load->view('template', $data);
//     }

public function create22(){
$data = array(
    'change' => 0,
);
$this->load->view('template', $data);
}
//archive
public function create2_1(){
    $data = array(
        'change' => 33,
    );
    $this->load->view('template', $data);
    }

public function create2(){
$data = array(
    'change' => 3,
);
$this->load->view('template', $data);
}
public function create()
    {
        $data = array(

        'button' => 'Create',
            'action' => site_url('index.php/daily_forecast/create_action'),
            'id' => set_value('id'),
            'mean_temp1' => set_value('mean_temp1'),
            'mean_temp2' => set_value('mean_temp2'),
            'mean_temp3' => set_value('mean_temp3'),
            'mean_temp4' => set_value('mean_temp4'),

            'wind_direction1' => set_value('wind_direction1'),
            'wind_direction2' => set_value('wind_direction2'),
            'wind_direction3' => set_value('wind_direction3'),
            'wind_direction4' => set_value('wind_direction4'),

            'wind_strength1' => set_value('wind_strength1'),
            'wind_strength2' => set_value('wind_strength2'),
            'wind_strength3' => set_value('wind_strength3'),
            'wind_strength4' => set_value('wind_strength4'),

            'weather1' => set_value('weather1'),
            'weather2' => set_value('weather2'),
            'weather3' => set_value('weather3'),
            'weather4' => set_value('weather4'),

            'date1' => set_value('date1'),
            'time'     => set_value('time'),
            'season_id' => set_value('season_id'),
            'cat_id' => set_value('cat_id'),
            'change'  => 1,
	);
        $this->load->view('template', $data);
}
 

  public function create_single(){

    $data = array(
            'button' => 'Create single',
            'action' => site_url('index.php/daily_forecast/create_single_action'),
        'id' => set_value('id'),
        'mean_temp' => set_value('mean_temp'),
        'wind_direction' => set_value('wind_direction'),
        'wind_strength' => set_value('wind_strength'),
	    'weather' => set_value('weather'),
	    
	    'date' => set_value('date'),
		'time'     => set_value('time'),
	    'season_id' => set_value('season_id'),
		'cat_id' => set_value('cat_id'),
        'change'  => 36,
    );
    $this->load->view('template', $data);
  }
 
//   public function create_pdf_action()
//   {
//             $this->_pdf_rules();

//             if ($this->form_validation->run()== FALSE)
//             {

//                 $this->create_pdf();
//             }

//             else{
                
//                 $date_values = array(
//                     'region' => $this->input->post('region',TRUE),
//                     'datefrom' => $this->input->post('datefrom',TRUE),
//                     'dateto'  => $this->input->post('dateto',TRUE)
//                 );
                
                
            
//              }
//             $this->try($date_values);
//                 // $data = array(
//                 //     'daily_forecast_data' => $this->Daily_forecast_model->get_all(),
//                 //    'start' => 0
//                 // );
//                 //  $this->pdf_download($data);
       
    
// //}//end else
          
	
//       }
//       public function try($dates)
//       {
//         $data = array(
//             'daily_forecast_data' => $this->Daily_forecast_model->get_specified($dates),
//            'start' => 0
//         );
//         // var_dump($data);
//         // exit;
//          $this->pdf_download($data);
//       }

  
//   public function _pdf_rules(){
//     $this->form_validation->set_rules('region', 'region', 'required');
//     $this->form_validation->set_rules('datefrom', 'datefrom', 'required');
//     $this->form_validation->set_rules('dateto', 'dateto', 'required');
    
//   }
    public function create_action()
    {
		//echo $this->input->post('date',TRUE);
		//exit;
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
          
            $this->create();
        } else {
            $data = array(
        'mean_temp' => $this->input->post('mean_temp',TRUE),
		// 'max_temp' => $this->input->post('max_temp',TRUE),
		// 'min_temp' => $this->input->post('min_temp',TRUE),
		// 'sunrise' => $this->input->post('sunrise',TRUE),
		// 'sunset' => $this->input->post('sunset',TRUE),
        // 'wind' => $this->input->post('wind',TRUE),
        'wind_direction' => $this->input->post('wind_direction',TRUE),
        'wind_strength' => $this->input->post('wind_strength',TRUE),
         'lang'=>$this->input->post('lang',TRUE),
		'weather' => $this->input->post('weather',TRUE),
		'advisory' => $this->input->post('advisory',TRUE),
		'date' => $this->input->post('date',TRUE),
		'time' => $this->input->post('time',TRUE),
		'region' => $this->input->post('region_id',TRUE),
        //'region' => $this->input->post('region',TRUE),
		'season_id' => $this->input->post('season_id',TRUE),
		'cat_id' => $this->input->post('cat_id',TRUE),
	    );

            $this->Daily_forecast_model->insert($data);
			$data = array(
			   'change' => 3,
			);
            $this->session->set_flashdata('message', '<font color="green" size="5">Create Record Success</font>');
             $this->load->view('template',$data);
        }
    }
//single form create action
    public function create_single_action(){
        $this->_rules_single();

        if ($this->form_validation->run() == FALSE) {
          
            $this->create_single();
        } else {
            $data = array(
        'mean_temp' => $this->input->post('mean_temp',TRUE),
        'wind_direction' => $this->input->post('wind_direction',TRUE),
        'wind_strength' => $this->input->post('wind_strength',TRUE),
         'lang'=>$this->input->post('lang',TRUE),
		'weather' => $this->input->post('weather',TRUE),
		'advisory' => $this->input->post('advisory',TRUE),
		'date' => $this->input->post('date',TRUE),
		'time' => $this->input->post('time',TRUE),
		'region' => $this->input->post('region_id',TRUE),
        //'region' => $this->input->post('region',TRUE),
		'season_id' => $this->input->post('season_id',TRUE),
		'cat_id' => $this->input->post('cat_id',TRUE),
	    );

            $this->Daily_forecast_model->insert_single($data);
			$data = array(
			   'change' => 3,
			);
            $this->session->set_flashdata('message', '<font color="green" size="5">Record Creation Successful</font>');
             $this->load->view('template',$data);
        }

    }

    public function update($id)
    {
        $row = $this->Daily_forecast_model->get_by_id($id);

        if ($row) {
            $luganda= $row->weatherLuganda;
            $english= $row->weather;
            if($english!=NULL){
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/daily_forecast/update_action'),
                'id' => set_value('id', $row->id),
                'mean_temp' => set_value('mean_temp', $row->mean_temp),
                // 'max_temp' => set_value('max_temp', $row->max_temp),
                // 'min_temp' => set_value('min_temp', $row->min_temp),
                // 'sunrise' => set_value('sunrise', $row->sunrise),
                // 'sunset' => set_value('sunset', $row->sunset),
                // 'wind' => set_value('wind', $row->wind),
                'wind_direction' => set_value('wind_direction', $row->wind_direction),
                'wind_strength' => set_value('wind_strength', $row->wind_strength),
                'weather' => set_value('weather', $row->weather),
                'advisory' => set_value('advisory', $row->advisory),
                'date' => set_value('date', $row->date),
                'time' => set_value('time', $row->time),
                'season_id' => set_value('season_id', $row->season_id),
                'region_id' => set_value('region_id', $row->region),
                //'sub_region' => set_value('subregionid', $row->subregionid),
                'cat_id' => set_value('cat_id', $row->cat_id),
                'change'  => 36,
	    );

            $this->load->view('template', $data);
        }elseif($luganda!=NULL){
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/daily_forecast/update_action'),
                'id' => set_value('id', $row->id),
                'mean_temp' => set_value('mean_temp', $row->mean_temp),
                // 'max_temp' => set_value('max_temp', $row->max_temp),
                // 'min_temp' => set_value('min_temp', $row->min_temp),
                // 'sunrise' => set_value('sunrise', $row->sunrise),
                // 'sunset' => set_value('sunset', $row->sunset),
                // 'wind' => set_value('wind', $row->wind),
                'wind_direction' => set_value('wind_direction', $row->wind_direction),
                'wind_strength' => set_value('wind_strength', $row->wind_strength),
                'weather' => set_value('weather', $row->weatherLuganda),
                'advisory' => set_value('advisory', $row->advisoryLuganda),
                'date' => set_value('date', $row->date),
                'time' => set_value('time', $row->time),
                'season_id' => set_value('season_id', $row->season_id),
                'region_id' => set_value('region_id', $row->region),
                //'sub_region' => set_value('subregionid', $row->subregionid),
                'cat_id' => set_value('cat_id', $row->cat_id),
                'change'  => 36,
	    );

            $this->load->view('template', $data);
        }
        } else {
		 $data = array(
		   'change'  => 3,
	    );
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
             $this->load->view('template', $data);
        }
    }
    public function update_action()
    {
        $this->_rules_single();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
        'mean_temp' => $this->input->post('mean_temp',TRUE),
		// 'max_temp' => $this->input->post('max_temp',TRUE),
		// 'min_temp' => $this->input->post('min_temp',TRUE),
		// 'sunrise' => $this->input->post('sunrise',TRUE),
		// 'sunset' => $this->input->post('sunset',TRUE),
        // 'wind' => $this->input->post('wind',TRUE),
        'wind_direction' => $this->input->post('wind_direction',TRUE),
        'wind_strength' => $this->input->post('wind_strength',TRUE),
        'lang' => $this->input->post('lang',TRUE),
		'weather' => $this->input->post('weather',TRUE),
		'advisory' => $this->input->post('advisory',TRUE),
		'date' => $this->input->post('date',TRUE),
		'time' => $this->input->post('time',TRUE),
		'region' => $this->input->post('region_id',TRUE),
        //'regionid' => $this->input->post('region',TRUE),
		'season_id' => $this->input->post('season_id',TRUE),
		'cat_id' => $this->input->post('cat_id',TRUE),
	    );

            $this->Daily_forecast_model->update($this->input->post('id', TRUE), $data);
			$data = array(
			  'change' => 3,
			);
            $this->session->set_flashdata('message', '<font color="green" size="5">Update Record Success</font>');
            $this->load->view('template', $data);
        }
    }

    public function delete($id)
    {
        $row = $this->Daily_forecast_model->get_by_id($id);
        $data = array(
			  'change' => 3,
			);
        if ($row) {
            $this->Daily_forecast_model->delete($id);

            $this->session->set_flashdata('message', '<font color="green" size="5">Deleted Record Success</font>');
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
            $this->load->view('template', $data);
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('mean_temp1', 'mean temp(Late Evening)', 'trim|numeric|required');
        $this->form_validation->set_rules('mean_temp2', 'mean temp(Early Morning)', 'trim|numeric|required');
        $this->form_validation->set_rules('mean_temp3', 'mean temp(Late Morning)', 'trim|numeric|required');
        $this->form_validation->set_rules('mean_temp4', 'mean temp(Aternoon)', 'trim|numeric|required');

        $this->form_validation->set_rules('wind_direction1', 'wind strength(Late Evening)', 'trim|required');
        $this->form_validation->set_rules('wind_direction2', 'wind strength(Early Morning)', 'trim|required');
        $this->form_validation->set_rules('wind_direction3', 'wind strength(Late Morning)', 'trim|required');
        $this->form_validation->set_rules('wind_direction4', 'wind strength(Afternoon)', 'trim|required');

        $this->form_validation->set_rules('wind_strength1', 'wind strength(Late Evening)', 'trim|required');
        $this->form_validation->set_rules('wind_strength2', 'wind strength(Early Morning)', 'trim|required');
        $this->form_validation->set_rules('wind_strength3', 'wind strength(Late Morning)', 'trim|required');
        $this->form_validation->set_rules('wind_strength4', 'wind strength(Afternoon)', 'trim|required');

        $this->form_validation->set_rules('weather1', 'weather(Late Evening)', 'trim|required');
        $this->form_validation->set_rules('weather2', 'weather(Early Morning)', 'trim|required');
        $this->form_validation->set_rules('weather3', 'weather(Late Morning)', 'trim|required');
        $this->form_validation->set_rules('weather4', 'weather(Afternoon)', 'trim|required');

        $this->form_validation->set_rules('date1', 'Date(Late Evening)', 'trim|required');
        $this->form_validation->set_rules('date2', 'Date(Other)', 'trim|required');

      	$this->form_validation->set_rules('season_id', 'season id', 'trim|required');

      	$this->form_validation->set_rules('id', 'id', 'trim');
      	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');


      	// $this->form_validation->set_rules('max_temp', 'max temp', 'trim|numeric');
      	// $this->form_validation->set_rules('min_temp', 'min temp', 'trim|numeric');
      	// $this->form_validation->set_rules('sunrise', 'sunrise', 'trim');
      	// $this->form_validation->set_rules('sunset', 'sunset', 'trim');
        // $this->form_validation->set_rules('wind', 'wind', 'trim');
      	//$this->form_validation->set_rules('advisory', 'advisory', 'trim');

    }

    public function _rules_single()
    {
        $this->form_validation->set_rules('mean_temp', 'mean temp', 'trim|numeric|required');
        // $this->form_validation->set_rules('max_temp', 'max temp', 'trim|numeric');
        // $this->form_validation->set_rules('min_temp', 'min temp', 'trim|numeric');
        // $this->form_validation->set_rules('sunrise', 'sunrise', 'trim');
        // $this->form_validation->set_rules('sunset', 'sunset', 'trim');
        // $this->form_validation->set_rules('wind', 'wind', 'trim');
        //$this->form_validation->set_rules('advisory', 'advisory', 'trim');
        $this->form_validation->set_rules('wind_direction', 'wind strength', 'trim|required');
        $this->form_validation->set_rules('wind_strength', 'wind strength', 'trim|required');
        $this->form_validation->set_rules('weather', 'weather', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('season_id', 'season id', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "daily_forecast.xls";
        $judul = "daily_forecast";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Max Temp");
	xlsWriteLabel($tablehead, $kolomhead++, "Min Temp");
	xlsWriteLabel($tablehead, $kolomhead++, "Sunrise");
	xlsWriteLabel($tablehead, $kolomhead++, "Sunset");
	xlsWriteLabel($tablehead, $kolomhead++, "Wind");
	xlsWriteLabel($tablehead, $kolomhead++, "Weather");
	xlsWriteLabel($tablehead, $kolomhead++, "Advisory");
	xlsWriteLabel($tablehead, $kolomhead++, "date");

	foreach ($this->Daily_forecast_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->max_temp);
	    xlsWriteNumber($tablebody, $kolombody++, $data->min_temp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sunrise);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sunset);
	    xlsWriteNumber($tablebody, $kolombody++, $data->wind);
	    xlsWriteLabel($tablebody, $kolombody++, $data->weather);
	    xlsWriteLabel($tablebody, $kolombody++, $data->advisory);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=daily_forecast.doc");

        $data = array(
            'daily_forecast_data' => $this->Daily_forecast_model->get_all(),
            'start' => 0
        );

        $this->load->view('daily_forecast_doc',$data);
    }

    public function pdf()
    {
        $data = array(
            'daily_forecast_data' => $this->Daily_forecast_model->get_all(),
            'start' => 0
        );
        
        $this->pdf_download($data);

        // ini_set('memory_limit', '10G');
        // $html = $this->load->view('daily_forecast_pdf', $data, true);
        // $this->load->library('pdf');
        // $pdf = $this->pdf->load();
        // $pdf->WriteHTML($html);
        // $pdf->Output('10_day_daily_forecast.pdf', 'D');
    }


    public function pdf_archive()
    {
        $data = array(
            'daily_forecast_data' => $this->Daily_forecast_model->get_archive(),
            'start' => 0
        );
        $this->pdf_download($data);

        // ini_set('memory_limit', '10G');
        // $html = $this->load->view('daily_forecast_pdf', $data, true);
        // $this->load->library('pdf');
        // $pdf = $this->pdf->load();
        // $pdf->WriteHTML($html);
        // $pdf->Output('daily_forecast_archive.pdf', 'D');
    }

    public function pdf_latest()
    {
        $data = array(
            'daily_forecast_data' => $this->Daily_forecast_model->get_all_last_10days(),
            'start' => 0
        );
        // var_dump($data);
        //         exit();
        $this->pdf_download($data);

        
    }
    public function pdf_download($data){
        
        ini_set('memory_limit', '10G');
        $html = $this->load->view('daily_forecast_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('daily_forecast.pdf', 'D');

}

}

/* End of file Daily_forecast.php */
