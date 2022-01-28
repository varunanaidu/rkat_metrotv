<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

	public function index()
	{
		if ( !$this->hasLogin() ) {
			redirect('admsys/site/login');
		}

		$this->fragment['css'] = [
			base_url('assets/vendor/select2/dist/css/select2.min.css'),
			base_url('assets/vendor/sweetalert2/dist/sweetalert2.min.css'),
			base_url('assets/css/pages/site.css')
		];
		$this->fragment['js'] = [
			base_url('assets/vendor/select2/dist/js/select2.min.js'),
			base_url('assets/vendor/sweetalert2/dist/sweetalert2.min.js'),
			base_url('assets/vendor/jquery-form/jquery.form.min.js'),
			base_url('assets/js/pages/admin_page.js') 
		];

		$data_action_plan = [];
		$q_level1 = $this->sitemodel->view("vw_level1", "*");
		if ( $q_level1 ) {
			foreach ($q_level1 as $level1) {
				$data_level1 = [];
				$data_level2 = [];
				$data_level1['level1_id'] = $level1->level1_id;
				$data_level1['action_plan_name'] = $level1->action_plan_name;
				$q_level2 = $this->sitemodel->view("vw_level2", "*", ['level1_id'=>$level1->level1_id]);
				if ( $q_level2 ) {
					foreach ($q_level2 as $level2) {
						$temp = [];
						$data_level3 = [];
						$temp['level2_id'] 			= $level2->level2_id;
						$temp['action_plan_name'] 	= $level2->action_plan_name;
						$temp['dir_name'] 	= $level2->dir_name;
						$q_level3 = $this->sitemodel->view("vw_level3", "*", ['level2_id'=>$level2->level2_id]);
						if ( $q_level3 ) {
							foreach ($q_level3 as $level_3) {
								$temp2 = [];
								$data_level4 = [];
								$temp2['level3_id'] 	= $level_3->level3_id;
								$temp2['action_plan_name'] 	= $level_3->action_plan_name;
								$temp2['div_name'] 	= $level_3->div_name;
								$q_level4 = $this->sitemodel->view("vw_level4", "*", ['level3_id'=>$level_3->level3_id]);
								if ( $q_level4 ) {
									foreach ($q_level4 as $level_4) {
										$temp3 = [];
										$data_level5 = [];
										$temp3['level4_id'] 	= $level_4->level4_id;
										$temp3['action_plan_name'] 	= $level_4->action_plan_name;
										$temp3['dept_name'] 	= $level_4->dept_name;
										$q_level5 = $this->sitemodel->view("vw_level5", "*", ['level4_id'=>$level_4->level4_id]);
										if ( $q_level5 ) {
											foreach ($q_level5 as $level_5) {
												$temp4 = [];
												$temp4['level5_id'] 	= $level_5->level5_id;
												$temp4['action_plan_name'] 	= $level_5->action_plan_name;
												$data_level5[] = $temp4;
											}
										}
										$temp3['level5'] = $data_level5;
										$data_level4[] = $temp3;
									}
								}
								$temp2['level4'] = $data_level4;
								$data_level3[] = $temp2;
							}
						}
						$temp['level3'] = $data_level3;
						$data_level2[] = $temp;
					}
				}
				$data_level1['level2'] = $data_level2;
				$data_action_plan[] = $data_level1;
			}
		}

		// echo json_encode($data_action_plan);die;

		$this->fragment['data_action'] = $data_action_plan;
		$this->fragment['pagename'] = 'site/management-system/admin_page.php';
		$this->load->view('layout/main-site', $this->fragment);
	}

	public function login()
	{
		if ( $this->hasLogin() ) { redirect('admsys'); }

		$this->fragment['css'] = [
			base_url('assets/vendor/sweetalert2/dist/sweetalert2.min.css')
		];

		$this->fragment['js'] = [
			base_url('assets/vendor/sweetalert2/dist/sweetalert2.min.js'),
			base_url('assets/js/pages/main_page.js') 
		];

		$this->fragment['pagename'] = 'site/login_page.php';
		$this->load->view('layout/main-site', $this->fragment);
	}

	public function signin()
	{
		if ( !$_POST ){$this->response['msg'] = "Invalid parameters.";echo json_encode($this->response);exit;}

		$user_name = trim($this->input->post('user_name'));
		$user_pass = md5($this->input->post('user_pass'));

		if ( empty($user_name) ) {$this->response['type'] = "Failed";$this->response['msg'] = "Please input a valid username";echo json_encode($this->response);exit;}
		if ( empty($user_pass) ) {$this->response['type'] = "Failed";$this->response['msg'] = "Please input a valid password";echo json_encode($this->response);exit;}

		$res = $this->sitemodel->view('tab_user', '*', ['user_name'=>$user_name]);

		if ($res) {
			$pwd = '';
			$data_sess = array();

			foreach ($res as $row) {
				$data_sess['log_user'] = $row->user_id;
				$data_sess['log_name'] = $row->user_name;
				$pwd = $row->user_pass;
			}

			if ($user_pass !== $pwd) {
				$this->response['type'] = "Failed";
				$this->response['msg'] = "Wrong Password";
				echo json_encode($this->response);
				exit;
			}

			$this->session->set_userdata(SESS, (object)$data_sess);
			
			$this->response['type'] = 'done';
			$this->response['msg'] = "Successfully login.";
			echo json_encode($this->response);

		}else{
			$this->response['type'] = "Failed";
			$this->response['msg'] = "No Data Found";
			echo json_encode($this->response);
			exit;
		}
	}

	public function signout()
	{
		$this->session->sess_destroy();
		redirect('admsys');
	}

	public function get_level_name()
	{
		/*** Check POST or GET ***/
		if ( !$_POST ){$this->response['msg'] = "Invalid parameters.";echo json_encode($this->response);exit;}
		// PARAMS
		$check = [];
		$check2 = [];
		$level 	= $this->input->post('key');
		switch ($level) {
			case '2':
			$q1 = $this->sitemodel->view("tab_directorate", "*");
			if ( $q1 ) {
				foreach ($q1 as $r1) {
					$temp = [];
					$temp['value'] = $r1->dir_id;
					$temp['text'] = $r1->dir_name;
					$check[] = $temp;
				}
			}
			$q2 = $this->sitemodel->view("vw_level1", "*");
			if ( $q2 ) {
				foreach ($q2 as $r2) {
					$temp2 = [];
					$temp2['value'] = $r2->level1_id;
					$temp2['text'] = $r2->action_plan_name;
					$check2[] = $temp2;
				}
			}
			break;
			case '3':
			$q1 = $this->sitemodel->view("tab_division", "*");
			if ( $q1 ) {
				foreach ($q1 as $r1) {
					$temp = [];
					$temp['value'] = $r1->div_id;
					$temp['text'] = $r1->div_name;
					$check[] = $temp;
				}
			}
			$q2 = $this->sitemodel->view("vw_level2", "*");
			if ( $q2 ) {
				foreach ($q2 as $r2) {
					$temp2 = [];
					$temp2['value'] = $r2->level2_id;
					$temp2['text'] = $r2->action_plan_name;
					$check2[] = $temp2;
				}
			}
			break;
			case '4':
			$q1 = $this->sitemodel->view("tab_department", "*");
			if ( $q1 ) {
				foreach ($q1 as $r1) {
					$temp = [];
					$temp['value'] = $r1->dept_id;
					$temp['text'] = $r1->dept_name;
					$check[] = $temp;
				}
			}
			$q2 = $this->sitemodel->view("vw_level3", "*");
			if ( $q2 ) {
				foreach ($q2 as $r2) {
					$temp2 = [];
					$temp2['value'] = $r2->level3_id;
					$temp2['text'] = $r2->action_plan_name;
					$check2[] = $temp2;
				}
			}
			break;
			case '5':
			$q2 = $this->sitemodel->view("vw_level4", "*");
			if ( $q2 ) {
				foreach ($q2 as $r2) {
					$temp2 = [];
					$temp2['value'] = $r2->level4_id;
					$temp2['text'] = $r2->action_plan_name;
					$check2[] = $temp2;
				}
			}
			break;
		}

		/*** Result Area ***/
		$this->response['type'] = 'done';
		$this->response['msg'] = $check;
		$this->response['msg2'] = $check2;
		echo json_encode($this->response);
		exit;
	}

	public function save()
	{
		/*** Check POST or GET ***/
		if ( !$_POST ){$this->response['msg'] = "Invalid parameters.";echo json_encode($this->response);exit;}
		// PARAMS
		// echo json_encode($this->input->post());die;
		$action_plan_name = $this->input->post('action_plan_name');
		$action_plan_goal = $this->input->post('action_plan_goal');

		$data_action_plan = [
			'action_plan_name'	=> $action_plan_name,
			'action_plan_goal'	=> $action_plan_goal,
			'create_by'			=> $this->log_user, 
			'create_name'		=> $this->log_name, 
			'create_date'		=> date('Y-m-d H:i:s'),
			'edited_by'			=> $this->log_user, 
			'edited_name'		=> $this->log_name, 
			'edited_date'		=> date('Y-m-d H:i:s'),
		];

		$action_plan_id = $this->sitemodel->insert('tab_action_plan', $data_action_plan);

		$level = $this->input->post('level');

		switch ($level) {
			case '1':
			$data = [
				'action_plan_id'	=> $action_plan_id,
				'level1_progress'	=> 0,
				'level1_notes'		=> '',
				'create_by'			=> $this->log_user, 
				'create_name'		=> $this->log_name, 
				'create_date'		=> date('Y-m-d H:i:s'),
				'edited_by'			=> $this->log_user, 
				'edited_name'		=> $this->log_name, 
				'edited_date'		=> date('Y-m-d H:i:s'),
			];
			$res = $this->sitemodel->insert('tr_level1', $data);
			break;
			case '2':
			$data = [
				'level1_id'			=> $this->input->post('parent_plan'),
				'action_plan_id'	=> $action_plan_id,
				'level2_progress'	=> 0,
				'level2_notes'		=> '',
				'dir_id'			=> $this->input->post('level_name'),
				'create_by'			=> $this->log_user, 
				'create_name'		=> $this->log_name, 
				'create_date'		=> date('Y-m-d H:i:s'),
				'edited_by'			=> $this->log_user, 
				'edited_name'		=> $this->log_name, 
				'edited_date'		=> date('Y-m-d H:i:s'),
			];
			$res = $this->sitemodel->insert('tr_level2', $data);
			break;
			case '3':
			$data = [
				'level2_id'			=> $this->input->post('parent_plan'),
				'action_plan_id'	=> $action_plan_id,
				'level3_progress'	=> 0,
				'level3_notes'		=> '',
				'div_id'			=> $this->input->post('level_name'),
				'create_by'			=> $this->log_user, 
				'create_name'		=> $this->log_name, 
				'create_date'		=> date('Y-m-d H:i:s'),
				'edited_by'			=> $this->log_user, 
				'edited_name'		=> $this->log_name, 
				'edited_date'		=> date('Y-m-d H:i:s'),
			];
			$res = $this->sitemodel->insert('tr_level3', $data);
			break;
			case '4':
			$data = [
				'level3_id'			=> $this->input->post('parent_plan'),
				'action_plan_id'	=> $action_plan_id,
				'level4_progress'	=> 0,
				'level4_notes'		=> '',
				'dept_id'			=> $this->input->post('level_name'),
				'create_by'			=> $this->log_user, 
				'create_name'		=> $this->log_name, 
				'create_date'		=> date('Y-m-d H:i:s'),
				'edited_by'			=> $this->log_user, 
				'edited_name'		=> $this->log_name, 
				'edited_date'		=> date('Y-m-d H:i:s'),
			];
			$res = $this->sitemodel->insert('tr_level4', $data);
			break;
			case '5':
			$data = [
				'level4_id'			=> $this->input->post('parent_plan'),
				'action_plan_id'	=> $action_plan_id,
				'level5_progress'	=> 0,
				'level5_notes'		=> '',
				'create_by'			=> $this->log_user, 
				'create_name'		=> $this->log_name, 
				'create_date'		=> date('Y-m-d H:i:s'),
				'edited_by'			=> $this->log_user, 
				'edited_name'		=> $this->log_name, 
				'edited_date'		=> date('Y-m-d H:i:s'),
			];
			$res = $this->sitemodel->insert('tr_level5', $data);
			break;
		}
		/*** Result Area ***/
		$this->response['type'] = 'done';
		$this->response['msg'] = "Successfully add action plan";
		echo json_encode($this->response);
		exit;
	}
	
}
