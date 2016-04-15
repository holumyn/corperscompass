<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12">
      <div class="form-style-9">
  
<?php if(isset($account_verified)){ ?>
   <div class="alert alert-danger login-alert">
	<?php echo $account_verified; ?>
    </div>
<?php	}else{ ?>
   
  <h3>
  <img src="<?php echo base_url();?>img/logo.jpg" class="img-rounded login-logo" alt="Cinque Terre" width="60px" height="60px">
  Please login
  </h3>
<?php } ?>
<?php echo validation_errors(); ?>
<?php
  echo form_open('home/validate_login');
   echo '<ul>';
   echo '<li>';
  echo form_input('email',set_value('email'),'placeholder="Email" class="field-style field-full align-none"');
  echo '</li>';
  echo '<li>';
  echo form_password('password','','placeholder="Password" class="field-style field-full align-none"').'<br>';
  echo '</li>';
  echo '<li>';
  echo form_submit('submitLogin','Login');
  echo '</li>';
  echo '</ul>';
  echo form_close();
  echo '<br>';
  
  echo anchor('home/forget_pass', 'Forgot password?','class="btn btn-danger"');
  echo '<br><br>';
  
  echo anchor('home/signup','Create an account','class="btn btn-success"');
  
?>
      </div>
    </div>
  </div>
</div>