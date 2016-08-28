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
    $top_posts_query = new WP_Query(array('posts_per_page' => 5,
                                            'orderby' => 'comment_count',
                                            'order' => 'DESC'));

    //$top_posts_query->query("&posts_per_page=5&orderby=comment_count&order=DESC");


    ?>

    <h3> Top Posts: </h3>
    <?php if ( $top_posts_query->have_posts() ):
            while ( $top_posts_query->have_posts()):
                $top_posts_query->the_post();
        ?>
                <div class="top_posts">
                    <a href="<?php echo the_permalink(); ?>"
                       id="<?php echo the_id(); ?>"
                       title = "<?php echo the_title(); ?>"
                       class="comment_link"> <?php echo the_title(); ?></a>
                    (<?php echo comments_number(); ?>)
                </div>
                <?php endwhile;
                        endif;
                ?>
    <?php

}

function top_posts_comments_return(){
    //If post has a value called post_id
    $post_id = isset( $_POST['post_id']) ? $_POST['post_id'] : 0;

    if ( $post_id > 0){
        $post = get_post($post_id);
        ?>
    <div id="post">
        <?php echo $post->post_content; ?>
    </div>
    <?php
    }
    //Stop processing of PHP
    die();
}

add_action('wp_ajax_nopriv_top_comments', 'top_posts_comments_return');

function top_posts_get_scripts(){
    wp_enqueue_script("top_posts",
        path_join(WP_PLUGIN_URL, basename ( dirname (__FILE__)). "/top_posts.js"), array("jquery"));
}

add_action('wp_print_scripts', 'top_posts_get_scripts');

function top_posts_widget_init(){
    register_sidebar_widget('Top Posts', 'top_posts_widget');
}

add_action('widgets_init', 'top_posts_widget_init');

?>