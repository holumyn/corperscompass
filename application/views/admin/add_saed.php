<div class="form-style-9">
<?php echo anchor('index.php/cc_admin/dashboard', 'Back to dashboard'); ?>
<h3>Skill Acquisition and Enterpreneural development(SAED)</h3>

<?php
  echo validation_errors();
  
  echo form_open('index.php/cc_admin/create_ppa');
  //form 1
  echo form_input('ppa_name',set_value('ppa_name'),'placeholder="PPA"');
  echo form_input('ppa_address',set_value('ppa_address'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state_of_deployment', $options, 'default');
  echo form_input('lg',set_value('lg'),'placeholder="LG"').'<br>';
  
  //form 2
  echo form_input('ppa_name',set_value('ppa_name'),'placeholder="PPA"');
  echo form_input('ppa_address',set_value('ppa_address'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state_of_deployment', $options, 'default');
  echo form_input('lg',set_value('lg'),'placeholder="LG"').'<br>';
  
  //form 3
  echo form_input('ppa_name',set_value('ppa_name'),'placeholder="PPA"');
  echo form_input('ppa_address',set_value('ppa_address'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state_of_deployment', $options, 'default');
  echo form_input('lg',set_value('lg'),'placeholder="LG"').'<br>';
  
  //form 4
  echo form_input('ppa_name',set_value('ppa_name'),'placeholder="PPA"');
  echo form_input('ppa_address',set_value('ppa_address'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state_of_deployment', $options, 'default');
  echo form_input('lg',set_value('lg'),'placeholder="LG"').'<br>';
  
  //form 5
  echo form_input('ppa_name',set_value('ppa_name'),'placeholder="PPA"');
  echo form_input('ppa_address',set_value('ppa_address'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state_of_deployment', $options, 'default');
  echo form_input('lg',set_value('lg'),'placeholder="LG"').'<br>';
  
  //form 6
  echo form_input('ppa_name',set_value('ppa_name'),'placeholder="PPA"');
  echo form_input('ppa_address',set_value('ppa_address'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state_of_deployment', $options, 'default');
  echo form_input('lg',set_value('lg'),'placeholder="LG"').'<br>';
  
  //form 7
  echo form_input('ppa_name',set_value('ppa_name'),'placeholder="PPA"');
  echo form_input('ppa_address',set_value('ppa_address'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state_of_deployment', $options, 'default');
  echo form_input('lg',set_value('lg'),'placeholder="LG"').'<br>';
  
  //form 8
  echo form_input('ppa_name',set_value('ppa_name'),'placeholder="PPA"');
  echo form_input('ppa_address',set_value('ppa_address'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state_of_deployment', $options, 'default');
  echo form_input('lg',set_value('lg'),'placeholder="LG"').'<br>';
  
  //form 9
  echo form_input('ppa_name',set_value('ppa_name'),'placeholder="PPA"');
  echo form_input('ppa_address',set_value('ppa_address'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state_of_deployment', $options, 'default');
  echo form_input('lg',set_value('lg'),'placeholder="LG"').'<br>';
  
  //form 10
  echo form_input('ppa_name',set_value('ppa_name'),'placeholder="PPA"');
  echo form_input('ppa_address',set_value('ppa_address'),'placeholder="PPA Address"');
  $options = array(
        'ABJ' => 'Abuja',
        'LAG' => 'Lagos',
        'NS' => 'Nasarawa',
        'IB' => 'Ibadan',
		'default' => 'State'
);

  echo form_dropdown('state_of_deployment', $options, 'default');
  echo form_input('lg',set_value('lg'),'placeholder="LG"').'<br>';
  
  
  
  
  
  
  echo form_submit('submitCreateAccount','Create');
  echo form_close();
  echo '<br>';
  
  ?>
  </div>