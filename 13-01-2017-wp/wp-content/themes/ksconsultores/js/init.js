(function($) {
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip()
            // Stop "click triggered" tootips from acting as bookmarks to top of page
            .filter('[data-trigger*="click"]')
            .on('click', function(e) {
                e.preventDefault();
            });
    });
var cf7input = $( ".wpcf7-form-control" );
  if ( cf7input.parent().is( "span" ) ) {
    cf7input.unwrap();
  } else {
    cf7input.wrap( "<div></div>" );
  }
jQuery('.form-group br').remove();
}(jQuery));
