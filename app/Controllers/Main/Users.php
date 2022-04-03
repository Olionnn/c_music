<?php namespace App\Controllers\Main;

// Load model
use App\Models\Users_model;
use App\Models\User_levels_model;
// End load model

class Users extends BaseController
{
    public function __construct() { 
		$this->Users_model = new Users_model();
		//$this->User_levels_model = new User_levels_model();
    }
    
	public function index() {
		$users = $this->Users_model->listing();
		$data = array(	
			'title'		=> 'Data Users',
			//'qusers'		=> $qusers,
			'users'		=> $users);
		return view('main/users/user', $data);
	}

	// public function qtambah() {

	// 	if (!$this->validate([
	// 		'user_username' 		=> 'is_unique[Users.user_username,uuid,{uuid}]|required',
	// 		'user_password' 		=> 'required',
	// 		'user_email' 			=> 'is_unique[Users.user_email,uuid,{uuid}]|valid_email|required',
	// 	//	'user_pictprofile' 		=> 'required',
	// 	]))
	// 	{
	// 		$data = array(	//'data_date_created'		    => $this->request->getVar('data_date_created'),
	// 			//'data_date_modif'		    => $this->request->getVar('data_date_modif'),
	// 			'user_username'		    => $this->request->getPost('user_username'),
	// 			'user_password'		    => password_hash($this->request->getPost('user_password'), PASSWORD_DEFAULT),
	// 			'user_email'		    => $this->request->getPost('user_email'),
	// 			'user_nohp'  			=> $this->request->getPost('user_nohp'),
	// 			'user_pictprofile'		=> $this->request->getPost('user_pictprofile'),
	// 		);
	// 		$this->Users_model->tambah($data);
	// 		$this->session->setFlashdata('sukses', 'Data telah ditambah');
	// 		return redirect()->to(base_url('Main/users/index'));
	// 	}else {
	// 		$this->session->setFlashdata('error', 'Terjadi Kesalahann <br> Mohon Ulang Lagi');
	// 		return redirect()->to(base_url('Main/users/index'));	
	// 	}
	// }	
		public function qtambah() {
			$data = $this->request->getPost();
			//spesifk
			$data = [
				'user_username'		    => $this->request->getPost('user_username'),
				'user_password'		    => password_hash($this->request->getPost('user_password'), PASSWORD_DEFAULT),
				'user_email'		    => $this->request->getPost('user_email'),
				'user_nohp'  			=> $this->request->getPost('user_nohp'),
				'user_pictprofile'		=> $this->request->getPost('user_pictprofile'),
			];
			$this->db->table('users')->insert($data);
			if($this->db->affectedRows() > - 0) {
				return redirect()->to(site_url('Main/users/'))->with('success', 'Users Added');
			}
		}
	
	public function qedit() {
			if (!$this->validate([
				// 'user_username' 		=> 'is_unique[Users.user_username,uuid,{uuid}]|required',
				// 'user_password' 		=> 'required',
				// 'user_email' 			=> 'is_unique[Users.user_email,uuid,{uuid}]|valid_email|required',
			//	'user_pictprofile' 		=> 'required',
			]))
			{
				$ids  = $this->request->getPost('user_id');
				$data = array(	
					'user_username'		    => $this->request->getPost('user_username'),
					//'user_password'		    => password_hash($this->request->getPost('user_password'), PASSWORD_DEFAULT),
					'user_email'		    => $this->request->getPost('user_email'),
					'user_nohp'  			=> $this->request->getPost('user_nohp'),
					'user_pictprofile'		=> $this->request->getPost('user_pictprofile'),
				);
				$this->Users_model->edit($data,$ids);
				$this->session->setFlashdata('sukses', 'Data telah ditambah');
				return redirect()->to(base_url('Main/users/index'));
			} else {
			$this->session->setFlashdata('error', 'Terjadi Kesalahann <br> Mohon Ulang Lagi');
			return redirect()->to(base_url('Main/users/index'));			
		}
	}
	// Delete
	public function qdelete($id_user) {
		// Proteksi
		if($this->session->get('user_id') =="") {
			$this->session->setFlashdata('error', 'Anda belum login');
			return redirect()->to(base_url('auth'));
		}
		// End proteksi
		$this->Users_model->hapus($id_user);
		$this->session->setFlashdata('sukses', 'Data berhasil dihapus');
		return redirect()->to(base_url('Main/Users/index'));
	}
}