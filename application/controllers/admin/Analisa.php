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
        $this->load->view('admin/analisa/data_analisa');
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
            $minim   = $this->db->query("SELECT kriteria.kriteria, MIN(alternatif.nilai) as minim FROM alternatif,kriteria,peserta WHERE kriteria.id_kriteria=alternatif.id_kriteria AND kriteria.id_kriteria='$id_kriteria' ")->row();

            $data = array(
                'id_peserta' => $a1->id_peserta,
                'id_kriteria' => $a1->id_kriteria,
                'normalisasi' => number_format(($nil->nilai-$minim->minim)/($max->hasilmax-$minim->minim),2));
            $nimax = number_format(($nil->nilai-$minim->minim)/($max->hasilmax-$minim->minim),2);
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
            $maxim   = $this->db->query("SELECT kriteria.kriteria, MAX(alternatif.nilai) as maxim FROM alternatif,kriteria,peserta WHERE kriteria.id_kriteria=alternatif.id_kriteria AND kriteria.id_kriteria='$id_kriteria' ")->row();


            $data = array(
                'id_peserta' => $a1->id_peserta,
                'id_kriteria' => $a1->id_kriteria,
                'normalisasi' => number_format(($nil->nilai-$maxim->maxim)/($min->hasilmin-$maxim->maxim),2));
            $nimin = number_format(($nil->nilai-$maxim->maxim)/($min->hasilmin-$maxim->maxim),2);
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
        redirect('admin/analisa/index');

    }

    public function proses_keputusan()
    {
        $peserta = $this->db->query("SELECT DISTINCT kriteria.tipe, normalisasi.id_peserta, normalisasi.id_kriteria FROM normalisasi,kriteria,peserta WHERE kriteria.id_kriteria=normalisasi.id_kriteria AND peserta.id_peserta=normalisasi.id_peserta");
        foreach ($peserta->result() as $a1) {
            $id_kriteria = $a1->id_kriteria;
            $id_peserta  = $a1->id_peserta;

            $kriteria   = $this->db->query("SELECT kriteria.bobot, normalisasi.normalisasi FROM normalisasi,kriteria,peserta WHERE kriteria.id_kriteria=normalisasi.id_kriteria AND kriteria.id_kriteria='$id_kriteria' ")->row();
            $nil = $this->db->query("SELECT normalisasi FROM normalisasi WHERE id_kriteria='$id_kriteria' AND id_peserta='$id_peserta'")->row();

                $data = array(
                    'id_peserta' => $a1->id_peserta,
                    'id_kriteria' => $a1->id_kriteria,
                    'bobot_keputusan' => number_format(($kriteria->bobot * $nil->normalisasi) + $kriteria->bobot,2));
                    $keputusan = number_format(($kriteria->bobot * $nil->normalisasi) + $kriteria->bobot,2);
                        $cek = $this->db->query("SELECT * FROM keputusan WHERE id_peserta='$a1->id_peserta' and id_kriteria='$a1->id_kriteria' and bobot_keputusan='$keputusan'");
                if ($cek->num_rows() == null) {
                    $this->db->insert('keputusan', $data);
                    
                } elseif ($cek->num_rows() == 1) {
                    $this->session->set_flashdata('gagal','Data Sudah Di normalisasikan');
                    ?>
                    
                    <?php
                }

        }         
        redirect('admin/analisa/index');

    
    }

    public function proses_matriks_batas()
    {
        $peserta = $this->db->query("SELECT DISTINCT keputusan.id_kriteria, keputusan.id_peserta FROM keputusan,kriteria,peserta WHERE kriteria.id_kriteria=keputusan.id_kriteria AND peserta.id_peserta=keputusan.id_peserta");
        foreach ($peserta->result() as $a1) {
            $id_kriteria = $a1->id_kriteria;
            $id_peserta = $a1->id_peserta;

            $kriteria1  = $this->db->query("SELECT EXP(SUM(LOG(COALESCE(bobot_keputusan,1)))) AS jumlah FROM keputusan WHERE id_kriteria='$id_kriteria'")->row();
            $bagi       = number_format(20/100, 2);
                $data = array(
                    'id_kriteria' => $a1->id_kriteria,
                    'nilai_batas' => number_format(pow($kriteria1->jumlah, $bagi),2));
                    $nilai_batas = number_format(pow($kriteria1->jumlah, $bagi),2);
                        $cek = $this->db->query("SELECT * FROM matriks_batas WHERE id_kriteria='$a1->id_kriteria' and nilai_batas='$nilai_batas'");
                if ($cek->num_rows() == null) {
                    $this->db->insert('matriks_batas', $data);
                    
                } elseif ($cek->num_rows() == 1) {
                    $this->session->set_flashdata('gagal','Data Sudah Di normalisasikan');
                    ?>
                    
                    <?php
                }

        }         
        redirect('admin/analisa/index');

    
    }


    public function proses_perkiraan_batas()
    {
        $peserta = $this->db->query("SELECT DISTINCT matriks_batas.id_kriteria, keputusan.id_kriteria, keputusan.id_peserta FROM keputusan,kriteria,peserta,matriks_batas WHERE kriteria.id_kriteria=keputusan.id_kriteria AND peserta.id_peserta=keputusan.id_peserta AND kriteria.id_kriteria=matriks_batas.id_kriteria");
        foreach ($peserta->result() as $a1) {
            $id_kriteria = $a1->id_kriteria;
            $id_peserta = $a1->id_peserta;

            $bobot  = $this->db->query("SELECT bobot_keputusan FROM keputusan WHERE id_kriteria='$id_kriteria' AND id_peserta='$id_peserta'")->row();
            $batas  = $this->db->query("SELECT nilai_batas FROM matriks_batas WHERE id_kriteria='$id_kriteria'")->row();

                $data = array(
                    'id_peserta' => $a1->id_peserta,
                    'id_kriteria' => $a1->id_kriteria,
                    'nilai_perkiraan' => number_format($bobot->bobot_keputusan-$batas->nilai_batas,2));
                    $nilai_perkiraan = number_format($bobot->bobot_keputusan-$batas->nilai_batas,2);
                        $cek = $this->db->query("SELECT * FROM perkiraan_perbatasan WHERE id_peserta='$id_peserta' and id_kriteria='$a1->id_kriteria' and nilai_perkiraan='$nilai_perkiraan'");
                if ($cek->num_rows() == null) {
                    $this->db->insert('perkiraan_perbatasan', $data);
                    
                } elseif ($cek->num_rows() == 1) {
                    $this->session->set_flashdata('gagal','Data Sudah Di normalisasikan');
                    ?>
                    
                    <?php
                }

        }         
        redirect('admin/analisa/index');

    
    }
        
    public function delete_analisa()
    {
        $this->db->query("DELETE FROM rangking");
        redirect('admin/analisa/index');
    }

    public function delete_perkiraan_batas()
    {
        $this->db->query("DELETE FROM perkiraan_perbatasan");
        redirect('admin/analisa/index');
    }

    public function delete_matriks_batas()
    {
        $this->db->query("DELETE FROM matriks_batas");
        redirect('admin/analisa/index');
    }

    public function delete_keputusan()
    {
        $this->db->query("DELETE FROM keputusan");
        redirect('admin/analisa/index');
    }

    public function delete_normalisasi()
    {
        $this->db->query("DELETE FROM normalisasi");
        redirect('admin/analisa/index');
    }

    public function proses_rangking()
    {

        $sql = $this->db->query("SELECT * FROM peserta");
        foreach ($sql->result() as $a) {
            $id_peserta = $a->id_peserta;
            $nama_peserta = $a->nama_peserta;
            $sum = 0;
            $sql2 = $this->db->query("SELECT id_kriteria FROM kriteria");
            foreach ($sql2->result() as $row) {
                $id_kriteria = $row->id_kriteria;
                $sql4 = $this->db->query("SELECT nilai_perkiraan FROM perkiraan_perbatasan WHERE id_peserta='$id_peserta' and id_kriteria='$id_kriteria'")->row();
                // echo $kr4->nilai.'<br>';
                $sum = $sum + $sql4->nilai_perkiraan;

            }
            $data = array(
                'id_peserta'     => $id_peserta,
                'nama_peserta'   => $nama_peserta,
                'nilai_rangking' => $sum
                );
            $this->db->insert('rangking', $data);
        }    
        redirect('admin/analisa/index');
    }
}

/* End of file Nilai.php */
/* Location: ./application/controllers/Nilai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-08 03:28:59 */
/* http://harviacode.com */