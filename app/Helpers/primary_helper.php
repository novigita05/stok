<?php

function view_page($data)
{
	$data['header'] = view('header', $data);
    $data['footer'] = view('footer');
    $data['content'] = ($data['view']) ? view($data['view'], $data) : '';
    echo view('layout', $data);
}

?>