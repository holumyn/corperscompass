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
      <div class="tab-content"> 
          <div id="ppa" class="tab-pane fade in active">
            <div class="well">
               <?php
			   if($user_ppa_data == true):
			   ?>
               <form role="form">
                   <div class="form-group">
                      <textarea class="form-control" rows="3" id="comment" placeholder="What going on in your PPA? "></textarea>
                    </div>
                </form>
                
             
			      <?php
				 foreach($user_ppa_data as $data):
				   echo $data->id;
				   echo $data->user_id;
				 endforeach;
			   else:
			  ?> 
            <p>Hello..., you haven't joined any Place of Primary Assignment. Please click the button below to join</p>
            
             <br><br>
            <?php echo anchor('home/users/view_ppa', 'JOIN A PPA','class="btn btn-success"'); ?>
            
            <?php endif; ?>
            
            
            </div>
             
          </div>
           <div id="cds" class="tab-pane fade">
            This is cds
            <?php echo anchor('home/users/view_cds', 'View CDS'); ?>
          </div>
           <div id="saed" class="tab-pane fade">
            This is saed
            <?php echo anchor('home/', 'Join SAED'); ?>
          </div>
           <div id="profile" class="tab-pane fade">
             This is profile
             <?php echo anchor('home/users/profile', 'Profile'); ?>
          </div>
      </div>            
    </div>
</div>
<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>