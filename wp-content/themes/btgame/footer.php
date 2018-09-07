<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="col-sm-12">
				 <?php dynamic_sidebar( 'herocanvas' ); ?>
				</div>
			</div>
		</div>
		<div class="footer-content">
			<div class="link-footer1">
				<div class="container">

			        <?php dynamic_sidebar( 'footerlink1' ); ?>
			    </div>
			</div>
			<div class="link-footer2">
				<div class="container">
			  	<?php dynamic_sidebar( 'footerlink2' ); ?>
			  </div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					<?php dynamic_sidebar( 'footercoppyright' ); ?>
				</div>
			</div>
			
		</div>
	</footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>  
<script src="<?php echo get_template_directory_uri(); ?>/js/list.min.js"></script>
 
<script>
  var monkeyList = new List('test-list', {
  valueNames: ['container-congdong'],
  page: 5,
  pagination: true
});
</script>

</body>

</html>

