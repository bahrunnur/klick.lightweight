<!DOCTYPE html>
<!--[if IE 8]>               <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <title><?php echo $title ?></title>

  <?php $this->load->view('partials/head'); ?>

</head>
<body>
    
  <header class="admin-header">
    <div class="row">
      <div class="large-6 columns">
        <h1><?php echo $title; ?></h1>
      </div>
      <div class="right">
        <p class="welcome-message">You logged in as <b><?php echo $this->session->userdata('name'); ?></b> (<?php echo ucfirst($this->session->userdata('role')); ?>) <a href="<?php echo site_url('auth/logout'); ?>" class="small secondary button logout"><i class="icon-off"></i>Logout</a></p>
      </div>
    </div>
  </header>

  <div class="container">
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

    <?php if ( isset($alert) ): ?>
      <div class="row">
        <div class="large-12 columns">
          <div data-alert class="alert-box alert">
            <?php echo $alert; ?>
            <a href="#" class="close">&times;</a>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="row">
      <aside class="large-3 columns">
        <?php $this->load->view('partials/admin_nav'); ?>
      </aside>
      <section class="large-9 columns">
        <div class="main-pool">
          <?php echo $content; ?>
        </div>
      </section>
    </div>
  </div>

  <footer>
    <div class="row">
      <div class="large-3 right columns">
        <p>Powered by: <span class="footer-logo"></span></p>
      </div>
    </div>
  </footer>

  <?php $this->load->view('partials/footer_scripts'); ?>
  <?php $this->load->view('partials/modals'); ?>

</body>
</html>