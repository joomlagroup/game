<?php
function tsd_scripts() {
	wp_enqueue_style( 'tsd-custom', get_template_directory_uri() . '/css/tsd-custom.css');
	wp_enqueue_script( 'matchheight', get_template_directory_uri() . '/js/jquery.matchHeight.js');
	wp_enqueue_script( 'tsd-custom', get_template_directory_uri() . '/js/tsd-custom.js');
}
add_action( 'wp_enqueue_scripts', 'tsd_scripts' );

?>
<?php
add_action('admin_footer', 'my_admin_add_js');
function my_admin_add_js() {
?>
<script>
  jQuery(function( $ ) {
    $( "input[name='tax_input[bo-co][]']" ).click( function() {
      $( "input[name='tax_input[bo-co][]']" ).not(this).removeAttr('checked');
      return true;
    } );
    /*$( "input[name='tax_input[doi][]']" ).click( function() {
      $( "input[name='tax_input[doi][]']" ).not(this).removeAttr('checked');
      return true;
    } );
    $( "input[name='tax_input[khoi][]']" ).click( function() {
      $( "input[name='tax_input[khoi][]']" ).not(this).removeAttr('checked');
      return true;
    } );*/
    $( "input[name='tax_input[vi-tri][]']" ).click( function() {
      $( "input[name='tax_input[vi-tri][]']" ).not(this).removeAttr('checked');
      return true;
    } );
    $( "input[name='tax_input[do-hiem][]']" ).click( function() {
      $( "input[name='tax_input[do-hiem][]']" ).not(this).removeAttr('checked');
      return true;
    } );
  } );
</script>
<?php }
?>
