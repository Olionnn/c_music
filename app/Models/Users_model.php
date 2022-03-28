<?php namespace App\Models;

use CodeIgniter\Model;

class Users_model extends Model
{
	protected $table 		= 'users';
	protected $primaryKey 	= 'user_id';
     protected $allowedFields = ['user_username',
                                'user_password',
                                'user_email',
                                'user_nohp',
                                'user_signup_date',
                                'user_pictprofile',
                                'user_token',
                                'token_valid',
                                ];
	
	// Listing
	public function listing()
	{
        $this->select('*');
        //$this->join('`user_levels`','user_levels.user_level_id = users.user_levelid');
		$query = $this->get();
		return $query->getResultArray();
	}
	// public function getusrs()
	// {
    //     $this->select('*');
    //     //$this->join('`user_levels`','user_levels.user_level_id = users.user_levelid');
	// 	$query = $this->get();
	// 	return $query->getResult();
	// }

	// Detail
	public function detail($id_user)
	{
        $this->select('*');
        //$this->join('`user_levels`','user_levels.user_level_id = users.user_levelid');
		$this->where(array(	'user_id'	=> $id_user));
		$query = $this->get();
		return $query->getRowArray();
	}

	// Verivy Login
	public function login($email,$password)
	{
		$this->select('*');
		$this->where(['user_email'	=> $email,
					//'password'	=> sha1($password)]);
					'user_password'	=> $password]);
		$query = $this->get();
		return $query->getRowArray();
	}
	
	// Verivy email
	public function verifyemail($user_email)
	{
		$this->select('*');
		$this->where(['user_email'	=> $user_email,
					//'password'	=> sha1($password)]);
					// 'user_token'	=> $token
					]);
		$query = $this->get();
		return $query->getRowArray();
	}

	// Verivy Token
	public function verifytoken($token)
	{
		$this->select('*');
		$this->where([//'user_email'	=> $to,
					//'password'	=> sha1($password)]);
					'user_token'	=> $token]);
		$query = $this->get();
		return $query->getRowArray();
	}
    
	// Verivy Token
	public function verify($token, $to)
	{
		$this->select('*');
		$this->where(['user_email'	=> $to,
					//'password'	=> sha1($password)]);
					'user_token'	=> $token]);
		$query = $this->get();
		return $query->getRowArray();
	}
	
	// insert token
	public function updatetoken($data)
	{
		// $this->where(['user_email' => $to]);
		//quey dgn email utk dpt user_id

		$this->select('*');
		$this->where('user_email', $data['user_email']);
		$query = $this->get();
		$dtqr0 = $query->getRowArray();
		$ssuserid = $dtqr0['user_id'];

		if ($ssuserid != null && $ssuserid > 0) {
			$this->where('user_email', $data['user_email']);
			//$this->replace($data);
			$this->update($ssuserid, $data);
		}
	}
	// Ganti Passwordnya
	public function updatepassword($data, $to)
	{
		if ($to != null && !empty($to))
		$this->select('*');
		$this->where('user_email', $to);
		$query = $this->get();
		$dtqr0 = $query->getRowArray();
		$ssuserid = $dtqr0['user_id'];

		if ($ssuserid != null && $ssuserid > 0) {
			$this->where('user_email', $to);
			//$this->replace($data);
			$this->update($ssuserid, $data);
		}
	}

	// Insert
	public function tambah($data)
	{
		$this->save($data);
	}

	// Edit
	public function edit($data, $ids)
	{
		$this->update(array('user_id' => $ids), $data);
	}

	// Delete
	public function hapus($id_user)
	{
		$this->where('user_id', $id_user);
		$this->delete();
	}
}