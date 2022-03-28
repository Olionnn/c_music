<?php namespace App\Models;

use CodeIgniter\Model;

class Users_model extends Model
{
	protected $table 		= 'artis';
	protected $primaryKey 	= 'artis_id';
     protected $allowedFields = ['artis_name',
                                'artis_pict',
                                'artis_very',
                                ];
    // Listing
    public function listing()
    {
        $this->select('*');
        //$this->join('`user_levels`','user_levels.user_level_id = users.user_levelid');
        $query = $this->get();
        return $query->getResultArray();
    }

    	// Detail
	public function detail($id_artis)
	{
        $this->select('*');
        //$this->join('`user_levels`','user_levels.user_level_id = users.user_levelid');
		$this->where(array(	'artis_id'	=> $id_artis));
		$query = $this->get();
		return $query->getRowArray();
	}

    	// Insert
	public function tambah($data)
	{
		$this->save($data);
	}

	// Edit
	public function edit($data, $ids)
	{
		$this->update(array('artis_id' => $ids), $data);
	}

    	// Delete
	public function hapus($id_artis)
	{
		$this->where('artis_id', $id_artis);
		$this->delete();
	}


}
