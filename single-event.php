<?php get_header(); ?>
--><!--
--><div id="content" onload="hiddenfield();" >
	<section class="news">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article>
					<header>
						<h1><?php the_title() ?></h1>
					</header>
					<h3>
					<?php if(get_field('serie')){ ?>
												<div><?php the_field('start_date') ?> - <?php the_field('end_date') ?></div>
												<div><?php the_field('start_time') ?> - <?php the_field('end_time') ?></div>
											<?php }else{ ?>
												<div><?php the_field('wochentag') ?></div>
												<div><?php the_field('start_time') ?> - <?php the_field('end_time') ?></div>
											<?php } ?>
					</h3>
					<?php /*the_content();*/
					if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
					
				</article>
			<?php endwhile; endif; ?>
	</section>
	<?php get_sidebar() ?>
</div> <!-- content -->

<?php get_footer(); ?>
