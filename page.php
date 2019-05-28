<?php get_header(); ?>

--><div id="content">
	<section class="single-page">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article>
					<header>
						<h1><?php the_title(); ?></h1>
					</header>
					<?php the_content(); ?>
				</article>
			<?php endwhile; endif; ?>
	</section>
	<?php get_sidebar() ?>
</div> <!-- content -->
			
<?php get_footer(); ?>
