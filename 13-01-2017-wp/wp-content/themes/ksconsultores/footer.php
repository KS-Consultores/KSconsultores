       <footer class="section footer">
          <div class="container">  <figure class="col-md-4"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt=""></figure>
   <div class="col-md-8">

                   
                   <?php 
                $menu_args = array(
                        'theme_location'  => 'primary', 
                        'container'       => false, 
                        'menu_class'      => 'nav navbar-nav navigation',
                        'menu_id'         => 'nav',
                        'echo'            => true);

            ?>
            <?php wp_nav_menu($menu_args);?>
              

          </div>
       
        </footer>
    </div>
<?php wp_footer(); ?>
</body>
</html>