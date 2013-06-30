<h2>Setting up Election</h2>
<p>After you fill this information. Your Election is up and ready to use!</p>
<?php echo form_open(site_url('index.php/install/step3')); ?>
<div class="row">
  <div class="large-4 columns">
    <label for="elname" class="inline">Election Name</label>
  </div>
  <div class="large-8 columns <?php echo form_error('elname') ? 'error' : ''; ?>">
    <input type="text" name="elname" id="elname" value="<?php echo set_value('elname'); ?>">
    <?php echo form_error('elname'); ?>
  </div>
</div>
<div class="row">
  <div class="large-4 columns">
    <label for="start" class="inline">Start Day of Election</label>
  </div>
  <div class="large-8 columns <?php echo form_error('start') ? 'error' : ''; ?>">
    <input type="text" name="start" id="start" value="<?php echo set_value('start'); ?>">
    <?php echo form_error('start'); ?>
  </div>
</div>
<div class="row">
  <div class="large-4 columns">
    <label for="end" class="inline">End Day of Election</label>
  </div>
  <div class="large-8 columns <?php echo form_error('end') ? 'error' : ''; ?>">
    <input type="text" name="end" id="end" value="<?php echo set_value('end'); ?>">
    <?php echo form_error('end'); ?>
  </div>
</div>
<div class="row">
  <div class="large-4 columns">
    <label for="username" class="inline">Username</label>
  </div>
  <div class="large-8 columns <?php echo form_error('username') ? 'error' : ''; ?>">
    <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>">
    <?php echo form_error('username'); ?>
  </div>
</div>
<div class="row">
  <div class="large-4 columns">
    <label for="password" class="inline">Password</label>
  </div>
  <div class="large-8 columns <?php echo form_error('password') ? 'error' : ''; ?>">
    <input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>">
    <?php echo form_error('password'); ?>
  </div>
</div>
<div class="row">
  <div class="large-4 columns">
    <label for="email" class="inline">Email</label>
  </div>
  <div class="large-8 columns <?php echo form_error('email') ? 'error' : ''; ?>">
    <input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>">
    <?php echo form_error('email'); ?>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <input type="submit" value="Submit" class="small button">
  </div>
</div>
<?php echo form_close(); ?>