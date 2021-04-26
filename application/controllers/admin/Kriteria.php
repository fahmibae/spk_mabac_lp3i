<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Kriteria');

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
		$kriteria = $this->db->get('kriteria')->result();
		$data['jumlah_kriteria'] = count($kriteria);
		$data['data_kriteria']   = $this->db->get('kriteria');
		$this->load->view('admin/kriteria/data_kriteria', $data);
	}

	public function create()
	{
		$this->load->view('admin/kriteria/input_kriteria');
	}

	public function tambah()
	{
        $kriteria        = $this->input->post('kriteria');
        $bobot           = $this->input->post('bobot');
        $tipe            = $this->input->post('tipe');

        $data            = array('kriteria'      =>$kriteria,
                                 'bobot'         =>$bobot,
                                 'tipe'          =>$tipe
                             	 );
        
        if ($this->Model_Kriteria->insert($data) == TRUE) {
        	$this->session->set_flashdata('tambah', true);
        }else{
        	$this->session->set_flashdata('tambah', false);
        }

        redirect('admin/kriteria/index');
	}

    public function view_edit($id_kriteria)
    {
        $data['view'] = $this->db->where('id_kriteria',$id_kriteria)->get('kriteria')->row();
        $this->load->view('admin/kriteria/edit_kriteria', $data);

    }

    public function edit($id_kriteria)
    {
        $kriteria        = $this->input->post('kriteria', true);
        $bobot           = $this->input->post('bobot', true);
        $tipe            = $this->input->post('tipe', true);
        $data            = array('kriteria'      =>$kriteria,
                                 'bobot'         =>$bobot,
                                 'tipe'          =>$tipe
                                 );

        if ($this->Model_Kriteria->edit($data, $id_kriteria) == TRUE) {
            $this->session->set_flashdata('edit', true);
        }else{
            $this->session->set_flashdata('edit', false);
        }

        redirect('admin/kriteria/index/'.$id_kriteria);
    }

    public function delete($id_kriteria)
    {
        if ($this->Model_Kriteria->delete($id_kriteria) == TRUE) {
            $this->session->set_flashdata('hapus', true);
        }else{
            $this->session->set_flashdata('hapus', false);
        }
        redirect('admin/kriteria/index/'.$id_kriteria);
    }

}