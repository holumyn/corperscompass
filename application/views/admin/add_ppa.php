<div class="form-style-9">
	<?php echo anchor('index.php/cc_admin/dashboard', 'Back to dashboard'); ?>
	<?php if(isset($message)){ ?>
		<h3><?php echo $message ?></h3>
	<?php }else{ ?>
		<h3>Place of Primary Assignment</h3>
	<?php } ?>
<?php
  echo validation_errors();
  
  echo form_open('index.php/cc_admin/dashboard/create_ppa');
  //form 1
  echo form_input('ppa_name1',set_value('ppa_name1'),'placeholder="PPA"');
  echo form_input('ppa_address1',set_value('ppa_address1'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state1', $options, 'default');
  echo form_input('lg1',set_value('lg1'),'placeholder="LG 1"').'<br>';
  
  //form 2
  echo form_input('ppa_name2',set_value('ppa_name2'),'placeholder="PPA"');
  echo form_input('ppa_address2',set_value('ppa_address2'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state2', $options, 'default');
  echo form_input('lg2',set_value('lg2'),'placeholder="LG"').'<br>';
  
  //form 3
  echo form_input('ppa_name3',set_value('ppa_name3'),'placeholder="PPA"');
  echo form_input('ppa_address3',set_value('ppa_address3'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state3', $options, 'default');
  echo form_input('lg3',set_value('lg3'),'placeholder="LG"').'<br>';
  
  //form 4
  echo form_input('ppa_name4',set_value('ppa_name4'),'placeholder="PPA"');
  echo form_input('ppa_address4',set_value('ppa_address4'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state4', $options, 'default');
  echo form_input('lg4',set_value('lg4'),'placeholder="LG"').'<br>';
  
  //form 5
  echo form_input('ppa_name5',set_value('ppa_name5'),'placeholder="PPA"');
  echo form_input('ppa_address5',set_value('ppa_address5'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state5', $options, 'default');
  echo form_input('lg5',set_value('lg5'),'placeholder="LG"').'<br>';
  
  echo form_submit('submitCreateAccount','Create');
  echo form_close();
  echo '<br>';
  
  ?>
 </div> 