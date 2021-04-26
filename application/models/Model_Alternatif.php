<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Alternatif extends CI_Model
{

    public function tampilalternatif()
    {
        $query = "SELECT * FROM alternatif";

        return $this->db->query($query);

    }

    public function check()
    {
        return $this->db->query("SELECT * FROM alternatif ORDER BY id_kriteria");
    }

    public function edit($data,$id_alternatif){
         $this->db->update('alternatif',$data, array('id_alternatif' => $id_alternatif));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function delete($id_alternatif){
        $this->db->where('id_alternatif',$id_alternatif)->delete('alternatif');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    
    // get total rows
     public function hitungkriteria()
    {
        $query = $this->db->get('alternatif');
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
        $this->db->insert('alternatif', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function view_pemenang()
    {
        return $this->db->query("SELECT * FROM rangking ORDER BY id_peserta DESC LIMIT 1");
    }

}
