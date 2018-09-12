<?php
/*
Template name: Page - Bảng xếp hạng
*/
get_header();
?>

<?php
while ( have_posts() ) : the_post();
$page_title = get_the_title();
$content = get_the_content();
endwhile; ?>
<?php
$numberID = isset($_GET['numberid']) ? $_GET['numberid'] : '';
$city = isset($_GET['city']) ? $_GET['city'] : 0;
$hoten = isset($_GET['hoten']) ? $_GET['hoten'] : '';
?>
<div id="page-wrapper" class="wrapper">
  <div id="content" class="container">
    <div class="row">
      <div class="col-md-12 content-area">
        <main id="main" class="site-main">
          <div class="wrap-main-area">
            <div class="wrap-main">
              <div class="wrap-title-area">
                <div class="div-title right">
                  <h3 class="title-noidung"><?php echo $page_title;?></h3>
                </div>
              </div>
              <div class="wrap-content-area">
                <div class="wrap-content">
                  <form action="<?php echo  esc_url('#') ?>" method="GET">
                  <div class="wrap-filter-user">
                    <?php if(!empty($content)) { ?>
                    <div class="rank-content">
                      <?php echo $content ?>
                    </div>
                    <?php } ?>
                    <div class="filter-row filter-row-rank">
                      <div class="row-wrap">
                        <div class="filter-col">
                          <div class="wrap-field">
                            <label>Số ID: </label>
                            <input type="text" name="numberid" value="<?php echo $numberID ?>" placeholder="Số ID" class="filter-field w-150" />
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field">
                            <label>Họ Tên: </label>
                            <input type="text" name="hoten" value="<?php echo $hoten ?>" placeholder="Điền họ tên" class="filter-field w-150" />
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field">
                            <label>Tỉnh/Thành phố</label>
                            <div class="wrap-select">
                              <?php
                              $fields = get_option('wpcf-usermeta');
                              $listsCity = $fields['city']['data']['options'];
                              ?>
                              <select name="city" class="filter-field w-150" >
                                <option value="0">Tất cả</option>
                                <?php
                                $arrCity = [];
                                foreach ($listsCity as $key => $value) {
								                if(isset($value['value']) && isset($value['title'])) {
                                    $arrCity[$value['value']] = $value['title'];
                                ?>
                                <option value="<?php echo $value['value'] ?>" <?php if($value['value']==$city) echo "selected='selected'" ?>><?php echo $value['title'] ?></option>
                                <?php }} ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field">
                            <button type="submit" name="submit" value="<?php echo rand() ?>" class="btn-search"></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </form>
                  <div class="wrap-lists-rank">
                    <?php
                    $current_page = get_query_var('paged') ? (int) get_query_var('paged') : 1;
                    $users_per_page = 20;
                    $args = array();
                    $args['number'] = $users_per_page;
                    //$args['paged'] = $current_page;
                    if (!empty($hoten)) {
                      $args['search'] = "*{$hoten}*";
                      $args['search_columns'] = array(
                          'display_name'
                      );
                    }
                    if (!empty($numberID)) {
                        $args['meta_query'][] = array(
                            'key'     => 'wpcf-number-id',
                            'value'   => $numberID
                        );
                    }
                    if (is_numeric($city) && $city > 0) {
                        $args['meta_query'][] = array(
                            'key'     => 'wpcf-city',
                            'value'   => $city,
                            'compare' => '='
                        );
                    }
                    $args['role__not_in'] = 'Administrator';
                    $args['meta_key'] = 'wpcf-point';
					          $args['orderby'] = 'meta_value_num';
                    $args['order'] = 'DESC';
                    global $wp_query;
                    $wp_query = new WP_User_Query($args);
                    $total_users = $wp_query->get_total();
					          //echo $total_users;
                    $num_pages = ceil($total_users / $users_per_page);
                    ?>
                    <div class="wrap-list-items">
                      <div class="users-lists">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <th>Hạng</th>
                            <th>Số ID</th>
                            <th>Họ Tên</th>
                            <th>Tỉnh/Thành Phố</th>
                            <th>Điểm</th>
                          </tr>
                          <?php
						              $stt = 0;
                          foreach ( $wp_query->get_results() as $user ) { $stt++ ?>
    					            <tr>
    						           <td>
								              <?php echo $stt ?>
                            </td>
                            <td><?php echo get_user_meta($user->ID, 'wpcf-number-id', true); ?></td>
                            <td><?php echo $user->display_name ?></td>
                            <td>
                              <?php
                              $valueCity = get_user_meta($user->ID, 'wpcf-city', true);
                              echo isset($arrCity[$valueCity]) ? $arrCity[$valueCity] : '';
                              ?>
                            </td>
                            <td><?php echo get_user_meta($user->ID, 'wpcf-point', true);?></td>
							             </tr>
                        <?php } ?>
                      </table>
                      </div>
                      <div class="pagination-wrap clr">
                        <?php	
					          	    $big = 999999999;
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
                            ));
                        wp_reset_postdata();
                        ?>
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

<?php get_footer(); ?>
