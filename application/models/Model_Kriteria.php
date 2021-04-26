<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Kriteria extends CI_Model
{

    public function tampilkriteria()
    {
        $query = "SELECT * FROM kriteria";

        return $this->db->query($query);

    }

    public function edit($data,$id_kriteria){
         $this->db->update('kriteria',$data, array('id_kriteria' => $id_kriteria));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function delete($id_kriteria){
        $this->db->where('id_kriteria',$id_kriteria)->delete('kriteria');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    
    // get total rows
     public function hitungkriteria()
    {
        $query = $this->db->get('kriteria');
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }

    // insert data
    function insert($data)
    {
        $this->db->insert('kriteria', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

}
