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


<div class="wrapper" id="archive-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<!-- Do the left sidebar check -->
			<?php get_template_part( 'loop-templates/header-pr-archive' ); ?>
			<main class="site-main" id="main">
				
					<div class="vc_row wpb_row vc_row-fluid">
						<div class="box-noidung product-cat wpb_column vc_column_container col-sm-12">
							<div class="vc_column-inner ">
								<div class="wpb_wrapper">
									<div class="wpb_text_column wpb_content_element  vc_custom_1529982080832">
										<div class="wpb_wrapper">
											<div class="div-title right">
												<?php $title = sprintf( __( '%s' ), single_cat_title( '', false ) ); ?>
													<h3 class="title-noidung"><?php echo $title ?></h3>
											</div>
										</div>
									</div>
									<?php if ( have_posts() ) : ?>
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
											<?php	
											/*$big = 999999999;
											echo paginate_links(array(
												'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
												'format' => '?paged=%#%',
												'current' => $current_page,
												'total' => $num_pages,
												'prev_next'    => true,
												'show_all'     => false,
												'end_size'           => 1,
												'mid_size'           => 2,
												'prev_next'          => true,
												'prev_text'          => __('<span aria-hidden="true"><i class="fa fa-caret-left" aria-hidden="true"></i></span>'),
												'next_text'          => __('<span aria-hidden="true"><i class="fa fa-caret-right" aria-hidden="true"></i></span>'),
												'add_args'           => false,
												'add_fragment'       => '',
												'before_page_number' => '',
												'after_page_number'  => '',							
												'type'         => 'list'
												));*/
											?>											
											<?php understrap_pagination(); ?>
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
