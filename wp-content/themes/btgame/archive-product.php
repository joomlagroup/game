<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */


get_header(); ?>

<?php $container   = get_theme_mod( 'understrap_container_type' ); ?>
<?php 

$random_query = new WP_Query(array(
                'posts_per_page' => 4,
                'orderby' => 'date'
        ));
?>

<div class="wrapper" id="archive-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<!-- Do the left sidebar check -->
			<?php get_template_part( 'loop-templates/header-pr-archive' ); ?>
			<main class="site-main container" id="main">
				
					<div class="vc_row wpb_row vc_row-fluid">
						<div class="box-noidung wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner ">
								<div class="wpb_wrapper">
									<div class="wpb_text_column wpb_content_element  vc_custom_1529982080832">
										<div class="wpb_wrapper">
											<div class="div-title right">
													<h3 class="title-noidung">SẢN PHẨM</h3>
													</div>
												</div>
									</div>
									<?php if ( $random_query->have_posts() ) : ?>
										<div class="vc_row wpb_row vc_inner vc_row-fluid">
											<div class="padding-35 wpb_column vc_column_container vc_col-sm-12">
												<div class="vc_column-inner ">
													<div class="wpb_wrapper">
														<div class="wpb_text_column wpb_content_element ">
															<div class="wpb_wrapper">
																<?php while ( have_posts() ) : the_post(); ?>
																	<?php get_template_part( 'loop-templates/content-product' ); ?>		 
																	
																<?php endwhile; ?>
																
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="brackcum-footer">
											
										</div>
									<?php else : ?>

										<?php get_template_part( 'loop-templates/content', 'none' ); ?>

									<?php endif; ?>


								</div>
							</div>


						</div>
					</div>

				

			</main><!-- #main -->

			<!-- The pagination component -->
			

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
