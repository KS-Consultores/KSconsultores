<?php
/*
Template Name: Front Page
*/
get_header();
?>
<section id="home-slider">
            <div class="overlay"></div>
            <div id="owl-main" class="owl-carousel">

                <div class="item"><img src="<?php echo get_template_directory_uri();?>/assets/img/slide-2.jpg" alt=""></div>
                <div class="item"><img src="<?php echo get_template_directory_uri();?>/assets/img/slide-1.jpg" alt=""></div>
          
            </div>
             <div class="slide-content">
                <span class="logointro"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt=""/></span>
                <div id="owl-main-text" class="owl-carousel">
                    <div class="item">
                        <h2>Soluciones integrales personalizadas.</h2>
                    </div>
                    <div class="item">
                        <h2>Asesoría Fiscal y Contable</h2>
                    </div>
                    <div class="item">
                        <h2>Ética, Experiencia, Especialización y Confidencialidad.</h2>
                    </div>
                </div>
                <div class="slide-sep"></div>
            </div>>
            <div class="mouse"><span></span></div>
        </section>
 <section id="about" class="section">
            <div class="container">
                <div class="jt_row jt_row-fluid row">
                    <div class="carousel-wrapper news">
                            <div id="owl-about" class="owl-carousel generic-carousel">

                            	<?php  $posts = $args = array(
								'posts_per_page'   => 5,
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
							); $posts = get_posts( $args ); foreach($posts as $post): ?>
                                 <div class="item col-md-12">
                                    <div class="col-md-4 jt_col column_container thumb">
                                        <div class="ball"><?php echo get_the_post_thumbnail($post->ID,'full'); ?></div>
                                    </div>
                                    <div class="col-md-8 jt_col column_container content ">
                                    	<h3><?php echo get_the_title( $post->ID ); ?></h3>
                                        <div class="text">
                                          	<?php 

														$content = do_shortcode($post->post_content);

													    $content = apply_filters('the_content', $content);

														$content = str_replace(']]>', ']]>', $content); 

														$content = wp_trim_words($content,50);

														echo '<p>'.$content.'<span class="block align-right"><a href="'.esc_url( get_permalink() ).'"> leer más <i class="fa fa-angle-right"></i> </a></span></p>';
												?>
                        <div class="clear"></div>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section child separator newsletter">
            <div class="container full-width">
                <div class="jt_row jt_row-fluid row">
                    <div class="col-md-12 jt_col column_container">
                        <div class="megabutton">
                           <div class="container mtop24"> 
                            <h3 class="white align-left col-md-6">Suscríbete a nuestro newsletter</h3>

                            <div class="col-md-6">
                                <div class="right"><?php echo do_shortcode('[contact-form-7 id="127" title="Suscribir a Boletin"]'); ?></div>
                            </div>
                        <div class="clear"></div>

                        </div>  
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
           <?php $home = get_page_by_title('Inicio'); echo $home->post_content; ?>
        </section>


        <?php get_template_part('contact-banner'); ?>
<div class="mapa preFooter">
	 <div class="container">
                    <h3 class="col-md-6">
                        Donde Estamos
                    </h3>
                    <h6 class="col-md-6"><img src="<?php echo get_template_directory_uri();?>/assets/img/mail.jpg" alt=""> Calle Ricardo Palma 2955, 44670 Guadalajara, Jal.</h6>
                </div>
       <iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14930.367579799036!2d-103.3894537!3d20.6861759!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa7de37a54b2115b0!2sKs+Consultores!5e0!3m2!1sen!2smx!4v1448395643145" width="100%" height="450" frameborder="0" allowfullscreen="allowfullscreen"></iframe>

</div>

<?php get_footer(); ?>