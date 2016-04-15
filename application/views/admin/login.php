<div class="form-style-9">
  <h3><?php echo $message ?></h3>
  <?php
      echo validation_errors();
	
	  echo form_open('index.php/CC_Admin/validate_admin_login');
	  echo '<ul>';
  		echo '<li>';
	  echo form_input('username','','placeholder="Username" class="field-style field-full align-none"');
	  echo '</li>';
  echo '<li>';
	  echo form_password('password','','placeholder="Password" class="field-style field-full align-none"');
	  echo '</li>';
  echo '<li>';
	  echo form_submit('submitLogin','Login');
	  echo '</li>';
  echo '</ul>';
	  echo form_close();
	  echo '<br>';
	  
	  echo anchor('index.php/home', 'Back to home page');
  ?>
</div>