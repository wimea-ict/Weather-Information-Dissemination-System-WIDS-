<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Season_model extends CI_Model
{

    public $table = 'seasonal_forecast';
    public $id = 'sea_id';
    public $order = 'DESC';
	public $issuetime = 'issuetime';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
	    //echo "ddjfjdf";
		//exit;
        $this->db->order_by($this->issuetime, $this->order);
        return $this->db->get($this->table)->result();
    }
  // get data by id
    function get_by_id($id)
    {    
	    //echo $id;
	    //  exit;
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
  // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('season_name', $q);
	$this->db->or_like('season_code', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('season_name', $q);
	$this->db->or_like('season_code', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data=array())
    {    //var_dump($data);
	     //exit;
        //$this->db->insert($this->table, $data); 

        $new_data = array(
            'region' => $data['region'],
            'sub' => $data['sub'],
            'seas' => $data['seas'],
            'descrip' => $data['descrip'],
            'impact' => $data['impact'],
            'file1' => $data['file1'],
            'file2' => $data['file2'],
            'region2' =>$data['region2'],       
        );

        if($data['lang']=='Luganda'){
            $sql = "INSERT INTO $this->table(sea_id, region, subregionid, season, descriptionLuganda, impactLuganda, graph, audio, regionid, issuetime) VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, null)"; 
            return $this->db->query($sql, $new_data);
        }else{
            $sql = "INSERT INTO $this->table(sea_id, region, subregionid, season, description, impact, graph, audio, regionid, issuetime) VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, null)"; 
            return $this->db->query($sql, $new_data);
        }

    }


     // update data
     function update($id, $data)
     {
         $data1 = array(
             'region' => $data['region'],
             'subregion' => $data['subregion'],
             'seas' => $data['seas'],
             'descrip' => $data['descrip'],
             'impact' =>$data['impact'],
             'file1' =>  $data['file1'],
             'file2' => $data['file2'],
         );
          if($data['lang']=='English')
           $sql = "UPDATE $this->table SET region = ?, subregionid = ?, season = ?, description = ?, impact = ?, graph = ?, audio =?  WHERE sea_id = $id";
           if($data['lang']=='Luganda')
           $sql = "UPDATE $this->table SET region = ?, subregionid = ?, season = ?, descriptionLuganda = ?, impactLuganda = ?, graph = ?, audio =?  WHERE sea_id = $id";
          
         return $this->db->query($sql, $data1);
     }
 
 

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Season_model.php */