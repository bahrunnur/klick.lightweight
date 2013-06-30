<h2>Setting up Database</h2>
<p>Please provide your database information for guiding us to setup and preparing the database for you. If you do not know or not sure about these, please contact your hosting provider.</p>
<?php if ( ! $this->installer->mysql_available() ): ?>
  <div data-alert class="alert-box alert">
    Seems like MySQL database driver for PHP were not found, the installation cannot continue. Please ask your host provider or server administrator to install it.
    <a href="#" class="close">&times;</a>
  </div>
<?php endif; ?>
<?php echo form_open(site_url('index.php/install/step1')); ?>
  <div class="row">
    <div class="large-4 columns">
      <label for="dbname" class="inline">Database Name</label>
    </div>
    <div class="large-8 columns <?php echo form_error('dbname') ? 'error' : ''; ?>">
      <input type="text" name="dbname" id="dbname" value="<?php echo set_value('dbname', 'klick'); ?>">
      <?php echo form_error('dbname'); ?>
    </div>
  </div>
  <div class="row">
    <div class="large-4 columns">
      <label for="dbhost" class="inline">Database Host</label>
    </div>
    <div class="large-8 columns <?php echo form_error('dbhost') ? 'error' : ''; ?>">
      <input type="text" name="dbhost" id="dbhost" value="<?php echo set_value('dbhost', 'localhost'); ?>">
      <?php echo form_error('dbhost'); ?>
    </div>
  </div>
  <div class="row">
    <div class="large-4 columns">
      <label for="dbport" class="inline">Database Port</label>
    </div>
    <div class="large-8 columns <?php echo form_error('dbport') ? 'error' : ''; ?>">
      <input type="text" name="dbport" id="dbport" value="<?php echo set_value('dbport', '3306'); ?>">
      <?php echo form_error('dbport'); ?>
    </div>
  </div>
  <div class="row">
    <div class="large-4 columns">
      <label for="dbuser" class="inline">MySQL Username</label>
    </div>
    <div class="large-8 columns <?php echo form_error('dbuser') ? 'error' : ''; ?>">
      <input type="text" name="dbuser" id="dbuser" value="<?php echo set_value('dbuser'); ?>" placeholder="username">
      <?php echo form_error('dbuser'); ?>
    </div>
  </div>
  <div class="row">
    <div class="large-4 columns">
      <label for="dbpass" class="inline">MySQL Password</label>
    </div>
    <div class="large-8 columns">
      <input type="password" name="dbpass" id="dbpass" placeholder="password">
    </div>
  </div>
  <div class="row">
    <div class="large-4 columns">
      <label for="dbtprefix" class="inline">Table Prefix</label>
    </div>
    <div class="large-8 columns <?php echo form_error('dbtprefix') ? 'error' : ''; ?>">
      <input type="text" name="dbtprefix" id="dbtprefix" value="<?php echo set_value('dbtprefix', 'kl_'); ?>">
      <?php echo form_error('dbtprefix'); ?>
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
      <input type="submit" value="Submit" class="small button">
    </div>
  </div>
<?php echo form_close(); ?>