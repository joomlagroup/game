<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<div class="vc_row wpb_row vc_row-fluid">
		<div class="box-noidung wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner  ">
				<div class="wpb_wrapper" style="padding-top: 65px;">
					<div class="wpb_text_column wpb_content_element">
						<div class="wpb_wrapper">
							<div class="div-title right">
							<h3 class="title-noidung"><?php if (in_category( array( 8) )) {  echo 'Dành cho người mới'; }else {echo 'Dành cho phụ huynh';} ?></h3>
						</div>

						</div>
					</div>
					<div class="vc_row wpb_row vc_inner vc_row-fluid">
						<div class="padding-35 wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner ">
								<div class="wpb_wrapper">
									<div class="wpb_text_column wpb_content_element ">
										<div class="wpb_wrapper">
												<?php
												$categories = get_the_category(get_the_ID());
												if ($categories){
												    echo '<div class="relatedcat">';
												    $category_ids = array();
												    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
												    $args=array(
												        'category__in' => $category_ids,
												        'post__not_in' => array(get_the_ID()),
												        'posts_per_page' => 5, 
												        'orderby' => 'date',
												    );
												    $my_query = new wp_query($args);
												    if( $my_query->have_posts() ):
												        echo '<ul class="i-hoidap">';
												        while ($my_query->have_posts()):$my_query->the_post();
												            ?>
												            <li class="i-hd"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
												            <?php
												        endwhile;
												        echo '</ul>';
												    endif; wp_reset_query();
												    echo '</div>';
												}
											?>
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
	
	

	<div class="box-noidung wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner ">
			<div class="wpb_wrapper" style="padding-top: 65px;">
					<div class="wpb_text_column wpb_content_element ">
						<div class="wpb_wrapper" >
							<div class="div-title right">
								<h3 class="title-noidung">Giải đáp</h3>
							</div>

						</div>
					</div>
				<div class="vc_row wpb_row vc_inner vc_row-fluid">
					<div class="padding-35 wpb_column vc_column_container vc_col-sm-12">
						<div class="vc_column-inner ">
							<div class="wpb_wrapper">
								<h3 class="title-single-hoidap"><?php the_title(); ?></h3>
								<?php the_content(); ?>
								<div class="footer-single-hoidap">
									<a href="#single-wrapper" class="link-single-hoidap"><-Trở về đầu trang</a>
									<a href="<?php echo get_home_url(); ?>/gioi-thieu" class="link-single-hoidap"><-Trở về phần giới thiệu</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</article><!-- #post-## -->
