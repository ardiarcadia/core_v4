<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_auth extends CI_Model {
	public function __construct(){
            parent::__construct();
	}

	function get_session($id)
	{
		$data = array(
			'log' => $this->session->userdata('sess_log'),
			'id' => $this->session->userdata('sess_id'),
			'name' => $this->session->userdata('sess_name'),
            'level' => $this->session->userdata('sess_level'),
			'avatar' => $this->session->userdata('sess_avatar')
		);
		return $data[$id];
	}

    function avatar()
    {
        if(empty($this->session->userdata('sess_avatar'))){
            return base_url('img/noimage.png');
        }else{
            return base_url($this->session->userdata('sess_avatar'));
        }
    }

    // HAK AKSES CONTROLLERS
	function check_login(){
		if(empty($this->session->userdata('sess_log'))){redirect(base_url());}
	}

    function check_superadmin(){
        if($this->session->userdata('sess_level') != 1){redirect(base_url());}
    }

	// HAK AKSES MENU
    function check_akses()
    {
		if($this->get_session('log') == TRUE){
			$uri = $this->uri->segment(1).'/'.$this->uri->segment(2);
			$LevelUser = $this->session->userdata('sess_level');
			$query_menu = $this->db->query('SELECT id_menu FROM conf_menu WHERE status=1 AND sub=1 AND link="'.$uri.'" AND level LIKE "%'.$LevelUser.'%" LIMIT 1');
			$query_sub = $this->db->query('SELECT id_submenu FROM conf_submenu WHERE status=1 AND link="'.$uri.'" AND level LIKE "%'.$LevelUser.'%" LIMIT 1');
			if($query_menu->num_rows() < 1) {
				if($query_sub->num_rows() < 1) {
					redirect(base_url());
				}
			}
		}else{
			redirect(base_url());
		}
	}

	// TOKEN CSRF
    function gen_token()
    {
    	$token = $this->l_help->rand_str1(5, FALSE);
    	$this->session->set_tempdata('datatoken', $token, 3600);
    	return '<input type="hidden" name="datatoken" value="'.base64_encode($token).'">';
    }

    function check_token($token)
    {
    	$data_token = base64_decode($token);
    	$sess_token = $this->session->tempdata('datatoken');
    	if($data_token === $sess_token){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    	$this->session->unset_tempdata('datatoken');
    }

    function menu_sidebar()
    {
        $LevelUser = $this->session->userdata('sess_level');
        $query_menu = $this->db->query('SELECT * FROM conf_menu WHERE akses=1 AND status=1 AND level LIKE "%'.$LevelUser.'%" ORDER BY position ASC');
        $query_sub = $this->db->query('SELECT * FROM conf_submenu WHERE status=1 AND level LIKE "%'.$LevelUser.'%" ORDER BY position ASC');
        if ($query_menu->num_rows() > 0)
        {
            foreach ($query_menu->result() as $menu)
            {
                if($menu->sub == 2){
                    echo '<li><a href="javascript:;" data-sidenav-dropdown-toggle><span class="sidenav-link-icon"><i class="fa '.$menu->icon.'"></i></span><span class="sidenav-link-title">'.$menu->name.'</span><span class="sidenav-dropdown-icon show" data-sidenav-dropdown-icon><i class="fa fa-angle-down"></i></span><span class="sidenav-dropdown-icon" data-sidenav-dropdown-icon><i class="fa fa-angle-up"></i></span></a>'."\n";
                    echo '<ul class="sidenav-dropdown" data-sidenav-dropdown>';
                    foreach ($query_sub->result() as $sub)
                    {
                        if($menu->id_menu == $sub->id_menu)
                        {
                            echo '<li><a href="'.site_url().$sub->link.'"><i class="fa '.$sub->icon.'"></i>&nbsp;&nbsp;'.$sub->name.'</a></li>'."\n";
                        }
                    }
                    echo '</ul></li>';
                }else{
                    echo '<li><a href="'.site_url().$menu->link.'"><span class="sidenav-link-icon"><i class="fa '.$menu->icon.'"></i></span><span class="sidenav-link-title">'.$menu->name.'</span></a></li>';
                }
            }
        }
        else{ return NULL; }
    }

    function akses_menu_rekrutment($flag)
    {
        $user_level = $this->session->userdata('sess_id');

		$modul['0'] 	= array(1,2,3,4,5,6,7,8); //modul checking
		$modul['1'] 	= array(1,2,3,4,5); //modul registrasi
		$modul['2'] 	= array(1,6,7); //modul jadwal
		$modul['3']	 	= array(1,6,7); //modul sms
        $modul['4']	 	= array(1,2,3,4,5,6,7,8,9,10); //modul proses

        $modul['5']     = array(1,2,3,4,5); //proses verif
        $modul['6']     = array(1,7); //proses tes tulis
        $modul['7']     = array(1,7); //proses tes alat
        $modul['8']     = array(1,6,7); //proses interview
        $modul['9']     = array(1,8); //proses mcu
        $modul['10']    = array(1,8); //proses registrasi

        $modul['11']    = array(1,3,2); // Menu proses tabs untuk superadmin dan admin saja

        $modul['12']    = array(1,6,7,8); // Menu WO
        return (in_array($user_level, $modul[$flag])) ? TRUE : FALSE;

    }

}