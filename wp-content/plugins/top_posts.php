<?php
/**
 * Plugin Name: Top Posts Plugins
 * Plugin URI: http://localhost/wpPlugin-Learning/
 * Description: This plugin will link to the top x posts
 * Author: Dandy Xu
 * Version: 1.0
 * Author URI: https://dandyxu.github.com
 *
 */

function top_posts_widget(){
    ?>

    <h3> Posts on this page: </h3>
    <?php if ( have_posts() ):
            while ( have_posts()):
                the_post();
        ?>
                <div>
                    <a href="<?php echo the_permalink(); ?>"
                       title = "<?php echo the_title(); ?>" > <?php echo the_title(); ?></a>
                    (<?php echo comments_number(); ?>)
                </div>
                <?php endwhile;
                        endif;
                ?>
    <?php

}

function top_posts_widget_init(){
    register_sidebar_widget('Top Posts', 'top_posts_widget');
}

add_action('widgets_init', 'top_posts_widget_init');

?>