<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

	<div id='left-callout' class='transparent-blue'>
    
		<?php get_sidebar(); ?>
    
    </div>
    
    <div id='interior-header' class='transparent-blue'>
        
        <h1>News</h1>

    </div>

	<div id='interior-content' class='transparent-gray'>

		<?php while ( have_posts() ) : the_post(); ?>

            

            <?php get_template_part( 'content', 'single' ); ?>
            
            <nav id="nav-single">
                <span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
                <span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
            </nav><!-- #nav-single -->

            <?php comments_template( '', true ); ?>

        <?php endwhile; // end of the loop. ?>
                
	</div>

<?php get_footer(); ?>