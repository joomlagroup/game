<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<div class="vc_row wpb_row vc_row-fluid">
		<div class="box-noidung single-pr wpb_column vc_column_container vc_col-sm-12 ">
			<div class="vc_column-inner  ">
				<div class="wpb_wrapper" style="padding-top: 65px;">
					<div class="wpb_text_column wpb_content_element">
						<div class="wpb_wrapper">
							<div class="div-title right">
							<?php $post_type = get_post_type_object( get_post_type($post) ); ?>
						
							<h3 class="title-noidung"><?php echo $post_type->label ?></h3>
						</div>

						</div>
					</div>
					<div class="vc_row wpb_row vc_inner vc_row-fluid">
						<div class="wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner ">
								<div class="wpb_wrapper">
									<div class="wpb_text_column wpb_content_element ">
										<div class="wpb_wrapper">
											<div class="content-single-post">
											<div class="Titlebox"><?php the_title(); ?></div>
											<div class="content-pr">
												
												<div class="the-content">
												<div class="content-img">
														 <?php the_post_thumbnail(); ?>
												</div>
												<?php the_content(); ?>
												</div>
												<div class="footer-single-product">
													<div><a href="#single-wrapper"><- Trở về đầu trang</a></div>
													<?php $categories = get_the_category(); ?>
													<div><a href="<?php echo get_home_url(); ?>/<?php printf( __( '%s', 'understrap' ), get_post_type( get_the_ID() ) ); ?>"><- Trở về <?php echo $post_type->label ?></a></div>
														
													<?php foreach( $categories as $category ) {
    echo $category->term_id . ', ' . $category->slug . ', ' . $category->name . '<br />';
} ?>
													
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
		</div>
	</div>

</article><!-- #post-## -->

