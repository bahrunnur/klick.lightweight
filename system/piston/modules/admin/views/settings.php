<h2>Settings</h2>
<?php echo form_open(current_url(), array('class' => 'custom')); ?>
  <div class="row">
    <div class="large-3 columns">
      <label for="appname" class="inline">Election Name</label>
    </div>
    <div class="large-9 columns <?php echo form_error('name') ? 'error' : ''; ?>">
      <input type="text" name="appname" id="appname" value="<?php echo set_value('name', $election->name); ?>">
      <?php echo form_error('name'); ?>
    </div>
  </div>
  <div class="row">
    <div class="large-3 columns">
      <label for="start" class="inline">Election Start Day</label>
    </div>
    <div class="large-9 columns <?php echo form_error('start') ? 'error' : ''; ?>">
      <input type="text" name="start" id="start" value="<?php echo set_value('start', $election->start_date); ?>">
      <?php echo form_error('start'); ?>
    </div>
  </div>
  <div class="row">
    <div class="large-3 columns">
      <label for="end" class="inline">Election End Day</label>
    </div>
    <div class="large-9 columns <?php echo form_error('end') ? 'error' : ''; ?>">
      <input type="text" name="end" id="end" value="<?php echo set_value('end', $election->end_date); ?>">
      <?php echo form_error('end'); ?>
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
      <input type="submit" value="Save Settings" class="small button">
    </div>
  </div>
<?php echo form_close(); ?>