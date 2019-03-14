<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Daily_forecast_model extends CI_Model
{

    public $table = 'daily_forecast';
    public $id = 'id';
    public $order = 'DESC';
    public $date ='date';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->date, $this->order);
        return $this->db->get($this->table)->result();
    }
    //get all replaced
    function get_all_replaced()
    {
        $this->db->select('daily_forecast.id,daily_forecast.mean_temp,daily_forecast.max_temp,daily_forecast.min_temp,daily_forecast.sunrise,daily_forecast.sunset,daily_forecast.wind,daily_forecast.wind_direction,daily_forecast.wind_strength,daily_forecast.weather,daily_forecast.advisory,daily_forecast.datetime,season.season_name');
	$this->db->from('daily_forecast');
	$this->db->join('season','daily_forecast.season_id = season.id');
	return $this->db->get()->result();
	}
	//other days
	function get_other_days($datas){
           //var_dump($datas);
		  //echo "kfjjgjg";
		   //exit;
          $sqlx = "SELECT * FROM  daily_forecast WHERE time = ? && region = ? && date > ? order by date asc limit 5";
         return $this->db->query($sqlx, $datas);
	}
  // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    //get by id replaced
    function get_by_id_replaced($id)
    {   //echo $id;
	    //exit;
       /* $this->db->select('daily_forecast.id,daily_forecast.max_temp,daily_forecast.min_temp,daily_forecast.sunrise,daily_forecast.sunset,daily_forecast.wind,daily_forecast.weather,daily_forecast.advisory,daily_forecast.datetime,season.season_name,region.name,category.cat_name');
	$this->db->from('daily_forecast');
	$this->db->join('season','daily_forecast.season_id = season.id');
	$this->db->join('region','daily_forecast.region = region.id');
	$this->db->join('season','daily_forecast.cat_id = category.id');
	$this->db->where('daily_forecast.id',$id);
	return $this->db->get()->row();*/
	 $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
}
  // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('mean_temp', $q);
        $this->db->or_like('max_temp', $q);
        $this->db->or_like('min_temp', $q);
        $this->db->or_like('sunrise', $q);
        $this->db->or_like('sunset', $q);
        $this->db->or_like('wind', $q);
        $this->db->or_like('wind_direction', $q);
        $this->db->or_like('wind_strength', $q);
        $this->db->or_like('weather', $q);
        $this->db->or_like('advisory', $q);
        $this->db->or_like('datetime', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('mean_temp', $q);
        $this->db->or_like('max_temp', $q);
        $this->db->or_like('min_temp', $q);
        $this->db->or_like('sunrise', $q);
        $this->db->or_like('sunset', $q);
        $this->db->or_like('wind', $q);
        $this->db->or_like('wind_direction', $q);
        $this->db->or_like('wind_strength', $q);
        $this->db->or_like('weather', $q);
        $this->db->or_like('advisory', $q);
        $this->db->or_like('datetime', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
	//5
       for( $i = 1; $i <5 ; $i++)
       {

         $mean_temp = "mean_temp".$i;

         $wind_strength = "wind_strength".$i;

         $wind_direction = "wind_direction".$i;

         $weather = "weather".$i;

         $time = "time".$i;

         $date = "date".$i;

         $cat_id = "cat_id".$i;

         if($date > "date2")
         {
            $date = "date2";
         }


             $new_data=array(
                'mean_temp' => $this->input->post($mean_temp,TRUE),
                'wind_direction' => $this->input->post($wind_direction,TRUE),
                'wind_strength' => $this->input->post($wind_strength,TRUE),
                'weather' => $this->input->post($weather,TRUE),
                //'advisory' => $this->input->post($advisory,TRUE),
                'date' => $this->input->post($date,TRUE),
               'time' => $this->input->post($time,TRUE),
                'region' => $this->input->post('region',TRUE),
                'season_id' => $this->input->post('season_id',TRUE),
                'cat_id' => $this->input->post($cat_id,TRUE),
            );

            $wind_strength = $new_data['wind_strength'];
            $wind_direction = $new_data['wind_direction'];
            $mean_temp = $new_data['mean_temp'];
            $date = $new_data['date'];
            $season_id= $new_data['season_id'];
            $cat_id = $new_data['cat_id'];
            $weather = $new_data['weather'];
            $region = $new_data['region'];
            $time = $new_data['time'];


            if($data['lang']=='English'){
                $sql = "INSERT INTO $this->table(id, mean_temp, wind_direction, wind_strength, weather, date, time, region, season_id,cat_id) VALUES(null, '$mean_temp', '$wind_direction', '$wind_strength', '$weather', '$date', '$time', '$region', '$season_id', '$cat_id')";
                $ww = $this->db->query($sql);
            }
            else{
                $sql = "INSERT INTO $this->table(id, mean_temp, wind_direction, wind_strength, weatherLuganda, date, time, region, season_id,cat_id) VALUES(null, '$mean_temp', '$wind_direction', '$wind_strength', '$weather', '$date', '$time', '$region', '$season_id', '$cat_id')";
                $ww = $this->db->query($sql, $new_data);
            }



       }

        // $new_data=array(
        //     'mean_temp' => $this->input->post('mean_temp',TRUE),
        //     // 'max_temp' => $this->input->post('max_temp',TRUE),
        //     // 'min_temp' => $this->input->post('min_temp',TRUE),
        //     // 'sunrise' => $this->input->post('sunrise',TRUE),
        //     // 'sunset' => $this->input->post('sunset',TRUE),
        //     // 'wind' => $this->input->post('wind',TRUE),
        //     'wind_direction' => $this->input->post('wind_direction',TRUE),
        //     'wind_strength' => $this->input->post('wind_strength',TRUE),
        //     'weather' => $this->input->post('weather',TRUE),
        //     'advisory' => $this->input->post('advisory',TRUE),
        //     'date' => $this->input->post('date',TRUE),
        //     'time' => $this->input->post('time',TRUE),
        //     //'region' => $this->input->post('region_id',TRUE),
        //     'region' => $this->input->post('region',TRUE),
        //     'season_id' => $this->input->post('season_id',TRUE),
        //     'cat_id' => $this->input->post('cat_id',TRUE),
        // );

        // if($data['lang']=='English'){
        //     $sql = "INSERT INTO $this->table(id, mean_temp, wind_direction, wind_strength, weather, advisory, date, time, region, season_id,cat_id) VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        //     $ww = $this->db->query($sql, $new_data);
        // }else{
        //     $sql = "INSERT INTO $this->table(id, mean_temp, max_temp, min_temp, sunrise, sunset, wind, wind_direction, wind_strength, weatherLuganda, advisoryLuganda, date, time, region, subregionid, season_id,cat_id) VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        //     $ww = $this->db->query($sql, $new_data);
        // }
    }

     // update data
     function update($id, $data)
     {

         // $this->db->where($this->id, $id);
         // $this->db->update($this->table, $data);

         $data1=array(
             'mean_temp' => $data['mean_temp'],
             'max_temp' => $data['max_temp'],
             'min_temp' => $data['min_temp'],
             'wind' => $data['wind'],
             'wind_direction' => $data['wind_direction'],
             'wind_strength' => $data['wind_strength'],
             'weather' => $data['weather'],
             'advisory' => $data['advisory'],
                 );


          $lang=$data['lang'];
          if($lang='Luganda')
          $sql = "UPDATE $this->table SET mean_temp = ?, max_temp = ?,min_temp = ?,wind = ?, wind_direction = ?, wind_strength, weatherLuganda = ?, advisoryLuganda = ? WHERE id = $id";
          else
          $sql = "UPDATE $this->table SET max_temp = ?,min_temp = ?,wind = ?, wind_direction = ?, wind_strength, weather = ?, advisory = ?  WHERE id = $id";
         return $this->db->query($sql, $data1);
     }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_date(){
        $today = "SELECT region FROM $this->table WHERE (date > date('y-m-d')) ";
        $today2 = $this->db->query($today);

    }

}

/* End of file Daily_forecast_model.php */
