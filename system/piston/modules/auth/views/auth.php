<div class="container">
  <div class="row">
    <div class="large-4 large-offset-4 columns">
      <div class="row">
        <div class="large-12 columns">
          <h1 class="login-header">
            <a href="#" title="Klick."></a>
          </h1>
        </div>
      </div>

      <?php if ( $this->session->flashdata('message') ): ?>
        <div class="row">
          <div class="large-12 columns">
            <div data-alert class="alert-box <?php echo $this->session->flashdata('message_type'); ?>">
              <?php echo $this->session->flashdata('message'); ?>
              <a href="#" class="close">&times;</a>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="login-form">
        <?php echo form_open(current_url()); ?>
          <div class="row">
            <div class="large-12 columns <?php echo form_error('username') ? 'error' : ''; ?>">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" placeholder="username" value="<?php echo set_value('username'); ?>">
              <?php echo form_error('username'); ?>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns <?php echo form_error('password') ? 'error' : ''; ?>">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" placeholder="password">
              <?php echo form_error('password'); ?>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <input type="submit" value="Login" class="button expand">
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <p class="forgot-password"><a href="#">Forgot Your Password?</a></p>
        </div>
      </div>
    </div>
  </div>
</div>