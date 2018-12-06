<?php
get_header();?>

<?php get_template_part('inner-slide'); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

   <section class="section main-content">
            <div class="container full-width about_us">
                <div class="row">
                    <div class="container">
                        <h2 class="title-bar"><?php the_title(); ?></h2>
                      <?php the_content();?>
                    </div>
                </div>
            </div>
        </section>

<?php if(is_page('contacto')): echo get_field('mapa'); endif; ?>

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
        
       <?php if(!is_page('contacto')): ?>
      <?php get_template_part('contact-banner'); ?>
  <?php endif; ?>

<?php get_footer();?>