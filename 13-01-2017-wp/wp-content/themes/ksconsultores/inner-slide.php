 <section id="slider" class="section">

            <ul class="slides">
                <li>
                 <img src="<?php echo get_field('main_slide', 'options'); ?>" />
                </li>
            </ul>
            <div class="container">
                <div class="caption" id="caption">
                   <?php echo get_field('slide_description', 'options'); ?>
                </div>
            </div>
        </section>