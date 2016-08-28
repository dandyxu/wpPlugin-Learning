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

    //create a new Class from WP_Query()
    $top_posts_query = new WP_Query();
    //use get_posts() method in Class WP_Query
    $top_posts_query->get_posts();

    ?>

    <h3> Posts on this page: </h3>
    <?php if ( $top_posts_query->have_posts() ):
            while ( $top_posts_query->have_posts()):
                $top_posts_query->the_post();
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