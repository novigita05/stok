<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if ($this->session->get('logged')!==TRUE) {
			$url = base_url('login');
			header("Location: $url");
	        exit(0);
		}

		$data = array(
			'view' => 'pages/dashboard',
		);
		view_page($data);
	}

	//--------------------------------------------------------------------

}
