<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gen_modul extends CI_Controller {

    public $dir_v = 'admin/gen_modul/';

    public function __construct(){
        parent::__construct();
        $this->m_auth->check_superadmin();
    }

    function index()
    {
        $data['js'] = array('src/js/admin/gen_modul.js');
        $data['dropdown_dir'] = $this->list_dir_ctrl();
        $this->l_skin->config($this->dir_v.'view', $data);
    }

    function filter_text_number($data)
    {
    	$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
        return preg_replace("/[^a-zA-Z0-9]/", "", $data);
    }

    function list_dir_ctrl()
    {
        $rootDir = 'app/controllers/';
        $list_dir = array_filter(glob($rootDir.'*'), 'is_dir');
        $directory = array();
        foreach ($list_dir as $d){
            $directory[] = str_replace($rootDir,'',$d);
        }
        return $directory;
    }

    public function check_dir_folder($data='')
    {
        $rootDir = 'app/controllers/';

        $list_dir = array_filter(glob($rootDir.'*'), 'is_dir');

        $result = NULL;
        foreach ($list_dir as $d){
            $directory = str_replace($rootDir,'',$d);
            if($directory == $data){
                $result .= $directory;
            }
        }
        return (is_null($result)) ? TRUE : FALSE;

    }

    function act_main_modul()
    {
        $this->form_validation->set_rules('folder_name1', 'Main Folder', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('file_name1', 'Main File', 'trim|required|min_length[4]');
        if ($this->form_validation->run() == FALSE){
			$notif['notif']  = validation_errors();
			$notif['status'] = 1;
			echo json_encode($notif);
		}else{

            $folder_name = strtolower(
                $this->filter_text_number(
                    $this->input->post('folder_name1')
                )
            );
            $file_name = strtolower(
                $this->filter_text_number(
                    $this->input->post('file_name1')
                )
            );

            if($this->check_dir_folder($folder_name)){
                $path1 = 'app/controllers/'.$folder_name;
                $path2 = 'app/views/'.$folder_name;
                $path3 = 'src/js/'.$folder_name;
                
                if(!is_dir($path1)){
                    mkdir($path1, 0777, true);
                }
                
                if(!is_dir($path2)){
                    mkdir($path2, 0777, true);
                }
                
                if(!is_dir($path3)){
                    mkdir($path3, 0777, true);
                }

                if(!is_dir($path2.'/'.$file_name)){
                    mkdir($path2.'/'.$file_name, 0777, true);
                }
                
                $dir_tpl = 'app/views/admin/gen_modul/';
                $dir_l   = 'app/libraries/';
                $dir_m   = 'app/models/';

                $tpl_controllers = $dir_tpl.'tpl_controllers.php';
                $new_c           = $path1.'/'.ucwords($file_name).'.php';
                copy($tpl_controllers, $new_c);

                $tpl_views = $dir_tpl.'tpl_views.php';
                $new_v     = $path2.'/'.$file_name.'/view.php';
                copy($tpl_views, $new_v);

                $tpl_models = $dir_tpl.'tpl_models.php';
                $new_m      = $dir_m.'M_'.$file_name.'.php';
                copy($tpl_models, $new_m);

                $tpl_libraries = $dir_tpl.'tpl_libraries.php';
                $new_l         = $dir_l.'L_'.$file_name.'.php';
                copy($tpl_libraries, $new_l);

                
                $tpl_javascript = $dir_tpl.'tpl_javascript.js';
                $new_j          = $path3.'/'.$file_name.'.js';
                copy($tpl_javascript, $new_j);

                $notif['notif']  = 'Main Modul dan Sub Modul baru berhasil dibuat !';
                $notif['status'] = 2;
            }else{
                $notif['notif']  = 'Nama folder sudah terdaftar !';
                $notif['status'] = 1;
            }
            echo json_encode($notif);
            
        }
    }

    function act_sub_modul()
    {
        $this->form_validation->set_rules('file_name2', 'Sub File', 'trim|required|min_length[4]');
        if ($this->form_validation->run() == FALSE){
			$notif['notif']  = validation_errors();
			$notif['status'] = 1;
			echo json_encode($notif);
		}else{
            $folder_name = strtolower(
                $this->filter_text_number(
                    $this->input->post('folder_name2')
                )
            );
            $file_name   = strtolower(
                $this->filter_text_number(
                    $this->input->post('file_name2')
                )
            );

            $path1 = 'app/controllers/'.$folder_name;
            $path2 = 'app/views/'.$folder_name;
            $path3 = 'src/js/'.$folder_name;

            if(!is_dir($path2.'/'.$file_name)){
                mkdir($path2.'/'.$file_name, 0777, true);
            }

            if(!is_dir($path3)){
                mkdir($path3, 0777, true);
            }

            $dir_tpl = 'app/views/admin/gen_modul/';

            $tpl_controllers = $dir_tpl.'tpl_controllers.php';
            $new_c           = $path1.'/'.ucwords($file_name).'.php';
            copy($tpl_controllers, $new_c);

            $tpl_views = $dir_tpl.'tpl_views.php';
            $new_v     = $path2.'/'.$file_name.'/view.php';
            copy($tpl_views, $new_v);

            $tpl_javascript = $dir_tpl.'tpl_javascript.js';
            $new_j          = $path3.'/'.$file_name.'.js';
            copy($tpl_javascript, $new_j);

            $notif['notif']  = 'Sub Modul baru berhasil dibuat !';
            $notif['status'] = 2;
            echo json_encode($notif);
        }
    }
    
}