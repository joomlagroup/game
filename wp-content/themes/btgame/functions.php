<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Initialize theme default settings



 

if( !class_exists( 'ReduxFramewrk' ) ) {
require_once( dirname( __FILE__ ) . '/ReduxCore/framework.php' );
} 
if( !isset( $redux_demo ) ) {
require_once( dirname( __FILE__ ) . '/sample-config.php');
}
*/
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
*/
require get_template_directory() . '/inc/editor.php';  

/* include 'AjaxPagination/ajax_pagination_wp.php';  */

add_image_size( 'thum-congdong', 325, 147, true );
add_image_size( 'thum-sukiendone', 320,210, true );
add_image_size( 'thum-154x90', 154,90, true );
add_image_size( 'thum-220x279', 220,279, true );
add_image_size( 'thum-350x220', 350,220, true );
add_image_size( 'thum-60x60', 60,60, true );


require get_template_directory() . '/inc/tsd-custom.php';

function my_cptui_change_posts_per_page( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
       return;
    }

    if ( is_tax( 'product-cat' ) ) {
       $query->set( 'posts_per_page', 4 );
    }
}


add_filter( 'pre_get_posts', 'my_cptui_change_posts_per_page' );


function be_change_event_posts_per_page( $query ) {
    
    if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'product' ) ) {
        $query->set( 'posts_per_page', '4' );
    }
}add_action( 'pre_get_posts', 'be_change_event_posts_per_page' );


//Custom template search
function template_chooser($template)
{
     global $wp_query;
     $post_type = get_query_var('post_type');
     if( isset($_GET['s']) && $post_type == 'chien-thuat' )
     {
     return locate_template('search-chienthuat.php');
     }
     return $template;
    }
    add_filter('template_include', 'template_chooser');

    add_filter('pre_get_posts','lay_custom_post_type');
    function lay_custom_post_type($query) {
      if (is_home() && $query->is_main_query ())
    $query->set ('post_type', array ('post','chien-thuat'));
    return $query;
}
function setpostview($postID){
    $count_key ='post_views_count';
    $count = get_post_meta($postID, $count_key,true);
    if($count==''){
        $count =0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key,'0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function getpostviews($postID){
    $count_key ='post_views_count';
    $count = get_post_meta($postID, $count_key,true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key,'0');
        return"0 View";
    }
    return $count.' Views';
}

function mostviewsgiadau() { ?>
        <aside>
            <div class="mostview">
                    <h3 class="widget-title">Xem nhiều</h3>

                            <?php  $cf = new WP_Query(array(
                                    'post_type' => 'chien-thuat',
                                    'posts_per_page' => 6, 
                                    'meta_key' => 'post_views_count', 
                                    'orderby'=> 'meta_value_num', 
                                    'order' => 'DESC'));
                                while ($cf->have_posts()) : $cf->the_post();?>
                                    <div class="item">
                                        <a href="<?php the_permalink(); ?>">
                                           <?php the_post_thumbnail('thum-60x60');  ?>
                                           <div>
                                            <h5><?php the_title();?></h5>
                                            <p><?php the_time('d-m-Y'); ?></p>
                                           </div>
                                        </a>
                                    </div>
                               <?php  endwhile;
                            wp_reset_postdata(); ?>

            </div>
        </aside>

 <?php } add_shortcode('addmostviewsgiadau', 'mostviewsgiadau'); 


function timkiem_chienthuat() { ?>
<form method="get" class="searchform timkiem-chien-thuat action="<?php echo esc_url( home_url( '/' ) );?>">
 <input type="text" class="field s" name="s" value="">
 <input type="hidden" name="post_type" value="chien-thuat">
 <input type="submit" value="Sea" >
 </form>
<?php }
 add_shortcode('addtimkiem_chienthuat', 'timkiem_chienthuat'); 


function sp_thuan() {
        $random_query = new WP_Query(array(
                'post_type' => 'product',
                'posts_per_page' => 3,
                'orderby' => 'date',
        ));
        ob_start();
        if ( $random_query->have_posts() ) : ?>
         <ul class="i-sanpham"> <?php
                while ( $random_query->have_posts() ) :
                        $random_query->the_post();?>
                                <li class="i-sp">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="i-image"> 
                                         <?php the_post_thumbnail();  ?>
                                         </div>
                                         <div class="i-info">
                                            <h5 class="title"><?php the_title(); ?></h5>
                                             <?php the_excerpt(); ?>
                                         </div>
                                        
                                    </a>
                                </li>
                <?php endwhile; ?>
                </ul> <?php

        endif;
        $list_post = ob_get_contents(); 
        ob_end_clean();
        return $list_post;
}
add_shortcode('echo_sp_thuan', 'sp_thuan');

function news_game() {
 
        $random_query1 = new WP_Query(array(
                'post_type' => array('post', 'chien-thuat'),
                'posts_per_page' => 6,
                'orderby' => 'date',
                'category__not_in' => array( '8', '16' ),
        ));
 
        ob_start();
        if ( $random_query1->have_posts() ) : ?>
         <table width="100%" border="0" align="center" cellpadding="4" cellspacing="0" class="tb-news-event"> 
            <tbody>
            <?php
                while ( $random_query1->have_posts() ) :
                        $random_query1->the_post();?>

                        <tr>
                                    <td valign="top" class="tb-img"><?php
                                    if (in_category(3)) { echo '<span class="news-title tintuc">Tin tức</span>'; }else{ echo '<span class="news-title chienthuat">Chiến thuật</span>';}?></td>
                                    <td valign="top" class="tb-time"><?php the_time('j-n-Y'); ?></td>
                                    <td class="tb-link"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                                </tr>
                <?php endwhile; ?>
                </tbody>
        </table> <?php

        endif;
        $list_post1 = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return
        ob_end_clean();
        return $list_post1;
}
add_shortcode('echo_news_game', 'news_game');


function get_giai_dau() {
 
        $random_query2 = new WP_Query(array(
                'post_type' => 'giai-dau',
                'orderby' => 'date',
                'posts_per_page' =>100,

        ));
        $n=0;
        if ( $random_query2->have_posts() ) : ?>
        <?php

                while ( $random_query2->have_posts() ) :
                        $random_query2->the_post();?>
                        <?php 
                                $date = get_field('ngay-du-kien', false, false);
                                $date = new DateTime($date);
                                $datenow = getdate();

                                $today = date("Y-m-d");
                                $another_date = $date->format('Y-m-d');
                                 
                                  if (strtotime($today) > strtotime($another_date)) {
                                    $n=1;
                                  } else {
                                    $n=0;
                                  }
                                ?>
                                <?php if($n==0){ ?> 

                                    <div class="container-congdong giai-dau-du-kien">
                                        <?php the_post_thumbnail('thum-congdong', array('class' => 'thumcd-img')); ?>
                                        <div class="content-congdong  <?php $category = get_the_category(); 
                                        echo $category[0]->slug; ?>">
                                           
                                            <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>   
                                            <ul>
                                                <li class="gd-date">Ngày: <?php the_field('ngay-du-kien'); ?> </li>
                                                <li  class="gd-diadiem">Địa điểm:  <?php the_field('dia-diem'); ?></li>
                                              
                                                <li class="gd-thele">Thể lệ & Phần thưởng: <a href="<?php the_permalink(); ?>">Nhấp vào đây để xem</a></li>
                                                
                                            </ul>
                                             
                                        </div>

                                    </div>
                                    
                                 <?php }else{} ?>   
                                 <?php $n=0; ?>      
                                                         
                <?php endwhile; ?>
               
                <?php endif; ?>
              
            
<?php } add_shortcode('echo_get_giai_dau', 'get_giai_dau');




function table_giaidau_ft($args, $content) {

        $random_query6 = new WP_Query(array(   
                'post_type'  =>  'giai-dau' ,
                'orderby' => 'date',
                'posts_per_page' => -1,

        ));   
        $n =0;
        $dem = 1;
        ob_start();
        if ( $random_query6->have_posts() ) : ?>
                
                   
                <?php while ( $random_query6->have_posts() ) :
                        $random_query6->the_post();?>
                         <?php 
                                $date = get_field('ngay-du-kien', false, false);
                                $date = new DateTime($date);
                                $datenow = getdate();

                                $today = date("Y-m-d");
                                $another_date = $date->format('Y-m-d');
                                 
                                  if (strtotime($today) > strtotime($another_date)) {
                                    $n=1;
                                  } else {
                                    $n=0;
                                  }
                                ?>
                                    <?php if(($n==0)){ ?>  
                                             <div class="container-congdong giai-dau-du-kien">
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thum-congdong', array('class' => 'thumcd-img')); ?></a>
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
                                           <?php   $dem++; }else{}?>   
                               
                                            <?php $n=0; ?>                
                    <?php endwhile; ?>
                    
                    <?php wp_reset_postdata(); ?>

                <?php endif;

        $list_post6 = ob_get_contents(); 
 
        ob_end_clean();
 
        return $list_post6;   
}
add_shortcode('echo_table_giaidau_ft', 'table_giaidau_ft');

function table_giaidau_done($args, $content) {

        $random_query6 = new WP_Query(array(   
                'post_type'  =>  'giai-dau' ,
                'orderby' => 'date',
                'posts_per_page' => -1,

        ));   
        $n =0;
        $dem = 1;
        ob_start();
        if ( $random_query6->have_posts() ) : ?>
                
                   
                <?php while ( $random_query6->have_posts() ) :
                        $random_query6->the_post();?>
                         <?php 
                                $date = get_field('ngay-du-kien', false, false);
                                $date = new DateTime($date);
                                $datenow = getdate();

                                $today = date("Y-m-d");
                                $another_date = $date->format('Y-m-d');
                                 
                                  if (strtotime($today) > strtotime($another_date)) {
                                    $n=1;
                                  } else {
                                    $n=0;
                                  }
                                ?>
                                    <?php if(($n==1)){ ?>  
                                             <div class="container-congdong giai-dau-du-kien">
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thum-congdong', array('class' => 'thumcd-img')); ?></a>
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
                                           <?php   $dem++; }else{}?>   
                               
                                            <?php $n=0; ?>                
                    <?php endwhile; ?>
                    
                    <?php wp_reset_postdata(); ?>

                <?php endif;

        $list_post6 = ob_get_contents(); 
 
        ob_end_clean();
 
        return $list_post6;   
}
add_shortcode('echo_table_giaidau_done', 'table_giaidau_done');


function table_giaidau($args, $content) {

        $random_query6 = new WP_Query(array(   
                'post_type'  =>  ''.$args['post_type'].'' ,
                'posts_per_page' => 5,
                'meta_key'          => 'ngay-du-kien',
                'orderby'           => 'meta_value',
                'order'             => 'DESC'

        ));
      
        ob_start();
        if ( $random_query6->have_posts() ) : ?>
                
                    <table width="100%" border="0" align="center" cellpadding="4" cellspacing="0" class="tb-news-event tb-table-giaidau"> 
                        <tbody>
                            
                            <tr class="header-table-sukien">
                                <td class="tb-image"></td>
                                <td valign="top" class="tb-title">Tên</td>
                                <td class="tb-location">Địa điểm</td>
                                <td valign="top" class="tb-date">Ngày</td>
                                
                            </tr>   
                                <?php while ( $random_query6->have_posts() ) :
                                        $random_query6->the_post();?>
                                        
                                                      
                                                            <tr>      
                                                                <td class="tb-image">
                                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thum-154x90', array('class' => 'thumsk-radius4px')); ?></a>       
                                                                </td>
                                                                <td valign="top" class="tb-title">
                                                                    <a href="<?php the_permalink(); ?>"><p><?php the_title();?></p></a>
                                                                    <div class="excerpt"><?php the_excerpt(); ?> </div>   
                                                                </td> 
                                                                <td class="tb-location"><?php the_field('dia-diem'); ?></td>
                                                                <td valign="top" class="tb-date"><?php the_field('ngay-du-kien')?></td>
                                                            </tr>  
                                                             
                                                                  
                                    <?php endwhile; ?>
                    
                    <?php wp_reset_postdata(); ?>
                 </tbody>
                </table>

                <?php endif;

        $list_post6 = ob_get_contents(); 
 
        ob_end_clean();
 
        return $list_post6;   
}
add_shortcode('echo_table_giaidau', 'table_giaidau');




function news_hoidap($args, $content) {
 
        $random_query2 = new WP_Query(array(
                'posts_per_page' => $args['per_page'],
                'orderby' => 'date',
                'category__in' => $args['catid'],
        ));
        
        ob_start();
        if ( $random_query2->have_posts() ) : ?>
             <ul class="i-hoidap"> <?php

                    while ( $random_query2->have_posts() ) :
                            $random_query2->the_post();?>

     
                                    <li class="i-hd">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </li>
     
                    <?php endwhile; ?>
            </ul> <?php

        endif;
        $list_post2 = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return
 
        ob_end_clean();
 
        return $list_post2;
}
add_shortcode('echo_news_hoidap', 'news_hoidap');

function form_timkiem() { ?>
 
       <div id="form-timkiem">
            <form method="get" id="searchform search" action="<?php echo get_site_url(); ?>" role="search">
                <div class="input-group">          
                    <input class="input-timkiem" name="s" type="text" placeholder="Từ khóa..." value="">  
                     <button type="submit" class="button-primary timkiem">Tìm</button>    
                     <a href="#" class="timkiem-nangcao">>> Tìm kiếm nâng cao</a>        
                </div>
            </form>    
      </section>
<? }
add_shortcode('echo_form_timkiem', 'form_timkiem');

function news_products() {
 
        $random_query3 = new WP_Query(array(
                'post_type' => 'product',
                'posts_per_page' => 6,
                'orderby' => 'date',
        ));
 
        ob_start();
        if ( $random_query3->have_posts() ) : ?>
         <table width="95%" border="0" align="center" cellpadding="4" cellspacing="0" class="tb-news-products"> 
            <tbody>
            <?php while ( $random_query3->have_posts() ) :
                        $random_query3->the_post();?>
                            <tr>
                                <td valign="top" class="tb-time"><?php the_time('j-n-Y'); ?></td>
                                <td class="tb-link" valign="top"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                            </tr>      
                <?php endwhile; ?>
            </tbody>
        </table> <?php

        endif;
        $list_post3 = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return
 
        ob_end_clean();
 
        return $list_post3;
}
add_shortcode('echo_news_products', 'news_products');

function congdong($args, $content) {
 
        $random_query = new WP_Query(array(
                'post_type' => 'cong-dong',
                'posts_per_page' => $args['per_page'],
                'orderby' => 'date',

        ));
 
        ob_start();
        if ( $random_query->have_posts() ) :
                "<ul>";
                while ( $random_query->have_posts() ) :
                        $random_query->the_post();?>
                        <div class="container-congdong">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thum-congdong', array('class' => 'thumcd-img')); ?></a>
                            <div class="content-congdong">
                                <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                                <ul>
                                    <li>Thành phố: </li>
                                    <li>Địa điểm sinh hoạt:  </li>
                                    <li>Thời gian: </li>
                                </ul>
                            </div>

                        </div>
                <?php endwhile;
                "</ul>";
        endif;
        $list_post = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return
 
        ob_end_clean();
 
        return $list_post;
}
add_shortcode('echo_congdong', 'congdong');


function ds_hoi_dap() {
        ob_start();
            $dem=1;
           $rows = get_field('list-hoi-dap');
            if($rows)
            {
                echo '<div id="accordion" class="panel-group">  ';

                foreach($rows as $row)
                {

                    ?> 
                     
                    <div class="panel">
                        <div href="#panelBody<?php echo $dem ?>" class="accordion-toggle collapsed hoidap-header" data-toggle="collapse" data-parent="#accordion">
                            <div class="hd-1">Câu hỏi <?php echo $dem ?></div>
                            <div class="hd-2"><?php echo $row['cau_hoi'] ?></div>
                        </div>                  
                        <div id="panelBody<?php echo $dem ?>" class="panel-collapse collapse hoidap-content">
                           <div class="hd-1">Trả lời <?php echo $dem ?></div>
                            <div class="hd-2"><?php echo $row['cau_tra_loi'] ?></div>
                        </div>
                    </div>
                  
                <?php $dem++; }

                echo '</div>';
            }
        $list_post = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return
 
        ob_end_clean();
 
        return $list_post;
}
add_shortcode('echo_ds_hoi_dap', 'ds_hoi_dap');

function qa_card() {
        $random_query = new WP_Query(array(
                'post_type' => 'qa-card',
                'orderby' => 'date',
                'posts_per_page'=> -1,
        ));
        ob_start();
        if ( $random_query->have_posts() ) :
            echo '<div class="list-qa-card">';
                while ( $random_query->have_posts() ) :
                        $random_query->the_post(); ?>

                    <div class="item_card">
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thum-220x279'); ?>
                        <span><?php the_field('sku_card'); ?></span>
                        <h5><?php the_title();?></h5>
                        </a>
                    </div>
 
                <?php endwhile;
                echo '</div>';
        endif;
        $list_post = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return
 
        ob_end_clean();
 
        return $list_post;
}
add_shortcode('echo_qa_card', 'qa_card');

function giaidau_chitiet($args, $content) {
       
        ob_start(); ?>
        <div id="test-list">
            <ul class="list">  
                <?php if($args['chon']=="futured") {
                    echo do_shortcode('[echo_table_giaidau_ft]');
                 } else {
                    echo do_shortcode('[echo_table_giaidau_done]');
                }
                ?>
            </ul>
            <ul class="pagination giadaupage"></ul>
        </div>     
       
        <?php $list_post = ob_get_contents(); //Lấy toàn bộ nội dung phía trên bỏ vào biến $list_post để return
 
        ob_end_clean();
 
        return $list_post;
}
add_shortcode('echo_giaidau_chitiet', 'giaidau_chitiet');




