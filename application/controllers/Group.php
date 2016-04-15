<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {
	
	function ppa($id){
		
		$this->load->model('membership_model');
		$data['title'] = 'PPA';
		$data['grp_ppa'] = $this->membership_model->view_grp_ppa($id);
		
		$this->load->view('tpl_default/header',$data);
		$this->load->view('tpl_default/view_group');
		$this->load->view('tpl_default/footer');
		}
		
	function cds($id){
		
		$this->load->model('membership_model');
		$data['title'] = 'CDS';
		$data['grp_cds'] = $this->membership_model->view_grp_cds($id);
		
		$this->load->view('tpl_default/header',$data);
		$this->load->view('tpl_default/view_group');
		$this->load->view('tpl_default/footer');
		}
	function fetch_user_ppa_data(){
		
		$this->load->model('membership_model');
		$data['title'] = 'PPA';
		$data['user_ppa_data'] = $this->membership_model->fetch_user_ppa_data();
		
		$this->load->view('tpl_default/header',$data);
		$this->load->view('tpl_default/users',$data);
		$this->load->view('tpl_default/footer');
		}
		
}
