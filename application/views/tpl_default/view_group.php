<div class="form-style-9">
	<?php echo anchor('index.php/home/users', 'Back to home'); ?>
	
	<?php if($this->session->flashdata('joined_msg')){ ?>
		<h3><?php echo $this->session->flashdata('joined_msg') ?></h3>
	<?php }else{ ?>
		<h3>Join Place of Primary Assignment</h3>
	<?php } ?>

 
  
   <?php if(isset($grp_ppa)): ?>
   
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
	  <tr>
        <td><?php echo $grp_ppa->ppa_name ?></td>
        <td><?php echo $grp_ppa->address ?></td>
        <td><?php echo $grp_ppa->lg ?></td>
        <td><?php echo $grp_ppa->state ?></td>
          <td>
		    <?php if($this->session->userdata('email')): 
			  		echo anchor('index.php/home/users/join_ppa/'.$grp_ppa->id,'Leave');
           		  else:
				  echo anchor('index.php/home/users/join_ppa/'.$grp_ppa->id,'Join');
		          endif;
		   ?>
           </td>
      </tr>
    </tbody>
  </table>
    <?php elseif(isset($grp_cds)): ?>
    
    <table border="1" width="100%"> 
    <thead>
      <tr>
        <td>CDS</td>
         <td></td>
          <td></td>
           <td></td>
           <td></td>
      </tr>
    </thead>
    <tbody> 
    <tr>
        <td><?php echo $grp_cds->cds_name ?></td>
        <td><?php  ?></td>
        <td><?php  ?></td>
        <td><?php ?></td>
          <td>
		   <?php if($this->session->userdata('email')): 
			  		anchor('index.php/home/users/join_cds/'.$grp_cds->id,'Join');
           		  else:
				  echo anchor('index.php/home/users/join_cds/'.$grp_cds->id,'Join');
		          endif;
		   ?>
		  
      </tr>
    <?php else: ?>
    <?php redirect('index.php/home/users/') ?>
      <?php endif; ?>
    </tbody>
  </table>
 </div> 