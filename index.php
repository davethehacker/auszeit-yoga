
<?php get_header(); ?>

--><div id="content">
	<section class="news">
		<h1>Aktuell</h1>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article>
					<header>
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
<!--						<p>Veröffentlicht am <time datetime="<?php the_time()?>"><?php the_date() ?></time></p>-->
					</header>
					<?php the_content();
					if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
				</article>
			<?php endwhile; endif; ?>
	</section>
	<?php get_sidebar() ?>
</div> <!-- content -->
			
<?php get_footer(); ?>
