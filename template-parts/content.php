<?php the_title('<h3>','</h3>'); ?>
	<div class="thumbnail-img">
		<?php the_post_thumbnail('thumbnail'); ?>
	</div>
	<small>posted On: <?php the_time('F,j,Y'); ?> at <?php the_time('g:i a') ?>, in <?php the_category(); ?></small>
	<?php the_content(); ?>
	<hr>