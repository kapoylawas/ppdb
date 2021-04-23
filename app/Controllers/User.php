<<<<<<< HEAD
<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
	public function __construct()
	{
		$this->ModelUser = new ModelUser();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB',
			'subtitle' => 'User',
			'user' => $this->ModelUser->getAllData(),
		];
		return view('admin/v_user', $data);
	}

	public function insertData()
	{
		$file = $this->request->getFile('foto');
		$nama_file = $file->getRandomName();
		$data = [
           'nama_user' => $this->request->getPost('nama_user'),
           'email' => $this->request->getPost('email'),
           'password' => $this->request->getPost('password'),
           'foto' => $nama_file
		];
		// upload file foto
		$file->move('foto', $nama_file);

		$this->ModelUser->insertData($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Tambah !!');
		return redirect()->to('index');
	}

	public function editData($id_user)
	{
		$file = $this->request->getFile('foto');
		if ($file->getError() == 4) {
			$data = [
				'id_user' => $id_user, 
				'nama_user' => $this->request->getPost('nama_user'),
				'email' => $this->request->getPost('email'),
				'password' => $this->request->getPost('password'),
			];
			$this->ModelUser->editData($data);
		}else {
			
			$user = $this->ModelUser->detailData($id_user);
			if ($user['foto'] != "") {
				unlink('foto/' . $user['foto']);
			}

			$nama_file = $file->getRandomName();
			$data = [
				'id_user' => $id_user,
				'nama_user' => $this->request->getPost('nama_user'),
				'email' => $this->request->getPost('email'),
				'password' => $this->request->getPost('password'),
				'foto' => $nama_file
			];
			// upload file foto
			$file->move('foto', $nama_file);
			$this->ModelUser->editData($data);
		}

		session()->setFlashdata('pesan_edit', 'Data Berhasil di Edit !!');
		return redirect()->to('/user');
	}

	public function deleteData($id_user)
	{
		$user = $this->ModelUser->detailData($id_user);
		if ($user['foto'] != "") {
			unlink('foto/' . $user['foto']);
		}
		$data = [
		   'id_user' => $id_user,
		];
		$this->ModelUser->deleteData($data);
		session()->setFlashdata('pesan_delete', 'Data Berhasil di Hapus !!');
		return redirect()->to('/user');
	}

}
=======
<?php 
namespace App\Controllers;
use App\Models\Model_user;

class User extends BaseController
{
    public function __construct ()
    {
		$this->Model_user = new Model_user ();
		helper('form');
    }

	public function index()
	{
		$data= [
            'title' => 'User',
            'user' => $this->Model_user->alldata(),
			'isi' => 'admin/v_user'
		];
		return view('layout/v_wrapper', $data);
    }

	public function add()
	{
        if ($this->validate([
			'nama_user' => [
				'label' => 'Nama User',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				   ]
                ],
			'username' => [
				'label' => 'Username',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
			'foto' => [
				'label' => 'Foto',
				'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'uploaded' => '{field} Wajib di isi!!',
                    'max_size' => 'Ukuran {field} Max 1mb!!',
                    'mime_in' => 'Format {field} Wajib PNG,JPG,JPEG,GIF',
				   ]
                ],
        ])) {
			$foto = $this->request->getFile('foto');
			//rename file foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
				'nama_user' =>htmlspecialchars ($this->request->getPost('nama_user')),
				'username' =>htmlspecialchars ($this->request->getPost('username')),
				'password' =>md5($this->request->getPost('password')),
				'foto' => $nama_file,
			);

			$foto->move('foto', $nama_file);
			$this->Model_user->add($data);
			session()->setFlashdata('pesan', 'Data Berhasil di Tambah');
			return redirect()->to(base_url('user'));
        }else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('user'));
        }
	}
	
	public function edit($id_user)
	{
        if ($this->validate([
			'nama_user' => [
				'label' => 'Nama User',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				   ]
                ],
			'username' => [
				'label' => 'Username',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
			'foto' => [
				'label' => 'Foto',
				'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
                    'max_size' => 'Ukuran {field} Max 1mb!!',
                    'mime_in' => 'Format {field} Wajib PNG,JPG,JPEG,GIF',
				   ]
                ],
        ])) {
			$foto = $this->request->getFile('foto');
			if ($foto->getError() == 4) {
				$data = array(
					'id_user' => $id_user, 
					'nama_user' =>htmlspecialchars ($this->request->getPost('nama_user')),
					'username' =>htmlspecialchars ($this->request->getPost('username')),
					'password' =>md5($this->request->getPost('password')),
				);
				// $foto->move('foto', $nama_file);
				$this->Model_user->edit($data);
			}else {
				//hapus foto lama
				$user = $this->Model_user->detail_data($id_user);
				if ($user['foto'] != "") {
					unlink('foto/' . $user['foto']);
				} 
			//rename file foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
				'id_user' => $id_user, 
				'nama_user' =>htmlspecialchars ($this->request->getPost('nama_user')),
				'username' =>htmlspecialchars ($this->request->getPost('username')),
				'password' =>md5($this->request->getPost('password')),
				'foto' => $nama_file,
			);
			$foto->move('foto', $nama_file);
			$this->Model_user->edit($data);
			}

			session()->setFlashdata('pesan', 'Data Berhasil di Tambah');
			return redirect()->to(base_url('user'));
        }else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('user'));
        }
	}
	
	public function delete($id_user)
    {
		//hapus foto lama
		$user = $this->Model_user->detail_data($id_user);
		if ($user['foto'] != "") {
			unlink('foto/' . $user['foto']);
		}
		
		$data = array(
			'id_user' => $id_user,
	);
		$this->Model_user->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
		return redirect()->to(base_url('user'));
    }

  //--------------------------------------------------------------------

}


>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
