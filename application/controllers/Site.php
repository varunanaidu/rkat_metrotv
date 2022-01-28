<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

	protected $table = ['tr_level1', 'tr_level2', 'tr_level3', 'tr_level4', 'tr_level5'];
	protected $primary = ['level1_id', 'level2_id', 'level3_id', 'level4_id', 'level5_id'];

	public function index()
	{
		if ( !$this->hasLogin() ) {
			redirect('site/login');
		}

		$this->fragment['js'] = [
			base_url('assets/vendor/chart.js/dist/Chart.min.js'),
			base_url('assets/vendor/chart.js/dist/Chart.extension.js'),
			base_url('assets/js/pages/main_page.js') 
		];

		$this->fragment['data_level1'] = $this->sitemodel->view("vw_level1", "*");

		$this->fragment['pagename'] = 'site/front/main_page.php';
		$this->load->view('layout/main-site', $this->fragment);
	}

	public function login()
	{
		if ( $this->hasLogin() ) { redirect(); }

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
		redirect('/');
	}

	public function get_data_chart()
	{
		$result = [];

		$labels = [];
		$temp_data = [];
		$check = $this->sitemodel->view("vw_level1", "*");
		if ( $check ) {
			foreach ($check as $row) {
				$labels[] = $row->action_plan_name;
				$temp_data[] = $row->level1_progress;
			}
		}

		$result['labels'] = $labels;
		$result['data'] = $temp_data;
		
		/*** Result Area ***/
		$this->response['type'] = 'done';
		$this->response['msg'] = $result;
		echo json_encode($this->response);
		exit;
	}

	public function details()
	{
		// echo json_encode($this->input->get());die;
		if ( !$this->hasLogin() ) {
			redirect('site/login');
		}

		$level_id = $this->input->get('i');
		$level = $this->input->get('l');

		$this->fragment['css'] = [
			base_url('assets/vendor/sweetalert2/dist/sweetalert2.min.css')
		];

		$this->fragment['js'] = [
			base_url('assets/vendor/chart.js/dist/Chart.min.js'),
			base_url('assets/vendor/chart.js/dist/Chart.extension.js'),
			base_url('assets/vendor/sweetalert2/dist/sweetalert2.min.js'),
			base_url('assets/vendor/jquery-form/jquery.form.min.js'), 
		];

		switch ($level) {
			case '1':
			array_push($this->fragment['js'], base_url('assets/js/pages/detail_page.js'));
			$this->fragment['level'] = 'level_2';
			$this->fragment['data_level_parent'] = $this->sitemodel->view("vw_level1", "*", ["level1_id"=>$level_id]);
			$this->fragment['data_level_child'] =  $this->sitemodel->view("vw_level2", "*", ["level1_id"=>$level_id]);
			$this->fragment['pagename'] = 'site/front/detail_page.php';
			break;
			case '2':
			array_push($this->fragment['js'], base_url('assets/js/pages/detail_page.js'));
			$this->fragment['level'] = 'level_3';
			$this->fragment['data_level_parent'] = $this->sitemodel->view("vw_level2", "*", ["level2_id"=>$level_id]);
			$this->fragment['data_level_child'] =  $this->sitemodel->view("vw_level3", "*", ["level2_id"=>$level_id]);
			$this->fragment['pagename'] = 'site/front/detail_page.php';
			break;
			case '3':
			array_push($this->fragment['js'], base_url('assets/js/pages/detail_page.js'));
			$this->fragment['level'] = 'level_4';
			$this->fragment['data_level_parent'] = $this->sitemodel->view("vw_level3", "*", ["level3_id"=>$level_id]);
			$this->fragment['data_level_child'] =  $this->sitemodel->view("vw_level4", "*", ["level3_id"=>$level_id]);
			$this->fragment['pagename'] = 'site/front/detail_page.php';
			break;
			case '4':
			array_push($this->fragment['js'], base_url('assets/js/pages/detail_page.js'));
			$this->fragment['level'] = 'level_5';
			$this->fragment['data_level_parent'] = $this->sitemodel->view("vw_level4", "*", ["level4_id"=>$level_id]);
			$this->fragment['data_level_child'] =  $this->sitemodel->view("vw_level5", "*", ["level4_id"=>$level_id]);
			$this->fragment['pagename'] = 'site/front/detail_page.php';
			break;
		}

		$this->load->view('layout/main-site', $this->fragment);
	}
	
	public function update_progress()
	{
		// echo json_encode($this->input->post());die;
		/*** Check POST or GET ***/
		if ( !$_POST ){$this->response['msg'] = "Invalid parameters.";echo json_encode($this->response);exit;}
		// PARAMS
		$level_progress 	= $this->input->post('level_progress');
		$level_notes 		= $this->input->post('level_notes');
		$id_parent 			= $this->input->post('id_parent');
		$id_child 			= $this->input->post('id_child');
		$level 				= $this->input->post('level');

		switch ($level) {
			case '2':
			$data = [
				'level2_progress'	=> $level_progress,
				'level2_notes'		=> $level_notes,
				'edited_by'			=> $this->log_user, 
				'edited_name'		=> $this->log_name, 
				'edited_date'		=> date('Y-m-d H:i:s'),
			];

			$this->sitemodel->update($this->table[1], $data, [$this->primary[1]=>$id_child]);

			$q1 = $this->sitemodel->custom_query(" SELECT FLOOR(SUM(level2_progress) / COUNT(*)) AS result FROM tr_level2 WHERE level1_id = ".$id_parent." ");
			foreach ($q1 as $row) {
				$data_parent = [
					'level1_progress' 	=> $row->result,
					'edited_by'			=> $this->log_user, 
					'edited_name'		=> $this->log_name, 
					'edited_date'		=> date('Y-m-d H:i:s'),
				];

				$this->sitemodel->update($this->table[0], $data_parent, [$this->primary[0]=>$id_parent]);
			}
			break;
			case '3':
			$data = [
				'level3_progress'	=> $level_progress,
				'level3_notes'		=> $level_notes,
				'edited_by'			=> $this->log_user, 
				'edited_name'		=> $this->log_name, 
				'edited_date'		=> date('Y-m-d H:i:s'),
			];

			$this->sitemodel->update($this->table[2], $data, [$this->primary[2]=>$id_child]);

			$q1 = $this->sitemodel->custom_query(" SELECT FLOOR(SUM(level3_progress) / COUNT(*)) AS result FROM tr_level3 WHERE level2_id = ".$id_parent." ");
			foreach ($q1 as $row) {
				$data_parent = [
					'level2_progress' 	=> $row->result,
					'edited_by'			=> $this->log_user, 
					'edited_name'		=> $this->log_name, 
					'edited_date'		=> date('Y-m-d H:i:s'),
				];

				$this->sitemodel->update($this->table[1], $data_parent, [$this->primary[1]=>$id_parent]);
			}
			break;
			case '4':
			$data = [
				'level4_progress'	=> $level_progress,
				'level4_notes'		=> $level_notes,
				'edited_by'			=> $this->log_user, 
				'edited_name'		=> $this->log_name, 
				'edited_date'		=> date('Y-m-d H:i:s'),
			];

			$this->sitemodel->update($this->table[3], $data, [$this->primary[3]=>$id_child]);

			$q1 = $this->sitemodel->custom_query(" SELECT FLOOR(SUM(level4_progress) / COUNT(*)) AS result FROM tr_level4 WHERE level3_id = ".$id_parent." ");
			foreach ($q1 as $row) {
				$data_parent = [
					'level3_progress' 	=> $row->result,
					'edited_by'			=> $this->log_user, 
					'edited_name'		=> $this->log_name, 
					'edited_date'		=> date('Y-m-d H:i:s'),
				];

				$this->sitemodel->update($this->table[2], $data_parent, [$this->primary[2]=>$id_parent]);
			}
			break;
			case '5':
			$data = [
				'level5_progress'	=> $level_progress,
				'level5_notes'		=> $level_notes,
				'edited_by'			=> $this->log_user, 
				'edited_name'		=> $this->log_name, 
				'edited_date'		=> date('Y-m-d H:i:s'),
			];

			$this->sitemodel->update($this->table[4], $data, [$this->primary[4]=>$id_child]);

			$q1 = $this->sitemodel->custom_query(" SELECT FLOOR(SUM(level5_progress) / COUNT(*)) AS result FROM tr_level5 WHERE level4_id = ".$id_parent." ");
			foreach ($q1 as $row) {
				$data_parent = [
					'level4_progress' 	=> $row->result,
					'edited_by'			=> $this->log_user, 
					'edited_name'		=> $this->log_name, 
					'edited_date'		=> date('Y-m-d H:i:s'),
				];

				$this->sitemodel->update($this->table[3], $data_parent, [$this->primary[3]=>$id_parent]);
			}
			break;
		}

		/*** Result Area ***/
		$this->response['type'] = 'done';
		$this->response['msg'] = "Successfully update progress.";
		echo json_encode($this->response);
		exit;
	}

	public function get_last_progress()
	{
		/*** Check POST or GET ***/
		if ( !$_POST ){$this->response['msg'] = "Invalid parameters.";echo json_encode($this->response);exit;}
		// PARAMS
		$id 	= $this->input->post('id');
		$level 	= $this->input->post('level');

		$progress = 0;

		switch ($level) {
			case '2':
			$q = $this->sitemodel->view('vw_level2', '*', ['level2_id'=>$id]);
			if ( $q ) {
				foreach ($q as $r) {
					$progress = $r->level2_progress;
				}
			}
			break;
			case '3':
			$q = $this->sitemodel->view('vw_level3', '*', ['level3_id'=>$id]);
			if ( $q ) {
				foreach ($q as $r) {
					$progress = $r->level3_progress;
				}
			}
			break;
			case '4':
			$q = $this->sitemodel->view('vw_level4', '*', ['level4_id'=>$id]);
			if ( $q ) {
				foreach ($q as $r) {
					$progress = $r->level4_progress;
				}
			}
			break;
			case '5':
			$q = $this->sitemodel->view('vw_level5', '*', ['level5_id'=>$id]);
			if ( $q ) {
				foreach ($q as $r) {
					$progress = $r->level5_progress;
				}
			}
			break;
		}

		/*** Result Area ***/
		$this->response['type'] = 'done';
		$this->response['msg'] = $progress;
		echo json_encode($this->response);
		exit;
	}

	public function get_progress_level_1()
	{
		$data = [];
		$check = $this->sitemodel->view('vw_level1', '*');
		if ( $check ) {
			foreach ($check as $row) {
				$temp = [];
				$temp['id'] = $row->level1_id;
				$temp['level1_progress'] = $row->level1_progress;
				$temp['labels'] = "Progress";
				$data[] = $temp;
			}
		}


		/*** Result Area ***/
		$this->response['type'] = 'done';
		$this->response['msg'] = $data;
		echo json_encode($this->response);
		exit;
	}

	public function get_progress_level_2()
	{
		$data = [];
		$level1_id = $this->input->post('level1_id');
		$check = $this->sitemodel->view('vw_level2', '*', ['level1_id'=>$level1_id]);
		foreach ($check as $row) {
			$temp = [];
			$temp['id'] = $row->level2_id;
			$temp['level2_progress'] = $row->level2_progress;
			$temp['labels'] = "Progress";
			$data[] = $temp;
		}


		/*** Result Area ***/
		$this->response['type'] = 'done';
		$this->response['msg'] = $data;
		echo json_encode($this->response);
		exit;
	}

	public function get_progress_level_3()
	{
		$data = [];
		$level2_id = $this->input->post('level2_id');
		$check = $this->sitemodel->view('vw_level3', '*', ['level2_id'=>$level2_id]);
		foreach ($check as $row) {
			$temp = [];
			$temp['id'] = $row->level3_id;
			$temp['level3_progress'] = $row->level3_progress;
			$temp['labels'] = "Progress";
			$data[] = $temp;
		}


		/*** Result Area ***/
		$this->response['type'] = 'done';
		$this->response['msg'] = $data;
		echo json_encode($this->response);
		exit;
	}

	public function get_progress_level_4()
	{
		$data = [];
		$level3_id = $this->input->post('level3_id');
		$check = $this->sitemodel->view('vw_level4', '*', ['level3_id'=>$level3_id]);
		foreach ($check as $row) {
			$temp = [];
			$temp['id'] = $row->level4_id;
			$temp['level4_progress'] = $row->level4_progress;
			$temp['labels'] = "Progress";
			$data[] = $temp;
		}


		/*** Result Area ***/
		$this->response['type'] = 'done';
		$this->response['msg'] = $data;
		echo json_encode($this->response);
		exit;
	}

	public function get_progress_level_5()
	{
		$data = [];
		$level4_id = $this->input->post('level4_id');
		$check = $this->sitemodel->view('vw_level5', '*', ['level4_id'=>$level4_id]);
		foreach ($check as $row) {
			$temp = [];
			$temp['id'] = $row->level5_id;
			$temp['level5_progress'] = $row->level5_progress;
			$temp['labels'] = "Progress";
			$data[] = $temp;
		}


		/*** Result Area ***/
		$this->response['type'] = 'done';
		$this->response['msg'] = $data;
		echo json_encode($this->response);
		exit;
	}
}
