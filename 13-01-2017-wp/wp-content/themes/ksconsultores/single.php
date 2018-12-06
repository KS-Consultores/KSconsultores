<?php
get_header(); ?>
<?php get_template_part('inner-slide'); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

   <section class="section main-content">
            <div class="container full-width about_us">
                <div class="row">
                   <div class="container"> 
                   	<article class="col-md-8">
	                   	<figure>
	                   		
	                   		<?php the_post_thumbnail('full'); ?>
	                   	</figure>
	                       <h2><?php the_title(); ?></h2>
	                     <?php the_content();?>
                   </article>
                   <aside class="col-md-4">
                 
                 	<?php dynamic_sidebar('sidebar-default' ); ?>
                   </aside>


                                   </div>
                </div>
            </div>
        </section>
<!-- post -->
<?php endwhile; ?>
<!-- post navigation -->
<?php else: ?>
<!-- no posts found -->

 <section class="section main-content">
            <div class="container full-width about_us">
                <div class="row">
                    <div class="container">
                      <?php _e('Error 404'); ?>
                    </div>
                </div>
            </div>
        </section>
<?php endif; ?>
        
       
      <?php get_template_part('contact-banner'); ?>

<?php get_footer(); ?>