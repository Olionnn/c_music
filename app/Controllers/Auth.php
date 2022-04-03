<?php namespace App\Controllers;

// Load model
use CodeIgniter\I18n\Time;
use App\Models\Users_model;
use App\Models\User_levels_model;
// End load model

class Auth extends BaseController
{
	public function __construct() { 
		$this->Users_model = new Users_model();
		//$this->User_levels_model = new User_levels_model();
    }

	// public function index() {
	// 	if ($this->validate([
	// 		'user_email' 	=> 'required',
	// 		'user_password' 	=> 'required',
	// 	])){
	// 		$email = $this->request->getVar('user_email');
	// 		$password = password_verify($this->request->getVar('user_password'), PASSWORD_DEFAULT);
	// 		//$remember = (bool)$this->request->getPost('remember');
	// 		// Check user
	// 		$check_user = $this->Users_model->login($email,$password);
	// 		if($check_user) {
	// 			$this->session->set('email;',$email);
	// 			$this->session->set('userid',$check_user['user_id']);
	// 			//$this->session->set('userlevel',$check_user['user_levelid']);
	// 			// $session->set('userlevelnama',$check_user['user_level_nama']);
	// 			// Login success
	// 			$this->session->setFlashdata('sukses', 'Anda berhasil login');
	// 			return redirect()->to(base_url('Main/Dashboard'));
	// 		} else {
	// 			$data = array(	'title'		=> 'Login C MU'
	// 			);
	// 			//return view('auth/layout/wrapper',$data);
	// 			return view('auth/login',$data);
	// 		}
	// 	}
	// 	$data = array(	'title'		=> 'Login C MU'
	// 	);
	// 	//return view('auth/layout/wrapper',$data);
	// 	return view('auth/login',$data);
	// }

	public function index() {
		return redirect()->to(site_url('Auth/login'));
	}
		public function login() {
			if(session('user_id')){
				return redirect()->to(site_url('Main/Dashboard'));
			}
		return view('auth/login');
	}

	public function loginacc() {
		$post = $this->request->getPost();
		$query = $this->db->table('users')->getWhere(['user_email' => $post['user_email']]);
		$user = $query->getRow();
		if($user) {
			if(password_verify($post['user_password'], $user->user_password)) {
				$params = [
					'user_id' => $user->user_id,
					'user_username' => $user->user_username,							
				];
				$this->session->set($params);
				return redirect()->to(site_url('Main/Dashboard'));
			} else {
				return redirect()->to(site_url('Auth'))->with('error', 'Password Tidak Sesuai');
			}
		}else {
			return redirect()->to(site_url('Auth'))->with('error', 'Email Tidak Terdaftar');
		}
	}

	public function logout() {
		$this->session->destroy('user_id');
		return redirect()->to(site_url('Auth/login'))->with('sukses', 'Anda Sudah logout');
	}

	// public function regisacc() {
	// 	$post = $this->request->getPost();
	// 	$query = $this->db->table('users')->getWhere(['user_email' => $post['user_email']]);
	// }

}