<?php
/*
Template name: Page - Giải đấu đã tổ chức
*/
get_header();
?>
<?php
while ( have_posts() ) : the_post();
$page_title = get_the_title();
endwhile; ?>
<div class="wrapper" id="archive-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">

			<main class="site-main container" id="main">
				<div class="vc_row wpb_row vc_row-fluid">
						<div class="box-noidung wpb_column vc_column_container col-sm-12">
							<div class="vc_column-inner ">
								<div class="wpb_wrapper">
									<div class="wpb_text_column wpb_content_element ">
										<div class="wpb_wrapper wpb_text_column wpb_content_element ">
											<div class="div-title right ">
													<h3 class="title-noidung">
													<?php 
													echo $page_title;
													?>
													</h3>
											</div>
									    </div>
                                    <?php
                                    global $wp_query;
                                    $today = date('Ymd');
                                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                                    $args = array (   
                                        'post_type'  =>  'giai-dau' ,
                                        'orderby' => 'date',
                                        'posts_per_page' => 2,
                                        'paged' => $paged
                                
                                    );  
                                    $args['meta_query'][] = array(
                                        'key'     => 'ngay-du-kien',
                                        'compare' => '<',
                                        'value'   => $today,
                                    );
                                    $wp_query = new WP_Query($args);
                                    ?>
									<?php if($wp_query->have_posts()) { ?>
										    <div class="vc_row wpb_row vc_inner vc_row-fluid">		 									
												<div class="padding-35 wpb_column vc_column_container vc_col-sm-12">
													<div class="vc_column-inner ">
														<div class="wpb_wrapper">
															<div class="wpb_text_column wpb_content_element ">
																<div class="wpb_wrapper">
																	<ul class="post-content">
                                                                     <?php 
                                                                        while ($wp_query->have_posts()) {  $wp_query->the_post(); 
                                                                        $date = get_field('ngay-du-kien', false, false);
                                                                        $date = new DateTime($date);
                                                                        ?> 
                                                                        <div class="container-congdong giai-dau-du-kien">
                                                                            <a href="<?php the_permalink(); ?>">
                                                                                <?php the_post_thumbnail('thum-congdong', array('class' => 'thumcd-img')); ?>
                                                                            </a>
                                                                            <div class="content-congdong  <?php $category = get_the_category(); 
                                                                                echo $category[0]->slug; ?>" >
                                                                                <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>                
                                                                                <ul>
                                                                                    <li class="gd-date">Ngày:  <?php echo $date->format('d-m-Y'); ?></li>
                                                                                    <li  class="gd-diadiem">Địa điểm: <?php echo $location; ?> </li>
                                                                                    <li class="gd-motangan">Thể lệ & Phần thưởng: <a href="<?php the_permalink(); ?>">Nhấp vào để xem</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <?php }?>	
																	</ul>	
																</div>
															</div>
														</div>
													</div>
												</div>
										    </div>
                                            <div class="pagination-wrap clr">
                                            <?php
                                            if (function_exists("understrap_pagination")) {
                                                understrap_pagination();
                                            }
                                            wp_reset_query();
                                            ?>
                                            </div>
                                    <?php } ?>
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
