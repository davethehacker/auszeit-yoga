<?php get_header(); ?>

--><div id="content">
	<section class="events">
		<h1>Angebote</h1>
		<p>Für weitere Informationen zu den Kursen klicke auf den Kursnamen.</p>
		<p>Anmeldungen können direkt über den entsprechenden Kurseintrag oder auch Telefonisch vorgenommen werden.</p>
			<?php
			// WP_Query arguments
			$args = array (
				'post_type'              => 'page',
				'category_name'          => 'kurs'
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
						// course type formating on here!
					?>
					
					<div class='course-category' >
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					
					<?php
					$post_object = get_post();
					//var_dump($post_object);
					$pagename = get_the_title();
						
					// WP_Query arguments
						$args2 = array (
							'post_type' => 'event'/*,
							'meta_key' => 'event_type',
							'meta_value' => $post_object*/
						);

						// The Query
						$query_inner = new WP_Query( $args2 );

						// The Loop
						if ( $query_inner->have_posts() ) {
							while ( $query_inner->have_posts() ) {
								$query_inner->the_post();
								$post_backup = $post; // prepare $post reste
								
									$innerpost_object = get_field('event_type');
									$post = $innerpost_object; // override $post
									setup_postdata( $post );
									$comp = get_the_title();
									wp_reset_postdata(); // not enougth
									$post = $post_backup; // resets $post
								
								if($comp == $pagename){
									
									// content of indivitual course in here!
									?>
									<div class="course_item">
										<a href="<?php the_permalink() ?>">
											<?php if(get_field('serie')){ ?>
												<div><?php the_field('start_date') ?> - <?php the_field('end_date') ?></div>
												<div><?php the_field('start_time') ?> - <?php the_field('end_time') ?></div>
											<?php }else{ ?>
												<div><?php the_field('wochentag') ?></div>
												<div><?php the_field('start_time') ?> - <?php the_field('end_time') ?></div>
											<?php } ?>
										</a>
									</div>
									<?php
								}
								
							}
						} else {
							echo " (error ";
							echo $pagename .") ";
						}

						// Restore original Post Data
						wp_reset_postdata();
				// and here
					
					echo "</div>"; //course_category
				
				}
			}
			// Restore original Post Data
			wp_reset_postdata();
			?>
	<p>Eine Probelektion ist mit Voranmeldung jederzeit möglich. Die Kosten dafür betragen 30 Fr.</p>
	</section>
</div> <!-- content -->
			
<?php get_footer(); ?>
