<?php
get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
<div id="page-wrapper" class="wrapper">
  <div id="content" class="container">
    <div class="row">
      <div class="col-md-12 content-area">
        <main id="main" class="site-main">
          <div id="main-card-detail" class="wrap-main-area">
            <div class="wrap-main">
              <div class="wrap-title-area">
                <div class="div-title right">
                  <h3 class="title-noidung"><?php echo get_post_meta(get_the_ID(), 'wpcf-ma-so', true) ?> - <?php echo get_the_title();?></h3>
                </div>
              </div>
              <div class="wrap-content-area">
								<div class="row">
									<div class="col-md-4">
                    <div class="card-image">
                      <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full');  ?>" alt="<?php echo get_the_title() ?>" />
                    </div>
									</div>
									<div class="col-md-8">
										<table width="100%" border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td class="td-title">Đội bóng</td>
												<td class="td-content">
                          <?php
                          $term = wp_get_post_terms(get_the_ID(), 'doi');
                          echo $term[0]->name;
                          ?>
                        </td>
												<td class="td-title">Khối</td>
												<td class="td-content">
                          <?php
                          $term = wp_get_post_terms(get_the_ID(), 'khoi');
                          echo $term[0]->name;
                          ?>
                        </td>
											</tr>
											<tr>
												<td class="td-title">Vị trí</td>
												<td class="td-content">
                          <?php
                          $term = wp_get_post_terms(get_the_ID(), 'vi-tri');
                          echo $term[0]->name;
                          ?>
                        </td>
												<td class="td-title">Độ hiếm</td>
												<td class="td-content">
                          <?php
                          $term = wp_get_post_terms(get_the_ID(), 'do-hiem');
                          $thumb = get_term_meta( $term[0]->term_id, 'wpcf-thumb', true);
                          if (empty($thumb)) {
                            echo $term[0]->name;
                          } else {
                          ?>
                          <img class="icon-dohiem" src="<?php echo $thumb ?>" alt="<?php echo $term[0]->name ?>" />
                          <?php } ?>
                        </td>
											</tr>
											<tr>
												<td class="td-title">Chỉ số</td>
												<td class="td-content">
                          <div class="icon-bg-diem icon-bg-dobong">
                              <span><?php echo get_post_meta(get_the_ID(), 'wpcf-diem-do-bong', true); ?></span>
                          </div>
                          <div class="icon-bg-diem icon-bg-chuyenbong">
                              <span><?php echo get_post_meta(get_the_ID(), 'wpcf-diem-chuyen-bong', true); ?></span>
                          </div>
                          <div class="icon-bg-diem icon-bg-dapbong">
                              <span><?php echo get_post_meta(get_the_ID(), 'wpcf-diem-dap-bong', true); ?></span>
                          </div>
                          <div class="icon-bg-diem icon-bg-chanbong">
                              <span><?php echo get_post_meta(get_the_ID(), 'wpcf-diem-chan-bong', true); ?></span>
                          </div>
                        </td>
                        <td colspan=2>
                          <img class="icon-giao icon-textgiao" src="<?php echo get_template_directory_uri().'/images/icon_text_giao.png' ?>" alt="<?php echo $term[0]->name ?>" />
                          <?php
                          $intGiao = get_post_meta(get_the_ID(), 'wpcf-diem-giao-bong', true);
                          if($intGiao > 0) {
                          for($i=0;$i<$intGiao;$i++) {
                          ?>
                          <img class="icon-giao" src="<?php echo get_template_directory_uri().'/images/icon_giao.png' ?>" />
                        <?php }} ?>
                        </td>
											</tr>
											<tr>
												<td class="td-title">Năng lực</td>
												<td class="td-content" colspan=3>
                          <?php
                          $terms = wp_get_post_terms(get_the_ID(), 'nang-luc');
                          if(count($terms) > 0){
                            echo '<div class="lists-icon-nangluc">';
                            foreach ($terms as $term) {
                              $thumb = get_term_meta( $term->term_id, 'wpcf-thumb', true);
                              echo '<img class="" src="'.$thumb.'" alt="'.$term->name.'" />';
                            }
                            echo '</div>';
                          }
                          ?>
                          <?php
                          $terms = wp_get_post_terms(get_the_ID(), 'thoi-diem');
                          if(count($terms) > 0){
                            echo '<div class="lists-icon-nangluc lists-icon-thoidiem">';
                            foreach ($terms as $term) {
                              $thumb = get_term_meta( $term->term_id, 'wpcf-thumb', true);
                              echo '<img class="" src="'.$thumb.'" alt="'.$term->name.'" />';
                            }
                            echo '</div>';
                          }
                          ?>
                          <?php echo get_post_meta(get_the_ID(), 'wpcf-nang-luc', true); ?>
                        </td>
											</tr>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
                    <div class="card-description">
                      <div class="title-description">
                        <h3>Mô tả</h3>
                      </div>
                      <div class="content-description">
                        <?php the_content() ?>
                      </div>
                    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</main>
			</div>
		</div>
	</div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
