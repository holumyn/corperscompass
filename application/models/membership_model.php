<?php
class Membership_model extends CI_Model{ 

  public function validate(){
	  
	   $this->db->where('email',$this->input->post('email'));
	   $this->db->where('password',md5(sha1($this->input->post('password'))));
	 // $sql = "SELECT * FROM cc_users WHERE state_code = ? AND password = ?";
	  $query = $this->db->get('cc_users');
	  
	  if($query->num_rows() == 1){
		  return true;
		  }
	  }
	  
   public function confirm_old_pword(){
	  
	   $this->db->where('email',$this->session->email);
	   $this->db->where('password',md5(sha1($this->input->post('old_pword'))));
	 // $sql = "SELECT * FROM cc_users WHERE state_code = ? AND password = ?";
	  $query = $this->db->get('cc_users');
	  
	  if($query->num_rows() == 1){
		  return true;
		  }
	  }
	  
	 public function change_pword(){
	  
	   $this->db->where('email',$this->session->email);
	   $query = $this->db->update('cc_users',array('password' => md5(sha1($this->input->post('new_pword')))));
	  
	  if($query){
		  return true;
		  }
	  }
  
  public function create_member(){
	  
	  $new_member_insert_data = array(
	    'first_name' => $this->input->post('first_name'),
		'last_name' => $this->input->post('last_name'),
		'phone' => $this->input->post('phone'),
		'email' => $this->input->post('email'),
		'state_of_deployment' => $this->input->post('state_of_deployment'),
		'dob' => $this->input->post('dob'),
		'password' => md5(sha1($this->input->post('pword')))
		);
	  
	  $insert = $this->db->insert('cc_users', $new_member_insert_data);
	  return $insert;
	  
	  }
	  
	public function profile(){
	  
	  $query = $this->db->get_where('cc_users',array('email' => $this->session->email));
	            return $query->row();
	  }
	  
	 
	 public function update_profile($field){
	  
	   $this->db->where('email',$this->session->email);
	   $query = $this->db->update('cc_users',array($field => $this->input->post($field)));
	  
	  if($query){
		  return true;
		  }
	  }
	  
	 
	 public function get_user_joined_ppa(){
	  
	  $query = $this->db->get_where('cc_users_join_ppa',array('user_id' => $this->session->email));
	    return $this->get_ppa($query->result());
	           
	  }
	  
	  public function fetch_user_ppa_data(){
		  
		  
		    $query = $this->db->get_where('cc_ppa_data',array('id' => 2));
		    return $query->result();
		 
		  }
	  
	 
	  
	  public function get_ppa($ppa_id = false){
	          
			  if($ppa_id === false){
				  $query = $this->db->get('cc_ppa');
				   return $query->result();
				  }else{
			  foreach($ppa_id as $id):
			  	$query = $this->db->get_where('cc_ppa',array('id' => $id->ppa_id));
	          	$res_array[] =  $query->row();
			  endforeach;
			    if(isset($res_array)):
			  	return $res_array;
				else:
				return false;
				endif;
				  }
		  }
		  
	public function get_user_ppa(){
		
		$user_data = $this->profile();
		$user_ppa_id = $this->db->get_where('cc_ppa',array('id' => $user_data->ppa));
		return $user_ppa_id->row();
		
		}
	public function get_user_cds(){
		
		$user_data = $this->profile();
		$user_cds_id = $this->db->get_where('cc_cds',array('id' => $user_data->cds));
		return $user_cds_id->row();
		
		}
		  
	 public function view_ppa($group_tbl){
	  
	    $res_array = $this->get_user_joined_ppa();
		if($res_array == true){
	    foreach($res_array as $res){
	      $joined_ppa[] = $res->id; 
		}
	      $this->db->where_not_in('id',$joined_ppa);
		}
	    $query = $this->db->get($group_tbl);
	    return $query->result(); 
		
	  }
	  
	 public function view_grp_ppa($id){
		 
		 $this->db->where('id',$id);
		 $query = $this->db->get('cc_ppa');
	    return $query->row(); 
		 }
		 
	 public function view_grp_cds($id){
		 
		 $this->db->where('id',$id);
		 $query = $this->db->get('cc_cds');
	    return $query->row(); 
		 }
		  
	 
		  
	 public function get_user_joined_cds(){
	  
	  $query = $this->db->get_where('cc_users_join_cds',array('user_id' => $this->session->email));
	    return $this->get_cds($query->result());
	           
	  }
	  
	  public function get_cds($cds_id){
	          
			  foreach($cds_id as $id):
			  	$query = $this->db->get_where('cc_cds',array('id' => $id->cds_id));
	          	$res_array[] =  $query->row();
			  endforeach;
			  	 if(isset($res_array)):
			  	return $res_array;
				else:
				return false;
				endif;
		  }
	 
	  
	   public function del_ppa($id){
	  
	    $query = $this->db->delete('cc_users_join_ppa', array('ppa_id' => $id));
	    if($query)
		return true; 
                
	  }
	  
	  public function del_cds($id){
	  
	    $query = $this->db->delete('cc_users_join_cds', array('cds_id' => $id));
	    if($query)
		return true; 
                
	  }
	  
	   public function view_cds($group_tbl){
	  
	    $res_array = $this->get_user_joined_cds();
		if($res_array == true){
	    foreach($res_array as $res):
	      $joined_cds[] = $res->id; 
	  	endforeach;
	      $this->db->where_not_in('id',$joined_cds);
		}
	    $query = $this->db->get($group_tbl);
	    return $query->result();
		
		}
	  
	  public function join_ppa($id){
	  
	  $new_join_ppa_insert_data = array(
	    'user_id' => $this->session->email,
		'ppa_id' => $id
		);
	  
	  $insert = $this->db->insert('cc_users_join_ppa', $new_join_ppa_insert_data);
	  return $insert;
	     
	  }
	  
	  public function join_cds($id){
	  
	  $new_join_cds_insert_data = array(
	    'user_id' => $this->session->email,
		'cds_id' => $id
		);
	  
	  $insert = $this->db->insert('cc_users_join_cds', $new_join_cds_insert_data);
	  return $insert;
	     
	  }
}
?>