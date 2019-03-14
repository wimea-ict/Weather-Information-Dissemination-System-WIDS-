<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Advisory_model extends CI_Model
{

    public $table = 'advisory';
    public $id = 'record_id';
    public $order = 'DESC';
	public $TS = 'TS';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->TS, $this->order);
        return $this->db->get($this->table)->result();
    }
    //get all replaced
    function get_all_replaced()
    {
        $this->db->select('ward.id,ward.ward_name,district.district_name');
	$this->db->from('ward');
	$this->db->join('district','ward.district_id = district.id');
	return $this->db->get()->result();
	}
  // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
	  
	function get_all_where($data)
    {  /*
        var_dump($data);
        exit;
        $this->db->order_by($this->TS, $this->order);
        $this->db->where('advisory',array("message IS NOT NULL"=>NULL ))->row();
        return $this->db->get('advisory');  */

        if($data['lang']=='English'){
            $this->db->order_by($this->TS, $this->order);
            $this->db->select('advisory.record_id,advisory.region,advisory.subregionid,advisory.type,advisory.advice,
                                        advisory.message,advisory.audio');
            $this->db->from('advisory');
           $array=array('region' => $data['region'], 'subregionid' => $data['subregion'],
           'type' => $data['tip'],'advice' => $data['category2'],'message IS NOT NULL'=>NULL);
           $this->db->where($array);
            return $this->db->get()->row();
        }else{
            $this->db->order_by($this->TS, $this->order);
            $this->db->select('advisory.record_id,advisory.region,advisory.subregionid,advisory.type,
                        advisory.advice,advisory.messageLuganda,advisory.audio');
            $this->db->from('advisory');
                $array=array('region' => $data['region'], 'subregionid' => $data['subregion'],
                'type' => $data['tip'],'advice' => $data['category2'],'messageLuganda IS NOT NULL'=>NULL);
            $this->db->where($array);       
            return $this->db->get()->row();            
        }
    }
    //get by id replaced
    function get_by_id_replaced($id)
    {
       $this->db->select('advisory.record_id,advisory.region,advisory.subregionid,advisory.type,advisory.advice,advisory.message,advisory.messageLuganda,advisory.audio');
	   $this->db->from('advisory');
	   $this->db->join('region','advisory.region = region.id');
      // $this->db->join('ussdsubregions','advisory.subregionid = ussdsubregions.subregionid');
	   $this->db->where('advisory.record_id',$id);
	   return $this->db->get()->row();
}
  // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('ward_name', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('ward_name', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data=array())
    {
	    //var_dump($data);
         // exit;
         $new_data = array(
            'region_id' => $data['region_id'],
            'region' => $data['region'],
            'sub' => $data['sub'],
            'type' => $data['type'],
            'cat' => $data['cat'],
            'msg' => $data['msg'],
            'file1' => $data['file1'],
         );

      if($data['lang']=='Luganda'){
            $sql = "INSERT INTO $this->table(record_id, region, regionid, subregionid, type, advice, messageLuganda, audio, TS) VALUES(null, ?, ?, ?, ?, ?, ?, ?, null)";
            return $this->db->query($sql, $new_data);
         }else{
            $sql = "INSERT INTO $this->table(record_id, region, regionid, subregionid, type, advice, message, audio, TS) VALUES(null, ?, ?, ?, ?, ?, ?, ?, null)";
            return $this->db->query($sql, $new_data);
         }
    }

     // update data
     function update($id, $data)
     { 
          
         $sql = "UPDATE $this->table SET message = ?, audio = ?  WHERE record_id = $id";
         return $this->db->query($sql, $data);
         
     }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Ward_model.php */