<div class="form-style-9">
<?php if(isset($account_verified)){ ?>
	<h3><?php echo $account_verified; ?></h3>
<?php	}else{ ?>
  <h3>Change Password</h3>
<?php } ?>
<?php
  echo validation_errors();
 
  echo form_open('home/users/change_password');
   echo '<ul>';
   echo '<li>';
  echo form_input('old_pword',set_value('old_pword'),'placeholder="Enter Current Password" class="field-style field-full align-none"');
  echo '</li>';
  echo '<li>';
  echo form_password('new_pword','','placeholder="Enter New Password" class="field-style field-full align-none"').'<br>';
  echo '</li>';
  echo '<li>';
  echo form_password('confirm_new_pword','','placeholder="Confirm New Password" class="field-style field-full align-none"').'<br>';
  echo '</li>';
  echo '<li>';
  echo form_submit('submit','Change');
  echo '</li>';
  echo '</ul>';
  echo form_close();
  echo '<br>';
  
  echo anchor('home/users', 'Back to home');
  echo '<br>';
?>
</div>