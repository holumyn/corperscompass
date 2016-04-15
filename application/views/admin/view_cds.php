<div class="form-style-9">
	<?php echo anchor('index.php/cc_admin/dashboard', 'Back to dashboard'); ?>
	<?php if(isset($message)){ ?>
		<h3><?php echo $message ?></h3>
	<?php }else{ ?>
		<h3>Place of Primary Assignment</h3>
	<?php } ?>

 
  <table border="1" width="100%"> 
    <thead>
      <tr>
        <td>CDS</td>
           <td></td>
      </tr>
    </thead>
    <tbody> 
    <?php foreach($res_group as $cds){ ?>
	  <tr>
        <td><?php echo $cds->cds_name ?></td>
          <td><?php echo anchor('','Edit').' '. anchor('','Delete'); ?></td>
      </tr>
      <?php }?>
    </tbody>
  </table>
 </div> 