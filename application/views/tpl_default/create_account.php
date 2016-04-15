<?php
  echo form_open('home/create_account','class="form-style-9"');
  
  if(isset($account_created)){
        echo '<h3>'.$account_created.'</h3>';
		  }else{
		echo '<h3>CREATE AN ACCOUNT</h3>'; 
		  }
		  
  echo '<h6>'.validation_errors().'</h6>';
  echo '<ul>';
  echo '<li>'.form_input('first_name',set_value('first_name'),'placeholder="First Name" class="field-style field-split align-left"');
  echo form_input('last_name',set_value('last_name'),'placeholder="Last Name" class="field-style field-split align-right"').'</li>';
  echo '<li>'.form_input('phone',set_value('phone'),'placeholder="Phone" class="field-style field-split align-left"');
  echo form_input('email',set_value('email'),'placeholder="Email" class="field-style field-split align-right"').'</li>';
  
  
  
  $options = array(
        
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State of deployment'
);

  echo '<li>'.form_dropdown('state_of_deployment', $options, 'default','class="field-style field-split align-left"');
  
  echo form_input('dob',set_value('dob'),'placeholder="Date of Birth (01-01-2015)" class="field-style field-split align-right"').'</li>';
  
  echo '<li>'.form_password('pword','','placeholder="Password" class="field-style field-split align-left"');
  echo form_password('confirm_pword','','placeholder="Confirm Password" class="field-style field-split align-right"').'</li>';
  echo '<li>'.form_submit('submitCreateAccount','JOIN NOW!').'</li></ul>';
  
   echo '<br>';
  
  echo anchor('', 'Back to home page');
  echo form_close();
 
  
?>