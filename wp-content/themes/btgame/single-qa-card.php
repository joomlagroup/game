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
			<main class="site-main" id="main" style="padding-right: 15px; padding-left: 15px;">
				<div class="box-noidung">
					<div class="vc_column-inner">
						<div class="wpb_wrapper">
							<?php $dem=1; ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="header-single-qacard">
									<ul id="" class="list-item-ds ds-bo-co">
									<li class="header-list-ds"><?php the_field('sku_card'); the_title();  ?></li>
									</ul>
									
								</div>
								<div class="img-single-qacard">
									<?php the_post_thumbnail('full'); ?>
								</div>
								<div class="list-single-qacard">
									<?php $rows = get_field('list-qa-card');
									   if($rows)
								            {
								                echo '<div id="accordion" class="panel-group">  ';

								                foreach($rows as $row) {  ?> 
								                     
								                    <div class="panel">
								                        <div href="#panelBody<?php echo $dem ?>" class="accordion-toggle collapsed hoidap-header" data-toggle="collapse" data-parent="#accordion">
								                            <div class="hd-1">Câu hỏi <?php echo $dem ?></div>
								                            <div class="hd-2"><?php echo $row['qa-question'] ?></div>
								                        </div>                  
								                        <div id="panelBody<?php echo $dem ?>" class="panel-collapse collapse hoidap-content">
								                           <div class="hd-1">Trả lời <?php echo $dem ?></div>
								                            <div class="hd-2"><?php echo $row['qa-answer'] ?></div>
								                        </div>
								                    </div>
								                  
								                <?php $dem++; }

								                echo '</div>';
								            } ?>
								</div>
								<div class="footer-single-qacard">
									<a href="/~jpwebseo/demo/Haikyu/hoi-dap-ve-quan-co/"> <- Trở về Hỏi đáp quân cờ </a>
								</div>
							<?php endwhile; // end of the loop. ?>
						</div>
					</div>
				</div>

			</main>
		</div>
	</div>
</div>
<?php get_footer(); ?>
	