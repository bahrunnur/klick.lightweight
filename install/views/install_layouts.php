<!DOCTYPE html>
<!--[if IE 8]>               <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <base href="<?php echo site_url('../'); ?>">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <meta name="description" content="e-vote application for election.">
  <meta name="author" content="vortune">

  <title><?php echo $title ?></title>
  <link rel="stylesheet" href="assets/stylesheets/app.css" media="all">
  <link rel="stylesheet" href="assets/stylesheets/pickadate.css">
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
  <script src="assets/javascripts/vendor/custom.modernizr.js"></script>

</head>
<body>

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
      </div>
    </div>

    <div class="row">
      <div class="large-8 large-offset-2">
        <?php if ( $this->session->flashdata('message') ): ?>
          <div data-alert class="alert-box <?php echo $this->session->flashdata('message_type'); ?>">
            <?php echo $this->session->flashdata('message'); ?>
            <a href="#" class="close">&times;</a>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="row">
      <div class="large-8 large-offset-2 install-pool">
        <?php echo $content; ?>
      </div>
    </div>
  </div>

  <footer></footer>

  <script src="assets/javascripts/vendor/jquery.js"></script>

  <!-- pickadate jquery plugin -->
  <script src="assets/javascripts/vendor/pickadate.min.js"></script>

  <!-- Foundation 4 provided scripts. -->
  <script src="assets/javascripts/foundation/foundation.js"></script>
  <script src="assets/javascripts/foundation/foundation.alerts.js"></script>
  <script src="assets/javascripts/foundation/foundation.forms.js"></script>
  
  <script>
    $(document).foundation();
  </script>

  <script>
    function createDateArray( date ) {
      return date.split( '-' ).map(function( value ) { return +value; });
    }

    var start = $( '#start' ).pickadate({
      formatSubmit: 'dd/mm/yyyy',
      onSelect: function() {
        var startDate = createDateArray( this.getDate( 'yyyy-mm-dd' ) );
        end.data( 'pickadate' ).setDateLimit( startDate );
      }
    });

    var end = $( '#end' ).pickadate({
      formatSubmit: 'dd/mm/yyyy',
      onSelect: function() {
        var endDate = createDateArray( this.getDate( 'yyyy-mm-dd' ) );
        start.data( 'pickadate' ).setDateLimit( endDate, true )
      }
    });
  </script>

</body>
</html>
