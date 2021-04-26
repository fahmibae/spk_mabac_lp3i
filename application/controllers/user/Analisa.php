<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Analisa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Alternatif');
        $this->load->model('Model_Kriteria');
        $this->load->model('Model_Peserta');

        if ($this->session->userdata('logged_in') != "login") {
           ?>
            <script type="text/javascript">
                    alert('Login Dahulu Sebelum Akses Halaman Ini !');
                    window.location='<?php echo base_url('index.php/login/index_auth'); ?>'
                </script>
            <?php
        }
    }

    public function index() 
    {
        $this->load->view('user/analisa/data_analisa');
    }

    public function proses_normalisasi()
    {
         $peserta = $this->db->query("SELECT DISTINCT kriteria.tipe, alternatif.id_peserta, alternatif.id_kriteria FROM alternatif,kriteria,peserta WHERE kriteria.id_kriteria=alternatif.id_kriteria AND peserta.id_peserta=alternatif.id_peserta");
        foreach ($peserta->result() as $a1) {
            $id_kriteria = $a1->id_kriteria;
            $id_peserta  = $a1->id_peserta;

            if ($a1->tipe =="benefit"){

            $max   = $this->db->query("SELECT kriteria.kriteria, MAX(alternatif.nilai) as hasilmax FROM alternatif,kriteria,peserta WHERE kriteria.id_kriteria=alternatif.id_kriteria AND kriteria.id_kriteria='$id_kriteria' ")->row();
            $nil = $this->db->query("SELECT nilai FROM alternatif WHERE id_kriteria='$id_kriteria' AND id_peserta='$id_peserta'")->row();

            $data = array(
                'id_peserta' => $a1->id_peserta,
                'id_kriteria' => $a1->id_kriteria,
                'normalisasi' => number_format($nil->nilai/$max->hasilmax,2),);
            $nimax = number_format($nil->nilai/$max->hasilmax,2);
            $cek = $this->db->query("SELECT * FROM normalisasi WHERE id_peserta='$a1->id_peserta' and id_kriteria='$a1->id_kriteria' and normalisasi='$nimax'");
            if ($cek->num_rows() == null) {
                $this->db->insert('normalisasi', $data);
                
            } elseif ($cek->num_rows() == 1) {
                $this->session->set_flashdata('gagal','Data Sudah Di normalisasikan');
                ?>
                
                <?php
            }

        }elseif($a1->tipe == "cost"){

            $min   = $this->db->query("SELECT kriteria.kriteria, MIN(alternatif.nilai) as hasilmin FROM alternatif,kriteria,peserta WHERE kriteria.id_kriteria=alternatif.id_kriteria AND kriteria.id_kriteria='$id_kriteria' ")->row();
            $nil = $this->db->query("SELECT nilai FROM alternatif WHERE id_kriteria='$id_kriteria' AND id_peserta='$id_peserta'")->row();

            $data = array(
                'id_peserta' => $a1->id_peserta,
                'id_kriteria' => $a1->id_kriteria,
                'normalisasi' => number_format($min->hasilmin/$nil->nilai,2),);
            $nimin = number_format($min->hasilmin/$nil->nilai,2);
            $cek = $this->db->query("SELECT * FROM normalisasi WHERE id_peserta='$a1->id_peserta' and id_kriteria='$a1->id_kriteria' and normalisasi='$nimin'");
            if ($cek->num_rows() == null) {
                $this->db->insert('normalisasi', $data);
                
            } elseif ($cek->num_rows() == 1) {
                $this->session->set_flashdata('gagal','Data Sudah Di normalisasikan');
                ?>
                
                <?php
            }

        }

        }
        redirect('user/analisa/index');
    }

    public function delete_analisa()
    {
        $this->db->query("DELETE FROM analisa");
        $this->db->query("DELETE FROM rangking");
        redirect('user/analisa/index');
    }

    public function delete_normalisasi()
    {
        $this->db->query("DELETE FROM normalisasi");
        redirect('user/analisa/index');
    }

    public function proses_rangking()
    {
        $peserta = $this->db->query("SELECT DISTINCT alternatif.id_peserta, alternatif.id_kriteria FROM alternatif,kriteria,peserta WHERE kriteria.id_kriteria=alternatif.id_kriteria AND peserta.id_peserta=alternatif.id_peserta");
        foreach ($peserta->result() as $a1) {
            $id_kriteria = $a1->id_kriteria;
            $id_peserta = $a1->id_peserta;
            $bobot = $this->db->query("SELECT bobot FROM kriteria WHERE id_kriteria='$id_kriteria'")->row();
            $nil = $this->db->query("SELECT normalisasi FROM normalisasi WHERE id_kriteria='$id_kriteria' AND id_peserta='$id_peserta'")->row();
            echo $a1->id_peserta.' - '.number_format($nil->normalisasi*$bobot->bobot,2).' - '.$a1->id_kriteria.'<br>';

            $data = array(
                'id_peserta'    => $a1->id_peserta,
                'id_kriteria'   => $a1->id_kriteria,
                'nilai_analisa' => number_format($nil->normalisasi*$bobot->bobot,2),
                );
            $nimax = number_format($nil->normalisasi*$bobot->bobot,2);
            $cek = $this->db->query("SELECT * FROM analisa WHERE id_peserta='$a1->id_peserta' and id_kriteria='$a1->id_kriteria' and nilai_analisa='$nimax'");
            if ($cek->num_rows() == null) {
                $this->db->insert('analisa', $data);
            } elseif ($cek->num_rows() == 1) {
                $this->session->set_flashdata('gagal','Data Sudah Di Analisa');
                ?>
                <?php
            }
        

        }

        $sql = $this->db->query("SELECT * FROM peserta");
        foreach ($sql->result() as $a) {
            $id_peserta = $a->id_peserta;
            $nama_peserta = $a->nama_peserta;
            $sum = 0;
            $sql2 = $this->db->query("SELECT id_kriteria FROM kriteria");
            foreach ($sql2->result() as $row) {
                $id_kriteria = $row->id_kriteria;
                $sql4 = $this->db->query("SELECT nilai_analisa FROM analisa WHERE id_peserta='$id_peserta' and id_kriteria='$id_kriteria'")->row();
                // echo $kr4->nilai.'<br>';
                $sum = $sum + $sql4->nilai_analisa;

            }
            $data = array(
                'id_peserta'     => $id_peserta,
                'nama_peserta'   => $nama_peserta,
                'nilai_rangking' => $sum
                );
            $this->db->insert('rangking', $data);
        }    
        redirect('user/analisa/index');
    }
}

/* End of file Nilai.php */
/* Location: ./application/controllers/Nilai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-08 03:28:59 */
/* http://harviacode.com */