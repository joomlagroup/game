<div class="container-congdong giai-dau-du-kien">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thum-congdong', array('class' => 'thumcd-img')); ?></a>
			    <div class="content-congdong  <?php $category = get_the_category(); 
			    	echo $category[0]->slug; ?>">
					<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
			                               
				    <ul>
				    	<?php $location = get_field('dia-diem'); ?>
						<?php $date = get_field('ngay-du-kien'); ?>
						<?php $date = new DateTime($date); ?>
						<?php if( $date ): ?>
							<li class="gd-date">Thời gian:  <?php echo $date->format('d-m-Y'); ?></li>
						<?php endif; ?>
				    	<?php if(  $location ): ?>
				    		<li  class="gd-diadiem">Địa điểm: <?php echo $location; ?> </li>
							
						<?php endif; ?>

				        
						<?php if ( is_post_type_archive( 'giai-dau' )) { ?>
						<li class="gd-motangan">Thể lệ & Phần thưởng: <a href="<?php the_permalink(); ?>">Nhấp vào để xem</a></li>
				        <?php }else{ ?> 
						<?php the_excerpt(); ?>
				        <?php } ?>
				     </ul>
			    </div>

 </div>
									

