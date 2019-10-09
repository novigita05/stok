<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = array(
			'view' => 'pages/dashboard',
		);
		view_page($data);
	}

	//--------------------------------------------------------------------

}
