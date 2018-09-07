<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header(); ?>



<div class="wrapper" id="archive-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<!-- Do the left sidebar check -->
			
			<main class="site-main container" id="main">

				<div class="vc_row wpb_row vc_row-fluid">
						<div class="box-noidung wpb_column vc_column_container col-sm-12">
							<div class="vc_column-inner ">
								<div class="wpb_wrapper">
									<div class="wpb_text_column wpb_content_element ">
										<div class="wpb_wrapper">
											<div class="div-title right">
												<?php $title = sprintf( __( '%s' ), single_cat_title( '', false ) ); ?>
												<h3 class="title-noidung"><?php post_type_archive_title(); ?></h3>
											</div>
									</div>
									<h3 class="page-title" style="color: #fff; margin-bottom: 35px;font-size: 20px;"><?php printf( esc_html__( 'Kết quả tìm kiếm từ khóa: %s', 'understrap' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
									<?php if ( have_posts() ) : ?>
										<div class="vc_row wpb_row vc_row-fluid row">
										

												<div class="wpb_column vc_column_container col-lg-9">
													<?php while ( have_posts() ) : the_post(); ?>
														<div class="box-chienthuat">
															<div class="archive-ct">
																<div class="archive-ct-img ">
																	 <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thum-350x220'); ?></a>
																</div>
																<div class="archive-ct-ex">
																	<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
																	<div><?php the_excerpt(); ?></div>
																	<?php echo getpostviews( get_the_ID() ); ?>
																</div>
															</div>
															<div class="archive-link-ct">
																<a href="<?php the_permalink(); ?>"><span class="date"><?php the_time('d-m-Y') ?></span><span class="more">Read More ></span></a>
															</div>
														</div>
													<?php endwhile; ?>								
												</div>
												<div class=" wpb_column vc_column_container col-lg-3">	
													<?php dynamic_sidebar( 'right-sidebar' ); ?>								
												</div>
												
											
										</div>
										<div class="brackcum-footer">
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
	</div> <!-- .row -->
</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>
