<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
    
    	<?php $custom_fields = get_post_custom( $post->ID );  ?>
        
		<div id='left-callout' class='transparent-blue'>
        
        	<?=wp_get_attachment_image( $custom_fields['image'][0], 'thumbnail' ); ?>
        
        	<p><?=$custom_fields['description'][0] ?></p>

        </div>
        
        <div id='interior-header' class='transparent-blue'>
        
        	<h1><?=the_title_attribute( 'echo=0' ) ?></h1>

        </div>
        
        <div id='interior-content' class='transparent-gray page-contents'>
        	<div id="page_content">
			

                <?php get_template_part( 'content', 'page' ); ?>

                <?php comments_template( '', true ); ?>
                <div class="clear"></div>
			</div>
		</div>
        
   <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>