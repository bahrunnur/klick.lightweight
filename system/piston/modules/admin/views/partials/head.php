<base href="<?php echo site_url(); ?>">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<meta name="description" content="e-vote application for election.">
<meta name="author" content="vortune">

<link rel="stylesheet" href="assets/stylesheets/app.css" media="all">
<?php if ( $this->uri->segment(2) == 'settings' ): ?>
    <link rel="stylesheet" href="assets/stylesheets/pickadate.css">
<?php endif; ?>
<?php if ( $this->uri->segment(2) == 'statistics' ): ?>
    <link rel="stylesheet" href="assets/stylesheets/rickshaw.min.css">
<?php endif; ?>
<link rel="shortcut icon" href="assets/images/favicon.ico" />
<script src="assets/javascripts/vendor/custom.modernizr.js"></script>