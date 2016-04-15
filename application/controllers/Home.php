<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->index_page();
	}
	
	public function index_page(){
		
		$data['title'] = 'Welcome to CC!';
		$data['page_header'] = 'Welcome to corper\'s compass!';
		
		$this->load->view('tpl_default/header',$data);
		$this->load->view('tpl_default/home',$data);
		$this->load->view('tpl_default/footer');
		}
		
	public function login(){
		
		$data['title'] = 'CC || Login page';
		
		$this->load->view('tpl_default/header',$data);
		$this->load->view('tpl_default/login');
		$this->load->view('tpl_default/footer');
		}
		
	public function validate_login(){
		
		$this->load->library('form_validation');
		
		//validaton rules
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		
		if($this->form_validation->run() === FALSE){
			
		$data['title'] = 'CC || Login';
		//$data['account_verified'] = 'Try again';
		
		$this->load->view('tpl_default/header',$data);
		$this->load->view('tpl_default/login',$data);
		$this->load->view('tpl_default/footer');
		
		}else{
			
			$this->load->model('membership_model');
			
			 $data['title'] = 'CC || Login';
			
			if($query = $this->membership_model->validate()){
				
				$data = array(
						'email' => $this->input->post('email'),
						'is_logged_in' => true
				);
				$this->session->set_userdata($data);
	           redirect('index.php/home/users');
			   			
				}else{
		
		$data['account_verified'] = 'Incorrect state code/password combination. Pls try again!';
		$this->load->view('tpl_default/header',$data);
		$this->load->view('tpl_default/login',$data);
		$this->load->view('tpl_default/footer');
					}
			
			}
		}
		
	public function signup(){
		
		$data['title'] = 'CC || Create Account';
		
		$this->load->view('tpl_default/header',$data);
		$this->load->view('tpl_default/create_account');
		$this->load->view('tpl_default/footer');
		}
		
    public function create_account(){
		
		$this->load->library('form_validation');
		
		//validaton rules
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('phone','Phone','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('state_of_deployment','State of Deployment','trim|required');
		$this->form_validation->set_rules('dob','Date Of Birth','trim|required');
		$this->form_validation->set_rules('pword','Password','trim|required|min_length[5]');
		$this->form_validation->set_rules('confirm_pword','Confirm Password','trim|required|matches[pword]');
		
		if($this->form_validation->run() === FALSE){
			
		$data['title'] = 'CC || Create Account';
		
		$this->load->view('tpl_default/header',$data);
		$this->load->view('tpl_default/create_account');
		$this->load->view('tpl_default/footer');
		
		}else{
			
			$this->load->model('membership_model');
			
			 $data['title'] = 'CC || Create Account';
			
			if($query = $this->membership_model->create_member()){
	           $data['account_created'] = 'Your account has been created. Please follow the link sent to your email to verify your account or '. anchor('index.php/home/login','click to login');
			  
			
		$this->load->view('tpl_default/header',$data);
		$this->load->view('tpl_default/create_account',$data);
		$this->load->view('tpl_default/footer');
			   			
				}else{
					
		$this->load->view('tpl_default/header',$data);
		$this->load->view('tpl_default/create_account');
		$this->load->view('tpl_default/footer');
					}
			
			}
		}
		
	public function check_if_email_exists($requested_email){
		
		$this->load->model('membership_model');
		
		$email_available = $this->membership_model->check_if_email_exists($requested_email);
		
		if($email_available){
			return TRUE;
			}else{
				return FALSE;
				}
		}
		
	public function users($action = false, $id = false){
		
		if($this->session->has_userdata('email')){
			
		switch($action){
			
			
			
			case 'profile': $this->profile($id);
			break;
			
			case 'update_profile': $this->update_profile($id);
			break;
			
			case 'join_ppa': $this->join_ppa($id);
			break;
			
			case 'join_cds': $this->join_cds($id);
			break;
			
			case 'view_ppa': $this->view_ppa();
			break;
			
			case 'view_cds': $this->view_cds();
			break;
			
			case 'del_ppa': $this->del_ppa($id);
			break;
			
			case 'del_cds': $this->del_cds($id);
			break;
			
			case 'change_password': $this->change_password();
			break;
			
			default: $this->fetch_user_ppa_data();
		  }
		}else{
			$this->index_page();
			}
	}
	
	public function view_ppa(){
			
			$this->load->model('membership_model');
			
			$data['title'] = 'Home::View PPA';
			$data['res_group'] = $this->membership_model->view_ppa('cc_ppa');
			
			$this->load->view('tpl_default/header',$data);
		    $this->load->view('tpl_default/view_ppa',$data);
		    $this->load->view('tpl_default/footer');
			}
			
	public function del_ppa($id){
			
			$this->load->model('membership_model');
			
			$data['del_ppa'] = $this->membership_model->del_ppa($id);
			
			$this->session->set_flashdata('del_ppa_msg', 'Deleted successfully!');	
		    redirect('index.php/home/users/profile');
			}
			
	public function del_cds($id){
			
			$this->load->model('membership_model');
			
			$data['del_cds'] = $this->membership_model->del_cds($id);
			
			$this->session->set_flashdata('del_cds_msg', 'Deleted successfully!');	
		    redirect('index.php/home/users/profile');
			}
			
			
	public function view_cds(){
			
			$this->load->model('membership_model');
			
			$data['title'] = 'Home::View CDS';
			$data['res_group'] = $this->membership_model->view_cds('cc_cds');
			
			$this->load->view('tpl_default/header',$data);
		    $this->load->view('tpl_default/view_cds',$data);
		    $this->load->view('tpl_default/footer');
			}
			
	public function profile($edit){
			
			$this->load->model('membership_model');
			
			$data['title'] = 'Home::Profile';
			$data['edit'] = $edit;
			$data['profile'] = $this->membership_model->profile();
			$data['get_user_ppa'] = $this->membership_model->get_user_ppa();
			$data['get_user_cds'] = $this->membership_model->get_user_cds();
			$data['ppa'] = $this->membership_model->get_user_joined_ppa();
			$data['cds'] = $this->membership_model->get_user_joined_cds();
			
			$this->load->view('tpl_default/header',$data);
		    $this->load->view('tpl_default/view_profile',$data);
		    $this->load->view('tpl_default/footer');
	       }
		   
   public function update_profile($field){
		
		$this->load->library('form_validation');
		
		//validaton rules
		$this->form_validation->set_rules(''.$field.'',''.ucfirst($field).'','trim|required');
		
		if($this->form_validation->run() === FALSE){
		
		$this->session->set_flashdata('message', 'Update not successfully!');	
		redirect('index.php/home/users/profile');
			
			}else{
			
			$this->load->model('membership_model');
			
			$query = $this->membership_model->update_profile($field);
			
			if($query){
				
				$this->session->set_flashdata('message', 'Updated successfully!');
	          redirect('index.php/home/users/profile');
			   			
				}else{
		
		$this->session->set_flashdata('message', 'Update not successfully!');	
		redirect('index.php/home/users/profile');
					}
			
			}
		}
		   
	public function join_ppa($id){
			
			$this->load->model('membership_model');
			
			$data['title'] = 'Home::Join PPA';
			$data['profile'] = $this->membership_model->join_ppa($id);
			$this->session->set_flashdata('joined_msg', 'Group joined successfully!');
			
			$this->view_ppa();
			
			}
	public function fetch_user_ppa_data(){
		
		$this->load->model('membership_model');
		$data['title'] = 'PPA';
		$data['user_ppa_data'] = $this->membership_model->fetch_user_ppa_data();
		
		$this->load->view('tpl_default/header',$data);
		$this->load->view('tpl_default/users',$data);
		$this->load->view('tpl_default/footer');
		}
			
	public function join_cds($id){
			
			$this->load->model('membership_model');
			
			$data['title'] = 'Home::Join CDS';
			$data['profile'] = $this->membership_model->join_cds($id);
			$this->session->set_flashdata('joined_msg', 'Group joined successfully!');
			
			$this->view_cds();
			
			}
			
	public function change_password(){
		
		$data['title'] = 'Change Password';
		$this->load->library('form_validation');
		
		//validaton rules
		$this->form_validation->set_rules('old_pword','Old Password','trim|required');
		$this->form_validation->set_rules('new_pword','New Password','trim|required|min_length[5]');
		$this->form_validation->
			set_rules('confirm_new_pword','Confirm New Password','trim|required|min_length[5]|matches[new_pword]');
		
		if($this->form_validation->run() === FALSE){
		
		$this->load->view('tpl_default/header',$data);
		$this->load->view('tpl_default/change_password',$data);
		$this->load->view('tpl_default/footer');
		
		}else{
			
			$this->load->model('membership_model');
			
			if($query = $this->membership_model->confirm_old_pword()){
				
				$this->membership_model->change_pword();
				
				//$this->session->set_userdata($data);
	           //redirect('index.php/home/users');
			    $data['account_verified'] = 'Password changed successfully!';
				$this->load->view('tpl_default/header',$data);
				$this->load->view('tpl_default/change_password',$data);
				$this->load->view('tpl_default/footer');
			   			
				}else{
		
		$data['account_verified'] = 'Incorrect Current Password!';
		$this->load->view('tpl_default/header',$data);
		$this->load->view('tpl_default/change_password',$data);
		$this->load->view('tpl_default/footer');
					}
			
			}
		}
	
	public function timeout(){
		
		$this->session->unset_userdata('email');
		
		$this->index_page();
		}
		
}
