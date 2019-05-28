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
					<?php if ( function_exists( 'ccf_output_form' ) ) {
						ccf_output_form(46);
					} ?>
				</article>
			<?php endwhile; endif; ?>
	</section>
	<?php get_sidebar() ?>
</div> <!-- content -->
<script>
	 (function hiddenfield() {
		 document.getElementById('ccf_field_kurs').value = '<?php the_title() ?>';
		 return 1;
	 })();
</script>
<?php get_footer(); ?>
