<h2>Edit Admin</h2>
<?php echo form_open(current_url(), array('class' => 'custom')); ?>
  <div class="row">
    <div class="large-3 columns">
      <label for="username" class="inline">Username</label>
    </div>
    <div class="large-9 columns <?php echo form_error('username') ? 'error' : ''; ?>">
      <input type="text" name="username" id="username" value="<?php echo set_value('username', $admin->username); ?>">
      <?php echo form_error('username'); ?>
    </div>
  </div>
  <div class="row">
    <div class="large-3 columns">
      <label for="email" class="inline">Email</label>
    </div>
    <div class="large-9 columns <?php echo form_error('email') ? 'error' : ''; ?>">
      <input type="email" name="email" id="email" value="<?php echo set_value('email', $admin->email); ?>">
      <?php echo form_error('email'); ?>
    </div>
  </div>
  <div class="row">
    <div class="large-3 columns">
      <label for="password" class="inline">New Password</label>
    </div>
    <div class="large-9 columns <?php echo form_error('password') ? 'error' : ''; ?>">
      <span style="font-size: 12px;">leave this blank if you does not want to change your password</span>
      <input type="password" name="password" id="password">
      <?php echo form_error('password'); ?>
    </div>
  </div>
  <div class="row">
    <div class="large-3 columns">
      <label for="passconf" class="inline">Password Confirmation</label>
    </div>
    <div class="large-9 columns <?php echo form_error('passconf') ? 'error' : ''; ?>">
      <span style="font-size: 12px;">leave this blank too if you does not want to change your password</span>
      <input type="password" name="passconf" id="passconf">
      <?php echo form_error('passconf'); ?>
    </div>
  </div>
  <div class="row">
    <div class="large-3 columns">
      <label for="role" class="inline">Role</label>
    </div>
    <div class="large-9 columns">
      <select name="role" id="role">
        <?php 
        $register   = ( $admin->role == 'register' );
        $supervisor = ( $admin->role == 'supervisor' );
        ?>
        <option value="register" <?php echo set_select('role', 'register', $register); ?>>Register</option>
        <option value="supervisor" <?php echo set_select('role', 'supervisor', $supervisor); ?>>Supervisor</option>
      </select>
    </div>
  </div>
  <input type="submit" class="button" value="Edit">
<?php echo form_close(); ?>