<div class="form-style-9">
	<?php echo anchor('home/users', 'Back to home'); ?>
	<?php if(isset($message)): ?>
		<h3><?php echo $message ?></h3>
	<?php else: ?>
		<h3>Profile</h3>
	<?php endif; ?>
   <?php if($this->session->flashdata('message')): ?>
		<h3><?php echo $this->session->flashdata('message') ?></h3>
	<?php endif; ?>
 
  <table border="1" width="100%"> 
   <?php echo '<h6>'.validation_errors().'</h6>'; ?>  
    <tbody> 
    <?php if($profile){ ?>
    
    <!--  First Name -->
	  <tr>
        <td>First Name</td>
        <?php if($edit == 'first_name'): ?>
        <?php 
		echo form_open('home/users/update_profile/first_name');
		echo '<td>'.form_input('first_name',$profile->first_name).'</td>';
		echo '<td>'.form_submit('submit','update').'</td>';
		echo form_close();
		 ?>
        
        <?php else: ?>
        <td><?php echo $profile->first_name ?></td>
          <td><?php echo anchor('home/users/profile/first_name','edit') ?></td>
          <?php endif; ?>
      </tr>
      
      <!-- Last Name -->
       <tr>
        <td>Last Name</td>
         <?php if($edit == 'last_name'): ?>
        <?php 
		echo form_open('home/users/update_profile/last_name');
		echo '<td>'.form_input('last_name',$profile->last_name).'</td>';
		echo '<td>'.form_submit('submit','update').'</td>';
		echo form_close();
		 ?>
        
        <?php else: ?>
        <td><?php echo $profile->last_name ?></td>
          <td><?php echo anchor('home/users/profile/last_name','edit') ?></td>
          <?php endif; ?>
      </tr>
      
      <!-- State Code -->
       <tr>
        <td>State Code</td>
        <?php if($edit == 'state_code'): ?>
        <?php 
		echo form_open('home/users/update_profile/state_code');
		echo '<td>'.form_input('state_code',$profile->state_code).'</td>';
		echo '<td>'.form_submit('submit','update').'</td>';
		echo form_close();
		 ?>
        
        <?php else: ?>
        <td><?php echo $profile->state_code ?></td>
          <td><?php echo anchor('home/users/profile/state_code','edit') ?></td>
          <?php endif; ?>
      </tr>
      
      <!-- Date of Birth -->
       <tr>
        <td>Date of Birth</td>
        <?php if($edit == 'dob'): ?>
        <?php 
		echo form_open('home/users/update_profile/dob');
		echo '<td>'.form_input('dob',$profile->dob).'</td>';
		echo '<td>'.form_submit('submit','update').'</td>';
		echo form_close();
		 ?>
        
        <?php else: ?>
        <td><?php echo $profile->dob ?></td>
          <td><?php echo anchor('home/users/profile/dob','edit') ?></td>
          <?php endif; ?>
      </tr>
      
      <!-- Home Address -->
       <tr>
        <td>Home Address</td>
        <?php if($edit == 'home_address'): ?>
        <?php 
		echo form_open('home/users/update_profile/home_address');
		echo '<td>'.form_input('home_address',$profile->home_address).'</td>';
		echo '<td>'.form_submit('submit','update').'</td>';
		echo form_close();
		 ?>
        
        <?php else: ?>
        <td><?php echo $profile->home_address ?></td>
          <td><?php echo anchor('home/users/profile/home_address','edit') ?></td>
          <?php endif; ?>
      </tr>
      
      <!-- Residential Address -->
       <tr>
        <td>Residential Address</td>
        <?php if($edit == 'residential_address'): ?>
        <?php 
		echo form_open('home/users/update_profile/residential_address');
		echo '<td>'.form_input('residential_address',$profile->residential_address).'</td>';
		echo '<td>'.form_submit('submit','update').'</td>';
		echo form_close();
		 ?>
        
        <?php else: ?>
        <td><?php echo $profile->residential_address ?></td>
          <td><?php echo anchor('home/users/profile/residential_address','edit') ?></td>
          <?php endif; ?>
      </tr>
      
      <!-- State of Deployment -->
       <tr>
        <td>State of Deployment</td>
        <?php if($edit == 'state_of_deployment'): ?>
        <?php 
		echo form_open('home/users/update_profile/state_of_deployment');
		 $options = array(
        
        'Abuja' => 'Abuja',
        'Lagos' => 'Lagos',
        'Nasarawa' => 'Nasarawa',
        'Ibadan' => 'Ibadan',
		'default' => 'State of deployment'
);

  echo '<td>'.form_dropdown('state_of_deployment', $options, $profile->state_of_deployment).'</td>';
		echo '<td>'.form_submit('submit','update').'</td>';
		echo form_close();
		 ?>
        
        <?php else: ?>
        <td><?php echo $profile->state_of_deployment ?></td>
          <td><?php echo anchor('home/users/profile/state_of_deployment','edit') ?></td>
          <?php endif; ?>
      </tr>
      
      <!--  PPA -->
       <tr>
        <td>PPA</td>
        <?php if($edit == 'ppa'): ?>
        <?php 
		echo form_open('home/users/update_profile/ppa');
		 if($ppa == true):
    		foreach($ppa as $id):
			   $option[$id->id] = $id->ppa_name;
		 	endforeach;
         
		echo '<td>'.form_dropdown('ppa', $option, $profile->ppa).'</td>';
		echo '<td>'.form_submit('submit','update').'</td>';
		endif;
		echo form_close();
		 ?>
        <?php else: ?>
        <td>
		    <?php  if($profile->ppa == 0):
			          echo anchor('home/users/view_ppa','Please join a PPA');
					  else:
			  echo $get_user_ppa->ppa_name;
            endif;
			?>
            </td>
          <td><?php 
		   if(($profile->ppa != 0) || ($ppa == true)):
		  echo anchor('home/users/profile/ppa','edit');
		  endif;
		   ?></td>
          <?php endif; ?>
      </tr>
      
      <!-- CDS -->
       <tr>
        <td>CDS</td>
        <?php if($edit == 'cds'): ?>
        <?php 
		echo form_open('home/users/update_profile/cds');
		
		if($cds == true):
    		foreach($cds as $id):
			   $option[$id->id] = $id->cds_name;
		 	endforeach;
			
			echo '<td>'.form_dropdown('cds', $option, $profile->cds).'</td>';
		echo '<td>'.form_submit('submit','update').'</td>';
		endif;
		echo form_close();
		 ?>
        <?php else: ?>
        <td>
		<?php 
		 if($profile->cds == 0):
			          echo anchor('home/users/view_cds','Please join a CDS');
					  else:
			  echo $get_user_cds->cds_name;
            endif;
		 ?></td>
          <td><?php 
		  
		   if(($profile->cds != 0) || ($cds == true)):
		  echo anchor('home/users/profile/cds','edit');
		  endif;
		   ?></td>
          <?php endif; ?>
      </tr>
      
      <!-- Email -->
       <tr>
        <td>Email</td>
       
        <td><?php echo $profile->email ?></td>
          <td></td>
         
      </tr>
      
       <!-- Password -->
       <tr>
        <td>Password</td>
       
        <td><?php echo anchor('home/users/change_password','Change Password') ?></td>
          <td></td>
         
      </tr>
      
      <!-- Phone -->
       <tr>
        <td>Phone</td>
        <?php if($edit == 'phone'):?>
        <?php 
		echo form_open('home/users/update_profile/phone');
		echo '<td>'.form_input('phone',$profile->phone).'</td>';
		echo '<td>'.form_submit('submit','update').'</td>';
		echo form_close();
		 ?>
        
        <?php else:?>
        <td><?php echo $profile->phone ?></td>
          <td><?php echo anchor('home/users/profile/phone','edit') ?></td>
          <?php endif; ?>
      </tr>
      <?php }?>
    </tbody>
  </table>
  <br>
   <?php if($this->session->flashdata('del_ppa_msg')): ?>
		<h3><?php echo $this->session->flashdata('del_ppa_msg') ?></h3>
	<?php endif; ?>
    
    
    <table border="1" width="100%">
    <thead>
    <!-- Group [PPA] -->
      <tr>
        <td>Group(PPA)</td>
        <td></td>
      </tr>
    </thead> 
    <tbody> 
    <?php if($ppa == true): ?>
    <?php foreach($ppa as $id): ?>
	  <tr>
        <td><?php echo anchor('group/ppa/'.$id->id.'',$id->ppa_name) ?></td>
          <td><?php echo anchor('home/users/del_ppa/'.$id->id,'leave group') ?></td>
      </tr>
      <?php endforeach;?>
      <?php endif; ?>
    </tbody>
  </table>
  <br>
  
   <?php if($this->session->flashdata('del_cds_msg')): ?>
		<h3><?php echo $this->session->flashdata('del_cds_msg') ?></h3>
	<?php endif; ?>
    <table border="1" width="100%">
    <thead>
    <!-- Group [CDS] -->
      <tr>
        <td>Group(CDS)</td>
        <td></td>
      </tr>
    </thead> 
    <tbody> 
    <?php if($cds == true): ?>
    <?php foreach($cds as $id): ?>
	  <tr>
        <td><?php echo anchor('group/cds/'.$id->id,$id->cds_name) ?></td>
          <td><?php echo anchor('home/users/del_cds/'.$id->id,'leave group') ?></td>
      </tr>
      <?php endforeach;?>
      <?php endif; ?>
    </tbody>
  </table>
  		
 </div> 