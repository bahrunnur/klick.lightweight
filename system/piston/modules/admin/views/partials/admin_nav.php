<nav class="admin-menu">
    <h2>Menu</h2>
    <a href="<?php echo site_url(); ?>" class="back"><i class="icon-reply"></i> Back to Election</a>
    <?php if ( $this->session->userdata('role') == 'supervisor' ): ?>
    <a href="<?php echo site_url('admin'); ?>" class="<?php echo ($this->uri->segment(2) == '') ? 'active' : ''; ?>"><i class="icon-desktop"></i> Dashboard</a>
    <?php endif; ?>
    <a href="<?php echo site_url('admin/voter'); ?>" class="<?php echo ($this->uri->segment(2) == 'voter') ? 'active' : ''; ?>"><i class="icon-group"></i> Voter</a>
    <?php if ( $this->session->userdata('role') == 'supervisor' ): ?>
    <a href="<?php echo site_url('admin/candidate'); ?>" class="<?php echo ($this->uri->segment(2) == 'candidate') ? 'active' : ''; ?>"><i class="icon-user"></i> Candidate</a>
    <a href="<?php echo site_url('admin/administration'); ?>" class="<?php echo ($this->uri->segment(2) == 'administration') ? 'active' : '' ?>"><i class="icon-book"></i> Administration</a>
    <a href="<?php echo site_url('admin/settings'); ?>" class="<?php echo ($this->uri->segment(2) == 'settings') ? 'active' : ''; ?>"><i class="icon-cogs"></i> Settings</a>
    <?php endif; ?>
</nav>