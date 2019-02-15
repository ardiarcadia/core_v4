<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl extends CI_Controller {

    public $dir_v = 'main/sub/';

    public function __construct(){
        parent::__construct();
        $this->m_auth->check_login();
        $this->load->model('m_model');
        $this->load->library('l_libraries');
    }

    function index()
    {
        $data['css'] = array();
        $data['js'] = array();
        $data['panel'] = '<i class="fa fa-laptop"></i> &nbsp;<b>Title Panel</b>';
        $this->l_skin->main($this->dir_v.'view', $data);
    }
}