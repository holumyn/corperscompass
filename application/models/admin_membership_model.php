<?php
class Admin_membership_model extends CI_Model{ 

  public function validate_admin(){
	  
	   $this->db->where('username',$this->input->post('username'));
	   $this->db->where('password',md5(sha1($this->input->post('password'))));
	 // $sql = "SELECT * FROM cc_users WHERE state_code = ? AND password = ?";
	  $query = $this->db->get('cc_admin');
	  
	  if($query->num_rows() == 1){
		  return true;
		  }
	  }
  
  public function create_ppa($i){
	  
	  $new_ppa_insert_data = array(
	    'ppa_name' => $this->input->post('ppa_name'.$i.''),
		'address' => $this->input->post('ppa_address'.$i.''),
		'state' => $this->input->post('state'.$i.''),
		'lg' => $this->input->post('lg'.$i.'')
		);
	  
	  $insert = $this->db->insert('cc_ppa', $new_ppa_insert_data);
	  return $insert;
	  
	  }
	  
  public function create_cds($i){
	  
	  $new_cds_insert_data = array('cds_name' => $this->input->post('cds_name'.$i.''));
	  
	  $insert = $this->db->insert('cc_cds', $new_cds_insert_data);
	  return $insert;
	  
	  }
	  
  public function view_group($group_tbl){
	  
	  $query = $this->db->get($group_tbl);
                return $query->result();
	  }
}
?>