<?php
/**
 * Template Name: Home Template
 * Description: A Page Template for the home page.
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

		<div id='home-callout' class='transparent-blue'>
        
        	<?=$custom_fields['Home-Callout'][0] ?>

        </div>
    
    	<div id='contact-us-now'>
        
        	<h2>contact us now</h2>
            
            <span style='font-size: 26px; font-weight: bold; margin-top: 10px;'><?=$custom_fields['Telephone'][0] ?></span>
            
            <p style='margin-top: 10px;'>
                Fax: <strong><?=$custom_fields['Fax'][0] ?></strong><br />
                Email us: <strong><a href="mailto:info@handl.com" ><?=$custom_fields['Email'][0] ?></a></strong>
            </p>
            
            <p style='font-style: italic;'>
            	<?=$custom_fields['Street-Address'][0] ?><br />
				<?=$custom_fields['City-State-Zip'][0] ?>
            </p>

        </div>
        
        <div id='about-our-team' class='transparent-gray'>
        
				<?php get_template_part( 'content', 'page' ); ?>

            <div class='social-media' style='margin-top: 92px;'>
  
                <a href='https://twitter.com/HendricksonLong' class='twitter'><img src='/images/sharethis-twitter.png' border='0'/></a>
                <a href='https://www.facebook.com/HendricksonLongPLLC' class='facebook'><img src='/images/sharethis-facebook.png' border='0'/></a>
                <a href='http://www.linkedin.com/' class='linkedin'><img src='/images/sharethis-linkedin.png' border='0'/></a>
            </div>

        </div>
        
    <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>