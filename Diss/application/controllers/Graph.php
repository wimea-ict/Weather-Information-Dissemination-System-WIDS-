<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Graph extends CI_Controller {

    public function __construct() {
        parent::__construct();


        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('Landing_model');
        include APPPATH . 'third_party/morris/landing_charts.php';
    }

    public function index() {
        /* Data */

        // print_r($this->ion_auth->logged_in()); exit();
        $this->data['change'] = 21;


        //chart data
        $this->data['line_chart'] = $this->line_chart("test_line");
        $this->data['line_chart1'] = $this->line_chart1("north_line");
        $this->data['line_chart2'] = $this->line_chart2("east_line");
        $this->data['line_chart3'] = $this->line_chart3("west_line");
        $this->data['line_chart4'] = $this->line_chart4("central_line");
        $this->data['line_chart2'] = $this->line_chart1("east_line");



        /* Load Template */
        //$this->template->admin_render('admin/dashboard/index', $this->data);
        $this->load->view('template', $this->data);
        // }
    }

    /**
     * Display l victoria
     *
     * @brief Creates a line chart
     */
    private function line_chart($element_id) {
        $morris = new MorrisLineCharts($element_id);
        $morris->xkey = array('day');
        $morris->ykeys = array('R','S','D');
        $morris->labels = array('Maximum temperature', 'Minimum temperature', 'Wind Speed');
        $morris->data = $this->Landing_model->line_chart1();
        return $morris->toJavascript();
    }
    /**
     * Display northern
     *
     * @brief Creates a line chart
     */
    private function line_chart1($element_id) {
        $morris = new MorrisLineCharts($element_id);
        $morris->xkey = array('day');
        $morris->ykeys = array('R','S','D');
        $morris->labels = array('Maximum temperature', 'Minimum temperature', 'Wind Speed');
        $morris->data = $this->Landing_model->line_chart2();
        return $morris->toJavascript();
    }
    /**
     * Display Eastern
     *
     * @brief Creates a line chart
     */
    private function line_chart2($element_id) {
        $morris = new MorrisLineCharts($element_id);
        $morris->xkey = array('day');
        $morris->ykeys = array('R','S','D');
        $morris->labels = array('Maximum temperature', 'Minimum temperature', 'Wind Speed');
        $morris->data = $this->Landing_model->line_chart3();
        return $morris->toJavascript();
    }
    /**
     * Display Western
     *
     * @brief Creates a line chart
     */
    private function line_chart3($element_id) {
        $morris = new MorrisLineCharts($element_id);
        $morris->xkey = array('day');
        $morris->ykeys = array('R','S','D');
        $morris->labels = array('Maximum temperature', 'Minimum temperature', 'Wind Speed');
        $morris->data = $this->Landing_model->line_chart4();
        return $morris->toJavascript();
    }
    /**
     * Display central
     *
     * @brief Creates a line chart
     */
    private function line_chart4($element_id) {
        $morris = new MorrisLineCharts($element_id);
        $morris->xkey = array('day');
        $morris->ykeys = array('R','S','D');
        $morris->labels = array('Maximum temperature', 'Minimum temperature', 'Wind Speed');
        $morris->data = $this->Landing_model->line_chart5();
        return $morris->toJavascript();
    }



}
