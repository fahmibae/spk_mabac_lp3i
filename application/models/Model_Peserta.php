<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Peserta extends CI_Model
{

    public function tampilpeserta()
    {
        $query = "SELECT * FROM peserta";

        return $this->db->query($query);

    }

    public function edit($data,$id_peserta){
         $this->db->update('peserta',$data, array('id_peserta' => $id_peserta));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function delete($id_peserta){
        $this->db->where('id_peserta',$id_peserta)->delete('peserta');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    
    // get total rows
     public function hitungpeserta()
    {
        $query = $this->db->get('peserta');
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
        $this->db->insert('peserta', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

}
