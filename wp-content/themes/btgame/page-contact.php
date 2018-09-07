<?php
/*
Template name: Page -Contact
*/
get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<div class="vc_row wpb_row vc_row-fluid">
						<div class="box-noidung wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner  ">
								<div class="wpb_wrapper" style="padding-top: 65px;">
									<div class="wpb_text_column wpb_content_element">
										<div class="wpb_wrapper">
											<div class="div-title right">
											<h3 class="title-noidung"><?php the_title();?></h3>
										</div>

										</div>
									</div>
									<div class="vc_row wpb_row vc_inner vc_row-fluid">
										<div class="padding-35 wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper">
													<div class="wpb_text_column wpb_content_element ">
														<div class="wpb_wrapper">
															
															<div class="the_content_page">

																<?php the_content();?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
