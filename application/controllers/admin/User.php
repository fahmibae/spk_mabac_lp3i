<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_User');

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
        $data['data_user'] = $this->db->get('user')->result();
        $j_user = $this->db->get('user')->result();
        $data['jumlah_user'] = count($j_user);
		$this->load->view('admin/user/data_user', $data);
	}

    public function create()
    {
        $this->load->view('admin/user/input_user');
    }

	public function tambah()
	{
        $nama_user       = $this->input->post('nama_user');
        $email           = $this->input->post('email');
        $password        = $this->input->post('password');
        $passwordx       = md5($password);
        $level           = $this->input->post('level');


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
        	$image           = $_FILES['image']['name']; 
        }
 		
 		$image           = $_FILES['image']['name'];
        $data            = array('nama_user'     =>$nama_user,
                                 'email'         =>$email,
                                 'password'      =>$passwordx,
                             	 'image'         =>$image,
                                 'level'         =>$level
                             	 );
        
        if ($this->Model_User->insert($data) == TRUE) {
        	$this->session->set_flashdata('tambah', true);
        }else{
        	$this->session->set_flashdata('tambah', false);
        }

        redirect('admin/user/index');
	}

    public function view_edit($id_user)
    {
        $data['view'] = $this->db->where('id_user',$id_user)->get('user')->row();
        $this->load->view('admin/user/edit_user', $data);

    }

    public function edit($id_user)
    {
        $nama_user       = $this->input->post('nama_user', true);
        $email           = $this->input->post('email', true);
        $password        = $this->input->post('password', true);
        $passwordx       = md5($password);
        $level           = $this->input->post('level', true);

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
        $data            = array('nama_user'     =>$nama_user,
                                 'email'         =>$email,
                                 'password'      =>$passwordx,
                                 'image'         =>$image,
                                 'level'         =>$level
                                 );
        if ($this->Model_User->edit($data, $id_user)){
            unlink('assets/img/'.$image->image);
        }
        if ($this->Model_User->edit($data, $id_user) == TRUE) {
            $this->session->set_flashdata('edit', true);
        }else{
            $this->session->set_flashdata('edit', false);
        }

        redirect('admin/user/index/'.$id_user);
    }

    public function delete($id_user)
    {
         if ($this->Model_User->delete($id_user) == TRUE) {
            $this->session->set_flashdata('delete', true);
        }else{
            $this->session->set_flashdata('delete', false);
        }
        redirect('admin/user/index/'.$id_user);
    }

}
