<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Decadal_forecast_model extends CI_Model
{

    public $table = 'decadal';
    public $id = 'decadal_id';
    public $order = 'DESC';
	public $issuetime = 'issuetime';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->issuetime, $this->order);
       // return $this->db->get($this->table)->result();
	   return $this->db->get($this->table)->result();
    }
  // get data by id
    function get_by_id($id)
    {  
	
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
  // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('advisory', $q);
	$this->db->or_like('date_from', $q);
	$this->db->or_like('date_to', $q);
	$this->db->or_like('issuetime', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('advisory', $q);
	$this->db->or_like('date_from', $q);
	$this->db->or_like('date_to', $q);
	$this->db->or_like('issuetime', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result(); 
    }

    // insert data
    function insert($data)
    {    //var_dump($data);
	     //exit;
        //$this->db->insert($this->table, $data);
        
        $new_data = array(
            'advisory' => $data['advisory'],
            'region' => $data['region'],
            'subregion' => $data['subregion'],
            'date_from' => $data['date_from'],
            'date_to' => $data['date_to'],
            'file1' => $data['file1'],
            'file2' => $data['file2'],

        );

        if($data['lang']=='English'){
            $sql = "INSERT INTO $this->table(decadal_id, advisory, region, subregionid, date_from, date_to, graph, audio, issuetime) VALUES(null, ?, ?, ?, ?, ?, ?, ?, null)";
            return $this->db->query($sql, $new_data);
        }else{
            $sql = "INSERT INTO $this->table(decadal_id, advisoryLuganda, region, subregionid, date_from, date_to, graph, audio, issuetime) VALUES(null, ?, ?, ?, ?, ?, ?, ?, null)";
            return $this->db->query($sql, $new_data);
        }
    } 

     // update data
     function update($id, $data)
     {    
         $data1=array(
             'advisory' => $data['advisory'],
             'date_from' => $data['date_from'],
             'date_to' => $data['date_to'],
             
             'file1' => $data['file'],
             'file2' => $data['file2'],
 
         );
         
 
          $lang=$data['lang'];
          if($lang='Luganda')
          $sql = "UPDATE $this->table SET advisoryLuganda = ?, date_from = ?, date_to = ?, graph = ?, audio = ?  WHERE decadal_id = $id";
          else
          $sql = "UPDATE $this->table SET advisory = ?, date_from = ?, date_to = ?, graph = ?, audio = ?  WHERE decadal_id = $id";
         return $this->db->query($sql, $data1);
     }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Decadal_forecast_model.php */