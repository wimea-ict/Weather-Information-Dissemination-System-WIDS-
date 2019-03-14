<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_model extends CI_Model {
    public $tables = 'users';
    public $id = 'id';
    public $username = 'username';
    

    public function __construct()
    {
        parent::__construct();
    }
    


    public function get_count_record($table)
    {
        $query = $this->db->count_all($table);
        return $query;
    }
    //count the number of ussd users...'RecordData' <= '2018-05-13 09:57:36'
    public function ussd_count(){
        $this->db->select('COUNT(*) as total');
        $this->db->from('ussdtransaction');
        $this->db->where('RecordDate >=', '2018-08-17 00:00:00');
        $this->db->where('RecordDate <=', '2018-10-19 05:32:56');
        $array = array('districtid IS NOT NULL'=>NULL,'regionid IS NOT NULL'=>NULL,'Level6 IS NOT NULL'=>NULL,
                    'subregionid IS NOT NULL'=>NULL,'Level0 IS NOT NULL'=>NULL,'Level7 IS NOT NULL'=>NULL,);
                
         $this->db->where($array);
        //return $this->db->get('ussdtransaction');
        return $this->db->count_all_results();
        //    var_dump($a);
        //    exit();

        ###################################################################################################################33

    //     $today = date('Y-m-d H:m:s');
    //    $query =  "SELECT COUNT(*) FROM ussdtransaction WHERE RecordDate BETWEEN '2018-09-12 07:40:35' AND '2018-10-04 05:32:56'";
    //    $query="SELECT count(*) FROM ussdtransaction where RecordDate between '2018-09-12 07:40:35' and '2018-10-04 05:32:56'";
    //    $this->db->query($query);
    //    $a= $this->db->count_all_results();
    //    var_dump($a);
    //    exit();

        ######################################################333333
        // $fromdate = DateTime::createFromFormat('Y-m-d H:m:s','2018-10-03 11:29:55');

        // var_dump($fromdate->format('Y-m-d H:m:s'));
        // $phpdate = '2018-10-03 11:29:55';
        // $mysqldate = date( 'Y-m-d H:m:s', strtotime( $phpdate ) );
        // var_dump($mysqldate);
        //  exit();
        ######################################
        // $fromdate= new DateTime('2018-10-03 11:29:55');
        // $today = date('Y-m-d H:m:s');
        // $day = new DateTime($today);
        // var_dump($fromdate > $day);
        // exit();
        // $day1 = $day->format('Y-m-d H:m:s');
        // $day2 = $fromdate->format('Y-m-d H:m:s');
        // var_dump($day2);
        // exit();
        
        // $this->db->select('ussdtransaction.districtid,ussdtransaction.regionid,ussdtransaction.Level6,
        //                             ussdtransaction.Level0,ussdtransaction.Level7,ussdtransaction.RecordDate');
        // $this->db->from('ussdtransaction');
        
        // $array = array('districtid IS NOT NULL'=>NULL,'regionid IS NOT NULL'=>NULL,'Level6 IS NOT NULL'=>NULL,
        //             'subregionid IS NOT NULL'=>NULL,'Level0 IS NOT NULL'=>NULL,'Level7 IS NOT NULL'=>NULL,);
                
        //  $this->db->where($array);
        //  return $this->db->count_all_results();
    }
    //Activate a user by changing the active field
    public function activate_user_status($id){

        $sql = "UPDATE $this->tables SET active = 1  WHERE id = $id";
        return  (bool) $this->db->query($sql);
    }
    //Deactivate a user by changing the active field
    public function deactivate_user_status($id){
        $sql = "UPDATE $this->tables SET active = 0  WHERE id = $id";
        return (bool) $this->db->query($sql);
    }
         
    public function insert($data){
        $sql = "INSERT INTO $this->tables(ip_address,username, password, email, created_on, first_name, last_name, usertype, phone, active, first_time_login) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->db->query($sql, $data);
    }
    
    public function get_modem_imei(){
        $this->db->select('IMEI');        
        $this->db->from('phones');
        return $this->db->get()->row('IMEI');
    }
    
    public function get_modem_network(){
        $this->db->select('NetName');        
        $this->db->from('phones');
        return $this->db->get()->row('NetName');
    }
    
    public function get_signal_strength(){
        $this->db->select('Signal');        
        $this->db->from('phones');
        return $this->db->get()->row('Signal');        
    }


    public function get_modem_status(){
        $this->db->select('TimeOut');        
        $this->db->from('phones');
        return $interval = strtotime(date('Y-m-d H:i:s')) - strtotime($this->db->get()->row('Timeout'));
        //$status = "ONLINE";
        //if($interval>20)
         //   $status = "OFFLINE";
        //return $status;
    }
    
    public function get_sms_server(){
        $this->db->select('Client');        
        $this->db->from('phones');
        return $this->db->get()->row('Client');
    }
    

    public function disk_totalspace($dir = DIRECTORY_SEPARATOR)
    {
        return disk_total_space($dir);
    }


    public function disk_freespace($dir = DIRECTORY_SEPARATOR)
    {
        return disk_free_space($dir);
    }


    public function disk_usespace($dir = DIRECTORY_SEPARATOR)
    {
        return $this->disk_totalspace($dir) - $this->disk_freespace($dir);
    }


    public function disk_freepercent($dir = DIRECTORY_SEPARATOR, $display_unit = FALSE)
    {
        if ($display_unit === FALSE)
        {
            $unit = NULL;
        }
        else
        {
            $unit = ' %';
        }

        return round(($this->disk_freespace($dir) * 100) / $this->disk_totalspace($dir), 0).$unit;
    }


    public function disk_usepercent($dir = DIRECTORY_SEPARATOR, $display_unit = FALSE)
    {
        if ($display_unit === FALSE)
        {
            $unit = NULL;
        }
        else
        {
            $unit = ' %';
        }

        return round(($this->disk_usespace($dir) * 100) / $this->disk_totalspace($dir), 0).$unit;
    }


    public function memory_usage()
    {
        return memory_get_usage();
    }


    public function memory_peak_usage($real = TRUE)
    {
        if ($real)
        {
            return memory_get_peak_usage(TRUE);
        }
        else
        {
            return memory_get_peak_usage(FALSE);
        }
    }


    public function memory_usepercent($real = TRUE, $display_unit = FALSE)
    {
        if ($display_unit === FALSE)
        {
            $unit = NULL;
        }
        else
        {
            $unit = ' %';
        }

        return round(($this->memory_usage() * 100) / $this->memory_peak_usage($real), 0).$unit;
    }
    
    
    
    //function for getting data for line chart
   /* function line_chart(){
        //$sql = "SELECT DATE(ReceivingDateTime) as day, SUM(CASE WHEN `Type` = 'received' THEN 1 ELSE 0 END) AS 'R', SUM(CASE WHEN `Type` = 'sent' THEN 1 ELSE 0 END) AS 'S', SUM(CASE WHEN `Type` = 'delivered' THEN 1 ELSE 0 END) as D FROM(SELECT ReceivingDateTime, 'received' `Type` FROM inbox UNION ALL SELECT SendingDateTime, 'sent' FROM sentitems UNION ALL SELECT DeliveryDateTime, 'delivered' FROM sentitems ) t GROUP by DATE(ReceivingDateTime) ORDER by DATE(ReceivingDateTime) ASC";
        $sql = "SELECT DATE(ReceivingDateTime) as day, SUM(CASE WHEN `Type` = 'received' THEN 1 ELSE 0 END) AS 'R', SUM(CASE WHEN `Type` = 'sent' THEN 1 ELSE 0 END) AS 'S', SUM(CASE WHEN `Type` = 'delivered' THEN 1 ELSE 0 END) as D FROM(SELECT ReceivingDateTime, 'received' `Type` FROM inbox UNION ALL SELECT SendingDateTime, 'sent' FROM sentitems UNION ALL SELECT DeliveryDateTime, 'delivered' FROM sentitems ) t WHERE DATE(ReceivingDateTime) IS NOT NULL GROUP by DATE(ReceivingDateTime) ORDER by DATE(ReceivingDateTime) ASC";
        return $this->db->query($sql)->result_array();
    }*/
   //l victoria
    function line_chart1(){
        //$sql = "SELECT DATE(ReceivingDateTime) as day, SUM(CASE WHEN `Type` = 'received' THEN 1 ELSE 0 END) AS 'R', SUM(CASE WHEN `Type` = 'sent' THEN 1 ELSE 0 END) AS 'S', SUM(CASE WHEN `Type` = 'delivered' THEN 1 ELSE 0 END) as D FROM(SELECT ReceivingDateTime, 'received' `Type` FROM inbox UNION ALL SELECT SendingDateTime, 'sent' FROM sentitems UNION ALL SELECT DeliveryDateTime, 'delivered' FROM sentitems ) t GROUP by DATE(ReceivingDateTime) ORDER by DATE(ReceivingDateTime) ASC";
        $sql = "SELECT date  as day, (max_temp/100) AS 'R', (min_temp/100) AS 'S', (wind/100) as D FROM daily_forecast WHERE region = 3 ORDER by date ASC";
        return $this->db->query($sql)->result_array();
    }
    //Northern
    function line_chart2(){
        //$sql = "SELECT DATE(ReceivingDateTime) as day, SUM(CASE WHEN `Type` = 'received' THEN 1 ELSE 0 END) AS 'R', SUM(CASE WHEN `Type` = 'sent' THEN 1 ELSE 0 END) AS 'S', SUM(CASE WHEN `Type` = 'delivered' THEN 1 ELSE 0 END) as D FROM(SELECT ReceivingDateTime, 'received' `Type` FROM inbox UNION ALL SELECT SendingDateTime, 'sent' FROM sentitems UNION ALL SELECT DeliveryDateTime, 'delivered' FROM sentitems ) t GROUP by DATE(ReceivingDateTime) ORDER by DATE(ReceivingDateTime) ASC";
        $sql = "SELECT date  as day, (max_temp/100) AS 'R', (min_temp/100) AS 'S', (wind/100) as D FROM daily_forecast WHERE region = 7 ORDER by date ASC";
        return $this->db->query($sql)->result_array();
    }
    //Eastern
    function line_chart3(){
        //$sql = "SELECT DATE(ReceivingDateTime) as day, SUM(CASE WHEN `Type` = 'received' THEN 1 ELSE 0 END) AS 'R', SUM(CASE WHEN `Type` = 'sent' THEN 1 ELSE 0 END) AS 'S', SUM(CASE WHEN `Type` = 'delivered' THEN 1 ELSE 0 END) as D FROM(SELECT ReceivingDateTime, 'received' `Type` FROM inbox UNION ALL SELECT SendingDateTime, 'sent' FROM sentitems UNION ALL SELECT DeliveryDateTime, 'delivered' FROM sentitems ) t GROUP by DATE(ReceivingDateTime) ORDER by DATE(ReceivingDateTime) ASC";
        $sql = "SELECT date  as day, (max_temp/100) AS 'R', (min_temp/100) AS 'S', (wind/100) as D FROM daily_forecast WHERE region = 6 ORDER by date ASC";
        return $this->db->query($sql)->result_array();
    }

    //Western
    function line_chart4(){
        //$sql = "SELECT DATE(ReceivingDateTime) as day, SUM(CASE WHEN `Type` = 'received' THEN 1 ELSE 0 END) AS 'R', SUM(CASE WHEN `Type` = 'sent' THEN 1 ELSE 0 END) AS 'S', SUM(CASE WHEN `Type` = 'delivered' THEN 1 ELSE 0 END) as D FROM(SELECT ReceivingDateTime, 'received' `Type` FROM inbox UNION ALL SELECT SendingDateTime, 'sent' FROM sentitems UNION ALL SELECT DeliveryDateTime, 'delivered' FROM sentitems ) t GROUP by DATE(ReceivingDateTime) ORDER by DATE(ReceivingDateTime) ASC";
        $sql = "SELECT date  as day, (max_temp/100) AS 'R', (min_temp/100) AS 'S', (wind/100) as D FROM daily_forecast WHERE region = 5 ORDER by date ASC";
        return $this->db->query($sql)->result_array();
    }

    //Central
    function line_chart5(){
        //$sql = "SELECT DATE(ReceivingDateTime) as day, SUM(CASE WHEN `Type` = 'received' THEN 1 ELSE 0 END) AS 'R', SUM(CASE WHEN `Type` = 'sent' THEN 1 ELSE 0 END) AS 'S', SUM(CASE WHEN `Type` = 'delivered' THEN 1 ELSE 0 END) as D FROM(SELECT ReceivingDateTime, 'received' `Type` FROM inbox UNION ALL SELECT SendingDateTime, 'sent' FROM sentitems UNION ALL SELECT DeliveryDateTime, 'delivered' FROM sentitems ) t GROUP by DATE(ReceivingDateTime) ORDER by DATE(ReceivingDateTime) ASC";
        $sql = "SELECT date  as day, (max_temp/100) AS 'R', (min_temp/100) AS 'S', (wind/100) as D FROM daily_forecast WHERE region = 4 ORDER by date ASC";
        return $this->db->query($sql)->result_array();
    }


    function bar_chart(){
        //$sql = "SELECT DATE(ReceivingDateTime) as day, SUM(CASE WHEN `Type` = 'received' THEN 1 ELSE 0 END) AS 'R', SUM(CASE WHEN `Type` = 'sent' THEN 1 ELSE 0 END) AS 'S', SUM(CASE WHEN `Type` = 'delivered' THEN 1 ELSE 0 END) as D FROM(SELECT ReceivingDateTime, 'received' `Type` FROM inbox UNION ALL SELECT SendingDateTime, 'sent' FROM sentitems UNION ALL SELECT DeliveryDateTime, 'delivered' FROM sentitems ) t GROUP by DATE(ReceivingDateTime) ORDER by DATE(ReceivingDateTime) ASC";
        $sql_vic = "SELECT date  as day,  ROUND(AVG((max_temp/100)),2) AS 'R',  ROUND(AVG((min_temp/100)),2) AS 'S',  ROUND(AVG((wind/100)),2) as D FROM daily_forecast WHERE region = 3  group by date ";
        $vic = $this->db->query($sql_vic)->result_array();

        $sql_north = "SELECT date  as day,  ROUND(AVG((max_temp/100)),2) AS 'R',  ROUND(AVG((min_temp/100)),2) AS 'S',  ROUND(AVG((wind/100)),2) as D FROM daily_forecast WHERE region = 7 group by date ";
        $north = $this->db->query($sql_north)->result_array();

        $sql_east = "SELECT date  as day,  ROUND(AVG((max_temp/100)),2) AS 'R',  ROUND(AVG((min_temp/100)),2) AS 'S',  ROUND(AVG((wind/100)),2) as D FROM daily_forecast WHERE region = 6 group by date ";
        $east = $this->db->query($sql_east)->result_array();

        $sql_west = "SELECT date  as day,  ROUND(AVG((max_temp/100)),2) AS 'R',  ROUND(AVG((min_temp/100)),2) AS 'S',  ROUND(AVG((wind/100)),2) as D FROM daily_forecast WHERE region = 5 group by date ASC";
        $west = $this->db->query($sql_west)->result_array();

        $sql_central = "SELECT date  as day,  ROUND(AVG((max_temp/100)),2) AS 'R',  ROUND(AVG((min_temp/100)),2) AS 'S',  ROUND(AVG((wind/100)),2) as D FROM daily_forecast WHERE region = 4 group by date ";
        $central = $this->db->query($sql_central)->result_array();

        $data = array(
            array_merge(array('average'=>'L.Victoria basin'),$vic[0]),
            array_merge(array('average'=>'Northern'),$north[0]),
            array_merge(array('average'=>'Eastern'),$east[0]),
            array_merge(array('average'=>'Western'),$west[0]),
            array_merge(array('average'=>'Central'),$central[0]),
        );
        return $data;
    }
    //.................................
    
    
      // get all
   public function get_all()
    {
       return $this->db->get_where($this->tables,array('active'=>1))->result();
       
    }

    //Retrieve all inactive users
    public function get_inactive_users(){
        return $this->db->get_where($this->tables,array('active'=>0))->result();
    }
     // get data by id
     function get_by_id($id)
     {  
        $this->db->where($this->id, $id);
         return $this->db->get($this->tables)->row();
     }
      // update data
      public function update($id, $data)
      {    
         
           $sql = "UPDATE $this->tables SET username = ?, first_name = ?, last_name = ?, email = ?, usertype = ?, phone = ?  WHERE id = $id";
          return $this->db->query($sql, $data);
      }

      public function get_old_password($username){
        $this->db->where($this->username, $username);
         return $this->db->get($this->tables)->row();
      }

      public function update_old_password($username,$password){
          $data=array(
              'password'=>$password,
              'first_time_login'=>0,
          );
        $sql = "UPDATE $this->tables SET password = ?, first_time_login = ?  WHERE username = '$username'";
        return (bool) $this->db->query($sql,$data);
      }


    //.................................

    
    //function for getting dat for bar chart
  /*  function bar_chart(){
        
        $sql_daily = "SELECT AVG(R) as R,AVG(S) as S, AVG(D) as D FROM (SELECT DATE(ReceivingDateTime) as day, SUM(CASE WHEN `Type` = 'received' THEN 1 ELSE 0 END) AS 'R', SUM(CASE WHEN `Type` = 'sent' THEN 1 ELSE 0 END) AS 'S', SUM(CASE WHEN `Type` = 'delivered' THEN 1 ELSE 0 END) as D FROM(SELECT ReceivingDateTime, 'received' `Type` FROM inbox UNION ALL SELECT SendingDateTime, 'sent' FROM sentitems UNION ALL SELECT DeliveryDateTime, 'delivered' FROM sentitems ) t GROUP by DATE(ReceivingDateTime) ORDER by DATE(ReceivingDateTime) ASC)tt";
        $daily = $this->db->query($sql_daily)->result_array();
        
        $sql_week = "SELECT AVG(R) as R,AVG(S) as S, AVG(D) as D FROM (SELECT WEEK(ReceivingDateTime) as week, SUM(CASE WHEN `Type` = 'received' THEN 1 ELSE 0 END) AS 'R', SUM(CASE WHEN `Type` = 'sent' THEN 1 ELSE 0 END) AS 'S', SUM(CASE WHEN `Type` = 'delivered' THEN 1 ELSE 0 END) as D FROM(SELECT ReceivingDateTime, 'received' `Type` FROM inbox UNION ALL SELECT SendingDateTime, 'sent' FROM sentitems UNION ALL SELECT DeliveryDateTime, 'delivered' FROM sentitems ) t GROUP by WEEK(ReceivingDateTime) ORDER by WEEK(ReceivingDateTime) ASC)tt";
        $weekly = $this->db->query($sql_week)->result_array();
        
        $sql_year = "SELECT AVG(R) as R,AVG(S) as S, AVG(D) as D FROM (SELECT YEAR(ReceivingDateTime) as year, SUM(CASE WHEN `Type` = 'received' THEN 1 ELSE 0 END) AS 'R', SUM(CASE WHEN `Type` = 'sent' THEN 1 ELSE 0 END) AS 'S', SUM(CASE WHEN `Type` = 'delivered' THEN 1 ELSE 0 END) as D FROM(SELECT ReceivingDateTime, 'received' `Type` FROM inbox UNION ALL SELECT SendingDateTime, 'sent' FROM sentitems UNION ALL SELECT DeliveryDateTime, 'delivered' FROM sentitems ) t GROUP by YEAR(ReceivingDateTime) ORDER by YEAR(ReceivingDateTime) ASC)tt";
        $yearly = $this->db->query($sql_year)->result_array();
        
        $data = array( 
            array_merge(array('average'=>'Daily Average'),$daily[0]), 
            array_merge(array('average'=>'Weekly Average'),$weekly[0]),
            array_merge(array('average'=>'Yearly Average'),$yearly[0])
            );

        return $data;        
    }*/
    
}


