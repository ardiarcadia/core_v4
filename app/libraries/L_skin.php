<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class L_skin {

	protected $skin;

	function __construct()
	{
		$this->skin = &get_instance();
	}

	function apps_config($key)
    {
		$data = array(
			'title' 		=> 'HRIS',
			'logo' 			=> 'img/logo-imip-medium.png',
			'favicon' 		=> 'img/favicon.ico',
			'noimage' 		=> 'img/noimage.png',
			'loading' 		=> 'img/loading.gif',
			'email' 		=> 'info@imip.co.id',
			'footer' 		=> 'PT Indonesia Morowali Industrial Park - Copyright @2019 Allright Reserved',
			'meta_desc' 	=> 'IMIP Application',
			'meta_key' 		=> 'PT Indonesia Morowali Industrial Park',
			'head_title' 	=> 'PT Indonesia Morowali Industrial Park',
			'head_subtitle' => 'A Human Resources Information System (HRIS) is a software or online solution that is used for data entry, data tracking and the data information requirements of an organizations human resources (HR) management, payroll and bookkeeping operations'
		);
    	return $data[$key];
    }
	
	function main($template, $data=NULL)
	{
		if(!$this->is_ajax()){
			$data['header'] = $this->skin->load->view('skin/header', $data, TRUE);
			$data['sidebar'] = $this->skin->load->view('skin/sidebar', $data, TRUE);
			$data['content'] = $this->skin->load->view($template, $data, TRUE);
			$data['modal'] = $this->skin->load->view('skin/modal', $data, TRUE);
			$data['footer'] = $this->skin->load->view('skin/footer', $data, TRUE);
			$this->skin->load->view('skin/master', $data);
		}else{
			$this->skin->load->view('$template', $data);
		}
	}

	function config($template, $data=NULL)
	{
		if(!$this->is_ajax()){
			$data['header'] = $this->skin->load->view('skin/header', $data, TRUE);
			$data['sidebar'] = $this->skin->load->view('skin/sidebar', $data, TRUE);
			$data['menu'] = $this->skin->load->view('skin/menu', $data, TRUE);
			$data['content'] = $this->skin->load->view($template, $data, TRUE);
			$data['modal'] = $this->skin->load->view('skin/modal', $data, TRUE);
			$data['footer'] = $this->skin->load->view('skin/footer', $data, TRUE);
			$this->skin->load->view('skin/master_config', $data);
		}else{
			$this->skin->load->view('$template', $data);
		}
	}

	function login($template, $data=NULL)
	{
		if(!$this->is_ajax()){
			$data['content'] = $this->skin->load->view($template, $data, TRUE);
			$this->skin->load->view('skin/master_login', $data);
		}else{
			$this->skin->load->view('$template', $data);
		}
	}

	function is_ajax()
	{
		return ($this->skin->input->server('HTTP_X_REQUESTED_WITH')&&($this->skin->input->server('HTTP_X_REQUESTED_WITH')=='XMLHttpRequest'));
	}

	function css_load($data)
	{
		if( ! is_array($data) OR count($data) === 0 ){
			echo '<link rel="stylesheet" href="'.base_url($data).'">';
		}else{
			foreach($data as $val) {
				echo '<link rel="stylesheet" href="'.base_url($val).'">';
            	echo "\n";
			}
		}
	}

	function js_load($data)
	{
		if( ! is_array($data) OR count($data) === 0 ){
			echo '<script src="'.base_url($data).'"></script>';
		}else{
			foreach($data as $val) {
				echo '<script src="'.base_url($val).'"></script>';
            	echo "\n";
			}
		}
	}

	function breadcrumb()
	{
		$real 	= uri_string();
		$url 	= explode("/",$real);
		$batas 	= count($url);
		$akhir	= $batas - 1;

		$link = '';
		echo '<ol class="breadcrumb">';
		echo '<li><a href="'.site_url().'">HRIS</a></li>';
		for ($x = 0; $x < $batas; $x++) {
		    $title = ucfirst($url[$x]);
		    $link .= $url[$x].'/';
		    echo ($x == $akhir) ? '<li class="active">'.$title.'</li>' : '<li><a href="'.site_url($link).'">'.$title.'</a></li>';
		}
		echo '</ol>';
	}
}