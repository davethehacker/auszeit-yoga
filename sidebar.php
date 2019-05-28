<section class="sidebar">
	<div class="attachment">
		<?php if ( get_field('attachment') ) {
			$att = get_field('attachment');
			echo '<a href="' . $att['url'] . '" >Download ' . $att['title'] . '.';
		} ?>
	</div>
	<div class="post_img"><?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?></div>

	<?php if(get_field('newsletter_anmeldung')==true){
		echo '<div class="newsletter-registration"> <h3>Newsletter abonnieren</h3>';
		$widgetNL = new WYSIJA_NL_Widget(true);
		echo $widgetNL->widget(array('form' => 1, 'form_type' => 'php'));
		echo "</div>";
	} 	?>
</section>