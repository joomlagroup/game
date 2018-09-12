<?php
/**
 * Pagination layout.
 *
 * @package understrap
 */

if ( ! function_exists ( 'understrap_pagination' ) ) {
	function understrap_pagination($args = [], $class = 'pagination') {

	    if ($GLOBALS['wp_query']->max_num_pages <= 1) return;

	    $args = wp_parse_args( $args, [
	        'mid_size'           => 2,
	        'prev_next'          => true,
	        'prev_text'          => __('&laquo;', 'understrap'),
	        'next_text'          => __('&raquo;', 'understrap'),
	        'screen_reader_text' => __('Posts navigation', 'understrap'),
	        'type'               => 'array',
	        'current'            => max( 1, get_query_var('paged') ),
	    ]);

	    $links     = paginate_links($args);
	    //$next_link = get_next_posts_page_link();
	    //$prev_link = get_previous_posts_page_link();

	    ?>

	    <nav aria-label="<?php echo $args['screen_reader_text']; ?>">
	        <ul class="pagination">
	            <?php
				$i = 1;
	            foreach ( $links as $link ) { ?>
	                <li class="page-item <?php if ($i == $args['current']) { echo 'active'; }; ?>">
	            	<?php echo str_replace( 'page-numbers', 'page-link', $link ); ?>
	                </li>
	            <?php $i++;} ?>
	        </ul>
	    </nav>
	    <?php
	}
}