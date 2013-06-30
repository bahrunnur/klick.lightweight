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

<?php if ( is_dir('./install') ): ?>
  <script>
    (function($) {
      $('#delete_installation').on('click', function(e) {
        e.preventDefault();
        var $parent = $(this).parent();
        $.get("<?php echo site_url('admin/delete_installation'); ?>", function(data) {
          $parent.removeClass('alert').addClass(data.status).html(data.message);
        });
      });
    })(jQuery);
  </script>
<?php endif; ?>

<?php if ( ($this->uri->segment(2) == 'candidate') && ( ($this->uri->segment(3) == 'create') || ($this->uri->segment(3) == 'edit') ) ): ?>
  <script src="assets/javascripts/vendor/jquery.knob.js"></script>

  <!-- still buggy
  <script src="assets/javascripts/vendor/jquery.ui.widget.js"></script>
  <script src="assets/javascripts/vendor/jquery.iframe-transport.js"></script>
  <script src="assets/javascripts/vendor/jquery.fileupload.js"></script>
  <script src="assets/javascripts/vendor/load-image.min.js"></script>

  <script src="assets/javascripts/candidatePhotoUpload.js"></script>
  -->

  <script src="assets/ckeditor/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('info');
  </script>

<?php endif; ?>

<?php if ( $this->uri->segment(2) == 'settings' ): ?>
  <script src="assets/javascripts/vendor/pickadate.min.js"></script>

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
<?php endif; ?>

<?php if ( $this->uri->segment(2) == 'statistics' ): ?>
  <script src="assets/javascripts/vendor/d3.min.js"></script>
  <script src="assets/javascripts/vendor/d3.layout.min.js"></script>
  <script src="assets/javascripts/vendor/d3.v2.js"></script>
  <script src="assets/javascripts/vendor/rickshaw.min.js"></script>

  <script>
    var seriesData = [[], [], []];
    var random = new Rickshaw.Fixtures.RandomData(100);

    for (var i = 0; i < 100; i++) {
      random.addData(seriesData);
    }

    var palette = new Rickshaw.Color.Palette({ scheme: 'colorwheel' });

    // instantiate graph
    var graph = new Rickshaw.Graph({
      element: document.querySelector("#chart"),
      width: 520,
      height: 250,
      renderer: 'bar',
      series: [
        {
          color: palette.color(),
          data: seriesData[0],
          name: 'Candidate 1'
        },
        {
          color: palette.color(),
          data: seriesData[1],
          name: 'Candidate 2'
        },
        {
          color: palette.color(),
          data: seriesData[2],
          name: 'Candidate 3'
        }
      ]
    });

    var yAxis = new Rickshaw.Graph.Axis.Y({
      graph: graph,
      orientation: 'left',
      tickFormat: Rickshaw.Fixtures.Number.FormatKMBT,
      element: document.querySelector('#yAxis')
    });
    
    var hoverDetail = new Rickshaw.Graph.HoverDetail({
      graph: graph
    });

    var legend = new Rickshaw.Graph.Legend({
      graph: graph,
      element: document.querySelector('#legend')
    });

    var shelving = new Rickshaw.Graph.Behavior.Series.Toggle({
      graph: graph,
      legend: legend
    });

    var axes = new Rickshaw.Graph.Axis.Time({
      graph: graph
    });

    graph.render();
  </script>
<?php endif; ?>