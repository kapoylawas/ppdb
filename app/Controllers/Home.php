<<<<<<< HEAD
<?php

namespace App\Controllers;
=======
<?php namespace App\Controllers;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

class Home extends BaseController
{
	public function index()
	{
<<<<<<< HEAD
		$data = [
			'title' => 'PPDB',
			'subtitle' => 'Home',
		];
		return view('v_home', $data);
	}
=======
		$data= [
			'title' => 'Home',
			'isi' => 'v_home'
		];
		return view('layout/v_wrapper', $data);
	}

	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
