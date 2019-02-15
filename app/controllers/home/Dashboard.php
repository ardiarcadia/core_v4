<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->m_auth->check_login();
	}

	function index()
	{
		// $data['head_title'] = '';
		// $data['head_subtitle'] = '';
		
		$data['icon_data'] = array(
			'Recruitment' 					=> array(
													'link' => site_url().'recruitment',
													'icon' => 'img/icon-hr/businessman-paper-of-the-application-for-a-job.png'
												),
			'Onboarding'					=> array(
													'link' => '#',
													'icon' => 'img/icon-hr/businessman-with-suitcase-opening-door.png'
												),
			'Performance Management'		=> array(
													'link' => '#',
													'icon' => 'img/icon-hr/businessman-discussing-a-progress-report.png'
												),
			'Benefits Administration'		=> array(
													'link' => '#',
													'icon' => 'img/icon-hr/dollar-sign-outline-with-arrows-pointing-to-left-and-right.png'
												),
			'Workforce Management'			=> array(
													'link' => '#',
													'icon' => 'img/icon-hr/business-male-team.png'
												),
			'Time And Attendance'			=> array(
													'link' => '#',
													'icon' => 'img/icon-hr/speedometer-with-businessman-image.png'
												),
			'Absence And Leave Management'	=> array(
													'link' => '#',
													'icon' => 'img/icon-hr/legal-document-with-valid-period.png'
												),
			'Learning And Development'		=> array(
													'link' => '#',
													'icon' => 'img/icon-hr/businessman-discussing-a-business-report.png'
												),
			'Talent Management'				=> array(
													'link' => '#',
													'icon' => 'img/icon-hr/businessman-close-up-with-a-recognition-medal.png'
												),
			'HR Analytics'					=> array(
													'link' => '#',
													'icon' => 'img/icon-hr/demographics-of-a-population.png'
												)
		);

		$data['sidebar_data'] = array(
			'Documentation' 			=> array(
											'link' => '#',
											'icon' => ''
										),
			'About HRIS'				=> array(
											'link' => '#',
											'icon' => ''
										),
			'Request New Users'			=> array(
											'link' => '#',
											'icon' => ''
										),
			'Request New Feature'		=> array(
											'link' => '#',
											'icon' => ''
										),
			'Request Reset Password'	=> array(
											'link' => '#',
											'icon' => ''
										),
			'Report Error/Bugs'			=> array(
											'link' => '#',
											'icon' => ''
										),
			'Contact Us'				=> array(
											'link' => '#',
											'icon' => ''
										)
		);

		$this->l_skin->main('home/dashboard', $data);
	}

}