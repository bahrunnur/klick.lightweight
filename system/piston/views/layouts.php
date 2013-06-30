<!DOCTYPE html>
<!--[if IE 8]>               <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <base href="<?php echo site_url(); ?>">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <meta name="description" content="e-vote application for election.">
  <meta name="author" content="vortune">

  <title><?php echo $title ?></title>
  <link rel="stylesheet" href="assets/stylesheets/app.css" media="all">
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
  <script src="assets/javascripts/vendor/custom.modernizr.js"></script>

</head>
<body>

  <?php if ( $this->session->flashdata('alert') ): ?>
    <div data-alert class="alert-box <?php echo $this->session->flashdata('alert'); ?>" style="margin-bottom: 0;">
      <?php echo $this->session->flashdata('alert_message'); ?>
      <a href="#" class="close">&times;</a>
    </div>
  <?php endif; ?>
    
  <?php echo $content; ?>

  <footer>
    <div class="row">
      <div class="large-3 right columns">
        <p>Powered by: <span class="footer-logo"></span></p>
      </div>
    </div>
  </footer>

  <script src="assets/javascripts/vendor/jquery.js"></script> 
  
  <!-- Foundation 4 provided scripts. -->
  <script src="assets/javascripts/foundation/foundation.js"></script>
  <script src="assets/javascripts/foundation/foundation.alerts.js"></script>
  <script src="assets/javascripts/foundation/foundation.cookie.js"></script>
  <script src="assets/javascripts/foundation/foundation.forms.js"></script>
  <script src="assets/javascripts/foundation/foundation.section.js"></script>
  <script src="assets/javascripts/foundation/foundation.reveal.js"></script>
  
  <script>
    $(document).foundation();
  </script>

</body>
</html>
