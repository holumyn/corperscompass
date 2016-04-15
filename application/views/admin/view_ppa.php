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
        <td>PPA</td>
         <td>Address</td>
          <td>LG</td>
           <td>State</td>
           <td></td>
      </tr>
    </thead>
    <tbody> 
    <?php foreach($res_group as $ppa){ ?>
	  <tr>
        <td><?php echo $ppa->ppa_name ?></td>
         <td><?php echo $ppa->address ?></td>
         <td><?php echo $ppa->lg ?></td>
          <td><?php echo $ppa->state ?></td>
          <td><?php echo anchor('','Edit').' '. anchor('','Delete'); ?></td>
      </tr>
      <?php }?>
    </tbody>
  </table>
 </div> 