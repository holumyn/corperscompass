<div class="form-style-9">
<?php echo anchor('index.php/cc_admin/dashboard', 'Back to dashboard'); ?>
<?php if(isset($message)){ ?>
		<h3><?php echo $message ?></h3>
	<?php }else{ ?>
		<h3>Community development service</h3>
	<?php } ?>

<?php
  echo validation_errors();
  
  echo form_open('index.php/cc_admin/create_cds');
  //form 1
  echo form_input('cds_name1',set_value('cds_name1'),'placeholder="CDS"').'<br>';
  echo form_input('cds_name2',set_value('cds_name2'),'placeholder="CDS"').'<br>';
  echo form_input('cds_name3',set_value('cds_name3'),'placeholder="CDS"').'<br>';
  echo form_input('cds_name4',set_value('cds_name4'),'placeholder="CDS"').'<br>';
  echo form_input('cds_name5',set_value('cds_name5'),'placeholder="CDS"').'<br>';
  
  echo form_submit('submitCreateAccount','Create');
  echo form_close();
  echo '<br>';
  
  ?>
  </div>