<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>


	<div id='left-callout' class='transparent-blue'>
    
		<?php get_sidebar(); ?>
    
    </div>
    
    <div id='interior-header' class='transparent-blue'>
        
        <h1>News</h1>

    </div>
    
    <div id='interior-content' class='transparent-gray'>
		<div class="entry-content entry-list">
			<?php if ( have_posts() ) : ?>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
                
                	<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    
                    <?php twentyeleven_posted_on(); ?>
                    
                    <? 
						//if ( has_post_thumbnail() ):
						//	the_post_thumbnail( array(210,220) ); 
						//else: ?>
                         
					<?  //endif; ?>
                    
                    <div id='post-content'>

						<?php get_template_part( 'content', 'page' ); ?>
                
                        <?php comments_template( '', true ); ?>
                        
                        <div class='blog-social-media'>
                        	<span class='st_email_custom' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
                            <span class="st_linkedin_custom" displaytext="LinkedIn" st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>						<span class='st_sharethis_custom' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
                            <span class='st_twitter_custom' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
                            <span class='st_facebook_custom' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
                       </div>
                        
                        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class='read-more'>Read More...</a>
                        
                    </div>

					<?php //get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
		</div>
	</div>
        
<?php get_footer(); ?>