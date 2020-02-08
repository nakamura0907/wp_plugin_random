<?php
/*
Plugin Name: plugin-practice
Plugin URI:
Description: 練習の為だけのプラグイン。ランダムな記事をn個表示できるように
Author:
Version: 0.1
Author URI:
*/

$random = new Random(5);

Class Random
{
    private $num = 0;

    public function __construct($num)
    {
        $this->num = $num;
    }

    public function run()
    {
        $this->display();
    }

    private function display()
    {
        query_posts(array('orderby' => 'rand', 'showposts' => $this->num)); //非推奨らしいので代替案を探す
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                $this->loop();
            }
            wp_reset_query();
        }

    }

    private function getLoop()
    {
        global $wp_query;
        return $wp_query->current_post+1;
    }

    private function loop()
    {
        echo '<article class=article-content><a href=' . get_permalink($post->ID) . '>';
        if (has_post_thumbnail()) {
            the_post_thumbnail('medium');
        } else {
            echo '<img src=' . get_template_directory_uri() . '/assets/img/no_image.png alt=no_image>';
        }
        echo '<h2>' . get_the_title() . '</h2></a></article>' ;
    }


}
