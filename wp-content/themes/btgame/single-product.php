<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<div class="vc_column-inner "><div class="wpb_wrapper"><div class="vc_row wpb_row vc_inner vc_row-fluid"><div class="box-noidung single-pr wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
								<div class="wpb_text_column wpb_content_element ">
									<div class="wpb_wrapper">
										<div class="div-title right">
											<h3 class="title-noidung">Sản phẩm</h3>
										</div>

										<?php while ( have_posts() ) : the_post(); ?>

										<div class="content-product">
											<div class="Titlebox"><?php the_title(); ?></div>
											<div class="content-pr">
												<div class="header-pr">
													<div class="content-img">
														 <?php the_post_thumbnail(); ?>
													</div>
													<div class="content-acf">
														<table width="" border="0" cellpadding="0" cellspacing="0">
														      <tbody>
														      	<tr>
																	<td class="title">Tên sản phẩm: </td>
																	<td><?php the_title(); ?></td>
																</tr>
																<tr>
																	<td class="title">Loại sản phẩm: </td>
																	<td>
																<?php 
																	$terms = get_the_terms( $post->ID, 'product-cat' );
																	if ( !empty( $terms ) ){
																	    // get the first term
																	   foreach ( $terms as $cat){
																		   echo '<span>';
																		   echo $cat->name;
																		     echo '</span>';
																		}
																	}

																	?>
																	</td>
																</tr>
																<tr>
																	<td class="title">Tổng số quân: </td>
																	<td><?php the_field('tong-so-quan'); ?></td>
																</tr>
																<tr>
																	<td class="title">Ngày phát hành: </td>
																	<td><?php the_field('ngay-phat-hanh'); ?></td>
																</tr>
																<tr>
																	<td class="title">Giá bán lẻ: </td>
																	<td><?php the_field('gia-ban-le'); ?></td>
																</tr>
														    </tbody>
														</table>
													</div>
												</div>
												<div class="the-content">
												<?php the_content(); ?>
												</div>
												<div class="footer-single-product">
													<?php 
													if ( !empty( $terms ) ){
														foreach ( $terms as $cat){
														echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" class="link-to-category">' . esc_html( $cat->name ) . '</a>';
														} 
																		}
													?>
												</div>
											</div>
										</div>
										<?php endwhile; // end of the loop. ?>
										
									
									</div>
								</div>

								
							</div></div></div></div></div></div>
			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
