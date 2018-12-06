<div class="grid-item col-xs-12 col-sm-6 col-md-4 col-lg-4">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>

			<div class="entry-thumbnail">

				<?php the_post_thumbnail('full'); ?>

			</div>

		<?php endif; ?>

		<div class="date">

			<?php echo get_the_date('F j, Y'); ?>

		</div>

			<h4 class="entry-title">

				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>

			</h4>

		

		<?php 

				$content = do_shortcode($post->post_content);

			    $content = apply_filters('the_content', $content);

				$content = str_replace(']]>', ']]>', $content); 

				$content = wp_trim_words($content,10);

				echo '<p>'.$content.'<span class="block align-right"><a href="'.esc_url( get_permalink() ).'"> leer más <i class="fa fa-angle-right"></i> </a></span></p>';
		?>

</article><!-- #post -->

</div>