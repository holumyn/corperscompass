<div class="container-fluid">
  <div class="form-style-9">
 		<ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#ppa">PPA</a></li>
            <li><a data-toggle="tab" href="#cds">CDS</a></li>
            <li><a data-toggle="tab" href="#saed">SAED</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><?php echo anchor('home/timeout', 'Logout') ?></li>
                  <li><?php echo $this->session->email; ?></li>
                </ul>
              </li>
            </ul>
            <br>
  
  <?php if($this->session->flashdata('joined_msg')){ ?>
		<h3><?php echo $this->session->flashdata('joined_msg') ?></h3>
	<?php }else{ ?>
		<h3>Places of Primary Assignment(PPAs)</h3>
	<?php } ?>
    <?php if($res_group == true): ?>
    
    
    <?php $count = 1; ?>
    <?php foreach($res_group as $ppa): ?>
     <?php
	  if($count == 3):
	    $count = 1;
	  endif;
	  ?>
     
     <?php if($count == 1): ?><div class="row"><div class="panel-group"> <?php endif; ?>
	<?php
	  if($count == 1 || $count == 2):
	    $col = 6;
		endif;
	  ?>
    <div class="col-lg-<?php echo $col ?>">
    
    <div class="panel panel-info">
      <div class="panel-heading"><?php echo anchor('group/ppa/'.$ppa->id,$ppa->ppa_name) ?></div>
        <div class="panel-body">
	      <p>  <?php echo $ppa->address.$count.' '.$col ?></p>
          <p><?php echo $ppa->lg ?></p>
          <p><?php echo $ppa->state ?></p>
          <p><?php echo anchor('home/users/join_ppa/'.$ppa->id,'Join','class="btn btn-info"') ?></p>
        </div>
      </div>
	</div>
     
      
        <?php if($count == 1): ?></div> </div><?php endif; ?>
      <?php $count++; ?>
     
      
      <?php endforeach; ?>
      
      <?php endif; ?>
 </div> 
 </div>