<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backup_db extends CI_Controller {

	public $dir_v = 'admin/backup/';

	public function __construct(){
		parent::__construct();
		$this->m_auth->check_superadmin();
	}

	function index()
	{
		$this->l_skin->config($this->dir_v.'view');
	}

	function backup_db_apps()
	{
		// date_default_timezone_set('UTC');
		// $this->load->dbutil();
        // $config = array(
        // 	'tables'	=> array('apps_attach', 'apps_batch', 'apps_perusahaan', 'apps_master', 'apps_proses'),
		// 	'format'	=> 'zip',            
		// 	'filename'	=> 'db_kitas_apps.sql'
		// );
        // $backup = $this->dbutil->backup($config);
        // $nama_database = 'backup_db_kitas_apps_'.gmdate('Ymdhis', time()+60*60*7).'.zip';
        // $this->load->helper('download');
        // force_download($nama_database, $backup);
	}

	function backup_db_tbl()
	{
		// date_default_timezone_set('UTC');
		// $this->load->dbutil();
        // $config = array(
        // 	'tables'	=> array('tbl_config', 'tbl_icon', 'tbl_level', 'tbl_menu', 'tbl_sub_menu', 'tbl_users'),
		// 	'format'	=> 'zip',
		// 	'filename'	=> 'db_kitas_tbl.sql'
		// );
        // $backup = $this->dbutil->backup($config);
        // $nama_database = 'backup_db_kitas_tbl_'.gmdate('Ymdhis', time()+60*60*7).'.zip';
        // $this->load->helper('download');
        // force_download($nama_database, $backup);
	}

	function backup_db_all()
	{
		date_default_timezone_set('UTC');
		$this->load->dbutil();
        $config = array(
			'format'	=> 'zip',
			'filename'	=> 'db_hris.sql'
		);
        $backup = $this->dbutil->backup($config);
        $nama_database = 'backup_db_hris_'.gmdate('Ymdhis', time()+60*60*7).'.zip';
        $this->load->helper('download');
        force_download($nama_database, $backup);
	}

	function suggest_jabatan()
	{
		// $get_all = $this->db->query('SELECT jabatan FROM apps_master GROUP BY jabatan');
		// $json_file = array();
		// foreach ($get_all->result() as $val) {
		// 	$json_file[] = array(
		// 		'value' => strtoupper($this->lib_core->FilterText($val->jabatan))
		// 	);
		// }
		// $this->load->helper('file');
		// if( ! write_file('./lib/json/suggest_jabatan.json', json_encode($json_file))){
		// 	$notif = '<script>alert("Failed : Unable to write the file");</script>';
		// }else{
		// 	$notif = '<script>alert("File written success !");</script>';
		// }
		// echo $notif;
		// redirect('admin/backup_db', 'refresh');
	}

}