<?php
/**
 * Template Name: Person Template
 * Description: A Page Template for the employees.
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

	<div id='left-callout' class='transparent-blue personside'>
    	<ul>
    	<? 
		
			$people_args = array(
						'post_parent' => 10,
						'post_type' => 'page',
						'post_status' => 'publish',
						'posts_per_page' => 30,
						'no_found_rows' => true,'orderby' => 'menu_order', 'order' => 'asc'
					);
					
			// The people posts query.
			$people = new WP_Query( $people_args );
			
			// Proceed only if published posts exist
			if ( $people->have_posts() ) : ?>
            
                
				<h3 class="side3">ATTORNEYS</h3>
<?				while ( $people->have_posts() ) : $people->the_post(); ?>
					<?php if( get_field('category') == 'Attorney' ): ?>
					<li><a href='<?php the_permalink(); ?>'><?=the_title_attribute( 'echo=0' ) ?></a></li>
				    <?php endif;?>
<?				endwhile; ?>

				
			
<?			endif;
			rewind_posts();
					
	    ?>
        
        
        	<? 
		
			$people_args = array(
						'post_parent' => 10,
						'post_type' => 'page',
						'post_status' => 'publish',
						'posts_per_page' => 30,
						'no_found_rows' => true
					);
					
			// The people posts query.
			$people = new WP_Query( $people_args );
			
			// Proceed only if published posts exist
			if ( $people->have_posts() ) : ?>
            
                
				<h3 class="side3 para">PARALEGALS</h3>
<?				while ( $people->have_posts() ) : $people->the_post(); ?>
					<?php if( get_field('category') != 'Attorney' ): ?>
					<li><a href='<?php the_permalink(); ?>'><?=the_title_attribute( 'echo=0' ) ?></a></li>
				    <?php endif;?>
<?				endwhile; ?>

				
			
<?			endif;
			rewind_posts();
					
	    ?>
        
        </ul>
    </div>
    
    <div id='interior-header' class='transparent-blue'>
        
        <h1>our people</h1>

    </div>
    
    <div id='interior-content' class='transparent-gray'>
        
        	<h2><?php wp_title("",true); ?></h2>
        
	<?php while ( have_posts() ) : the_post(); ?>
    
    		<? $custom_fields = get_post_custom( $post->ID ); ?>
            
    		<div id='person-contact-info'>
    
				<? 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( array(210,220) ); 
                    }
                ?>
                
                <div class='social-media' style='width: 100%;'>
                
                	<? if( $custom_fields['email'][0] ): ?>
                    
                    	<a href='mailto:<?=$custom_fields['email'][0] ?>' class='email' target="_blank"><img src='/images/sharethis-email.png' border='0'/></a>
                        
                    <? endif; ?>
                    
                    <? if( $custom_fields['facebook'][0] ): ?>
                    
                    	<a href='<?=$custom_fields['facebook'][0] ?>' class='facebook' target="_blank"><img src='/images/sharethis-facebook.png' border='0'/></a>
                        
                    <? endif; ?>
                        
                    <? if( $custom_fields['linkedin'][0] ): ?>
                    
                    	<a href='<?=$custom_fields['linkedin'][0] ?>' class='linkedin' target="_blank"><img src='/images/sharethis-linkedin.png' border='0'/></a>
                        
                    <? endif; ?>
                </div>
                
                <p>
                    214 Capitol St.<br>
                    Charleston, WV 25301            
                </p>
                
                <p>
                
                	<? if( $custom_fields['phone'][0] ): ?>
                    
                		Tel: <strong><?=$custom_fields['phone'][0] ?></strong><br />
                    
                    <? endif; ?>
                    
                    <? if( $custom_fields['direct'][0] ): ?>
                    
                		Direct: <strong><?=$custom_fields['direct'][0] ?></strong><br />
                    
                    <? endif; ?>
                    
                     <? if( $custom_fields['mobile'][0] ): ?>
                    
                		Mobile: <strong><?=$custom_fields['mobile'][0] ?></strong><br />
                    
                    <? endif; ?>
                    
                    <? if( $custom_fields['fax'][0] ): ?>
                    
                    	Fax: <strong><?=$custom_fields['fax'][0] ?></strong><br />
                        
                    <? endif; ?>
                    
                    <? if( $custom_fields['email'][0] ): ?>
                    
                    	Email: <strong><a href='mailto:<?=$custom_fields['email'][0] ?>' style='color: #000;'><?=$custom_fields['email'][0] ?></a></strong>
                        
                    <? endif; ?>
                    
                    
                     <?
					 $other = get_field('other');
					 if( $other !=''): ?>
                    
                    	<?php the_field('other'); ?>
                        
                    <? endif; ?>
                    
                    
                </p>
                <p>&nbsp;</p>
            
            </div>
            
            <div id='person-bio'>

				<?php get_template_part( 'content', 'page' ); ?>
        
                <?php comments_template( '', true ); ?>
        
        	</div>
            
    <?php endwhile; // end of the loop. ?>
    
    </div>
            
<?php get_footer(); ?>