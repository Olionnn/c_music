<?php namespace App\Controllers\Main;

// Load model
use App\Models\Artists_model;
// End load model

class Artists extends BaseController
{

    public function __construct() { 
		$this->Artists_model = new Artists_model();
		//$this->User_levels_model = new User_levels_model();
    }

	public function index() {
        $artis = $this->Artists_model->listing();
		$data = array(	
			'Artist'		=> $artis
        );
		return view('main/artists/artis', $data);
	}

	public function qtambah() {

		if (!$this->validate([
			'artis_name' 		=> 'is_unique[Users.user_username,uuid,{uuid}]|required',
			'artis_pict' 		=> 'required',
		//	'user_pictprofile' 		=> 'required',
		]))
		{
			$data = array(	//'data_date_created'		    => $this->request->getVar('data_date_created'),
				//'data_date_modif'		    => $this->request->getVar('data_date_modif'),
				'artis_name'		    => $this->request->getPost('artis_name'),
				'artis_pict'		    => $this->request->getPost('artis_pict'),
				'artis_very'  			=> $this->request->getPost('artis_very'),
			);
			$this->Artists_model->tambah($data);
			$this->session->setFlashdata('sukses', 'Data telah ditambah');
			return redirect()->to(base_url('Main/artists/index'));
		}else {
			$this->session->setFlashdata('error', 'Terjadi Kesalahann <br> Mohon Ulang Lagi');
			return redirect()->to(base_url('Main/artists/index'));	
		}
		

	}

	public function qedit() {
		if (!$this->validate([
			'artis_name' 		=> 'is_unique[Users.user_username,uuid,{uuid}]|required',
			'artis_pict' 		=> 'required',
		//	'user_pictprofile' 		=> 'required',
		]))
			{
				$ids  = $this->request->getPost('artis_id');
				$data = array(	
					'artis_name'		    => $this->request->getPost('artis_name'),
					'artis_pict'		    => $this->request->getPost('artis_pict'),
					'artis_very'  			=> $this->request->getPost('artis_very'),
				);
				$this->Artists_model->edit($data,$ids);
				$this->session->setFlashdata('sukses', 'Data telah ditambah');
				return redirect()->to(base_url('Main/users/index'));
			} else {
			$this->session->setFlashdata('error', 'Terjadi Kesalahann <br> Mohon Ulang Lagi');
			return redirect()->to(base_url('Main/users/index'));			
		}
	}

    public function qdelete($id_artis) {
		// Proteksi
		if($this->session->get('user_id') =="") {
			$this->session->setFlashdata('error', 'Anda belum login');
			return redirect()->to(base_url('auth'));
		}
		// End proteksi
		$this->Artists_model->hapus($id_artis);
		$this->session->setFlashdata('sukses', 'Data berhasil dihapus');
		return redirect()->to(base_url('Main/Users/index'));
	}


}