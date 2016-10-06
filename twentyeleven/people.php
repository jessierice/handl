<?php
/**
 * Template Name: People Template
 * Description: A Page Template that showcases people with featured images
 *
 * The showcase template in Twenty Eleven consists of a featured posts section using sticky posts,
 * another recent posts area (with the latest post shown in full and the rest as a list)
 * and a left sidebar holding aside posts.
 *
 * We are creating two queries to fetch the proper posts and a custom widget for the sidebar.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/**
					 * We are using a heading by rendering the_content
					 * If we have content for this page, let's display it.
					 */
					if ( '' != get_the_content() )
						get_template_part( 'content', 'intro' );
				?>

				<?php endwhile; ?>

				<?php
				
					$featured_args = array(
						'post_parent' => 10,
						'post_type' => 'page',
						'post_status' => 'publish',
						'posts_per_page' => 30,
						'no_found_rows' => true,
						'order' => 'ASC','orderby' => 'menu_order', 'order' => 'asc'
					);
					
					// The Featured Posts query.
					$featured = new WP_Query( $featured_args );

					// Proceed only if published posts exist
					if ( $featured->have_posts() ) :

					/**
					 * We will need to count featured posts starting from zero
					 * to create the slider navigation.
					 */
					$counter_slider = 0;

					// Compatibility with versions of WordPress prior to 3.4.
					if ( function_exists( 'get_custom_header' ) )
						$header_image_width = get_theme_support( 'custom-header', 'width' );
					else
						$header_image_width = HEADER_IMAGE_WIDTH;
				?>
                
                <div class='people-header transparent-blue'>
                
                	<h1>Attorneys</h1>
                    
                </div>

				<?php
					// Let's roll.
					while ( $featured->have_posts() ) : $featured->the_post();
					
						$custom_fields = get_post_custom( $post->ID );
						
						if( $custom_fields['category'][0] == 'Attorney' ):
	
						// Increase the counter.
						$counter_slider++;
	
						/**
						 * We're going to add a class to our featured post for featured images
						 * by default it'll have the feature-text class.
						 */
						$feature_class = 'feature-text';
	
						if ( has_post_thumbnail() ) {
							// ... but if it has a featured image let's add some class
							$feature_class = 'feature-image small';
	
							// Hang on. Let's check this here image out.
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_width ) );
	
							// Is it bigger than or equal to our header?
							if ( $image[1] >= $header_image_width ) {
								// If bigger, let's add a BIGGER class. It's EXTRA classy now.
								$feature_class = 'feature-image large';
							}
						}
						?>
						
						<div class='our-people-list'>
				
							<a href='<?php the_permalink(); ?>'>
						
								<?php
									/**
									 * If the thumbnail is as big as the header image
									 * make it a large featured post, otherwise render it small
									 */
									if ( has_post_thumbnail() ) {
										the_post_thumbnail( array(210,220) ); 
									}
								?>
								
								<span class='our-people-name transparent-blue'>
								
									<?=the_title_attribute( 'echo=0' ) ?>
								
								</span>
								
								<span class='our-people-name-hover transparent-blue'>
								
									<?=the_title_attribute( 'echo=0' ) ?><br />
									
									<span class='person-title'><?=$custom_fields['jtitle'][0] ?></span><br /><br />
                                    <span class='person-title'><?=$custom_fields['email'][0] ?></span><br />
									<span class='person-title'><?=$custom_fields['direct'][0] ?></span>
								</span>
								
							</a>
				
						</div>
                        
						 <?php endif; ?>
	
					<?php endwhile;	?>
                    
                    <?php rewind_posts(); ?>
                    
                    <div class='people-header transparent-blue'>
                    	
                        <h1>Paralegals</h1>
                        
                    </div>
                    
                    <?php
					// Let's roll.
					while ( $featured->have_posts() ) : $featured->the_post();
					
						$custom_fields = get_post_custom( $post->ID );
						
						if( $custom_fields['category'][0] != 'Attorney' ):
	
						// Increase the counter.
						$counter_slider++;
	
						/**
						 * We're going to add a class to our featured post for featured images
						 * by default it'll have the feature-text class.
						 */
						$feature_class = 'feature-text';
	
						if ( has_post_thumbnail() ) {
							// ... but if it has a featured image let's add some class
							$feature_class = 'feature-image small';
	
							// Hang on. Let's check this here image out.
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_width ) );
	
							// Is it bigger than or equal to our header?
							if ( $image[1] >= $header_image_width ) {
								// If bigger, let's add a BIGGER class. It's EXTRA classy now.
								$feature_class = 'feature-image large';
							}
						}
						?>
						
						<div class='our-people-list'>
				
							<a href='<?php the_permalink(); ?>'>
						
								<?php
									/**
									 * If the thumbnail is as big as the header image
									 * make it a large featured post, otherwise render it small
									 */
									if ( has_post_thumbnail() ) {
										the_post_thumbnail( array(210,220) ); 
									}
								?>
								
								<span class='our-people-name transparent-blue'>
								
									<?=the_title_attribute( 'echo=0' ) ?>
								
								</span>
								
								<span class='our-people-name-hover transparent-blue'>
								
									<?=the_title_attribute( 'echo=0' ) ?><br />
									
									<span class='person-title'><?=$custom_fields['jtitle'][0] ?></span>
								
								</span>
								
							</a>
				
						</div>
                        
						 <?php endif; ?>
	
					<?php endwhile;	?>

				<?php endif; // End check for published posts. ?>

<?php get_footer(); ?>