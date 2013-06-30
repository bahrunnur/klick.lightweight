$(function() {

  $('#drop a').click(function() {
    $(this).parent().find('input').click();
  });

  $('#newCandidate').fileupload({

    dropZone: $('#drop'),

    add: function(e, data) {
      
      var tpl = $('<div class="working"><input type="text" value="0" data-width="60" data-height="60" data-fgColor="#556270" data-readOnly="1" data-bgColor="#fbfbfb"><p></p><span>&times;</span></div>');

      tpl.find('p').text(data.files[0].name).after('<i>' + formatFileSize(data.files[0].size) + '</i>');
      // data.context = tpl.appendTo('#uploadProgress');
      data.context = $('#uploadProgress').html(tpl);

      tpl.find('input').knob();

      tpl.find('span').click(function() {

        if ( tpl.hasClass('working') ) {
          jqXHR.abort
        }

        tpl.fadeOut(function() {
          tpl.remove();
        });

      });

      // uploading
      var jqXHR = data.submit();

    },

    progress: function(e, data) {

      var progress = parseInt(data.loaded / data.total * 100, 10);

      data.context.find('input').val(progress).change();

      if ( progress == 100 ) {
        // data.context.remove('.working');
        data.context.removeClass('working');
        // foundation reveal loaded for cropping image
      }

    },

    fail: function(e, data) {
      data.context.addClass('error');
    }

  });

  // prevent default action when a file dropped on the browser
  $(document).on('drop dragover', function(e) {
    e.preventDefault();
  });

  // helper function
  function formatFileSize(bytes) {
    if ( typeof bytes !== 'number' )
      return '';

    if ( bytes >= 1000000 )
      return (bytes / 1000000).toFixed(2) + ' MB';

    return (bytes / 1000).toFixed(2) + ' KB';
  }

});