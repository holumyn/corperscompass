<div class="form-style-9">
<h3>Welcome to my dashboard: <?php echo $this->session->username ?></h3>

<?php echo anchor('index.php/cc_admin/dashboard/add_ppa', 'Add PPA').'<br>'; ?>
<?php echo anchor('index.php/cc_admin/dashboard/add_cds', 'Add CDS').'<br>'; ?>
<?php echo anchor('index.php/cc_admin/dashboard/add_saed', 'Add SAED').'<br><br>'; ?>

<?php echo anchor('index.php/cc_admin/dashboard/view_ppa', 'View PPA').'<br>'; ?>
<?php echo anchor('index.php/cc_admin/dashboard/view_cds', 'View CDS').'<br>'; ?>
<?php echo anchor('index.php/cc_admin/dashboard/view_saed', 'View SAED').'<br><br>'; ?>

<?php echo anchor('index.php/cc_admin/admin_timeout', 'Logout').'<br>'; ?>
</div>