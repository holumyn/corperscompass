<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CC_Admin extends CI_Controller {

	public function index()
	{    
	    $this->admin_index();
	}
	
	public function admin_index(){
		
		$data['title'] = 'Administrator\'s Page';
	    $data['message'] = 'Welcome to the administrator\'s page';
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/login',$data);
		$this->load->view('admin/footer');
		}
		
	public function validate_admin_login(){
		
		$data['title'] = 'Administrators Page';
		$data['message'] = 'Welcome to the administrator\'s page';
		
		$this->load->library('form_validation');
		
		//validaton rules
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		
		if($this->form_validation->run() === FALSE){
			
		$this->load->view('admin/header',$data);
		$this->load->view('admin/login',$data);
		$this->load->view('admin/footer');
		
		}else{
			
			$this->load->model('admin_membership_model');
			
			 $data['title'] = 'Administrators page';
			
			if($query = $this->admin_membership_model->validate_admin()){
				
				$data = array(
						'username' => $this->input->post('username'),
						'is_logged_in' => true
				);
				$this->session->set_userdata($data);
	           redirect('index.php/cc_admin/dashboard');
			   			
				}else{
		
		$data['account_verified'] = 'Incorrect state code/password combination. Pls try again!';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/login',$data);
		$this->load->view('admin/footer');
					}
			
			}
		}
		
		public function dashboard($action = false){
			
			if($this->session->has_userdata('username')){
			
			switch($action){
			
			case 'add_ppa': $this->add_ppa();
			break;
			
			case 'add_cds': $this->add_cds();
			break;
			
			case 'add_saed': $this->add_saed();
			break;
			
			case 'view_ppa': $this->view_ppa();
			break;
			
			case 'view_cds': $this->view_cds();
			break;
			
			case 'view_saed': $this->view_saed();
			break;
			
			case 'create_ppa': $this->create_ppa();
			break;
			
			case 'create_cds': $this->create_cds();
			break;
			
			default:	$data['title'] = 'Admin Dashboard';
						$this->load->view('admin/header',$data);
						$this->load->view('admin/dashboard',$data);
						$this->load->view('admin/footer');
			
			}
			}else{
				$this->index();
			}
			}
		
		public function add_ppa(){
			
			$data['title'] = 'Dashboard: Add PPA';
			
			$this->load->view('admin/header',$data);
		    $this->load->view('admin/add_ppa',$data);
		    $this->load->view('admin/footer');
			}
			
		public function add_cds(){
			
			$data['title'] = 'Dashboard: Add CDS';
			
			$this->load->view('admin/header',$data);
		    $this->load->view('admin/add_cds',$data);
		    $this->load->view('admin/footer');
			}
			
		public function add_saed(){
			
			$data['title'] = 'Dashboard: Add SAED';
			
			$this->load->view('admin/header',$data);
		    $this->load->view('admin/add_saed',$data);
		    $this->load->view('admin/footer');
			}
			
		public function view_ppa(){
			
			$this->load->model('admin_membership_model');
			
			$data['title'] = 'Dashboard: View PPA';
			$data['res_group'] = $this->admin_membership_model->view_group('cc_ppa');
			
			$this->load->view('admin/header',$data);
		    $this->load->view('admin/view_ppa',$data);
		    $this->load->view('admin/footer');
			}
			
		public function view_cds(){
			
			$this->load->model('admin_membership_model');
			
			$data['title'] = 'Dashboard: View CDS';
			$data['res_group'] = $this->admin_membership_model->view_group('cc_cds');
			
			$this->load->view('admin/header',$data);
		    $this->load->view('admin/view_cds',$data);
		    $this->load->view('admin/footer');
			}
			
		public function view_saed(){
			
			$data['title'] = 'Dashboard: Add SAED';
			
			$this->load->view('admin/header',$data);
		    $this->load->view('admin/add_saed',$data);
		    $this->load->view('admin/footer');
			}
			
		public function create_ppa(){
			
			$this->load->library('form_validation');
			
			for($i=1; $i<=5; $i++){
				
			
			$ppa_name = 'ppa_name'.$i.'';
			$ppa_address = 'ppa_address'.$i.'';
			$state = 'state'.$i.'';
			$lg = 'lg'.$i.'';
			//validaton rules
			$this->form_validation->set_rules($ppa_name,'PPA'.$i.'','trim|required');
			$this->form_validation->set_rules($ppa_address,'PPA address'.$i.'','trim|required');
			$this->form_validation->set_rules($state,'State'.$i.'','trim|required');
			$this->form_validation->set_rules($lg,'LG'.$i.'','trim|required');
			
			
			if($this->form_validation->run() === FALSE){
				
			$data['title'] = 'CC || Create Account';
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/add_ppa');
			$this->load->view('admin/footer');
			break;
			
			}else{
				
				$this->load->model('admin_membership_model');
				
				 $data['title'] = 'CC || Create Account';
				
				if($query = $this->admin_membership_model->create_ppa($i)){
					
					if($i < 5){
						continue;
						}
				   $data['message'] = 'PPA added successfully!';
				  
				
			$this->load->view('admin/header',$data);
			$this->load->view('admin/add_ppa',$data);
			$this->load->view('admin/footer');
							
					}else{
						
			$this->load->view('admin/header',$data);
			$this->load->view('admin/add_ppa');
			$this->load->view('admin/footer');
						}
				   }
			   }
			}
			
		public function create_cds(){
			
			$this->load->library('form_validation');
			
			for($i=1; $i<=5; $i++){
				
			$cds_name = 'cds_name'.$i.'';
			
			//validaton rules
			$this->form_validation->set_rules($cds_name,'CDS'.$i.'','trim|required');
			
			if($this->form_validation->run() === FALSE){
				
			$data['title'] = 'CC || Create CDS';
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/add_cds');
			$this->load->view('admin/footer');
			break;
			
			}else{
				
				$this->load->model('admin_membership_model');
				
				 $data['title'] = 'CC || Create Account';
				
				if($query = $this->admin_membership_model->create_cds($i)){
					
					if($i < 5){
						continue;
						}
				   $data['message'] = 'CDS added successfully!';
				  
				
			$this->load->view('admin/header',$data);
			$this->load->view('admin/add_cds',$data);
			$this->load->view('admin/footer');
							
					}else{
						
			$this->load->view('admin/header',$data);
			$this->load->view('admin/add_cds');
			$this->load->view('admin/footer');
						}
				   }
			   }
			}
			
	 	public function admin_timeout(){
		
		$this->session->unset_userdata('username');
		$this->index();
		}
		
}
