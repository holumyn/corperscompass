<div class="form-style-9">
	<?php echo anchor('home/users', 'Back to home'); ?>
	<?php if($this->session->flashdata('joined_msg')){ ?>
		<h3><?php echo $this->session->flashdata('joined_msg') ?></h3>
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
    <?php foreach($res_group as $cds): ?>
	  <tr>
        <td><?php echo $cds->cds_name ?></td>
          <td><?php echo anchor('home/users/join_cds/'.$cds->id.'','Join') ?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
 </div> 