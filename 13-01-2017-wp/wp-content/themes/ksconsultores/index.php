<?php get_header(); ?>

<?php get_template_part('inner-slide'); ?>

<section class="section main-content">
            <div class="container full-width news">
                <div class="row">
                    <div class="container">
                            <h3 class="title-bar">Noticias</h3>
                      		 <?php $args = array(
								'posts_per_page'   => 1,
								'offset'           => 0,
								'category'         => '',
								'category_name'    => '',
								'orderby'          => 'date',
								'order'            => 'DESC',
								'include'          => '',
								'exclude'          => '',
								'meta_key'         => '',
								'meta_value'       => '',
								'post_type'        => 'post',
								'post_mime_type'   => '',
								'post_parent'      => '',
								'author'	   => '',
								'post_status'      => 'publish',
								'suppress_filters' => true 
							);
                       		

                       		$posts = get_posts($args); foreach($posts as $post): ?>

                      	 <div class="recent">
                            <figure class="col-md-5 col-sm-5">
                               <?php echo get_the_post_thumbnail($post->ID,'full'); ?>
                            </figure>

                            <div class="col-md-7 col-sm-7">
                              <article >
                                                            <h2><?php echo get_the_title($post->ID);?></h2>
                                                            <?php echo $post->post_content; ?>

                                                        </article>
<p class="align-center"><a href="#" id="read_more_arrow_down" class="read_more_arrow"><img src="<?php echo get_template_directory_uri();?>/assets/img/leer-mas-noticias.png" alt="arrow"></a>
<a href="#" id="read_more_arrow_up" class="read_more_arrow"><img src="<?php echo get_template_directory_uri();?>/assets/img/leer-mas-noticias-up.png" alt="arrow"></a></p>

                                                      </div>
                        </div>
                        <div class="clear"></div>

                    <?php endforeach;?>
                    </div>
                </div>
            </div>
        </section>
   <section class="section main-content">
            <div class="container full-width about_us">
                <div class="row">
                    <div class="container">
					<?php wp_reset_postdata(); $posts = $args = array(
								'posts_per_page'   => intval(get_query_var('posts_per_page')),
								'offset'           => 1,
								'category'         => '',
								'category_name'    => '',
								'orderby'          => 'date',
								'order'            => 'DESC',
								'include'          => '',
								'exclude'          => '',
								'meta_key'         => '',
								'meta_value'       => '',
								'post_type'        => 'post',
								'post_mime_type'   => '',
								'post_parent'      => '',
								'author'	   => '',
								'post_status'      => 'publish',
								'suppress_filters' => true 
							); ?>


                     <div class="grid js-masonry">
						<?php $posts = get_posts($args); foreach($posts as $post): setup_postdata( $post ); ?>

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
						<?php endforeach;  ?>
					</div>

<div class="align-center load_more_section">
					<input type="hidden" name="page_actual" id="page_actual" value="1" />
					<input type="hidden" name="post_per_page" id="post_per_page" value="<?php echo intval(get_query_var('posts_per_page')); ?>" />
					<input type="hidden" name="post_type" id="post_type" value="<?php echo get_post_type();?>" />
					<a href="javascript:void()" id="load-more-post" class="btn-primary">Añadir Más</a>
				</div>

    </div>
                </div>
            </div>
        </section>


	<script type="text/javascript">
	jQuery( document ).ready(function() {
		var msnry = new Masonry( '.grid.js-masonry');
		setInterval(function(){
			msnry.reloadItems();
			msnry.layout();
		},500);
		jQuery("#page_actual").val(1);

	    jQuery('#load-more-post').click(function(){
	    	var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	    	jQuery.ajax({
				        url: ajaxurl,
				        data: {
				            'action':'add_posts_ajax_request',
				            'page_actual' : (parseInt(jQuery("#page_actual").val()) + 1),
				            'post_per_page' : jQuery("#post_per_page").val(),
				            'post_type': jQuery("#post_type").val()
				        },
				        success:function(data) {
				            // This outputs the result of the ajax request
				            jQuery("#page_actual").val((parseInt(jQuery("#page_actual").val()) + 1));
				            var msnry = new Masonry( '.grid.js-masonry');
							jQuery('.grid.js-masonry').append(data);
							setInterval(function(){
							msnry.reloadItems();
							msnry.layout();
							},500);
				        },
				        error: function(errorThrown){
				            console.log(errorThrown);
				        }
			}); 
	    });
	});
</script>			

<?php get_footer(); ?>