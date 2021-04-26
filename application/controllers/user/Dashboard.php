<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_User');
		$this->load->model('Model_Alternatif');

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
		$user = $this->db->get('user')->result();
		$data['jumlah_user'] = count($user);
		$data['data_user']   = $this->db->get('user');
		$peserta = $this->db->get('peserta')->result();
		$data['jumlah_peserta'] = count($peserta);
		$data['data_rangking']  = $this->Model_Alternatif->view_pemenang()->result();
		$this->load->view('user/dashboard', $data);
	}

	public function view_peserta()
	{
		$peserta = $this->db->get('peserta')->result();
		$data['jumlah_peserta'] = count($peserta);
		$data['data_peserta']   = $this->db->get('peserta');
		$this->load->view('user/view_peserta', $data);
	}
}