<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
		$peserta = $this->db->get('peserta')->result();
		$data['jumlah_peserta'] = count($peserta);
		$data['data_peserta']   = $this->db->get('peserta');
		$this->load->view('admin/peserta/data_peserta', $data);
	}

	public function create()
	{
		$this->load->view('admin/peserta/input_peserta');
	}

	public function tambah()
	{
        $nama_peserta    = $this->input->post('nama_peserta');
        $umur            = $this->input->post('umur');
        $alamat          = $this->input->post('alamat');
        $jenis_kelamin   = $this->input->post('jenis_kelamin');

        $config['upload_path']    = './assets/img';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['max_size']       = 2048000;
        $config['max_width']      = 20000;
        $config['max_height']     = 20000;

        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('image'))
        {
        	$errors = array('error' => $this->upload->display_errors());
        }else{
        	$data_image = array('upload_data' => $this->upload->data());
        	$image           = $data_image['image']['name']; 
        }
 		
 		$image           = $_FILES['image']['name'];
        $data            = array('nama_peserta'  =>$nama_peserta,
                                 'umur'          =>$umur,
                                 'alamat'        =>$alamat,
                                 'jenis_kelamin' =>$jenis_kelamin,
                             	 'image'         =>$image
                             	 );
        
        if ($this->Model_Peserta->insert($data) == TRUE) {
        	$this->session->set_flashdata('tambah', true);
        }else{
        	$this->session->set_flashdata('tambah', false);
        }

        redirect('admin/peserta/index');
	}

    public function view_edit($id_peserta)
    {
        $data['view'] = $this->db->where('id_peserta',$id_peserta)->get('peserta')->row();
        $this->load->view('admin/peserta/edit_peserta', $data);

    }

    public function edit($id_peserta)
    {
        $nama_peserta    = $this->input->post('nama_peserta', true);
        $umur            = $this->input->post('umur', true);
        $alamat          = $this->input->post('alamat', true);
        $jenis_kelamin   = $this->input->post('jenis_kelamin', true);

        $config['upload_path']    = './assets/img';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['max_size']       = 2048000;
        $config['max_width']      = 20000;
        $config['max_height']     = 20000;

        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('image'))
        {
            $errors = array('error' => $this->upload->display_errors());
        }else{
            $data_image = array('upload_data' => $this->upload->data());
            $image           = $data_image['image']['name']; 
        }
        
        $image           = $_FILES['image']['name'];
        $data            = array('nama_peserta'  =>$nama_peserta,
                                 'umur'          =>$umur,
                                 'alamat'        =>$alamat,
                                 'jenis_kelamin' =>$jenis_kelamin,
                                 'image'         =>$image
                                 );
        if ($this->Model_Peserta->edit($data, $id_peserta)){
            unlink('assets/img/'.$image->image);
        }
        if ($this->Model_Peserta->edit($data, $id_peserta) == TRUE) {
            $this->session->set_flashdata('edit', true);
        }else{
            $this->session->set_flashdata('edit', false);
        }

        redirect('admin/peserta/index/'.$id_peserta);
    }

    public function delete($id_peserta)
    {
        if ($this->Model_Peserta->delete($id_peserta) == TRUE) {
            $this->session->set_flashdata('delete', true);
        }else{
            $this->session->set_flashdata('delete', false);
        }
        redirect('admin/peserta/index/'.$id_peserta);
    }

}