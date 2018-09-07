<article class="ar-sp">
	<a href="<?php the_permalink(); ?>">
		 <div class="ar-info">
			<div class="header-ar-sp"><h5 class="title"><?php the_title(); ?></h5><span class="header-date">Phát hành ngày: <?php the_time('d/m/Y'); ?></span></div>

		</div>
		<div class="ar-image">  
			<?php the_post_thumbnail();  ?>
		</div>

	</a>
</article> 
