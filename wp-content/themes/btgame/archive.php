<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header(); 
$postType = get_post_type();
?>



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
											<div class="div-title right ">
												<?php if ($postType == 'post') { ?>
													<h3 class="title-noidung">
													<?php 
													echo sprintf( __( '%s' ), single_cat_title( '', false ) );
													?>
													</h3>
												<?php } else { ?>
													<?php $title = sprintf( __( '%s' ), single_cat_title( '', false ) ); ?>
													<h3 class="title-noidung"><?php post_type_archive_title(); ?></h3>
												<?php } ?>
											</div>
									</div>
									<?php if ( have_posts() ) : ?>
										<div class="vc_row wpb_row vc_inner vc_row-fluid">		 									
												<div class="padding-35 wpb_column vc_column_container vc_col-sm-12">
													<div class="vc_column-inner ">
														<div class="wpb_wrapper">
															<div class="wpb_text_column wpb_content_element ">
																<div class="wpb_wrapper">
																	<?php if ($postType == 'post') { ?>	
																		<ul class="post-content">
																		<?php while ( have_posts() ) : the_post(); 
																			get_template_part( 'loop-templates/content-default' ); 
																		 endwhile; ?>
																		</ul>	
																	 <?php } else { ?>	
																		<?php while ( have_posts() ) : the_post(); 
																			get_template_part( 'loop-templates/content-sukien' ); 
																		 endwhile; ?>																		 
																	<?php } ?>
																</div>
															</div>
														</div>
													</div>
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
				
				</div>
			</main><!-- #main -->	
	</div> <!-- .row -->
</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>
