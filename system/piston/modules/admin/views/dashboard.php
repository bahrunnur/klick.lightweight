<h2>Dashboard</h2>
<div class="row">
  <div class="large-8 columns">
    <nav class="dashboard-panel">
      <h3>Setup</h3>
      <a href="<?php echo site_url('admin/voter/create'); ?> "><i class="icon-plus-sign"></i>New Voter</a>
      <a href="<?php echo site_url('admin/candidate/create'); ?>"><i class="icon-plus-sign"></i>New Candidate</a>
      <a href="<?php echo site_url('admin/administration/create'); ?>"><i class="icon-plus-sign"></i>New Administrator</a>
    </nav>
  </div>
  <div class="large-4 columns">
    <nav class="dashboard-panel">
      <h3>Count</h3>
      <a href="<?php echo site_url('admin/qcount'); ?>"><i class="icon-bolt"></i>Quick Count</a>
      <a href="<?php echo site_url('admin/statistics'); ?>"><i class="icon-bar-chart"></i>Statistics</a>
    </nav>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <nav class="dashboard-panel">
      <h3>Tools</h3>
      <a href="<?php echo site_url('admin/administration/backupdb'); ?>"><i class="icon-hdd"></i>Backup Database</a>
      <a href="<?php echo site_url('admin/administration/exportcsv'); ?>"><i class="icon-share"></i>Export Voter Data to Excel (CSV)</a>
      <a href="<?php echo site_url('admin/administration/printresult'); ?>"><i class="icon-print"></i>Print Result</a>
    </nav>
  </div>
</div>