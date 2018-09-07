<?php
/*
Template name: Page - Thư viện
*/
get_header();
?>

<?php
while ( have_posts() ) : the_post();
$page_title = get_the_title();
endwhile; ?>
<?php
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$loaiquanco = isset($_GET['loaiquanco']) ? $_GET['loaiquanco'] : 0;
$timtheo = isset($_GET['timtheo']) ? $_GET['timtheo'] : [];
$boco = isset($_GET['boco']) ? $_GET['boco'] : 0;
$doi = isset($_GET['doi']) ? $_GET['doi'] : 0;
$khoi = isset($_GET['khoi']) ? $_GET['khoi'] : 0;
$vitri = isset($_GET['vitri']) ? $_GET['vitri'] : 0;
$giaoMin = isset($_GET['giao-min']) ? $_GET['giao-min'] : '';
$giaoMax = isset($_GET['giao-max']) ? $_GET['giao-max'] : '';
$doMin = isset($_GET['do-min']) ? $_GET['do-min'] : '';
$doMax = isset($_GET['do-max']) ? $_GET['do-max'] : '';
$chuyenMin= isset($_GET['chuyen-min']) ? $_GET['chuyen-min'] : '';
$chuyenMax = isset($_GET['chuyen-max']) ? $_GET['chuyen-max'] : '';
$chanMin = isset($_GET['chan-min']) ? $_GET['chan-min'] : '';
$chanMax = isset($_GET['chan-max']) ? $_GET['chan-max'] : '';
$dapMin = isset($_GET['dap-min']) ? $_GET['dap-min'] : '';
$dapMax = isset($_GET['dap-max']) ? $_GET['dap-max'] : '';
$dohiem = isset($_GET['dohiem']) ? $_GET['dohiem'] : 0;
$nangluc = isset($_GET['nangluc']) ? $_GET['nangluc'] : 0;
$thoidiem = isset($_GET['thoidiem']) ? $_GET['thoidiem'] : 0;
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
                  <form id="smform" action="<?php echo  esc_url('#') ?>" method="GET" role="search">
                  <div class="wrap-filter-card">
                    <div class="filter-row">
                      <div class="row-wrap">
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-100">
                            <h3>Từ Khóa</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field wrap-keyword field-1">
                            <input type="text" name="keyword" value="<?php echo $keyword ?>" class="filter-field w-300 w-sm-120" />
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-100">
                            <h3>Loại quân cờ</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field wrap-card-type field-2">
                            <div class="wrap-select">
                              <select name="loaiquanco" class="filter-field w-150 w-sm-120 loaiquanco" >
                                <option value="">Tất cả</option>
                                <option value="1" <?php if($loaiquanco==1) echo "selected='selected'" ?>>Nhân vật</option>
                                <option value="2" <?php if($loaiquanco==2) echo "selected='selected'" ?>>Hành động</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="filter-row">
                      <div class="row-wrap">
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-100">
                            <h3>Tìm theo</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field text-center w-find">
                              <div class="custom-control-group">
                                <label class="custom-control control--checkbox">Mã số
                                  <input type="checkbox" name="timtheo[]" value="ma-so" <?php if(in_array('ma-so', $timtheo)) echo "checked='checked'" ?> />
                                  <div class="control__indicator"></div>
                                </label>
                                <label class="custom-control control--checkbox">Tên quân cờ
                                  <input type="checkbox" name="timtheo[]" value="quan-co" <?php if(in_array('quan-co', $timtheo)) echo "checked='checked'" ?> />
                                  <div class="control__indicator"></div>
                                </label>
                                <label class="custom-control control--checkbox">Năng lực
                                  <input type="checkbox" name="timtheo[]" value="nang-luc" <?php if(in_array('nang-luc', $timtheo)) echo "checked='checked'" ?> />
                                  <div class="control__indicator"></div>
                                </label>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="filter-row">
                      <div class="row-wrap">
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-120">
                            <h3>Tên bộ cờ</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field wrap-type field-3">
                            <?php
                            $terms = get_terms( array(
                                'taxonomy' => 'bo-co',
                                'hide_empty' => false,
                            ));
                            ?>
                            <div class="wrap-select">
                              <select name="boco" class="filter-field w-300 w-sm-120" >
                                <option value="0">Tất cả</option>
                                <?php
                                foreach ( $terms as $term ) { ?>
                                <option value="<?php echo $term->term_id ?>" <?php if($boco==$term->term_id) echo "selected='selected'" ?>><?php echo $term->name ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="filter-row">
                      <div class="row-wrap">
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-100">
                            <h3>Đội</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field wrap-team field-4">
                            <?php
                            $terms = get_terms( array(
                                'taxonomy' => 'doi',
                                'hide_empty' => false,
                            ));
                            ?>
                            <div class="wrap-select">
                              <select name="doi" class="filter-field w-150 w-sm-120" >
                                <option value="">Tất cả</option>
                                <?php
                                foreach ( $terms as $term ) { ?>
                                <option value="<?php echo $term->term_id ?>" <?php if($doi==$term->term_id) echo "selected='selected'" ?>><?php echo $term->name ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-100">
                            <h3>Khối</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field wrap-section field-5">
                            <?php
                            $terms = get_terms( array(
                                'taxonomy' => 'khoi',
                                'hide_empty' => false,
                            ));
                            ?>
                            <div class="wrap-select">
                              <select name="khoi" class="filter-field w-150 w-sm-120" >
                                <option value="">Tất cả</option>
                                <?php
                                foreach ( $terms as $term ) { ?>
                                <option value="<?php echo $term->term_id ?>" <?php if($khoi==$term->term_id) echo "selected='selected'" ?>><?php echo $term->name ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-100">
                            <h3>Vị trí</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field wrap-position field-6">
                            <?php
                            $terms = get_terms( array(
                                'taxonomy' => 'vi-tri',
                                'hide_empty' => false,
                            ));
                            ?>
                            <div class="wrap-select">
                              <select name="vitri" class="filter-field w-150 w-sm-120" >
                                <option value="">Tất cả</option>
                                <?php
                                foreach ( $terms as $term ) { ?>
                                <option value="<?php echo $term->term_id ?>" <?php if($vitri==$term->term_id) echo "selected='selected'" ?>><?php echo $term->name ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="filter-row">
                      <div class="row-wrap">
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-70">
                            <h3>Giao</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field wrap-giao w-150 w-sm-120 text-center field-7">
                              <input type="text" name="giao-min" value="<?php echo $giaoMin ?>" class="filter-field w-40" />
                              <span> ~ </span>
                              <input type="text" name="giao-max" value="<?php echo $giaoMax ?>" class="filter-field w-40" />
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-70">
                            <h3>Đỡ</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field wrap-do field-8">
                            <div class="wrap-field wrap-team w-150 w-sm-120 text-center">
                                <input type="text" name="do-min" value="<?php echo $doMin ?>" class="filter-field w-40" />
                                <span> ~ </span>
                                <input type="text" name="do-max" value="<?php echo $doMax ?>" class="filter-field w-40" />
                            </div>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-70 ">
                            <h3>Chuyền</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field wrap-chuyen field-9">
                            <div class="wrap-field wrap-chuyen w-150 w-sm-120 text-center">
                                <input type="text" name="chuyen-min" value="<?php echo $chuyenMin ?>" class="filter-field w-40" />
                                <span> ~ </span>
                                <input type="text" name="chuyen-max" value="<?php echo $chuyenMax ?>" class="filter-field w-40" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="filter-row">
                      <div class="row-wrap">
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-70">
                            <h3>Chặn</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field wrap-chan w-150 w-sm-120 text-center field-11">
                              <input type="text" name="chan-min" value="<?php echo $chanMin ?>" class="filter-field w-40" />
                              <span> ~ </span>
                              <input type="text" name="chan-max" value="<?php echo $chanMax ?>" class="filter-field w-40" />
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-70">
                            <h3>Đập</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field wrap-dap">
                            <div class="wrap-field wrap-team w-150 w-sm-120 text-center field-10">
                                <input type="text" name="dap-min" value="<?php echo $dapMin ?>" class="filter-field w-40" />
                                <span> ~ </span>
                                <input type="text" name="dap-max" value="<?php echo $dapMax ?>" class="filter-field w-40" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="filter-row">
                      <div class="row-wrap">
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-100">
                            <h3>Độ hiếm</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field wrap-hiem field-12">
                            <?php
                            $terms = get_terms( array(
                                'taxonomy' => 'do-hiem',
                                'hide_empty' => false,
                            ));
                            ?>
                            <div class="wrap-select">
                              <select name="dohiem" class="filter-field w-150 w-sm-120" >
                                <option value="">Tất cả</option>
                                <?php
                                foreach ( $terms as $term ) { ?>
                                <option value="<?php echo $term->term_id ?>" <?php if($dohiem==$term->term_id) echo "selected='selected'" ?>><?php echo $term->name ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="filter-row">
                      <div class="row-wrap">
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-120">
                            <h3>Biểu tượng năng lực</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field wrap-chan w-150 w-sm-120 text-center field-13">
                            <?php
                            $terms = get_terms( array(
                                'taxonomy' => 'nang-luc',
                                'hide_empty' => false,
                            ));
                            ?>
                            <div class="wrap-select">
                              <select name="nangluc" class="filter-field w-150 w-sm-120" >
                                <option value="">Tất cả</option>
                                <?php
                                foreach ( $terms as $term ) { ?>
                                <option value="<?php echo $term->term_id ?>" <?php if($nangluc==$term->term_id) echo "selected='selected'" ?> ><?php echo $term->name ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="filter-title w-150 w-sm-120">
                            <h3>Biểu tượng thời điểm</h3>
                          </div>
                        </div>
                        <div class="filter-col">
                          <div class="wrap-field wrap-thoidiem field-14">
                            <div class="wrap-field wrap-team w-150 w-sm-120 text-center">
                              <?php
                              $terms = get_terms( array(
                                  'taxonomy' => 'thoi-diem',
                                  'hide_empty' => false,
                              ));
                              ?>
                              <div class="wrap-select">
                                <select name="thoidiem" class="filter-field w-150 w-sm-120" >
                                  <option value="">Tất cả</option>
                                  <?php
                                  foreach ( $terms as $term ) { ?>
                                  <option value="<?php echo $term->term_id ?>" <?php if($thoidiem==$term->term_id) echo "selected='selected'" ?> ><?php echo $term->name ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="filter-row-btn">
                    <input type="submit" name="submit" value="" id="btn-search-card" class="btn-search" />
                  </div>
                  </form>
                  <div class="wrap-lists-card">
                    <div class="wrap-list-group fl">
                      <div class="wrap-field">
                        <label class="lbl-radio-boco">Tên bộ cờ</label>
                        <?php
                        $terms = get_terms( array(
                            'taxonomy' => 'bo-co',
                            'hide_empty' => false,
                        ));
                        ?>
                        <div class="wrap-radio">
                          <label class="custom-control control--radio w-100p">Tất cả
                            <input type="radio" name="radio-boco" class="radio-boco" value="0" <?php if(0==$term->term_id) echo 'checked="checked"' ?> />
                            <div class="control__indicator"></div>
                          </label>						
                          <?php
                          $terms_boco = array();
                          foreach ( $terms as $term ) {
                          $terms_boco[$term->term_id] = [
                            'name' => $term->name,
                            'id' => $term->term_id,
							              'desc' => $term->description
                          ]
                          ?>
                          <label class="custom-control control--radio w-100p"><?php echo $term->name ?>
                            <input type="radio" name="radio-boco" class="radio-boco" value="<?php echo $term->term_id ?>" <?php if($boco==$term->term_id) echo 'checked="checked"' ?> />
                            <div class="control__indicator"></div>
                          </label>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <?php
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $args = array();
                    $args['post_type'] = 'quan-co';
                    $args['posts_per_page'] = 20;
                    $args['paged'] = $paged;
                    $args['post_status'] = 'publish';
                    $args['meta_key'] = 'wpcf-ma-so';
                    $args['orderby'] = 'meta_value';
                    $args['order'] = 'asc';
                    $args['meta_query'] =  array();
                    if ($loaiquanco > 0) {
                        $args['meta_query'][] = array(
                            'key'     => 'wpcf-loai-quan-co',
                            'value'   => $loaiquanco,
                            'compare' => '='
                        );
                    }
                    if (is_numeric($giaoMin) || is_numeric($giaoMax)) {
                        if (!is_numeric($giaoMin) || $giaoMin < 0 ) {
                          $giaoMin = 0;
                        }
                        if (!is_numeric($giaoMax) || $giaoMax < 0 ) {
                          $giaoMax = $giaoMin;
                        }
                        $args['meta_query'][] = array(
                            'key'     => 'wpcf-diem-giao-bong',
                            'value'   => array($giaoMin, $giaoMax),
                            'compare' => 'BETWEEN',
                            'type' => 'SIGNED'
                        );
                    }
                    if (is_numeric($doMin) || is_numeric($doMax)) {
                        if (!is_numeric($doMin) || $doMin < 0 ) {
                          $doMin = 0;
                        }
                        if (!is_numeric($doMax) || $doMax < 0 ) {
                          $doMax = $doMin;
                        }
                        $args['meta_query'][] = array(
                            'key'     => 'wpcf-diem-do-bong',
                            'value'   => array($doMin, $doMax),
                            'compare' => 'BETWEEN',
                            'type' => 'SIGNED'
                        );
                    }
                    if (is_numeric($chuyenMin) || is_numeric($chuyenMax)) {
                        if (!is_numeric($chuyenMin) || $chuyenMin < 0 ) {
                          $chuyenMin = 0;
                        }
                        if (!is_numeric($chuyenMax) || $chuyenMax < 0 ) {
                          $chuyenMax = $chuyenMin;
                        }
                        $args['meta_query'][] = array(
                            'key'     => 'wpcf-diem-chuyen-bong',
                            'value'   => array($chuyenMin, $chuyenMax),
                            'compare' => 'BETWEEN',
                            'type' => 'SIGNED'
                        );
                    }
                    if (is_numeric($dapMin) || is_numeric($dapMax)) {
                        if (!is_numeric($dapMin) || $dapMin < 0 ) {
                          $dapMin = 0;
                        }
                        if (!is_numeric($dapMax) || $dapMax < 0 ) {
                          $dapMax = $dapMin;
                        }
                        $args['meta_query'][] = array(
                            'key'     => 'wpcf-diem-dap-bong',
                            'value'   => array($dapMin, $dapMax),
                            'compare' => 'BETWEEN',
                            'type' => 'SIGNED'
                        );
                    }
                    if (is_numeric($chanMin) || is_numeric($chanMax)) {
                        if (!is_numeric($chanMin) || $chanMin < 0 ) {
                          $chanMin = 0;
                        }
                        if (!is_numeric($chanMax) || $chanMax < 0 ) {
                          $chanMax = $chanMin;
                        }
                        $args['meta_query'][] = array(
                            'key'     => 'wpcf-diem-chan-bong',
                            'value'   => array($chanMin, $chanMax),
                            'compare' => 'BETWEEN',
                            'type' => 'SIGNED'
                        );
                    }
                    if (count($timtheo) > 0 && !empty($keyword)) {
                      $arg = array();
                      $arg['relation'] = 'OR';
                      if (in_array('quan-co', $timtheo)) {
                          $arg[] = array(
                              'key'     => 'wpcf-quan-co',
                              'value'   => $keyword,
                              'compare' => 'like'
                          );
                      }
                      if (in_array('ma-so', $timtheo)) {
                          $arg[] = array(
                              'key'     => 'wpcf-ma-so',
                              'value'   => $keyword,
                              'compare' => 'like'
                          );
                      }
                      if (in_array('nang-luc', $timtheo)) {
                          $arg[] = array(
                              'key'     => 'wpcf-nang-luc',
                              'value'   => $keyword,
                              'compare' => 'like'
                          );
                      }

                      $args['meta_query'][] = array (
                        $arg
                      );
                    } elseif (!empty($keyword)){
                      $arg = array();
                      $arg['relation'] = 'OR';
                      $arg[] = array(
                          'key'     => 'wpcf-quan-co',
                          'value'   => $keyword,
                          'compare' => 'like'
                      );
                      $arg[] = array(
                          'key'     => 'wpcf-ma-so',
                          'value'   => $keyword,
                          'compare' => 'like'
                      );
                      $arg[] = array(
                          'key'     => 'wpcf-nang-luc',
                          'value'   => $keyword,
                          'compare' => 'like'
                      );
                      $args['meta_query'][] = array (
                        $arg
                      );
                    }
                    $arg = array();
                    $arg['relation'] = 'AND';
                    if ($boco > 0) {
                        $arg[] = array(
                      		'taxonomy' => 'bo-co',
                      		'field'    => 'term_id',
                      		'terms'    => $boco
                      	);
                    }
                    if ($doi > 0) {
                        $arg[] = array(
                      		'taxonomy' => 'doi',
                      		'field'    => 'term_id',
                      		'terms'    => $doi
                      	);
                    }
                    if ($khoi > 0) {
                        $arg[] = array(
                      		'taxonomy' => 'khoi',
                      		'field'    => 'term_id',
                      		'terms'    => $khoi
                      	);
                    }
                    if ($vitri > 0) {
                        $arg[] = array(
                      		'taxonomy' => 'vi-tri',
                    			'field'    => 'term_id',
                      		'terms'    => $vitri
                      	);
                    }
                    if ($dohiem > 0) {
                        $arg[] = array(
                      		'taxonomy' => 'do-hiem',
                      		'field'    => 'term_id',
                      		'terms'    => $dohiem
                      	);
                    }
                    if ($thoidiem > 0) {
                        $arg[] = array(
                          'taxonomy' => 'thoi-diem',
                          'field'    => 'term_id',
                          'terms'    => $thoidiem
                        );
                    }
                    if ($nangluc > 0) {
                        $arg[] = array(
                          'taxonomy' => 'nang-luc',
                          'field'    => 'term_id',
                          'terms'    => $nangluc
                        );
                    }
                    $args['tax_query'][] = array (
                      $arg
                    );
                    global $wp_query;
                    $wp_query = new WP_Query($args);
                    ?>
                    <div class="wrap-list-items fr">
                      <?php
                      if($wp_query->have_posts()) {
                      ?>
                      <?php
                      while ($wp_query->have_posts()) {
                        $wp_query->the_post();
                        $firstTerm = wp_get_post_terms(get_the_ID(), 'bo-co', array( 'fields' => 'ids'))[0];  
                        if(array_key_exists($firstTerm, $terms_boco)) {
                          $terms_boco[$firstTerm]['cards'][] = array(
                            'link' => get_post_permalink(),
                            'title' => get_the_title(),
                            'thumbnail' => get_the_post_thumbnail_url(get_the_ID(),'full')
                          );
                        }  
                      }
                      wp_reset_query();
                      ?>
                      <?php
                      foreach($terms_boco as $key => $val) {
                      if(count($val['cards']) > 0) {
                      ?>                      
                      <div class="card-group"> 
                        <div class="card-group-title">
                          <h3><?php echo $val['desc'] ?></h3>
                        </div>
                        <?php
                        foreach($val['cards'] as $v) {
                        ?>
                        <div class="card-item fl">
                          <a href="<?php echo $v['link'] ?>" title="<?php echo $v['title'] ?>">
                          <img src="<?php echo $v['thumbnail'] ?>" alt="<?php echo $v['title'] ?>" />
                          </a>
                        </div>
                        <?php } ?>
                      </div>
                      <?php }} ?>
                      <?php } ?>
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
  </form>
</div>

<?php get_footer(); ?>
